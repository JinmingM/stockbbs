<?php
namespace Home\Controller;
use Think\Controller;

class TieController extends Controller {
    public function uploadTie()
    {
        $username = $_SESSION['name'];
        $this->assign("username", $username);
        if(!session("name")){
            $this->error('请登录！',U('User/login'),2);
        }
        $this->display();

    }
    public function uploadTie1()
    {
        if(session("name")){
            $tietitle=I('post.title','','htmlspecialchars');
            $tiemiaoshu=I('post.miaoshu','','htmlspecialchars');

            $tiekey=I('post.key','','htmlspecialchars');
            $username = $_SESSION['name'];
            $User = M("users");
            $result = $User->where(array("uname"=>$username))->find();
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('pdf', 'txt', 'doc');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            $upload->saveName =      $tietitle;
            $upload->autoSub  = true;
            $upload->subName  =  array('date','Ymd','__FILE__');
            // 上传文件
            $info   =   $upload->upload();
            if($tietitle!="" && $tiemiaoshu!=""){

                    $Tie = M('Tie');
                    $ar['title'] = $tietitle;
                    $ar['miaoshu'] = $tiemiaoshu;
                    $ar['key'] = $tiekey;
                    $ar['cishu'] = 0;
                    $ar['time'] = Date('Y-m-d H:i:s');
                    $ar['url'] = 'Uploads/'.$info['file']['savepath'].$info['file']['savename'];
                    $ar['uid'] = $result['uid'];

                    if($info === false) {// 上传错误提示错误信息
                        $this->error($upload->getError());
                    }
                    else{
                        $Tie->add($ar);
                        $this->success('上传成功！', U('Tie/uploadTie'));
                    }

            }else{
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo '<script type="text/javascript">alert("标题或内容不能为空！");window.history.back();</script>';
            }
        } else{
//            echo '<script type="text/javascript">alert("请登录！")</script>';
//            redirect('User/login', 2, '页面跳转中...');
            $this->error('请登录！',U('User/login'),2);
        }

    }
    public function download()
    {
        $username = $_SESSION['name'];
        $this->assign("username", $username);
        if(session("name")){
            $Tie=M("tie");
            $result = $Tie->find();

            $list = $Tie->select();
            //print_r($list);
            $User=M("users");

            for($i =0 ;$i<M("tie")->count();$i++)
            {
                $list2[$i] = $User->where(array("uid"=>$list[$i]['uid']))->find();//找到上传者对应的数组
            }
            //print_r($list2);
            for($i =0 ;$i<M("tie")->count();$i++)
            {
                $list[$i]['uname']=$list2[$i]['uname']."";//把上传者的名字传到list数组中
            }
            import("@.ORG.Page");
            $this->assign('list1',$list);
            $count  = $Tie->count();// 查询满足要求的总记录数
            $pagecount = 10;
            $page = new \Think\Page($count , $pagecount);
//            $page->parameter = $row; //此处的row是数组，为了传递查询条件
            $page->setConfig('first','首页');
            $page->setConfig('prev','上一页');
            $page->setConfig('next','下一页');
            $page->setConfig('last','尾页');
            $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
            $show = $page->show();
            $list   = $Tie->limit($page->firstRow. ',' . $page->listRows)->order('time')->select();
            for($i =0 ;$i<10;$i++)
            {
                $list2[$i] = $User->where(array("uid"=>$list[$i]['uid']))->find();//找到上传者对应的数组
            }
//            print_r($list2);
            $Image = M("image");
            for($i =0 ;$i<10;$i++)
            {
                $list3 = $Image->where(array("uid"=>$list2[$i]['uid']))->order("time desc")->find();
                $list[$i]['uname']=$list2[$i]['uname']."";//把上传者的名字传到list数组中
                if($list3['url']=="")
                {
                    $list[$i]['iurl'] ="Uploads/touxiang.png" ;
                }else{
                    $list[$i]['iurl'] = $list3['url'];
                }
            }
//            print_r($list);
            $this->assign('list',$list);
            $this->assign('page',$show);
            $this->display();
        }else{
//            echo '<script type="text/javascript">alert("请登录！")</script>';
//            redirect('User/login', 2, '页面跳转中...');
            $this->error('请登录！',U('User/login'),2);
        }
    }
    public function download1()
    {

        $username = $_SESSION['name'];
        $this->assign("username", $username);
        $username= session("name");
        $title= I("get.title");
        $this->assign("title", $title);
        $Tie=M("tie");
        $Down=M("download");
        $list = $Tie->where(array("title"=>$title))->find();
        $User=M("users");
        $list1 = $User->where(array("uid"=>$list['uid']))->find();//上传者信息
        $list2 = $User->where(array("uname"=>session("name")))->find();//下载者信息
        $a=$list['grade'];
        $c=$list2['grade']-$a;
        if($c>=0)//判断是否积分够
        {
            if($Down->where(array("lid"=>$list['lid']))->where(array("uid"=>$list2['uid']))->select())//判断是否下载过
            {
                $Tie->where(array("title"=>$title))->setInc('cishu',1);// 下载加1
            }else{
                $User->where(array("uid"=>$list['uid']))->setInc('grade',$a); // 上传用户的积分加$a
                $User->where(array("uname"=>session("name")))->setDec('grade',$a); // 下载用户的积分减$a
                $Tie->where(array("title"=>$title))->setInc('cishu',1); // 下载加1
                $ar['lid'] = $list['lid'];
                $ar['uid'] = $list2['uid'];
                $Down->add($ar);//导入下载历史
            }
            $this->assign('title',$title);
            $this->assign('list',$list);
            $this->assign('list1',$list1);
            $this->display();
        }else{
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo '<script type="text/javascript">alert("积分不足！");window.history.back();</script>';
        }

    }
    public function addgrade()
    {
//        if(1){
//            $username = $_SESSION['name'];
//            $this->assign("username", $username);
//            $username= session("name");
//            $Tien=M("Tie");
////        $list = $Tie->where(array("title"=>$title))->find();
//            $User=M("user");
//            $list1 = $User->where(array("uid"=>$list['uid']))->find();//论文的主人
//            $list2 = $User->where(array("uname"=>session("name")))->find();//下载者
//            $a=$list['grade'];
//            $c=$list2['grade']-$a;
////        $Tie->where(array("title"=>$title))->setInc('cishu',1); // 文章阅读数加1
//            $User->where(array("uid"=>$list['uid']))->setInc('grade',$a); // 用户的积分加$a
//            $Down=M("download");
//            $list3 = $Down->where(array("lid"=>$list['lid']))->find();
//            if($list3['uid']=$list2['uid']){
//                $User->where(array("uname"=>session("name")))->setDec('grade',$a); // 用户的积分减$a
//            }else{
//            }
//        }else{
//            echo '<script type="text/javascript">alert("积分不足！");window.history.back();</script>';
//        }

    }
    public function findTie()
    {
        $username = $_SESSION['name'];
        $this->assign("username", $username);
        $zi= I('post.zi');
        $this->findTie1($zi);
        $this->display();
    }
    public function findTie1($zi)
    {
        if($zi)
        {
            $Tie=M("tie");
            $condition["title"] = array("like", "%".$zi);
            $condition["key"] = array("like", "%".$zi);
            $list = $Tie->where($condition)->select();
            $count = $Tie->where($condition)->count();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
            $Page -> setConfig ( 'theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
            $show = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('list',$list);
        }else{
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo '<script type="text/javascript">alert("关键字为空！");window.history.back();</script>';
        }
    }
    public function parper()
    {
        $username = $_SESSION['name'];
        $this->assign("username", $username);
        $title= I("get.title");
        $this->assign("title", $title);
        $Tie=M("tie");

        $list = $Tie->where(array("title"=>$title))->find();
        //echo $list['cishu'];
        $data['cishu'] = $list['cishu']+1;
        $Tie->where(array("title"=>$title))->save($data);
        $User=M("users");
        $list1 = $User->where(array("uid"=>$list['uid']))->find();
        $this->assign('list',$list);
        $this->assign('list1',$list1);
        //print_r($list1);
        $Pinglun=M("pinglun");
        import("@.ORG.Page");
        $count = $Pinglun->where(array("lid"=>$list['lid']))->count();// 查询满足要求的总记录数
        $pagecount = 5;
        $page = new \Think\Page($count , $pagecount);
//            $page->parameter = $row; //此处的row是数组，为了传递查询条件
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
        $show = $page->show();
        $list2 = $Pinglun->where(array("lid"=>$list['lid']))->limit($page->firstRow. ',' . $page->listRows)->select();
        $Image = M("image");
        for($i =0 ;$i<M("pinglun")->where(array("lid"=>$list['lid']))->count();$i++)
        {
            $list3 = $User->where(array("uname"=>$list2[$i]['uname']))->find();
            $list4 = $Image->where(array("uid"=>$list2[$i]['uid']))->order("time desc")->find();
            //print_r($list3);
            if($list4['url']=="")
            {
                $list2[$i]['iurl'] ="Uploads/touxiang.png" ;
            }else{
                $list2[$i]['iurl'] = $list4['url'];
            }//把上传者的名字传到list数组中
        }
        $this->assign('list2',$list2);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public function pinglun()
    {
        if(session("name")){
            $ping=I('post.ping','','htmlspecialchars');
            $title= I("get.title");
            $username = $_SESSION['name'];
            $User = M("Users");
            $result = $User->where(array("uname"=>$username))->find();
            if($ping!=""){
                $Pinglun = M('pinglun');
                $ar['neirong'] = $ping;
                $list = $User->where(array("uname"=>$username))->find();
                $ar['uid'] = $list['uid'];
                $Tie = M('tie');
                $list1 = $Tie->where(array("title"=>$title))->find();
                $ar['lid'] = $list1['lid'];
                $ar['uname'] = $username;
                $ar['time'] = Date('Y-m-d H:i:s');
                $condition['uname'] = $username;
                $condition['lid'] = $list1['lid'];
                if($Pinglun->where($condition)->select() )
                {
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                    echo '<script type="text/javascript">alert("你已经评论过！");window.history.back();</script>';
                }else{
                    $Pinglun->add($ar);
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                    echo '<script type="text/javascript">alert("评论成功！");window.history.back();</script>';
                }

            }else{
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo '<script type="text/javascript">alert("评论不能为空！");window.history.back();</script>';
            }
        }else{
            $this->error('请登录！',U('User/login'),2);
        }
    }
}