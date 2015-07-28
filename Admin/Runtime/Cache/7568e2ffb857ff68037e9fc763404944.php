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

    <script type="text/javascript" src="__PUBLIC__/js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/ueditor/ueditor.all.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/jcDate.css"  />


    <script src="__PUBLIC__/uploadify/jquery.uploadify.min.js"  type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/uploadify/uploadify.css">

    <style type="text/css">
        .aa
        {
            display: none;
        }
    </style>
</head>
<body>

<script type="text/javascript">

    var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
    var i=0;//初始化数组下标
    $(function() {
        $('#file_upload').uploadify({
            'auto'     : false,//关闭自动上传
            'removeTimeout' : 1,//文件队列上传完成1秒后删除
            'swf'      : '__PUBLIC__/uploadify/uploadify.swf',
            'uploader' : '__URL__/uploadify',
            'method'   : 'post',          //方法，服务端可以用$_POST数组获取数据
            'buttonText' : '选择图片',//设置按钮文本
            'multi'    : true,//允许同时上传多张图片
            'uploadLimit' : 5,//一次最多只允许上传10张图片
            'fileTypeDesc' : 'Image Files',//只允许上传图像
            'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
            'fileSizeLimit' : '2000KB',//限制上传的图片大小
            'onUploadSuccess' : function(file, data, response) {      //每次成功上传后执行的回调函数，从服务端返回数据到前端
                $('#image').append('<img width="100px" height="100px" src="__PUBLIC__/Update/theme/'+data+'" /><input type="hidden" name="img" value="Update/theme/'+data+'" />');
                $(".img").addClass("aa");
                img_id_upload[i]=data;
                i++;
            },
            'onQueueComplete' : function(queueData) {             //上传队列全部完成后执行的回调函数
                if(img_id_upload.length>0){
//alert('成功上传的文件有：'+encodeURIComponent(img_id_upload));
                }
            }
// Put your options here
        });
    });

</script>

<script type="text/javascript">
    $(function (){
        $("input.jcDate").jcDate({
            IcoClass : "jcDateIco",
            Event : "click",
            Speed : 100,
            Left : 0,
            Top : 28,
            format : "-",
            Timeout : 100
        });
    });
