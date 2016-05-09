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
        $list = $Model->join("news_cate cate on news.cate_id=cate.cate_id")->join("admin on news.admin_id=admin.admin_id")->limit($Page->firstRow.','.$Page->listRows)->select();
        return array($show,$list);
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







}
?>