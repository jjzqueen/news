<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『前情』后台管理</title>
    <link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/news/XiaoRu/Public/css/main.css"/>
    <script type="text/javascript" charset="utf-8" src="/news/XiaoRu/Public/uediter/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/news/XiaoRu/Public/uediter/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/news/XiaoRu/Public/uediter/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="/news/XiaoRu/Public/js/libs/modernizr.min.js"></script>
</head>

<body>
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
                font-size: 16px;
            }
        </style>
        <div class="welcome" style="font-size: 14px;color:black;vertical-align: middle;">
            <div style="width: 90%;margin: auto;margin-bottom: 10px">
                <a href="/news/XiaoRu/index.php/Home/Admin/first">返回首页</a>&nbsp;&nbsp;&nbsp;
                <a href="/news/XiaoRu/index.php/Home/Admin/news_list">返回列表</a>
            </div>
            <div style="width: 100%;margin: auto;text-align: center">
                <form action="/news/XiaoRu/index.php/Home/Admin/edit_pro?id=<?php echo ($data['id']); ?>,news" method="post">
                    <table style="width: 100%" >
                        <tr height="40px">
                            <td  width="90px" align="right">新闻标题:</td>
                            <td align="left">&nbsp;&nbsp;<input type="text" value="<?php echo ($data['title']); ?>" required name="title" style="width: 200px;height: 30px"></td>
                        </tr>
                        <tr>
                            <td align="right">新闻类别:</td>
                            <td align="left">&nbsp;
                              <select name="cate_id" required style="width: 205px;height: 35px">                    <option value="">--新闻类型--</option>
                                    <?php if(is_array($cates)): foreach($cates as $key=>$v): if($v['cate_id'] == $data['cate_id']): ?><option value="<?php echo ($v['cate_id']); ?>" selected><?php echo ($v['cate_name']); ?></option>
                                        <?php else: ?>

                  <option value="<?php echo ($v['cate_id']); ?>"><?php echo ($v['cate_name']); ?></option><?php endif; endforeach; endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">新闻内容:</td>
                            <td align="left">&nbsp;&nbsp;
            <div>
        <script id="editor"  type="text/plain" style="width:900px;height:300px;"></script></div>
                            </td>
                        </tr>
                        <tr height="60px">
                            <td colspan="2">
            <input type="submit" value="修 改" style="width: 90px;height: 30px;font-size: 16px">&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="reset" value="取 消" style="width: 90px;height: 30px;font-size: 16px">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
    ue.ready(function(){
    var cont = "<?php echo ($data['content']); ?>";
        ue.setContent(cont);
    })

</script>