<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>前台首页</title>
    <link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/index.css">
</head>

<body>
<div id="header">
    <img src="/news/XiaoRu/Public/images/logo1.png" alt="logo"/>
    <?php if(session('u_name') != '' ): ?><ul>
            <li><a href="">你好，<?php echo session('u_name');?></a></li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/orders">我的订阅</a></li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/login_out">退出</a></li>
        </ul>

        <?php else: ?>
        <ul>
            <li><a href="/news/XiaoRu/index.php/Home/Index/register">会员注册</a>/</li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/login">登陆</a></li>
        </ul><?php endif; ?>
</div>

<div id="nav">
    <ul>
        <li ><a href="/news/XiaoRu/index.php/Home/Index/index" >首页</a></li>
        <?php if(is_array($nav)): foreach($nav as $key=>$vo): ?><li><a href="/news/XiaoRu/index.php/Home/Index/news_cate?cate_id=<?php echo ($vo['cate_id']); ?>"><?php echo ($vo['cate_name']); ?></a></li><?php endforeach; endif; ?>

    </ul>
</div>

<div class="blank20"></div>

<div id="main1">



<div class="news">
    <div class="title"><h3><?php echo session('cate_name');?></h3><a href="/news/XiaoRu/index.php/Home/Index/more_news">更多&gt;&gt;</a></div>
    <ul style="width: 100%;">
        <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><li style="width: 88%;text-align: left"><span><?php echo ($v["add_date"]); ?></span>  <a  href="/news/XiaoRu/index.php/Home/Index/detail?news_id=<?php echo ($v["id"]); ?>" style="font-size: 16px;text-align: left;width: 60%"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>

    </ul>

</div>


<div id="footer">
    <p>版权所有&copy;CXR<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
</div>

</body>
</html>