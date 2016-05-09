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
            .welcome table{
                width: 90%;
                margin: 0px auto;
                text-align: center;
            }
            .welcome tr{
                height: 60px;
            }
            th{
                background-color: #1f6377;
            }

        </style>
        <div class="welcome" style="font-size: 16px;color:black;vertical-align: middle;">
        <div style="width: 90%;margin: auto;margin-bottom: 10px">
            <a href="/news/XiaoRu/index.php/Home/Admin/first">返回首页</a>&nbsp;&nbsp;&nbsp;
            <a href="/news/XiaoRu/index.php/Home/Admin/cates_add">类别添加</a>
            &nbsp;&nbsp;&nbsp;&nbsp;关键字：<input type="text" placeholder="关键字" style="height: 28px"> &nbsp;<input type="button" value="查询" style="background-color: #00CC00;font-size: 16px;color: white;width: 100px;height: 35px">
           <!-- <input type="search">-->
        </div>
            <table border="1">
                <tr bgcolor="#a9a9a9" style="color: white">
                    <td>编号</td>
                    <td>种类名称</td>
                    <td>操作</td>
                </tr>
                <?php if(is_array($cate_list)): foreach($cate_list as $k=>$v): ?><tr style="color:#000;" height="60px">
                        <td><?php echo ($k+1); ?></td>
                        <td><?php echo ($v['cate_name']); ?></td>
                         <td width="300px">
                             <a href="">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
                             <a href="">删除</a>
                         </td>

                    </tr><?php endforeach; endif; ?>
            </table>
            <style>
                #pages a:hover{
                    background-color:#62c462;
                }
            </style>
            <div id="pages" style="margin: 5px auto;text-align: center;color:red">
                <?php echo $page;?>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>