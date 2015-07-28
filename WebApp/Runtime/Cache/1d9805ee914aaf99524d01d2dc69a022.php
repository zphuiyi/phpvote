<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
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
                <div class="header"><h1>投票</h1><H2>活动列表</H2></div>

                <div class="main">

                    <?php if(is_array($theme)): $i = 0; $__LIST__ = $theme;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><!--/*==此处循环列表*/-->
                        <div class="partSummary" id="div-view-summary">
                            <table cellpadding="0" cellspacing="0" class="tab-content table-break">
                            <tr><td class="word-break" width=65%>
                                <a href="__URL__/show/tid/<?php echo ($th["tid"]); ?>" ><?php echo ($key+1); ?>.<?php echo ($th['title']); ?> </a></td>

                                <td ><?php echo ($th["startime"]); ?> -- <?php echo ($th["endtime"]); ?></td>
                                <td ><a href="__URL__/tpvote/tid/<?php echo ($th["tid"]); ?>">去投票</a></td>

                                <?php if($th["hzt"] == 0): ?><td><a href="__URL__/vote/tid/<?php echo ($th["tid"]); ?>">参加活动</a></td>
                                <?php else: ?>
                                <td></td><?php endif; ?>
                            </tr>	</table></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
        
<div class="footer">
    <ul>
        <h3>xxxxxx出品</h3>
        <p>Powered by <a href="#" >TANGYE</a></p>
    </ul>
</div>
</div>
</body>
</html>