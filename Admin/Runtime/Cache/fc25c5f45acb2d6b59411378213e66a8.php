<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
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

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
      <span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span>
  </button>

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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">选项</strong> / <small><a href="__URL__/addx/tid/<?php echo $_GET[tid]; ?>">新增选项</a></small>

      <br/>

          <small><a href="__URL__/xvote/tid/<?php echo $_GET[tid]; ?>">查看全部投票</a></small>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
          </div>
        </div>
      </div>
      <div class="am-u-md-3 am-cf">
        <div class="am-fr">
        </div>
      </div>
    </div>
<hr>
    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-title">活动选项名称</th>
                <th class="table-date">票数</th>
                <th class="table-date">查看投票</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php if(is_array($theme)): $i = 0; $__LIST__ = $theme;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($th['name']); ?></td>
              <td><?php echo ($th['num']); ?></td>
               <td><a href="__URL__/xvote/id/<?php echo ($th["id"]); ?>">查看</a></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <a href="__URL__/upx/id/<?php echo ($th["id"]); ?>"><span class="am-icon-pencil-square-o"></span>编辑</a>/<a href="__URL__/de/id/<?php echo ($th["id"]); ?>">删除</a>
                  </div>
                </div>
              </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
          <div class="am-cf">

  <div class="am-fr">

  </div>
</div>
          <hr />
        </form>
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