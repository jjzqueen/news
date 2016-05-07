<?php if (!defined('THINK_PATH')) exit();?>﻿<?php
header('content-type:text/html;charset=utf-8'); include 'db.php'; $username = $_COOKIE["username"]; $query = "SELECT * FROM admin WHERE username='<?php echo ($username); ?>'"; $result = mysql_query($query); $row = mysql_fetch_assoc($result); if($row['sex'] == '男'){ $sex = '先生'; }else{ $sex = '女士'; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顶部</title>
<link rel="stylesheet" type="text/css" href="css/public.css">
</head>
<body>
<div id="header">
<img src="images/logo1.png" />
<h3 style="color:purple;">欢迎 <?php echo $username.'-'.$sex ?> 登陆</h3>
<a href="action.php?act=unset" target="_top" style="color:purple;">退出</a>
</div>
</body>
</html>