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

a{color:#087eac;}
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
<h2 align="center">欢迎注册新用户</h2>
<div class="article">

<form name="login"  action="/XiaoRu/index.php/Home/Index/register_pro" method="post">

<table border="0"    cellspacing="20" cellpadding="0" align="center">
  <tr>
    <td>用户名：</td>
    <td><input   type="text" name="name" class="txt" width="2"/></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input  type="password" name="pwd"  class="txt"/></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td>
    <input   type="radio"  name="sex"  value="男" checked="checked"/>男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input   type="radio"  name="sex" value="女" />女</td>
  </tr>

      <tr>
    <td>城市：</td>
    <td>
    <select name="city"  class="s1">
    	<option value="1">北京</option>
        <option value="2">上海</option>
        <option value="3">南京</option>
    </select>
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="添 加"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>

</div>
</div>


<div class="blank20"></div>

<div id="footer">
	<p>版权所有&copy;CXR<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
</div>

</body>
</html>