</script>


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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新建活动</strong> / <small></small></div>
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
        <form class="am-form am-form-horizontal" name="form1" action="__URL__/xiugai"  method="post">
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label">活动名称</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" name="title" value="<?php echo ($theme["title"]); ?>">           
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">图片</label>
            <div class="am-u-sm-9">
                <input type="file" name="file_upload" id="file_upload" />
                <p><a href="javascript:$('#file_upload').uploadify('upload','*');">上传</a></p>
                <br />
                <div id="image" class="image"><img class="img" width="100px" height="100px" src="__PUBLIC__/<?php echo ($theme["img"]); ?>" /><input type="hidden" name="img" value="<?php echo ($theme["img"]); ?>" /></div><br />
            </div>
          </div>


            <div class="am-form-group">
                <label for="user-email" class="am-u-sm-3 am-form-label">活动起止时间</label>
                <div class="am-u-sm-9">

                    <input class="jcDate " name='startime' style="width:210px; height:30px; line-height:20px; padding:4px;" value=<?php echo ($theme["startime"]); ?> />
                    <input class="jcDate " name='endtime' style="width:210px; height:30px; line-height:20px; padding:4px;" value=<?php echo ($theme["endtime"]); ?> />
                </div>
            </div>



            <div class="am-form-group">
                <label for="user-email" class="am-u-sm-3 am-form-label">参与起止时间</label>
                <div class="am-u-sm-9">
                    <input class="jcDate " name='startime1' style="width:210px; height:30px; line-height:20px; padding:4px;" value=<?php echo ($theme["startime1"]); ?> />
                    <input class="jcDate " name='endtime1' style="width:210px; height:30px; line-height:20px; padding:4px;" value=<?php echo ($theme["endtime1"]); ?> />

                </div>
            </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">活动概要</label>
            <div class="am-u-sm-9">
              <textarea class="" rows="5" id="user-intro" name="votegy"><?php echo ($theme["votegy"]); ?></textarea>
              <small></small>
            </div>
          </div>
                    <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">比赛说明</label>
            <div class="am-u-sm-9">
              <textarea class="" rows="5" id="user-intro" name="votesm"><?php echo ($theme["votesm"]); ?></textarea>
              <small></small>
            </div>
          </div>
         <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">活动详情</label>
            <div class="am-u-sm-9">
              <textarea class=""  rows="5" id="myEditor" name="content"><?php echo ($theme["content"]); ?></textarea>
              <small></small>
            </div>
          </div>
		  
		 <div  class="am-form-group">
		  <label for="user-intro" class="am-u-sm-3 am-form-label">是否开启活动</label>
	    <div class="am-u-sm-9">
         <select name="zt">
  		 
			         <?php if($theme["zt"] == 0): ?><option value="0" selected="selscted">开启</option>
			  	      <option value="2">关闭</option>
			  	      <?php else: ?>
			           <option value="0">开启</option>
			  	      <option value="2" selected="selscted">关闭</option><?php endif; ?>			  	      		  	      
          </select>
		   </div>
		   
		   </div>

            <div  class="am-form-group">
                <label for="user-intro" class="am-u-sm-3 am-form-label">是否新增选项</label>
                <div class="am-u-sm-9">
                    <select name="hzt">

                        <?php if($theme["hzt"] == 0): ?><option value="0" selected="selscted">开启</option>
                            <option value="2">关闭</option>
                            <?php else: ?>
                            <option value="0">开启</option>
                            <option value="2" selected="selscted">关闭</option><?php endif; ?>
                    </select>
                </div>

            </div>

            <div  class="am-form-group">
                <label for="user-intro" class="am-u-sm-3 am-form-label">是否需要登录</label>
                <div class="am-u-sm-9">
                    <select name="login">

                        <?php if($theme["login"] == 0): ?><option value="0" selected="selscted">开启</option>
                            <option value="2">关闭</option>
                            <?php else: ?>
                            <option value="0">开启</option>
                            <option value="2" selected="selscted">关闭</option><?php endif; ?>
                    </select>
                </div>

            </div>

            <div  class="am-form-group">
                <label for="user-intro" class="am-u-sm-3 am-form-label">留言是否需要登录</label>
                <div class="am-u-sm-9">
                    <select name="liuyan">

                        <?php if($theme["liuyan"] == 0): ?><option value="0" selected="selscted">开启</option>
                            <option value="2">关闭</option>
                            <?php else: ?>
                            <option value="0">开启</option>
                            <option value="2" selected="selscted">关闭</option><?php endif; ?>
                    </select>
                </div>

            </div>


            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">限制投票数</label>
                <div class="am-u-sm-9">
                    <input type="text" id="user-name" name="vote" value="<?php echo ($theme["vote"]); ?>">
                    (限制每个用户每个活动总的投票数，超过不让投票,<span style="color:red;">0表示不限制</span>,默认为0,请输入整数)

                </div>
            </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">限制每天投票数</label>
                <div class="am-u-sm-9">
                    <input type="text" id="user-name" name="vote_day" value="<?php echo ($theme["vote_day"]); ?>">
                    (限制每个用户每个活动每天的投票数，超过不让投票,<span style="color:red;">0表示不限制</span>,默认为0,请输入整数)
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">限制选项每天票数</label>
                <div class="am-u-sm-9">
                    <input type="text" id="user-name" name="vote_item" value="<?php echo ($theme["vote_item"]); ?>">
                    (限制每个选项每天获得的票数,<span style="color:red;">0表示不限制</span>,1表示每个用户每天只能给该选项投1票,默认为0,请输入整数)

                </div>
            </div>
               
            <div class="am-u-sm-9 am-u-sm-push-3">
                 <input value=<?php echo ($theme["tid"]); ?> name="tid" type="hidden" id="tid" >
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
<script type="text/javascript">  
    UE.getEditor('myEditor')  
</script>
<script type="text/javascript">

    $(function (){
        $("input.jcDate").jcDate({
            IcoClass : "jcDateIco",
            Event : "click",
            Speed : 100,
            Left : 0,
            Top : 28,
            format : "-",
            Timeout : 100
        });
    });

</script>
<script type="text/javascript" src="__PUBLIC__/js/jQuery-jcDate.js" charset="utf-8"></script>

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