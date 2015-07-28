<?php if (!defined('THINK_PATH')) exit();?>
 <!doctype html>
            <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" media="all" href="__PUBLIC__/css/style.css" />
                <script type="text/javascript" src="__PUBLIC__/js/vote.js"></script>
                <title>投票系统</title>
            </head>

            <body>
            <div class="wrap">
                <div class="header"><h1>投票</h1><H2></H2></div>

                <div class="discript">
                    <ul>
                        <h3>投票规则</h3>
                        <h3 style="color:red"></h3>
                        <li></li>
                        <li></li>
                        <li>如果首次投票但提示已经投票，请更换IP或者等待1小时后再试；</li>
                        <li>所有的投票行为都被记录，同一自然人在短期通过非正常手段进行的连续投票的行为将会被侦测并被标记为无效投票；</li>
                        <ul>
                </div>
                <div class="main">
                    <form action="__URL__/tpv" method="post" >
                        <?php if(is_array($theme)): $i = 0; $__LIST__ = $theme;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i; if($no["ztx"] == 0): ?><li><label class="css-label">
                                <input type="checkbox" name="id" class="css-checkbox" value="<?php echo ($no["id"]); ?>"/>

                                <a href="__URL__/showv/id/<?php echo ($no["id"]); ?>"><?php echo ($no["name"]); ?></a>

                                <span>已得票数：<?php echo ($no["num"]); ?></span></label>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <input type="hidden" name="tid" value="<?php echo $_GET[tid] ?>" />


            <?php $t=date('Y-m-d H:i:s',time());?>

                <?php if($theme1["startime"] > $t): ?><input type="submit" class="btn1" value="未开始"  disabled />

                <?php elseif($theme1["endtime"] < $t): ?>

                    <input type="submit" class="btn1" value="已结束"  disabled />

                <?php else: ?>

                    <input type="submit" class="btn" style="background-color:#0e90d2;" value="提交"  /><?php endif; ?>







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