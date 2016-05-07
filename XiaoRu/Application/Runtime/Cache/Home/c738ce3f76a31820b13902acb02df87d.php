<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『前情』后台管理</title>
    <link href="/XiaoRu/Public/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body style="background: #00FF00 url(/XiaoRu/Public/images/bg.jpg) no-repeat;">


<div class="admin_login_wrap" style="width: 30%">
    <h1 style="color: white;font-size: 38px;vertical-align: middle;margin-bottom: 50px" align="center">前情新闻后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/XiaoRu/index.php/Home/Admin/login_pro" method="post" >
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" placeholder="admin" id="user" size="40" class="admin_input_style" value="" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd" placeholder="******" id="pwd" size="40" class="admin_input_style" value="" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="登录" class="btn btn-primary" onclick="return check(this.form)"/>
                    </li>
                    <li>
                        <span id="warning"></span>
                    </li>
                </ul>
            </form>
        </div>
    </div>

</div>
</body>
</html>
<script src="/XiaoRu/Public/js/jquery.js"></script>
<script type="text/javascript">
    function check(form) {

        if(form.username.value=='') {
            alert("请输入用户帐号!");
            form.username.focus();
            return false;
        }
        if(form.pwd.value==''){
            alert("请输入登录密码!");
            form.pwd.focus();
            return false;
        }
        return true;

    }
</script>