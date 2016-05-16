<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>前台首页</title>
    <link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/index.css">
    <style>
        #header{ height:92px; background:none;}
        #main  h2{ margin-left:0px; line-height:50px; font-size:20px;}
        h2{margin-left:50px}
        p{color: black}
    </style>
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
            <li><a href="/news/XiaoRu/index.php/Home/Index/register">注册</a>/</li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/login">登陆</a></li>
        </ul><?php endif; ?>
</div>

<div id="nav">
    <ul>
        <li ><a href="/news/XiaoRu/index.php/Home/Index/index" >首页</a></li>
        <?php if(is_array($nav)): foreach($nav as $key=>$vo): ?><li><a href="/news/XiaoRu/index.php/Home/Index/news_cate?cate_id=<?php echo ($vo['cate_id']); ?>"><?php echo ($vo['cate_name']); ?></a></li><?php endforeach; endif; ?>
    </ul>
</div>
<div>
    <div  id="main" style="margin:auto;text-align: center;padding-top: 50px">
            <h1 style="color: black;font-size: 16px;margin-bottom: 5px"><?php echo ($arr["title"]); ?></h1>
            <h6 style="font-weight: normal;color: black;margin-bottom: 10px">
                <?php echo ($arr["add_date"]); ?> &nbsp;&nbsp;&nbsp;  作者：<?php echo ($arr["admin_name"]); ?> &nbsp;&nbsp;&nbsp;<?php echo ($arr["cate_name"]); ?>
            </h6>
            <hr >

        <div style="margin: auto;text-align: center;">
            <p style="font-size: 16px;color: black;line-height: 25px"> &nbsp;&nbsp;&nbsp;<?php echo ($arr["content"]); ?></p>

        </div>
        <br><br>
            <input type="button" value="赞一个" class="zan" style="width: 100px;height: 30px;font-size: 14px">&nbsp;&nbsp;&nbsp;
        <a href="/news/XiaoRu/index.php/Home/Index/comment?news_id=<?php echo ($arr['id']); ?>"> <input type="button" value="评论" id="comment" style="width: 100px;height: 30px;font-size: 14px"></a>
        &nbsp;&nbsp;&nbsp;
        <a href="/news/XiaoRu/index.php/Home/Index/collect?news_id=<?php echo ($arr['id']); ?>"> <input type="button" value="收藏" id="collect" style="width: 100px;height: 30px;font-size: 14px"></a>
    </div>

    <div class="blank20"></div>


    <div id="footer">
        <p>版权所有&copy;八维研修学院<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
    </div>
</div>
</body>
</html>
<script src="/news/XiaoRu/Public/js/jquery.js"></script>
<script>

    $(document).on('click','.zan',function(){
        alert('+1    谢谢支持')
    })
</script>