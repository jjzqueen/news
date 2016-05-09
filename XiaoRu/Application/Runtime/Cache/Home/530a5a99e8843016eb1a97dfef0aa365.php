<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『前情』后台管理</title>
    <link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/main.css"/>
    <script type="text/javascript" src="/news/XiaoRu/Public/js/libs/modernizr.min.js"></script>
</head>
<body style="">

<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/news/XiaoRu/index.php/Home/Admin/index">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="javascript:void(0)">你好，&nbsp;<?php echo session('admin_name');?>
                    <?php if(session('poster') == 0 ): ?>管理员
                        <?php else: ?>记者<?php endif; ?>
                </a></li>
                <li><a href="/news/XiaoRu/index.php/Home/Admin/login_out">退出</a></li>
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
                <?php if(session('poster') == 0 ): ?><li>
                        <a href="#"><i class="icon-font">&#xe003;</i>新闻管理</a>
                        <ul class="sub-menu">
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/news_list"><i class="icon-font">&#xe001;</i>新闻列表</a></li>
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/cate_list"><i class="icon-font">&#xe001;</i>新闻类别</a></li>
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/counts"><i class="icon-font">&#xe001;</i>榜单统计</a></li>
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/orders"><i class="icon-font">&#xe001;</i>订阅推送</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-font">&#xe018;</i>用户权限管理</a>
                        <ul class="sub-menu">
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/users_list"><i class="icon-font">&#xe062;</i>用户列表</a></li>
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/users_add"><i class="icon-font">&#xe062;</i>用户添加</a></li>


                        </ul>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="#"><i class="icon-font">&#xe003;</i>新闻管理</a>
                        <ul class="sub-menu">
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/news_list"><i class="icon-font">&#xe001;</i>新闻列表</a></li>
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/cate_list"><i class="icon-font">&#xe001;</i>新闻类别</a></li>
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/counts"><i class="icon-font">&#xe001;</i>榜单统计</a></li>
                            <li><a href="/news/XiaoRu/index.php/Home/Admin/orders"><i class="icon-font">&#xe001;</i>订阅推送</a></li>

                        </ul>
                    </li><?php endif; ?>
            </ul>
        </div>
    </div>

    <!--/sidebar-->
    <div class="main-wrap">
        <style>
            .welcome{
                color: #000000;
                width: 100%;
                margin: auto;
                padding-top: 5%;
            }
            table{
                font-size: 20px;
            }


        </style>
        <div class="welcome" style="font-size: 16px;color:black;vertical-align: middle;">
            <div style="width: 90%;margin: auto;margin-bottom: 10px">
                <a href="/news/XiaoRu/index.php/Home/Admin/first">返回首页</a>&nbsp;&nbsp;&nbsp;
                <a href="/news/XiaoRu/index.php/Home/Admin/cate_list">返回列表</a>
            </div>
            <div style="width: 90%;margin: auto;text-align: center">
                <form action="/news/XiaoRu/index.php/Home/Admin/users_add" method="post">
                    <table style="width: 100%">
                        <tr height="60px">
                            <td width="45%" align="right">用户名:</td>
                            <td align="left">&nbsp;&nbsp;<input type="text" required name="admin_name" style="width: 200px;height: 30px"></td>
                        </tr>
                        <tr height="60px">
                            <td width="45%" align="right">设置密码:</td>
                            <td align="left">&nbsp;&nbsp;<input type="password" required name="admin_pwd" style="width: 200px;height: 30px"></td>
                        </tr>
                        <tr height="60px">
                            <td width="45%" align="right">电话:</td>
                            <td align="left">&nbsp;&nbsp;<input type="text" required name="admin_phone" style="width: 200px;height: 30px"></td>
                        </tr>
                        <tr height="60px">
                            <td width="45%" align="right">用户名角色:</td>
                            <td align="left">&nbsp;&nbsp;
                                <select name="poster" required style="width: 200px;height: 35px;text-align: center">
                                    <option value="">--设置角色--</option>
                                    <option value="0">管理员</option>
                                    <option value="1">记者</option>
                                </select>
                            </td>
                        </tr>
                        <tr height="60px">
                            <td colspan="2">
                                <input type="submit" value="添 加" style="width: 100px;height: 35px;font-size: 18px">&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="reset" value="取 消" style="width: 100px;height: 35px;font-size: 18px">
                            </td>
                        </tr>
                    </table>

                </form>
            </div>

        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>