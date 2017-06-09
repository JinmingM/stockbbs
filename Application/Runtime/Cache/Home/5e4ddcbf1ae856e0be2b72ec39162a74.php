<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>修改密码</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<br><br>
<form action="/stockbbs/index.php/User/changeupsw1" method="post">
    <div class="form-group has-feedback" style="margin-left:100px;width:300px">
        <input type="text" name="uname" class="form-control" placeholder="用户名" />
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback"style="margin-left:100px;width:300px">
        <input type="password" name="upsw" class="form-control" placeholder="旧密码" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    </div>
    <div class="form-group has-feedback"style="margin-left:100px;width:300px">
        <input type="password" name="nupsw" class="form-control" placeholder="新密码" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback"style="margin-left:100px;width:300px">
        <input type="text" name="verify" class="form-control" placeholder="验证码" style="width:200px;" />
        <span class="glyphicon glyphicon-qrcode form-control-feedback" style="right:120px;"></span>
        <img class="verify" src="<?php echo U(verify);?>" alt="验证码" onClick="this.src=this.src+'?'+Math.random()" />
    </div>
    <div class="row">
        <div class="col-xs-4" style="margin-left:200px;width:300px">
            <button type="submit" class="btn btn-primary btn-block btn-flat">修改密码</button>
        </div><!-- /.col -->
    </div>
</form>
</body>
<footer id="footer"style="margin-left:550px;" >
    <ul class="copyright">
        <li>&copy; Sharer：MJM249455501@qq.com</a></li>
    </ul>
</footer>
</html>