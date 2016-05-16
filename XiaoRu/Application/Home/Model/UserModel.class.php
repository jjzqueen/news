<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
    /*
     * 验证登录
     * @author 周晶晶
     * */
    public function only(){
        $uname = I('post.username');
        $pwd = md5(md5(I('post.pwd')));
        $arr = $this->Table('user')->where("u_name='$uname'")->find();
        if($arr){
            if($pwd == $arr['u_pwd']){
                session_start();
                $_SESSION["u_name"] = $uname;
                $_SESSION["u_id"] = $arr['u_id'];

                return "1";
            }else{
                return "0";
            }
        }else{
            return "0";
        }
    }

    /*
     * 前台注册
     * */
     public function register(){
       $arr['u_name'] = $_POST['u_name'];
       $arr['u_pwd'] = md5(md5($_POST['u_pwd']));
       $arr['u_phone']=$_POST['u_phone'];
       $arr['u_email']=$_POST['u_email'];
       $arr['u_sex']=$_POST['u_sex'];
       $info = $this->add($arr);
       if($info){
         session('u_name',$_POST['u_name']);
         $aa = $this->where("u_name = session(u_name)")->find();
         session("u_id",$aa['u_id']);
       }
       return $info;

     }



}

?>