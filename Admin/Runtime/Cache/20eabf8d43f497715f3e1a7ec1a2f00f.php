<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台管理系统</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="{$Think.const.HURL_IMG}favicon.png">
  <link rel="apple-touch-icon-precomposed" href="{$Think.const.HURL_IMG}app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="__PUBLIC__/css/amazeui.min.css"/>
  <link rel="stylesheet" href="__PUBLIC__/css/admin.css">
<script type="text/javascript" src="__PUBLIC__/js/laydate.js"></script>

<script type="text/javascript" src="__PUBLIC__/js/ueditor/ueditor.config.js"></script>  
<script type="text/javascript" src="__PUBLIC__/js/ueditor/ueditor.all.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong>xxxxx</strong> <small>后台管理</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar">
    <ul class="am-list admin-sidebar-list">
      <li><a href="__URL__/index"><span class="am-icon-home"></span> 首页</a></li>
      <li><a href="__URL__/users"><span class="am-icon-table"></span> 用户</a></li>
      <li><a href="__URL__/listr"><span class="am-icon-pencil-square-o"></span> 活动</a></li>
      <li><a href="__URL__/liuyan"><span class="am-icon-pencil-square-o"></span> 留言</a></li>
      <li><a href="__URL__/login/anlogin/1"><span class="am-icon-sign-out"></span> 注销</a></li>
    </ul>
  </div>

  <!-- sidebar end -->
 <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small></small></div>
    </div>

    <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
      <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>活动数量<br/>2300</a></li>
      <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>投票数量<br/>308</a></li>
      <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>访问量<br/>80082</a></li>
      <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span><br/>用户数量<br/>3000</a></li>
    </ul>

      </div>
    </div>
      </div>
    </div>
  </div>
  <!-- content end -->

</div>
<footer>
  <hr>
  <p class="am-padding-left"></p>
</footer>

<!--[if lt IE 9]>
<script src="__PUBLIC__/js/jquery1.11.1.min.js"></script>
<script src="__PUBLIC__/js/modernizr.js"></script>
<script src="__PUBLIC__/js/polyfill/rem.min.js"></script>
<script src="__PUBLIC__/js/polyfill/respond.min.js"></script>
<script src="__PUBLIC__/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__PUBLIC__/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="__PUBLIC__/js/app.js"></script>
</body>
</html>