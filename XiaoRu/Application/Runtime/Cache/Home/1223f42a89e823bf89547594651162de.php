<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <script src="/XiaoRu/Public/js/jquery.js"></script>
<style>
    body{
      background-color:;
    }

</style>
<body>
<div>
    <input type="button" value="返回首页" class="fanhui">
</div>
<br>
<center>
<h1><?php echo ($arr["news_title"]); ?></h1>
<hr>
 <h6>
      作者：<?php echo ($arr["author"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间：<?php echo ($arr["addtime"]); ?>
 </h6>
</center>
 <div>
     <?php echo ($arr["news_content"]); ?>

 </div>
<br><br>
<center>
    <input type="button" value="赞一个" class="zan">
    <input type="button" value="返回首页" class="fanhui">
</center>
</body>
</html>
<script>
    $(document).on('click','.fanhui',function(){
        location.href="/XiaoRu/index.php/Home/Index/index"
    })

    $(document).on('click','.zan',function(){
        alert('谢谢支持')
    })
</script>