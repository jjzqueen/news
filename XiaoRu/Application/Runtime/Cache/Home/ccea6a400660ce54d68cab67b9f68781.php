<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>前台首页</title>
<link rel="stylesheet" type="text/css" href="/XiaoRu/Public/css/index.css">
<link rel="stylesheet" type="text/css" href="/XiaoRu/Public/css/public.css">
<style>
#header{ height:92px; background:none;}
#main  h2{ margin-left:0px; line-height:50px; font-size:20px;}
.article{margin-left:-50px;}
h2{margin-left:50px}

</style>
</head>

<body>
<div id="header">
<img src="/XiaoRu/Public/images/logo1.png" alt="logo"/>
<ul>
    <li><a href="/XiaoRu/index.php/Home/Index/register" style="color:#087eac;">会员注册</a>/</li>
    <li><a href="/XiaoRu/index.php/Home/Index/login" style="color:#087eac;">登陆</a></li>

</ul>
</div>

<div id="nav">
<ul>
    <li ><a href="/XiaoRu/index.php/Home/Index/index"  class="active">首页</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/guonei">国内新闻</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/guonei">国际新闻</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/guonei">军事新闻</a></li>
    <li><a href="/XiaoRu/index.php/Home/Index/guonei">娱乐新闻</a></li>
</ul>
</div>
<div>
<div  id="main">
<h2 align="center">欢迎登录</h2>
<div class="article">

<form name="login"  action="/XiaoRu/index.php/Home/Index/index" method="post">

<table border="0"    cellspacing="20" cellpadding="0" align="center">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="username" class="txt" width="2"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="psd"  class="txt"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="登 录"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>

</div>
</div>


<div class="blank20"></div>

<div id="footer">
	<p>版权所有&copy;八维研修学院<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
</div>

</body>
</html>