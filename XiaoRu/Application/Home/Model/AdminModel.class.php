<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends Model{

    /**
     * 验证登录
     * @author 周晶晶
     * */
    public function only(){
        $uname = I('post.username');
        $pwd = md5(md5(I('post.pwd')));
        $arr = $this->Table('admin')->where("admin_name='$uname'")->find();
        if($arr){
            if($pwd == $arr['admin_pwd']){
                session_start();
                $_SESSION["admin_name"] = $uname;
                $_SESSION['admin_id'] = $arr['admin_id'];
                $_SESSION['poster'] =$arr['poster'];
                return "1";
            }else{
                return "0";
            }
        }else{
            return "0";
        }
    }

    /**
     * 新闻类别 cate_list
     * @return array
     * */
    public function cate_list(){
        $Model = M('news_cate');
        $count= $Model->count();
        $Page= new \Think\Page($count,10);
        $Page->setConfig('first',"首页");
        $Page->setConfig('last',"尾页");
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $show= $Page->show();
        $list = $Model->limit($Page->firstRow.','.$Page->listRows)->select();
        return array($show,$list);
    }

    /**
     * 新闻列表 news_list
     * @return array
     * */
    public function news_list(){
        $Model = M('news');
        $count= $Model->count();
        $Page= new \Think\Page($count,10);
        $Page->setConfig('first',"首页");
        $Page->setConfig('last',"尾页");
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $show= $Page->show();
        $list = $Model->join("news_cate cate on news.cate_id=cate.cate_id")->join("admin on news.admin_id=admin.admin_id")->where("news.is_delete=1")->limit($Page->firstRow.','.$Page->listRows)->select();
        return array($show,$list);
     }

     /**
      * 新闻添加 news_add
      * @author 周晶晶
      * */
    public function news_add(){
     $arr['title'] = $_POST['title'];
     $arr['cate_id'] = $_POST['cate_id'];
     $arr['content'] = $_POST['editorValue'];
     $arr['add_date']=date("Y-m-d H:i:s",time());
     $arr['admin_id'] = session('admin_id');
     $Model = M('news');
     $info = $Model->add($arr);
     return $info;
    }

    /**
     * 新闻详情 news_details
     * @author zjj
     *  */
    public function news_details(){
        $news_id = $_GET['news_id'];
        $Model = M('news');
        $arr = $Model->join("news_cate cate on news.cate_id=cate.cate_id")->join("admin on news.admin_id=admin.admin_id")->where("news.id = $news_id")->find();
        return $arr;
    }
    /*
     *类别添加
     * */
     public function cate_add(){
       $arr['cate_name'] = $_POST['cate_name'];
       $Model = M('news_cate');
       $info = $Model->add($arr);
       return $info;
     }

    /*
      * 权限-用户列表 users_list
      * @retyrn array
      * */
    public function users_list(){
        $Model = M('admin');
        $count = $Model->count();
        $Page= new \Think\Page($count,10);
        $Page->setConfig('first',"首页");
        $Page->setConfig('last',"尾页");
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $show= $Page->show();
        $list = $Model->limit($Page->firstRow.','.$Page->listRows)->select();
        return array($show,$list);
    }
    /*
     * 权限-用户添加 users_add
     * */
    public function users_add(){
        $Model = M('admin');
        $arr['admin_name']=$_POST['admin_name'];
        $arr['admin_pwd']=md5(md5($_POST['admin_pwd']));
        $arr['admin_phone']=$_POST['admin_phone'];
        $arr['poster']=$_POST['poster'];
        $res = $Model->add($arr);
        return $res;
    }
    /**
     * 订阅 orders
     * @return array
     * */
    public function orders(){
        $Model =M('orders');
        $arr = $Model->join("user on orders.u_id=user.u_id")->select();
        foreach($arr as $k=>$v){
           $Model = M('news_cate');
           $cates_id = $v['cates_id'];
           $res[]=$Model->where("cate_id in ($cates_id)")->select();
        }
        foreach($res as $k=>$v){
          foreach($v as $kk=>$vo){
           $arr1[$k][$kk]=$vo['cate_name'];
          }
        }
        return array($arr,$arr1);
    }
    /*
   * 编辑 edit
   * return int
   * */
    public function edit(){
        $id = $_GET['id'];
        $arr = explode(",",$id);
        $id = $arr[0];
        $m = $arr[1];
        if($m=='news'){
            $Model = M('news');
            $arr=$Model->join("news_cate cate on news.cate_id=cate.cate_id")->join("admin on news.admin_id=admin.admin_id")->where("news.id = $id")->find();
        }else if($m=='admin') {
            $Model = M('admin');
            $arr = $Model->where("admin_id=$id")->find();
        }else {
            $Model = M('news_cate');
            $arr = $Model->where("cate_id=$id")->find();
        }
        return array($arr,$m);
    }

    public function edit_pro(){
        $id = $_GET['id'];
        $arr = explode(",",$id);
        $id = $arr[0];
        $m = $arr[1];
        if($m=='news'){
            $Model = M("news");
            $arr1['admin_id'] = session('admin_id');
            $arr1['title'] = $_POST['title'];
            $arr1['cate_id'] = $_POST['cate_id'];
            $arr1['content'] = $_POST['editorValue'];
            $arr1['add_date']=date("Y-m-d H:i:s",time());
            $info = $Model->where("id=$id")->save($arr1);
            return array($info,$m);
        }else if($m=='admin') {
            $Model = M("admin");
            $arr1['admin_name']=$_POST['admin_name'];
            $arr1['admin_pwd']=md5(md5($_POST['admin_pwd']));
            $arr1['admin_phone']=$_POST['admin_phone'];
            $arr1['poster']=$_POST['poster'];
            $info = $Model->where("admin_id=$id")->save($arr1);
            return array($info,$m);
        }else {
            $Model = M("news_cate");
            $data['cate'] = $_POST['cate_name'];
            $info = $Model->where("cate_id=$id")->save($data);
            return array($info,$m);
        }


    }

   /*
    * 删除 deleted
    * return int
    * */
    public function deleted(){
        $id = $_GET['id'];
        $arr = explode(",",$id);
        $id = $arr[0];
        $m = $arr[1];
        if($m=='news'){
            $Model = M('news');
            $arr1=$Model->where("id = $id")->delete();
        }else if($m=='admin') {
            $Model = M('admin');
            $arr1 = $Model->where("admin_id=$id")->delete();
        }else {
            $Model = M('news_cate');
            $arr1 = $Model->where("cate_id=$id")->delete();
        }
        return array($arr1,$m);
    }


  /*
   * 回收站 reback
   * return int
   * */
    public function reback()
    {
        $id = $_GET['id'];
        $Model = M('news');
        $arr['is_delete']=0;
        $info=$Model->where("news.id = $id")->save($arr);
        return $info;

    }
    /**
     * 榜单统计 counts
     * @return array
     * */
    public function counts(){
        $Model = M('news');
        $arr= $Model->join("news_cate cate on news.cate_id=cate.cate_id")->join("admin on news.admin_id=admin.admin_id")->where("news.is_delete=1 and news.collect_num!=0")->order("collect_num desc")->limit(10)->select();
        return $arr;
    }



}
?>