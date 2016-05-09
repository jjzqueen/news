<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
    /**
     * 判断登陆信息
     *@author 周晶晶
     */
    public function islogin()
    {
        if (!$_SESSION['admin_name']) {
            $this->error('请登录',__CONTROLLER__.'/index',3);
        }
    }
	/*
     * 后台登录
	 * */
    public function index(){
      session('[destroy]');
      $this->display('login');
    }
    /**
     * 退出登录
     * */
     public function login_out(){
         session('[destroy]');
         $this->success('退出成功', __CONTROLLER__.'/index');
     }
   /*
    * 登录验证
    * */
    public function login_pro(){
        $model = D('Admin');
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
    if($_SESSION['admin_name']) {
        $this->display('index');
    }else{
        $this->error('请登录',__CONTROLLER__.'/index',3);
    }
   }

     /**
      * 新闻列表 news_list
      * @return array
      * */
      public function news_list(){
          $this->islogin();
          $model = D("Admin");
          $arr = $model->news_list();
          $page = $arr[0];
          $data = $arr[1];
          $this->assign('page',$page);
          $this->assign('news_list',$data);
          $this->display('news_list');
      }
      /**
 * 新闻详情 news_details
 *@author zjj
 *  */
    public function news_details(){
        $this->islogin();
        $model = D("Admin");
        $arr = $model->news_details();
        $this->assign('detail',$arr);
        $this->display('detail');
    }

      /**
       * 新闻类别 cate_list
       * @return array
       * */
       public function cate_list(){
           $this->islogin();//判断是否登陆
           $model = D("Admin");
           $arr = $model->cate_list();
           $page = $arr[0];
           $data = $arr[1];
           $this->assign('page',$page);
           $this->assign('cate_list',$data);
           $this->display('cate_list');
       }
       /*
        * 类别添加
        * */
        public function cates_add(){
            $this->islogin();//判断是否登陆
            $model = D("Admin");
            if($_POST){
             $info = $model->cate_add();
             if($info){
               $this->success('添加成功',__CONTROLLER__.'/cate_list');
             }else{
               $this->error("添加失败");
             }
            }else{
            $this->display('cate_add');
            }


        }


       /**
        * 榜单统计 counts
        * @return array
        * */
       public function counts(){
           $model = D("Admin");
           $this->islogin();//判断是否登陆
           $this->display('counts');
       }
       /**
        * 订阅推送 orders
        * @return array
        * */
       public function orders(){
           $model = D("Admin");
           $this->islogin();//判断是否登陆

       }
       /*
        * 权限-用户列表 users_list
        * @retyrn array
        * */
      public function users_list(){
          $this->islogin();//判断是否登陆
          $model = D("Admin");
          $arr = $model->users_list();
          $page = $arr[0];
          $data = $arr[1];
          $this->assign('page',$page);
          $this->assign('user_list',$data);
          $this->display('user_list');


      }
     /*
      * 权限-用户添加 users_add
      * */
      public function users_add(){
          $this->islogin();//判断是否登陆
          $model = D("Admin");
          if($_POST){
              $info = $model->users_add();
              if($info){
                  $this->success('添加成功',__CONTROLLER__.'/users_list');
              }else{
                  $this->error("添加失败");
              }
          }else{
              $this->display('users_add');
          }
      }

}