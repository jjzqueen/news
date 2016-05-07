<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
     public function register(){
       return  $this->add($_POST);
     }
    /*
          * 验证登录
          * @author 周晶晶
          * */
    public function only(){
        $uname = I('post.username');
        $pwd = I('post.pwd');
        $arr = $this->Table('user')->where("u_name='$uname'")->find();
        if($arr){
            if($pwd == $arr['u_pwd']){
                session('uname',$uname);
                return "1";
            }else{
                return "0";
            }
        }else{
            return "0";
        }
    }


}