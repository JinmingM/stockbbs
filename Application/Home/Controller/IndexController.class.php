<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $username = $_SESSION['name'];
        $this->assign("username", $username);
        $this->display();
    }

    public function index2(){
        $username = $_SESSION['name'];
        $this->assign("username", $username);
        $User = M('users');
        $Hbill = M('h_bill');
        $list3 = $Hbill->where('state = 0 OR state =1')->select();

        $list = $User->select();
        $usernum = $User->count('uid');
        $Image = M("image");

        for($i =0 ;$i<$usernum;$i++)
        {
            $list_c0[$i] = $Hbill->where("state=%d and uid=%d",array(0,$list[$i]['uid']))->count();
            $list_c1[$i] = $Hbill->where("state=%d and uid=%d",array(1,$list[$i]['uid']))->count();
            $list_c[$i] = $list_c0[$i]+$list_c1[$i];
            $list_u[$i] = array("count"=>$list_c[$i],"uid"=>$list[$i]['uid'],"uname"=>$list[$i]['uname']);

            $list_i = $Image->where(array("uid"=>$list[$i]['uid']))->order("time desc")->find();
            //print_r($list_i);
            if($list_i['url']=="")
            {
                $list_u[$i]['iurl'] ="Uploads/touxiang.png" ;
            }else{
                $list_u[$i]['iurl'] = $list_i['url'];
            }

        }
        //$this->getchange(600000);
        arsort($list_u);
        $this->assign('list',$list_u);
        //print_r($list_u);
        //$list1 =0;
        $Stock = M("stock");
        $slist = $Stock->select();
        $stocknum = $Stock->count('sid');
        //echo "stocknum:";
       // echo $stocknum;
        for($i=0;$i<200;$i++)
        {
            $change = $this->getchange($slist[$i]['sid']);
            $list11[$i]['change'] =  $change;
            $list11[$i]['sid'] =  $slist[$i]['sid'];
            $list11[$i]['sname'] =  $slist[$i]['sname'];
        }
        $list11 = $this->my_sort($list11,change);
       // print_r($list11);
        for($i=0;$i<10;$i++)
        {

            $list1[$i]['change'] =  $list11[$i]['change']."%";
            $list1[$i]['sid'] =  $list11[$i]['sid'];
            $list1[$i]['sname'] =  $list11[$i]['sname'];
        }
        //print_r($list11);
        $this->assign('list1',$list1);
       // $this->assign('list2',$list2);
        $this->display();
    }
    public function getchange($sid)
    {
        header('Content-type:text/html;charset=utf-8');
        //$sid = 600000;
        $u_str = "http://hq.sinajs.cn/list=sh".$sid;
        //echo $u_str;
        //echo '</br>';
        $url = $u_str;
        $params = array(
            "stock" => "",//股票名称
        );
        $paramstring = http_build_query($params);

        $ch = curl_init();
        curl_setopt( $ch , CURLOPT_URL , $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        $response = curl_exec( $ch );
        $arr=split(',',$response);
        //print_r($arr);
        curl_close( $ch );
        $change = ($arr[3]-$arr[2])/$arr[3]*100;
        $res = sprintf("%.2f",$change);
       // echo($res);
        //echo '</br>';
        return $res;
    }
    function my_sort($arrays,$sort_key,$sort_order=SORT_DESC,$sort_type=SORT_NUMERIC ){
        if(is_array($arrays)){
            foreach ($arrays as $array){
                if(is_array($array)){
                    $key_arrays[] = $array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
        return $arrays;
    }

}