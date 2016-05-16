<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片上传控件</title>
<link rel="stylesheet" href="themes/default/default.css" />
<script src="kindeditor.js"></script>
<script src="lang/zh_CN.js"></script>
<script>
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowFileManager : true
		});
		K('#image').click(function() {
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						showRemote : false,
						imageUrl : K('#url').val(),
						clickFn : function(url, title, width, height, border, align) {
							K('#url').val(url);
							editor.hideDialog();
							}
						});
					});
				});
			});
</script>
</head>
<body>
<form  action="#" method="post" name="add_lmfrom">
&nbsp;&nbsp;<input type="text" id="url" name="article_pic" value="<?php echo $row['litpic']; ?>" /> <input type="button" id="image" value="选择图片" />（本地上传）
</form>
</body>
</html>