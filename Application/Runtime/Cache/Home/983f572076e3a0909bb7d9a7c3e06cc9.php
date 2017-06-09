<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
   <head>
    <title>首页</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="/stockbbs/Public/assets1/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/stockbbs/Public/assets1/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="/stockbbs/Public/assets1/css/ie8.css" /><![endif]-->
   </head>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

			<!-- Header -->
   <body class="landing">
   <div id="page-wrapper">
   <header id="header" class="alt">
       <nav id="nav">
           <ul>
               <li><a href="/stockbbs/index.php/Index/index2">首页</a></li>

               <?php if(empty($username)): ?><li><a href="/stockbbs/index.php/User/login" class="button">登录</a></li>
               <li><a href="/stockbbs/index.php/User/regisiter" class="button">注册</a></li>
                   <?php else: ?>
                   <div style='float:left' ><strong>欢迎你：<?php echo ($username); ?>||<a href='/stockbbs/index.php/User/logout'>退出</a></strong></a></div><?php endif; ?>
           </ul>
       </nav>
   </header>

   <!-- Banner -->
   <section id="banner">
       <ul class="actions">
           <!--<li><a href="#" class="button special">Sign Up</a></li>-->
           <!--<li><a href="#" class="button">Learn More</a></li>-->
       </ul>
   </section>

   <!-- Main -->
   <br><br><br><br><br><br><br>

   <section id="main" class="container">

       <section class="box special">
           <header class="major">
               <h2>欢迎来到Stock论坛系统
                   <br />
                   浏览愉快</h2>
               <p>请把自己认为比较好的，有用的信息进行分享，谢谢</p>
           </header>
           <span class="image featured"><img src="/stockbbs/Public/assets1/images/6666.png" alt="" /></span>
       </section>

       <section class="box special features">
           <div class="features-row">
               <section>
                   <span class="icon major fa-bolt accent2"></span>
                   <a href="/stockbbs/index.php/Tie/download"><h3>浏览共享信息</h3></a>
                   <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
               </section>
               <section>
                   <span class="icon major fa-area-chart accent3"></span>
                   <a href="http://www.baidu.com"><h3>去长见识</h3></a>
                   <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
               </section>
           </div>
           <div class="features-row">
               <section>
                   <span class="icon major fa-cloud accent4"></span>
                   <a href="/stockbbs/index.php/Tie/uploadTie"><h3>共享信息上传</h3></a>
                   <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
               </section>
               <section>
                   <span class="icon major fa-lock accent5"></span>
                   <a href="/stockbbs/index.php/User/changeupsw"><h3>修改密码</h3></a>
                   <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
               </section>
           </div>
           <<header class="major"style="margin-left:50px">
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
               </head>
               <body >

           <div class="features-row">
               <section>
                   <h3>用户活跃度排行榜</h3></a>
                   <table class="table table-hover" style = margin-left:50px>
                       <tr><td><h4>排名</h4></td><td><h4>ID</h4></td><td><h4>用户名</h4></td><td><h4>交易数</h4></td><td><h4></h4></td>
                           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--<tr><td><h4>ID</h4></td><td><h4>用户名</h4></td><td><h4>积分</h4></td><td><h4>注册时间</h4></td><td><h4>操作</h4></td></tr>-->
                           <tr><td><h4><?php echo ($i); ?></h4></td><td><h4><?php echo ($vo["uid"]); ?></h4></td><td><h4><?php echo ($vo["uname"]); ?></h4></td><td><h4><?php echo ($vo["count"]); ?></h4></td><td><h4>
                       <div class="imgtest">
                           <figure>
                               <div>
                                   <img src="/stockbbs/<?php echo ($vo["iurl"]); ?>" />
                               </div>
                           </figure>
                       </div></h4></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                   </table>
                   <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
               </section>
               <section>
                   <h3>股票涨幅排行榜</h3></a>
                   <table class="table table-hover" style = margin-left:50px>
                       <tr><td><h4>排名</h4></td><td><h4>股票ID</h4></td><td><h4>股票名</h4></td><td><h4>涨幅</h4></td>
                           <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--<tr><td><h4>ID</h4></td><td><h4>用户名</h4></td><td><h4>积分</h4></td><td><h4>注册时间</h4></td><td><h4>操作</h4></td></tr>-->
                       <tr><td><h4><?php echo ($i); ?></h4></td><td><h4><a href='/stockbbs/index.php/Tie/download1/title/<?php echo ($vo["title"]); ?>' ><?php echo ($vo["sid"]); ?></a></h4></td><td><h4><?php echo ($vo["sname"]); ?></h4></td><td><h4><?php echo ($vo["change"]); ?></h4></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                   </table>
                   <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
               </section>
           </div>
       </section>

       <!--<div class="row">-->
       <!--<div class="6u 12u(narrower)">-->

       <!--<section class="box special">-->
       <!--<span class="image featured"><img src="images/pic02.jpg" alt="" /></span>-->
       <!--<h3>Sed lorem adipiscing</h3>-->
       <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
       <!--<ul class="actions">-->
       <!--<li><a href="#" class="button alt">Learn More</a></li>-->
       <!--</ul>-->
       <!--</section>-->

       <!--</div>-->
       <!--<div class="6u 12u(narrower)">-->

       <!--<section class="box special">-->
       <!--<span class="image featured"><img src="images/pic03.jpg" alt="" /></span>-->
       <!--<h3>Accumsan integer</h3>-->
       <!--<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>-->
       <!--<ul class="actions">-->
       <!--<li><a href="#" class="button alt">Learn More</a></li>-->
       <!--</ul>-->
       <!--</section>-->

       <!--</div>-->
       <!--</div>-->

   </section>

   <!-- CTA -->
   <section id="cta">

       <h2>^_^</h2>

       <!--<form>-->
       <!--<div class="row uniform 50%">-->
       <!--<div class="8u 12u(mobilep)">-->
       <!--<input type="email" name="email" id="email" placeholder="Email Address" />-->
       <!--</div>-->
       <!--<div class="4u 12u(mobilep)">-->
       <!--<input type="submit" value="Sign Up" class="fit" />-->
       <!--</div>-->
       <!--</div>-->
       <!--</form>-->

   </section>

   <!-- Footer -->
   <footer id="footer">
       <ul class="icons">
           <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
           <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
           <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
           <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
           <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
           <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
       </ul>
       <ul class="copyright">
           <li>&copy; Sharer：MJM249455501@qq.com</a></li>
       </ul>
   </footer>

   </div>

   <!-- Scripts -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/jquery.dropotron.min.js"></script>
   <script src="assets/js/jquery.scrollgress.min.js"></script>
   <script src="assets/js/skel.min.js"></script>
   <script src="assets/js/util.js"></script>
   <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
   <script src="assets/js/main.js"></script>

   </body>
</html></html>