<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>前台首页</title>
    <link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/index.css">

    <script src="/news/XiaoRu/Public/js/jquery.js"></script>
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

    <?php if(session('u_name') != '' ): ?><ul class="login_user">
            <li><a href="">你好，<?php echo session('u_name');?></a></li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/orders">我的订阅</a></li>
            <li><a href="/news/XiaoRu/index.php/Home/Index/login_out">退出</a></li>
        </ul>

        <?php else: ?>
        <ul class="login_user">
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
    <div   style="margin:auto;text-align: center;padding-top: 50px">
        <h1 style="color: black;font-size: 16px;margin-bottom: 5px"><?php echo ($arr["title"]); ?></h1>
        <h6 style="font-weight: normal;color: black;margin-bottom: 10px">
            <?php echo ($arr["add_date"]); ?> &nbsp;&nbsp;&nbsp;  作者：<?php echo ($arr["admin_name"]); ?> &nbsp;&nbsp;&nbsp;<?php echo ($arr["cate_name"]); ?>
        </h6>
        <hr >
        <div style="margin: auto;text-align: center;">
            <p style="font-size: 16px;color:black;line-height: 25px"> &nbsp;&nbsp;&nbsp;<?php echo ($arr["content"]); ?></p>
        </div>
    </div>
    <div class="blank20"></div>
    <div class="blank20"></div>

    <p style="color:#000000;font-size: 16px">评 论:</p>
    <hr>
    <div class="comment-info" style="padding-left: 0px;">
        <?php if(is_array($com)): foreach($com as $key=>$v): if($v['p_id'] == 0): ?><b><a href="#" target="_blank" style="color: #000000">
        <?php echo ($v['u_name']); ?>:
        </a> </b>
        <div class="comment-content" style="color:#087eac">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v['c_content']); ?></div>
        <div style="margin:auto;padding-left: 10px;margin-bottom: 20px">
        <span class="comment-time" style="float: left;padding-left: 0px;color:#087eac"><?php echo date('Y年m月d日 H:i:s',$v['c_time']);?></span>
      <a href="javascript:void(0)" style="float: right;margin-right: 50px" class="button_replay" amtr="<?php echo ($v['c_id']); ?>" >回复</a></div>
      <br>
    <div id="replay-<?php echo ($v['c_id']); ?>" class="replay_div" style="display: none">
        <form action="/news/XiaoRu/index.php/Home/Index/repaly?news_id=<?php echo ($news_id); ?>" method="post">
            <textarea  name="c_content" id="textarea1" pattern="/[^\u4e00-\u9fa5]/"  cols="50" rows="5" required></textarea><br><br>
        <input type="hidden" name="p_id" id="p_id" value="<?php echo ($v["c_id"]); ?>" size="22" tabindex="1"/>
        <input type="submit" value="发表回复" />
        <input type="reset"   value="取消回复" />
        </form>
        </div><?php endif; ?>
        <br>
          <?php if($replays == ''): else: ?>
          <div style="padding-left: 30px;margin-bottom: 20px">
             <?php if(is_array($replays)): foreach($replays as $key=>$vo): if($vo['p_id'] == $v['c_id']): ?><b><a href="#" target="_blank" style="color: #000000">
                      <?php echo ($vo['u_name']); ?>&nbsp;回复&nbsp;<?php echo ($v['u_name']); ?>:
                 </a> </b>
                 <div class="comment-content" style="color:#087eac">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo['c_content']); ?></div>
                 <div style="margin:auto;padding-left: 10px;margin-bottom: 20px">
                     <span class="comment-time" style="float: left;padding-left: 0px;color:#087eac"><?php echo date('Y年m月d日 H:i:s',$vo['c_time']);?></span>
                     <a href="javascript:void(0)" style="float: right;margin-right: 50px" class="button_replay" amtr="<?php echo ($vo['c_id']); ?>" >回复</a></div>
                 <br>
                 <div id="replay-<?php echo ($vo['c_id']); ?>" class="replay_div" style="display: none">
                     <form action="/news/XiaoRu/index.php/Home/Index/repaly?news_id=<?php echo ($news_id); ?>" method="post">
                         <textarea  name="c_content" id="textarea11" pattern="/[^\u4e00-\u9fa5]/"  cols="50" rows="5" required></textarea><br><br>
                         <input type="hidden" name="p_id"  value="<?php echo ($vo["c_id"]); ?>" size="22" tabindex="1"/>
                         <input type="submit" value="发表回复" />
                         <input type="reset"   value="取消回复" />
                     </form>
                 </div><?php endif; endforeach; endif; ?>
          </div><?php endif; endforeach; endif; ?>

    </div>
    <script>
        $(function(){
           $(".button_replay").click(function(){
               var a = $(this).attr('amtr');
               $(".replay_div").css('display','none');
               $("#replay-"+a).css('display','block');
               $(".button_replay").css('display','block');
               $(this).hide();
               $(".words").css('display','none');
           });
           $(":reset").click(function(){
               //window.location.reload();
               $(".replay_div").css('display','none');
               $(".button_replay").css('display','block');
               $(".words").css('display','block');
           })
        })
    </script>
    <div  class="words" style="margin:auto;padding-left: 0px;">
        <br>
        <form action="/news/XiaoRu/index.php/Home/Index/comment_add?news_id=<?php echo ($news_id); ?>" method="post">
            <div id="tra" style="color: black" >
            <textarea  name="c_content" id="textarea" pattern="/[^\u4e00-\u9fa5]/"  cols="50" rows="5" required></textarea>评论内容(必填)<br /><br />

            <input type="submit" value="发表评论" />
            </div>
            </form>
    </div>
    <div class="blank20"></div>
    <div id="footer">
        <p>版权所有&copy;八维研修学院<br />联系方式：010-82157081&nbsp;&nbsp;010-82157081&nbsp;&nbsp;010-82157081</p>
    </div>
</div>
</body>
</html>