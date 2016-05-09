<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
     public function register(){
       return  $this->add($_POST);
     }



}