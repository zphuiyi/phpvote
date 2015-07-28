<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="__PUBLIC__/Css/style.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/vote.js"></script>
    <title>投票系统</title>
</head>

<body>
<div class="wrap">
    <div class="header"><h1>投票</h1><H2>选项详情</H2></div>

    <div class="discript">
        <ul>
            <h3><?php echo ($theme['name']); ?></h3>
            <li></li>
            <li></li>
            <li></li>


        <ul>
    </div>

    <div class="discript">
        <ul>
            <h4>选项图片</h4>
            <li></li>
            <li></li>
            <li><img src=""> </li>


            <ul>
    </div>

    <div class="discript">
        <ul>
            <h4>选项详情</h4>
            <li></li>
            <li></li>
            <li><?php echo ($theme['vcontent']); ?> </li>


            <ul>
    </div>

    <div class="discript">
        <ul>
            <h4>留言列表</h4>
            <li></li>
         <?php if(is_array($theme1)): $i = 0; $__LIST__ = $theme1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$liu): $mod = ($i % 2 );++$i; if($liu["xs"] == 0): ?><li>

                <?php if($liu["uname"] == null): ?>匿名
               <?php else: ?>
                    <?php echo ($liu["uname"]); endif; ?>
                <?php echo ($liu["time"]); ?></li>

            <li> <?php echo ($liu["content"]); ?></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

            <ul>
    </div>


  <form method="post" action="__URL__/liuyan">




      <input name="tid" value="<?php echo ($theme['tid']); ?>" type="hidden"/>
      <input name="name" value="<?php echo ($theme['name']); ?>" type="hidden"/>
      <input name="vid" value="<?php echo $_GET['id']; ?>" type="hidden"/>
    <div class="discript">
        <ul>
            <h4>留言</h4>
            <li></li>
            <li></li>
            <textarea  style="width:800px;height:200px;" id="user-intro" name="content"></textarea>
            <ul>
    </div>


      <input type="submit" class="btn" style="background-color:#0e90d2;" value="提交"  />
  </form>

			
<div class="footer">
    <ul>
        <h3>xxxxxx出品</h3>
        <p>Powered by <a href="#" >TANGYE</a></p>
    </ul>
</div>
</div>
</body>
</html>