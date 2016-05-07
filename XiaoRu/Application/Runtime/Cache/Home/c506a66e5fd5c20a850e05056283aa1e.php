<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『有主机上线』后台管理</title>
    <link rel="stylesheet" type="text/css" href="/XiaoRu/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/XiaoRu/Public/css/main.css"/>
    <script type="text/javascript" src="/XiaoRu/Public/js/libs/modernizr.min.js"></script>
</head>
<body style="">
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/XiaoRu/index.php/Home/Admin/index">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="javascript:void(0)">你好，&nbsp;<?php echo session('uname');?></a></li>
                <li><a href="/XiaoRu/index.php/Home/Admin/pwd_update">修改密码</a></li>
                <li><a href="/XiaoRu/index.php/Home/Admin/index">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>新闻管理</a>
                    <ul class="sub-menu">
                     <li><a href="/XiaoRu/index.php/Home/Admin/news_list"><i class="icon-font">&#xe001;</i>新闻列表</a></li>
                     <li><a href="/XiaoRu/index.php/Home/Admin/cate_list"><i class="icon-font">&#xe001;</i>新闻类别</a></li>
                     <li><a href="/XiaoRu/index.php/Home/Admin/counts"><i class="icon-font">&#xe001;</i>榜单统计</a></li>
                     <li><a href="/XiaoRu/index.php/Home/Admin/orders"><i class="icon-font">&#xe001;</i>订阅推送</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>用户权限管理</a>
                    <ul class="sub-menu">
                        <li><a href="/XiaoRu/index.php/Home/Admin/users_list"><i class="icon-font">&#xe062;</i>用户列表</a></li>
                        <li><a href="/XiaoRu/index.php/Home/Admin/role_list"><i class="icon-font">&#xe062;</i>角色列表</a></li>


                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
      <div class="welcome" style="font-size: 48px;color: blue;vertical-align: middle;font-style: italic">
       <p style="margin-left: 15%;padding-top:15%">欢迎使用</p><br><p style="margin-left:50%;">前情新闻管理系统</p>

      </div>
    </div>
    <!--/main-->
</div>
</body>
</html>