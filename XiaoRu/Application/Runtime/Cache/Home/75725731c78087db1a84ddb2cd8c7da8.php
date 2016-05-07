<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>国内新闻</title>
<link rel="stylesheet" type="text/css" href="/XiaoRu/Public/css/index.css">
</head>

<body>
<div id="header">
<img src="/XiaoRu/Public/images/logo1.png" alt="logo"/>
<ul>
    <li><a href="/XiaoRu/index.php/Home/Index/register">会员注册</a>/</li>
    <li><a href="/XiaoRu/index.php/Home/Index/login">登陆</a></li>
</ul>
</div>

<div id="nav">
<ul>
	<li ><a href="/XiaoRu/index.php/Home/Index/index">首页</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/guonei"  >国内新闻</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/guoji">国际新闻</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/junshi">军事新闻</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/yule" class="active" >娱乐新闻</a></li>
</ul>
</div>

<div class="blank20"></div>

<div id="main1">
	<div class="title"><h3>图片新闻</h3><a href="#">更多&gt;&gt;</a></div>
    <ul>
    	<li><a href="#"><img src="/XiaoRu/Public/images/05.jpg"  height="178" /></a><p><a href="#">图片新闻</a></p></li>
        <li><a href="#"><img src="/XiaoRu/Public/images/01.jpg" /></a><p><a href="#">图片新闻</a></p></li>
        <li><a href="#"><img src="/XiaoRu/Public/images/02.jpg" /></a><p><a href="#">图片新闻</a></p></li>
        <li><a href="#"><img src="/XiaoRu/Public/images/04.jpg" /></a><p><a href="#">图片新闻</a></p></li>
        <li><a href="#"><img src="/XiaoRu/Public/images/03.jpg" /></a><p><a href="#">图片新闻</a></p></li>
    </ul>
</div>

<div class="blank20"></div>

<div class="news">
	<div class="title"><h3>国内新闻</h3><a href="#">更多&gt;&gt;</a></div>
            <ul class="width">
                <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><li><span><?php echo ($v["addtime"]); ?></span>  <a  href="/XiaoRu/index.php/Home/Index/detail?news_id=<?php echo ($v["news_id"]); ?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>

            </ul>
</div>

<div class="blank20"></div>

<div id="footer">
	<p>版权所有&copy;八维研修学院<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
</div>

</body>
</html>