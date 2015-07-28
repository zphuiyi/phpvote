<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="__PUBLIC__/css/style.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style1.css" />
    <script type="text/javascript" src="__PUBLIC__/js/vote.js"></script>
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
<form method="post" action="__URL__/addvote1">
    <div class="discript" style="padding-left: 20%;">
        <ul>
            <h4></h4>
            <li>名称 <br/><input type="text" style="width:200px;" name='name' maxlength="30" required=true /></li>
            <br/>
            <li>图片 <br/>

                <div id="wrapper">
                    <div id="container">
                        <div id="uploader">
                            <div class="queueList">
                                <div id="dndArea" class="placeholder">
                                    <div id="filePicker"></div>
                                    <p>或将照片拖到这里，单次最多可选8张</p>
                                </div>
                            </div>
                            <div class="statusBar" style="display:none;">
                                <div class="progress">
                                    <span class="text">0%</span>
                                    <span class="percentage"></span>
                                </div><div class="info"></div>
                                <div class="btns">
                                    <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </li>
            <br/>
            <li>简介 <br/><textarea class="" style="width:800px;height:200px;" id="user-intro" name="vcontent"></textarea></li>
            <ul>
    </div>
        <input type="hidden" name="zxt" value="2"  />
        <input type="hidden" name="tid"  value="<?php echo $_GET[tid]; ?>"  />
        <input type="submit" class="btn" style="background-color:#0e90d2;" value="提交"  />
    </form>

    <script type="text/javascript" src="__PUBLIC__/js/js1/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/js1/webuploader.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/js1/upload.js"></script>

    
<div class="footer">
    <ul>
        <h3>xxxxxx出品</h3>
        <p>Powered by <a href="#" >TANGYE</a></p>
    </ul>
</div>
</div>
</body>
</html>