<?php
namespace Home\Model;
    use Think\Model;
class NewsModel extends Model{
    /*
     * 首页显示
     * */
    public function sel(){
        $arr = $this->Table('news')->where("is_delete = 1")->select();
        return $arr;
    }
    /*
     * 首页显示最新
     * */
    public function news(){
        $arr = $this->Table('news')->where("is_delete = 1")->order('id desc')->limit(5)->select();
        return $arr;
    }

    /*
     * 新闻详情页
     * */
    public  function  detail(){
        $id = $_GET['news_id'];
        $info = $this->Table('news')->join("news_cate cate on news.cate_id=cate.cate_id")->join("admin on news.admin_id=admin.admin_id")->where("news.id=$id")->find();
        return $info;
    }

   /*
    *更多
    * */
    public function more_news(){
      $today = time();//当前时间
      $yes = date("Y-m-d 00:00:00",strtotime("-1 day"));
      $yes = strtotime($yes);//昨天
      $arr = $this->getField('id,add_date');
      $str = '';
      foreach($arr as $k=>$v){
         if(strtotime($v)>=$yes && strtotime($v)<=time()){
             $str .=",".$k;
         }
      }
       $str =substr($str,1);
       $arr = $this->where("id in ($str) and is_delete=1")->select();
        $count= count($arr);
        $Page= new \Think\Page($count,10);
        $Page->setConfig('first',"首页");
        $Page->setConfig('last',"尾页");
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $show= $Page->show();
        $list = $this->where("id in ($str) and is_delete=1")->limit($Page->firstRow.','.$Page->listRows)->select();
        return array($show,$list);

       return $arr;
    }

    /*
    * 分类新闻 news_cate
    * @author 周晶晶
    * */
    public function news_cate(){
     $cate_id =$_GET['cate_id'];
     $Model = M('news_cate');
     $cates = $Model->where("cate_id=$cate_id")->find();
     session('cate_name',$cates['cate_name']);
     $arr = $this->join("news_cate cate on news.cate_id=cate.cate_id")->where("news.cate_id=$cate_id")->order("news.id desc")->select();
     return $arr ;

    }
    /*
    * 订阅 orders
    * @author 周晶晶
    * */
    public function orders(){
      $u_name = session('u_name');
      $Model=M('user');
      $arr = $Model->where("u_name = '$u_name'")->find();
      $u_id = $arr['u_id'];
      $Model = M('orders');
      $arr = $Model->where("u_id = $u_id")->find();
      $cates_id = $arr['cates_id'];
      if(strpos($cates_id,",")){
         $cates_id = explode(",",$cates_id);
      }
      return $cates_id;

    }
   /*
    * 添加订阅 orders_add
    * @author 周晶晶
    * */
   public function orders_add(){
       $u_name = session('u_name');
       $Model=M('user');
       $arr = $Model->where("u_name = '$u_name'")->find();
       $u_id = $arr['u_id'];

       $cate_id = $_GET['cate_id'];
       $Model = M('orders');
       $arr = $Model->where("u_id = $u_id")->find();
       if(!empty($arr)) {
           $cates_id = $arr['cates_id'];
           $cates_id .= "," . $cate_id;
           $arr['cates_id'] = $cates_id;
           $info = $Model->where("u_id = $u_id")->save($arr);
           return $info;
       }else{
          $data['u_id']=$u_id;
          $data['cates_id']= $cate_id;
          $info = $Model->add($data);
           return $info;
       }

   }
    /*
      * 取消订阅 orders_reset
      * */
    public function orders_reset(){
        $u_name = session('u_name');
        $Model=M('user');
        $arr = $Model->where("u_name = '$u_name'")->find();
        $u_id = $arr['u_id'];
        $cate_id = $_GET['cate_id'];
        $Model = M('orders');
        $arr = $Model->where("u_id = $u_id")->find();
        $cates_id = $arr['cates_id'];
        $cates_id = explode(",",$cates_id);
        foreach($cates_id as $k=>$v){
          if($cates_id[$k]==$cate_id){
            unset($cates_id[$k]);
          }

        }
        $cates_id = implode($cates_id);
        $arr['cates_id']=$cates_id;
        $info = $Model->where("u_id = $u_id")->save($arr);
        return $info;

    }
    /*
     * 评论
     * */
     public function comment(){
         $news_id = $_GET['news_id'];
         $Model = M('comment');
         $arr = $Model->join("user on user.u_id=comment.u_id")->where("comment.news_id=$news_id")->order("c_time desc")->select();
         $re = $Model->join("user on user.u_id=comment.u_id")->where("comment.news_id=$news_id and p_id !=0")->order("c_time desc")->select();
         return array($arr,$re);
     }
    /*
      * 添加评论
      * */
    public function comment_add(){
     $data['c_time']=time();
     if(session('u_name')){
         $u_name = session('u_name');
         $Model=M('user');
         $arr = $Model->where("u_name = '$u_name'")->find();
         $data['u_id'] = $arr['u_id'];
     }else{
       $data['u_id']=0;
     }
     $data['news_id'] = $_GET['news_id'];
     $data['c_content']=$_POST['c_content'];
     $Model=M("comment");
     $info = $Model->add($data);
     return array($info,$_GET['news_id']);

    }
     /**
      * 回复 repaly
      * */
    public function repaly(){
        $Model=M('user');
        $data['c_time']=time();
        if(session('u_name')){
            $u_name = session('u_name');
            $arr = $Model->where("u_name = '$u_name'")->find();
            $data['u_id'] = $arr['u_id'];
        }else{
            $data['u_id']=0;
        }
        $data['news_id'] = $_GET['news_id'];
        $data['c_content']=$_POST['c_content'];
        $data['p_id'] = $_POST['p_id'];
        $pid = $_POST['p_id'];
        $Model = M('comment');
        $arr = $Model->join("user on user.u_id=comment.u_id")->where("comment.c_id=$pid")->find();
        $p_name = $arr['u_name'];//回复谁
        $info = $Model->add($data);
        return $info;
    }

    /*
    * 收藏 collect
    * */
    public function collect(){
       $u_name = session('u_name');
       $Model=M('user');
       $news_id = $_GET['news_id'];
       $arr = $Model->where("u_name = '$u_name'")->find();
       $u_id = $arr['u_id'];
       $data['u_id'] = $arr['u_id'];
       $data['news_id'] = $news_id;
       $Model= M('collect');
       $arr = $Model->where("u_id = $u_id")->find();
       if($arr){
         $news = $arr['news_id'];
         $news = $news.",".$news_id;
         $res['news_id'] = $news;
         $info = $Model->where("u_id = $u_id")->save($res);
       }else{
         $info = $Model->add($data);
         if($info){
          $model = new Model();
          $info = $model->execute("update news set collect_num=collect_num+1 where id=$news_id");
         }
       }
       return $info;

    }




}
?>