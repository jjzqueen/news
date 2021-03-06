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
                height: 40px;
            }
            th{
                background-color: #1f6377;
            }
        </style>
        <div class="welcome" style="font-size: 16px;color:black;vertical-align: middle;">
            <div style="width: 90%;margin: auto;margin-bottom: 10px">
                <a href="/news/XiaoRu/index.php/Home/Admin/first">返回首页</a>&nbsp;&nbsp;&nbsp;

                &nbsp;&nbsp;&nbsp;&nbsp;关键字：<input type="text" id="keys" placeholder="关键字" style="height: 28px"> &nbsp;<input type="button" class="search" value="查询" style="background-color: #00CC00;font-size: 16px;color: white;width: 100px;height: 35px">
                <script src="/news/XiaoRu/Public/js/jquery.js"></script>
                <script>
                    $(".search").click(function() {
                        alert(123)

                    })

                </script>

            </div>
            <table border="1">
                <tr bgcolor="#a9a9a9" style="color: white">
                    <td>编号</td>
                    <td>新闻标题</td>
                    <td>新闻内容</td>
                    <td>发布时间</td>
                    <td width="80px">作者</td>
                    <td width="100px">新闻类别</td>
                    <td>收藏数目</td>
                </tr>
                <?php if(is_array($counts)): foreach($counts as $k=>$v): ?><tr style="color:#000;" height="60px">
                        <td><?php echo ($k+1); ?></td>
                        <td align="left">
                            <a href="/news/XiaoRu/index.php/Home/Admin/news_details?news_id=<?php echo ($v['id']); ?>">
                                <?php
 if(strlen($v['title']<=21)){ echo $v['title']; }else{ echo substr_replace($v['title'],'...',21); }?>
                            </a>
                        </td>
                        <td>
                            <?php echo substr_replace($v['content'],'...',99)?>
                        </td>
                        <td><?php echo ($v['add_date']); ?></td>
                        <td><?php echo ($v['admin_name']); ?></td>
                        <td><?php echo ($v['cate_name']); ?></td>


                        <td width="150px">
                            <?php echo ($v['collect_num']); ?>

                        </td>

                    </tr><?php endforeach; endif; ?>
            </table>

        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>