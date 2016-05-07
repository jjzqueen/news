<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	/*
     * 后台首页
	 * */
    public function index(){
      session('[destroy]');
      $this->display('login');
    }

   /*
    * 登录验证
    * */
    public function login_pro(){
        $model = D('User');
        $res = $model->only();
        if($res){
            $this->success('登录成功', __CONTROLLER__.'/first');
        }else{
            $this->error('账户或密码错误');
        }

    }
   /*
    *后台首页 first
    * */
   public function first(){
    if(session('uname')) {
        $this->display('index');
    }else{
        redirect(__CONTROLLER__.'/index');
    }
   }











   public function  action(){
       $act = $_GET['act'];   //接受当前进行的操作

       $current_time = date('Y-m-d H:i:s',time());  //获取服务器当前时间

       $message = ''; //保存提示信息
       $url = ''; //保存要跳转的页面

       if ($act == 'admin_add') {

           //自动插入方法

           $keys = implode(",",array_keys($_POST));
           $values = implode("','",array_values($_POST));
           $query = "INSERT admin($keys,login_date) VALUES('{$values}','{$current_time}')";

           //发送SQL语句，判断是否插入成功

           mysql_query($query);

           if (mysql_affected_rows($link)) {
               $message = '数据插入成功';
               $url = 'admin_list.php';
           }else{
               $message = '数据插入失败';
               $url = 'admin_add.php';
           }

       }else if($act == 'admin_del'){

           mysql_query("DELETE FROM admin WHERE id = {$_GET['id']}");

           if (mysql_affected_rows($link)) {
               $message = '管理员删除成功';
               $url = 'admin_list.php';
           }else{
               $message = '管理员删除失败';
               $url = 'admin_list.php';
           }

       }else if($act == 'type_add'){

           //获取类型信息：类型名，该操作的管理员
           $type_name = $_POST['type_name'];
           $username = $_POST['username'];

           //因为我们要在类型表中添加管理员对应的id，而不是管理员名称
           //所以我们要通过管理们名称在admin表中查出对应的id
           $sql = "SELECT id FROM admin WHERE username = '{$username}'";
           $result = mysql_query($sql);
           $row = mysql_fetch_assoc($result);
           $admin_id = $row['id'];

           //写插入新类型和管理员id的SQL，并发送
           mysql_query("INSERT type VALUES(NULL,'{$type_name}','{$admin_id}',NULL)");

           if (mysql_affected_rows($link)) {
               $message = '类型添加成功';
               $url = 'type_list.php';
           }else{
               $message = '类型添加失败';
               $url = 'type_add.php';
           }

       }else if($act == 'type_del'){

           mysql_query("DELETE FROM type WHERE id = {$_GET['id']}");
           if (mysql_affected_rows($link)) {
               $message = '类型删除成功';
               $url = 'type_list.php';
           }else{
               $message = '类型删除失败';
               $url = 'type_list.php';
           }

       }else if($act == 'type_update'){

           $id = $_GET['id'];
           $type_name = $_POST['type_name'];
           $username = $_POST['username'];

           $sql = "SELECT id FROM admin WHERE username='{$username}'";
           $re = mysql_query($sql);
           $ro = mysql_fetch_assoc($re);
           $admin_id = $ro['id'];

           $query = "UPDATE type SET type_name='{$type_name}',admin_id='{$admin_id}' ,add_date='{$current_time}' WHERE id=".$id;

           mysql_query($query);

           if (mysql_affected_rows($link)) {
               $message = '类型修改成功';
               $url = 'type_list.php';
           }else{
               $message = '类型修改失败';
               $url = 'type_list.php';
           }

       }else if($act == 'news_add'){

           //利用接受到的用户名查询出admin表中对应的id
           $result = mysql_query("SELECT id FROM admin WHERE username='{$_POST["username"]}'");
           unset($_POST['username']);
           $row = mysql_fetch_assoc($result);
           $_POST['admin_id'] = $row['id'];

           //自动插入方法
           $keys = implode(",",array_keys($_POST));
           $values = implode("','",array_values($_POST));
           $sql = "INSERT news($keys,add_date) VALUES('{$values}','{$current_time}')";


           //发送SQL语句，判断是否插入成功
           mysql_query($sql);

           if (mysql_affected_rows($link)) {
               $message = '新闻发布成功';
               $url = 'news_list.php';
           }else{
               $message = '新闻发布失败';
               $url = 'news_add.php';
           }

       }else if($act == 'news_del'){
           mysql_query("DELETE FROM news WHERE id = {$_GET['id']}");
           if (mysql_affected_rows($link)) {
               $message = '新闻删除成功';
               $url = 'news_list.php';
           }else{
               $message = '新闻删除失败';
               $url = 'news_list.php';
           }

       }else if ($act == 'news_update') {

           //接受id和用户名，通过用户名查找出对应的admin表中对应的id
           $id = $_GET['id'];
           $username = $_POST['username'];

           $sql = "SELECT id FROM admin WHERE username='{$username}'";
           $re = mysql_query($sql);
           $ro = mysql_fetch_assoc($re);
           $admin_id = $ro['id'];

           //修改$_POST中的原始值

           unset($_POST['username']);
           $_POST['admin_id'] = $admin_id;
           $_POST['add_date'] = $current_time;

           //拼接更新SQL的字符串，
           //UPDATE news SET username='$username',password='$password',free='$free' WHERE id = 2;

           foreach ($_POST as $key => $value) {

               $str .= $key."='".$value."',";
           }

           $str = trim($str,","); //去掉尾部多余的逗号

           $query = "UPDATE news SET {$str} WHERE id=".$id;

           mysql_query($query);

           if (mysql_affected_rows($link)) {
               $message = '新闻更新成功';
               $url = 'news_list.php';
           }else{
               $message = '新闻更新失败';
               $url = 'news_list.php';
           }

       }else if($act == 'login'){

           //接受登陆数据,并且去掉前后的空格，防止用户在输入数据的过程中误敲空格
           $username = trim($_POST['username']);
           $password = trim($_POST['password']);
           $free = $_POST['free'];

           //判断用户名里是否包含  @  符号，如果包含则说明该用户是用邮箱等
           //如果用邮箱登陆，则接收到的用户名信息和邮箱mail匹配

           if (strpos($username, '@')) {
               $query = "SELECT username FROM admin WHERE mail='{$username}' AND password='{$password}'";
           }else{
               $query = "SELECT username FROM admin WHERE username='{$username}' AND password='{$password}'";
           }

           //发送SQL，判断用户名是否合法，合法则保存用户信息到cookie中

           $result = mysql_query($query);
           $row = mysql_fetch_assoc($result);

           //用户名和密码是否是合法
           if (!empty($row)) {

               //判断，表单中7天免登陆按钮是否选中
               if (!empty($free)) {
                   setcookie('username',$row['username'],time()+$free*24*3600);
               }else{
                   setcookie('username',$row['username']);
               }

               $message = '恭喜，用户登陆成功';
               $url = 'admin.php';

           }else{
               $message = '用户名和密码不合法';
               $url = 'login.php';
           }

       }else if($act == 'unset'){
           setcookie('username','',time()-1);
           $message = '安全退出';
           $url = 'login.php';
       }

       //进行信息提示和页面跳转
       echo "<script>alert('{$message}')</script>";
       echo "<meta http-equiv='refresh' content='1;{$url}'/>";

   }



}