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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">留言</strong> / <small><a href="javascript:history.go(-1);">返回</a></small></div>
    </div>

    <hr/>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <div class="am-panel-default">
        </div>
        <div class="am-panel-default">
          <div>
          </div>
        </div>

      </div>

      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
        <form class="am-form am-form-horizontal" name="form1" action="__URL__/tliu"  method="post">

		 <div  class="am-form-group">
		  <label for="user-intro" class="am-u-sm-3 am-form-label">审核</label>
	    <div class="am-u-sm-9">
         <select name="xs">

			         <?php if($xliu["xs"] == 0): ?><option value="0" selected="selscted">通过</option>
			  	      <option value="2">未审核</option>
			  	      <?php else: ?>
			           <option value="0">通过</option>
			  	      <option value="2" selected="selscted">未审核</option><?php endif; ?>
          </select>
		   </div>

		   </div>



            <div class="am-u-sm-9 am-u-sm-push-3">
      <input type="hidden" name="id" value="<?php echo ($xliu["id"]); ?>" />
                <input type="hidden" name="tid" value="<?php echo ($xliu["tid"]); ?>" />
               <input type="submit" name="commit" value="保存数据" class="btn " />
            </div>
          </div>
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
<script src="__PUBLIC__/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="__PUBLIC__/js/app.js"></script>
</body>
</html>