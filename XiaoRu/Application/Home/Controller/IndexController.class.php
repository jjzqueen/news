<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      /*
       * 登录界面
       * */
        $model = D("News");
        $arr = $model->sel();
        $new = $model->news();
    //print_r($new);die;
        //发送数据到视图
        $this->assign('arr',$arr);
        $this->assign('news',$new);
        //显示页面
        $this->display('index');

    }
    public function login(){
        $this->display();
    }
    /*
     * 验证登录
     * */
     public  function  login_pro(){
      $this->show('4165456');
     }

   /*
    * register注册
    * */
   public  function  register(){

       $this->display();
   }

    public  function  register_pro(){
     $model =D("User");
     $info = $model->register();
     //print_r($info);
     if($info){
       return $this->index();
     }else{
       echo "<script>alert('注册失败')</script>";
     }
    }

    /*
     * 新闻详情页
     * */
    public  function  detail(){
      $id = $_GET['news_id'];
        $model = D("News");
        $arr = $model->detail();
        $this->assign('arr',$arr);
        //显示页面
        $this->display('detail');
    }
   /*
    * 国内新闻
    * */
    public function guonei()
    {
        $model = D("News");
        $arr = $model->guonei();
        $this->assign('arr',$arr);
        $this->display('guonei');
    }

    public function guoji()
    {
        $model = D("News");
        $arr = $model->guoji();
        $this->assign('arr',$arr);
        $this->display('guoji');
    }
    public function junshi()
    {
        $model = D("News");
        $arr = $model->junshi();
        $this->assign('arr',$arr);
        $this->display('junshi');
    }

    public function yule()
    {
        $model = D("News");
        $arr = $model->yule();
        $this->assign('arr',$arr);
        $this->display('yule');
    }
}