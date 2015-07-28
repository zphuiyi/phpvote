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
    <div class="header"><h1>投票</h1><H2>活动详情</H2></div>

    <div class="discript">
        <ul>
            <h3><?php echo ($theme['title']); ?></h3>
            <li></li>
            <li></li>
            <li>活动时间 : <strong><?php echo ($theme['startime']); ?> -- <?php echo ($theme['endtime']); ?></strong></li>


        <ul>
    </div>

    <div class="discript">
        <ul>
            <h4>活动概要</h4>
            <li></li>
            <li></li>
            <li><?php echo ($theme['votegy']); ?> </li>


            <ul>
    </div>
    <div class="discript">
        <ul>
            <h4>活动海报</h4>
            <li></li>
            <li></li>
            <li><img src="__PUBLIC__/<?php echo ($theme['img']); ?>"></li>


            <ul>
    </div>
    <div class="discript">
        <ul>
            <h4>活动详情</h4>
            <li></li>
            <li></li>
            <li><?php echo ($theme['content']); ?> </li>


            <ul>
    </div>

    <?php if($theme['hzt'] == 0): $t=date('Y-m-d H:i:s',time());?>

    <?php if($theme['startime1'] > $t): ?><button type="button"   class="btn1" >未开始</button>

        <?php elseif($theme['endtime1'] < $t): ?>

        <button type="button"   class="btn1" >结束</button>

<?php else: ?>

    <button type="button" onclick="vcod()"  class="btn" >参与</button><?php endif; endif; ?>
    <br /><br />



<button type="button" onclick="cod()"  class="btn" >去投票</button>

    <script>

        function cod(){
            window.location.href="__URL__/tpvote/tid/<?php echo $_GET[tid] ?>";
        }

        function vcod(){
            window.location.href="__URL__/vote/tid/<?php echo $_GET[tid] ?>";
        }

    </script>


			
<div class="footer">
    <ul>
        <h3>xxxxxx出品</h3>
        <p>Powered by <a href="#" >TANGYE</a></p>
    </ul>
</div>
</div>
</body>
</html>