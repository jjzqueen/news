<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>前台首页</title>
<link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/index.css">
<link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/public.css">
<style>
#header{ height:92px; background:none;}
#main  h2{ margin-left:0px; line-height:50px; font-size:20px;}
.article{margin-left:-50px;}
h2{margin-left:50px}

</style>
</head>

<body>
<div id="header">
<img src="/news/XiaoRu/Public/images/logo1.png" alt="logo"/>

</div>

<div id="nav">
<ul>
    <li ><a href="/news/XiaoRu/index.php/Home/Index/index" >首页</a></li>
    <?php if(is_array($nav)): foreach($nav as $key=>$vo): ?><li><a href="/news/XiaoRu/index.php/Home/Index/news_cate?cate_id=<?php echo ($vo['cate_id']); ?>"><?php echo ($vo['cate_name']); ?></a></li><?php endforeach; endif; ?>
</ul>
</div>
<div>
<div  id="main">
<h2 style="text-align: center">欢迎登录</h2>
<div class="article">

<form name="login"  action="/news/XiaoRu/index.php/Home/Index/login_pro" method="post" >

<table border="0"  cellspacing="20" cellpadding="0" style="margin: auto">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="username" required class="txt" placeholder="用户名"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="pwd" required class="txt"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="登 录"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>



</div>

    <div class="article" style="margin-top: 10px;text-align: center;font-size: 18px;color: black;font-weight: bold">
        <p>/(ㄒoㄒ)/~~ 还没有账号？那就去 <a href="/news/XiaoRu/index.php/Home/Index/register">注册</a> 吧</p>
    </div>

</div>


<div class="blank20"></div>

<div id="footer">
	<p>版权所有&copy;八维研修学院<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
</div>

</body>
</html>