<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>查找论文</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
<br><br>
<table class="table table-hover" >
    <tr><td><h4>用户名</h4></td><td><h4>论文标题</h4></td><td><h4>关键字</h4></td><td><h4>需要积分</h4></td><td><h4>下载</h4></td><td><h4>时间</h4></td><td><h4>操作</h4></td></tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--<tr><td><h4>ID</h4></td><td><h4>用户名</h4></td><td><h4>积分</h4></td><td><h4>注册时间</h4></td><td><h4>操作</h4></td></tr>-->
        <tr><td><h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo ($uname); ?></h4></td><td><h4><a href='/stockbbs/index.php/Lunwen/parper/title/<?php echo ($vo["title"]); ?>'><?php echo ($vo["title"]); ?></a></h4></td><td><h4><?php echo ($vo["key"]); ?></h4></td><td><h4><?php echo ($vo["grade"]); ?></h4></td><td><h4><?php echo ($vo["cishu"]); ?></h4></td><td><h4><?php echo ($vo["time"]); ?></a></h4></td><td><h4><a href='/stockbbs/index.php/Lunwen/download1/'>下载<span class="glyphicon glyphicon-download" aria-hidden="true"></span></a></h4></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr><td colspan="6" id="fenye"><?php echo ($page); ?></td></tr>
</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
<footer id="footer"style="margin-left:550px;" >
    <ul class="copyright">
        <li>&copy; Sharer：MJM249455501@qq.com</a></li>
    </ul>
</footer>
</html>