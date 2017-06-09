<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>评论</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>论文页</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <div class="btn-group" role="group" aria-label="..." style="margin-left:1150px" navbar-static-top >
        <?php if(empty($username)): ?><button type="button" class="btn btn-default"><a href="/majinming/index.php/User/login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><strong>登录</strong></button>
            <button type="button" class="btn btn-default" ><a href="/majinming/index.php/User/regisiter"><strong>注册</strong></button>

            <?php else: ?>
            <div style='float:left' ><strong>欢迎你：<?php echo ($username); ?>||<a href='/majinming/index.php/User/logout'>退出</strong></a></div><?php endif; ?>

    </div>
    <br><br>
    <ul class="nav nav-pills nav-justified navbar-static-top">
        <li role="presentation" class=""><a href="/majinming/index.php/Index/index2"><strong>首页</strong></a></li>
        <li role="presentation" class="active"><a href="/majinming/index.php/Lunwen/uploadLunwen"><strong>共享论文上传</strong></a></li>
        <li role="presentation" class="active"><a href="/majinming/index.php/Lunwen/download"><strong>共享论文下载</strong></a></li>

        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <strong>用户中心</strong> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="presentation" ><a href="/majinming/index.php/User/touxiang">设置头像<span class="glyphicon glyphicon-off" aria-hidden="true"></a></li>
                <li role="presentation" ><a href="/majinming/index.php/User/changeupsw">账号管理<span class="glyphicon glyphicon-cog" aria-hidden="true"></a></li>
                <li role="presentation" ><a href="/majinming/index.php/User/grade">积分中心<span class="glyphicon glyphicon-usd" aria-hidden="true"></a></li>
                <li role="presentation" ><a href="/majinming/index.php/User/logout">用户注销<span class="glyphicon glyphicon-off" aria-hidden="true"></a></li>
            </ul>
        </li>
    </ul>
</head>
<body>
<br><br>
<!--<div class="row">-->

    <!--<div class="col-md-8">.col-md-1</div>-->
    <!--<div class="col-md-4">.col-md-4</div>-->
<!--</div>-->
<form action="/majinming/index.php/Lunwen/parper?title=<?php echo ($title); ?>" method="post">
    <header class="major"style="margin-left:50px">
        <h3><span class=" glyphicon glyphicon-paperclip" aria-hidden="true"></span>标题：<?php echo ($list["title"]); ?></h3>
        <br>
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span>用户名：<?php echo ($list1["uname"]); ?></h3>
        <br>
        <h3><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>下载次数：<?php echo ($list["cishu"]); ?></h3>
        <br>
        <h3><span class="glyphicon glyphicon-time" aria-hidden="true"></span>上传时间：<?php echo ($list["time"]); ?></h3>
        <br>
        <h3><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>描述：<?php echo ($list["miaoshu"]); ?></h3>
    </header>
</form>
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
<table class="table table-bordered">
    <tr><td><h4>楼层</h4></td><td><h4>      </h4></td><td><h4>用户名</h4></td><td><h4>评论内容</h4></td><td><h4>评论时间</h4></td>
    <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--<tr><td><h4>ID</h4></td><td><h4>用户名</h4></td><td><h4>积分</h4></td><td><h4>注册时间</h4></td><td><h4>操作</h4></td></tr>-->
        <?php if($vo["uname"] != null ): ?><tr><td><h4><?php echo ($i); ?></h4></td><td>
         <div class="imgtest">
            <figure>
                <div>
                    <img src="/majinming/<?php echo ($vo["iurl"]); ?>" />
                </div>
            </figure>
        </div>  </td><td><h4><?php echo ($vo["uname"]); ?></h4></td><td><h4><?php echo ($vo["neirong"]); ?></h4></td><td><h4><?php echo ($vo["time"]); ?></h4></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <!--<tr><td colspan="6" id="fenye"><?php echo ($page); ?></td></tr>-->
</table>
<div class="pages"><?php echo ($page); ?></div>

<div class="register-box-body">
    <form action="/majinming/index.php/Lunwen/pinglun?title=<?php echo ($title); ?>" method="post">
        <div class="form-group has-feedback"style="margin-left:100px;width:600px">
            <input type="text" name="ping" class="form-control" placeholder="请输入评论" />
        </div>
        <div class="row"style="margin-left:550px;width:500px">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">评论</button>
            </div><!-- /.col -->
        </div>
    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>

<footer id="footer"style="margin-left:550px;" >
    <ul class="copyright">
        <li>&copy;Sharer：MJM249455501@qq.com</a></li>
    </ul>
</footer>
</html>