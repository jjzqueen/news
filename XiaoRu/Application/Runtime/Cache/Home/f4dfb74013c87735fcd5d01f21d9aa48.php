<?php if (!defined('THINK_PATH')) exit();?>﻿<?php
header('content-type:text/html;charset=utf-8'); include 'db.php'; $query = 'SELECT id,type_name FROM type'; $result = mysql_query($query); if ($_GET['id']) { $sql = "SELECT news.id,title,type_name,content,admin.username,news.add_date FROM news "; $sql.= " LEFT JOIN type ON news.type_id = type.id"; $sql.= " LEFT JOIN admin ON news.admin_id = admin.id"; $sql.= " WHERE news.id=".$_GET['id']; $re = mysql_query($sql); $row_id = mysql_fetch_assoc($re); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="css/public.css">
</head>

<body>
<meta charset='utf8'/>
<div  id="main">
<h2>添加新闻</h2>

<form name="login"  action="action.php?id=<?php echo $_GET['id']?>&act=<?php echo $url = $_GET['id'] ? 'news_update' : 'news_add' ?>" method="post">

<table border="0"    cellspacing="10" cellpadding="0">
  <tr>
    <td>新闻标题：</td>
    <td><input   type="text" name="title" class="txt" value="<?php  echo $title = $row_id['title'] ? $row_id['title'] : '' ?>" /></td>
  </tr>
  <tr>
    <td>新闻分类：</td>
    <td><select class="s1" name='type_id'>
<?php
if ($result) { while ($row = mysql_fetch_assoc($result)) { if ($row_id && ($row_id['type_name'] == $row["type_name"])) { echo "<option value='<?php echo ($row["id"]); ?>' selected='selected'><?php echo ($row["type_name"]); ?></option>"; }else{ echo "<option value='<?php echo ($row["id"]); ?>'><?php echo ($row["type_name"]); ?></option>"; } } } ?>
	</select>
	</td>
  </tr>
  <tr>
    <td>新闻内容：</td>
    <td><textarea  name="content" class="textarea"><?php  echo $content = $row_id['content'] ? $row_id['content'] : '';?></textarea></td>
  </tr>
    <tr>
    <td>添加人：</td>
    <td><input   type="text"  name="username"  class="txt" value="<?php  echo $username = $row_id['username'] ? $row_id['username'] : '' ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input  type="submit" value="添 加"  class="sub"/><input  type="reset" value="重 置"  class="res"/></td>
  </tr>
</table>

</form>
</div>
</body>
</html>