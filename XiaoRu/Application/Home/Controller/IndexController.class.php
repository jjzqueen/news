<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   /*
    * 前台首页
    * @author 周晶晶
    * */
    public function index(){

        $model_new = D("News");
        $model_admin = D("Admin");
        $model_index = D("Index");
        $arr = $model_new->sel();
        $new = $model_new->news();
        $nav = $model_admin->cate_list();
        $nav = $nav[1];
        $images = $model_index->images();
        $this->assign('imgs',$images);
        $this->assign('arr',$arr);
        $this->assign('news',$new);
        $this->assign('nav',$nav);
        //显示页面
        $this->display('index');

    }

      /*
       * 登录页面
       * @author 周晶晶
       * */
    public function login(){
        $model_admin = D("Admin");
        $nav = $model_admin->cate_list();
        $nav = $nav[1];
        $this->assign('nav',$nav);
        $this->display();
    }


    /*
     * 验证登录
     * @author 周晶晶
     * */
     public  function  login_pro(){
         $model = D("User");
         $info = $model->only();
         if($info){
             $this->success('登录成功',__CONTROLLER__.'/index');
         }else{
             $this->error('登录失败');
         }

     }
    /**
     * 退出登录
     * */
    public function login_out(){
        session('[destroy]');
        $this->success('退出成功', __CONTROLLER__.'/login');
    }

   /*
    * register注册
    * @author 周晶晶
    * */
   public  function  register(){
       if($_POST){
         $model = D("User");
         $info = $model->register();
         if($info){
           $this->success('注册成功',__CONTROLLER__.'/index');
         }else{
           $this->error('注册失败');
         }

       }else{
           $model_admin = D("Admin");
           $nav = $model_admin->cate_list();
           $nav = $nav[1];
           $this->assign('nav',$nav);
           $this->display();
       }


   }

    /*
     * 新闻详情页
     * @author 周晶晶
     * */
    public  function  detail(){
        $model_admin = D("Admin");
        $nav = $model_admin->cate_list();
        $nav = $nav[1];
        $this->assign('nav',$nav);
        $model = D("News");
        $arr = $model->detail();
        $this->assign('arr',$arr);
        $this->display('detail');
    }
   /*
    * 更多 more_news
    * @author  周晶晶
    * */
    public function more_news(){
        $model = D("News");
        $model_admin = D("Admin");
        $nav = $model_admin->cate_list();
        $nav = $nav[1];
        $arr = $model->more_news();
        $page = $arr[0];
        $data = $arr[1];
        $this->assign('page',$page);
        $this->assign('news_more',$data);
        $this->assign('nav',$nav);
        $this->display('mores');
    }

    /*
     * 分类新闻 news_cate
     * @author 周晶晶
     * */
    public function news_cate(){
        $model =D("News");
        $model_admin = D("Admin");
        $nav = $model_admin->cate_list();
        $nav = $nav[1];
        $arr = $model->news_cate();
        $this->assign('nav',$nav);
        $this->assign('arr',$arr);
        $this->display("news_cate");

    }

   /*
    * 订阅 orders
    * @author 周晶晶
    * */
    public function orders(){
        if(session('u_name')){
            $model_news = D("News");
            $model_admin = D("Admin");
            $nav = $model_admin->cate_list();
            $nav = $nav[1];
            $arr = $model_news->orders();

            $this->assign('nav',$nav);
            $this->assign('arr',$arr);
            $this->display('orders');
        }else{
           redirect(__CONTROLLER__.'/index');
        }
    }
    /*
    * 添加订阅 orders_add
    * @author 周晶晶
    * */
    public function orders_add(){
        $model_news = D("News");
        $info = $model_news->orders_add();
        if($info){
          $this->success("订阅成功",__CONTROLLER__."/orders");
        }else{
         $this->error("订阅失败");
        }
    }
    /*
     * 取消订阅 orders_reset
     * */
    public function orders_reset(){
        $model_news = D("News");
        $info = $model_news->orders_reset();
        if($info){
            $this->success("取消订阅成功",__CONTROLLER__."/orders");
        }else{
            $this->error("订阅失败");
        }
    }
    /*
     * 评论页面
     * */
     public function comment(){
         $news_id = $_GET['news_id'];
         $model_admin = D("Admin");
         $nav = $model_admin->cate_list();
         $nav = $nav[1];
         $this->assign('nav',$nav);
         $model = D("News");
         $arr = $model->detail();
         $data = $model->comment();
         $com = $data[0];
         $replays = $data[1];

         $this->assign('news_id',$news_id);
         $this->assign('arr',$arr);
         $this->assign('com',$com);
         $this->assign('replays',$replays);
         $this->display('comment');
     }

     /*
      * 添加评论 comment_add
      * */
    public function comment_add(){
      $model = D("News");
      $arr = $model->comment_add();
      $info = $arr[0];
      $news_id = $arr[1];
      if($info){
         $this->success('评论成功',__CONTROLLER__.'/comment?news_id='.$news_id);
      }else{
         $this->error("评论失败");
      }
    }

    /*
     * 回复 repaly
     * */
    public function repaly(){
        $model = D("News");
        $arr = $model->repaly();
        $news_id = $_GET['news_id'];
        if($arr){
            $this->success('回复成功',__CONTROLLER__.'/comment?news_id='.$news_id);
        }else{
            $this->error("回复失败");
        }
    }
    /*
     * 收藏 collect
     * */
    public function collect(){
      if(session('u_name')){
          $news_id = $_GET['news_id'];
          $model = D("News");
          $info = $model->collect();
          if($info){
              $this->success('收藏成功',__CONTROLLER__.'/detail?news_id='.$news_id);
          }else{
              $this->error("收藏失败");
          }

      }else{
        $this->success('请登录',__CONTROLLER__.'/login');
      }


    }


}