<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>共享论文下载</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function download(val1,val2)
        {
            if (confirm("下载需要"+val2+"积分下载此文件吗？")){
                location.href="/stockbbs/index.php/Tie/download1?title="+val1;
                return true;
            }else{
                return false;
            }
        }
    </script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="/stockbbs/Public/css/mypage.css" rel="stylesheet" type="text/css"/>
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <div class="btn-group" role="group" aria-label="..." style="margin-left:1230px" navbar-static-top >
        <?php if(empty($username)): ?><button type="button" class="btn btn-default"><a href="/stockbbs/index.php/User/login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><strong>登录</strong></button>
            <button type="button" class="btn btn-default" ><a href="/stockbbs/index.php/User/regisiter"><strong>注册</strong></button>

            <?php else: ?>
            <div style='float:left' ><strong>欢迎你：<?php echo ($username); ?>||<a href='/stockbbs/index.php/User/logout'>退出</strong></a></div><?php endif; ?>

    </div>
    <br><br>
    <ul class="nav nav-pills nav-justified navbar-static-top">
        <li role="presentation" class=""><a href="/stockbbs/index.php/Index/index2"><strong>首页</strong></a></li>
        <li role="presentation" class="active"><a href="/stockbbs/index.php/Tie/uploadTie"><strong>共享信息上传</strong></a></li>
        <li role="presentation" class="active"><a href="/stockbbs/index.php/Tie/download"><strong>浏览共享信息</strong></a></li>

        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <strong>用户中心</strong> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="presentation" ><a href="/stockbbs/index.php/User/touxiang">设置头像<span class="glyphicon glyphicon-off" aria-hidden="true"></a></li>
                <li role="presentation" ><a href="/stockbbs/index.php/User/changeupsw">账号管理<span class="glyphicon glyphicon-cog" aria-hidden="true"></a></li>
                <li role="presentation" ><a href="/stockbbs/index.php/User/grade">积分中心<span class="glyphicon glyphicon-usd" aria-hidden="true"></a></li>
                <li role="presentation" ><a href="/stockbbs/index.php/User/logout">用户注销<span class="glyphicon glyphicon-off" aria-hidden="true"></a></li>
            </ul>
        </li>
    </ul>
</head>
<body>
    <style type="text/css">
        .imgtest{margin:10px 5px;
            overflow:hidden;}
        .list_ul figcaption p{
            font-size:12px;
            color:#aaa;
        }
        .imgtest figure div{
            display:inline-block;
            margin:5px auto;
            width:50px;
            height:50px;
            border-radius:100px;
            border:2px solid #fff;
            overflow:hidden;
            -webkit-box-shadow:0 0 3px #ccc;
            box-shadow:0 0 3px #ccc;
        }
        .imgtest img{width:100%;
            min-height:100%; text-align:center;}
    </style>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<br>
<div class="register-box-body">
    <form action="/stockbbs/index.php/Tie/findTie" method="post">
        <div class="form-group has-feedback"style="margin-left:50px;width:600px">
            <input type="text" name="zi" class="form-control" placeholder="请输入关键字" />
        </div>
        <div class="row"style="margin-left:500px;width:500px">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">搜索<span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></button>
            </div><!-- /.col -->
        </div>
    </form>
</div>
<br>
<table class="table table-hover" >
    <tr><td><h4>          </h4></td><td><h4>用户名</h4></td><td><h4>论文标题</h4></td><td><h4>关键字</h4></td><td><h4>访问次数</h4></td><td><h4>时间</h4></td><td><h4>操作</h4></td></tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--<tr><td><h4>ID</h4></td><td><h4>用户名</h4></td><td><h4>积分</h4></td><td><h4>注册时间</h4></td><td><h4>操作</h4></td></tr>-->
        <?php if($vo["uname"] != null ): ?><td>
                <div class="imgtest">
                    <figure>
                        <div>
                            <img src="/stockbbs/<?php echo ($vo["iurl"]); ?>" />
                        </div>
                    </figure>
                </div></td><td><h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo ($vo["uname"]); ?></h4></td><td><h4><a href='/stockbbs/index.php/Tie/parper/title/<?php echo ($vo["title"]); ?>'><?php echo ($vo["title"]); ?></a></h4></td><td><h4><?php echo ($vo["key"]); ?></h4></td><td><h4><?php echo ($vo["cishu"]); ?></h4></td><td><h4><?php echo ($vo["time"]); ?></a></h4></td><td><h4><input type="button" value="点击下载" onclick="download('<?php echo ($vo["title"]); ?>','<?php echo ($vo["grade"]); ?>')"/></a></h4></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="pages"><?php echo ($page); ?></div>


</body>
<footer id="footer"style="height:50px;position:fixed;bottom:0px;left:550px;}" >
    <!--<ul class="copyright">-->
        <!--<li>&copy; Sharer：MJM249455501@qq.com</a></li>-->
    <!--</ul>-->
</footer>
</html>