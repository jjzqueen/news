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
        <ul>
            <li><a href="">你好，<?php echo session('u_name');?></a></li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/orders">我的订阅</a></li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/login_out">退出</a></li>
        </ul>

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
    <div class="title"><h3>我的订阅</h3></div>

        <ul style="width: 100%">
            <?php if(is_array($nav)): foreach($nav as $key=>$v): ?><li style="width: 88%;text-align: left"><span>
                <?php if(in_array($v['cate_id'], $arr) || $v['cate_id']==$arr){ echo "<a href='/news/XiaoRu/index.php/Home/Index/orders_reset?cate_id=".$v['cate_id']."'>取消订阅</a>"; }else{ echo "<a href='/news/XiaoRu/index.php/Home/Index/orders_add?cate_id=".$v['cate_id']."'>订阅</a>"; }?></span>
                 <a  href="/news/XiaoRu/index.php/Home/Index/news_cate?cate_id=<?php echo ($v['cate_id']); ?>" style="font-size: 16px;text-align: left;width: 60%"><?php echo ($v["cate_name"]); ?></a>

                 </li><?php endforeach; endif; ?>
        </ul>

</div>

<div class="blank20"></div>

<div id="footer">
    <p>版权所有&copy;CXR<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
</div>

</body>
</html>