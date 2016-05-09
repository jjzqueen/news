<?php
namespace Home\Model;
    use Think\Model;
class NewsModel extends Model{
    protected $tableName = 'news_cate';
    //查询分类表中的所有的数据 返回给控制器
    /*
        如果表名中有下滑线 也要把下划线去掉 下划线后的首字母大写
    */
    public function sel(){
        //$title = I('post.title');
        //table
        $arr = $this->Table('news')->where("is_delete = 1")->select();
        //返回数据给控制器
        return $arr;
    }
    public function news(){
        $arr = $this->Table('news')->where("is_delete = 1")->order('news_id desc')->limit(5)->select();
        return $arr;
    }


    /*
        实现用户的添加 数据 model
    */
    public function add_pro(){
        //接收值 数组
        $arr = I('post.');
        $arr['add_time'] = date("Y-m-d",time());
        //执行添加
        $info = $this->add($arr);
        return $info;
    }

    /*
        俩表联查 显示列表
    */
    public function show(){
        $table = D('news_cate');
        //俩表联查
        $arr = $table->join('news ON news.cate_id = news_cate.id')->select();
        //返回数据  控制器
        return $arr;
    }

    /*
        执行删除  sql  数据
    */
    function del(){
        //接值 I
        $id = I('get.id');
        //执行删除
        $info = $this->Table('news')->where("id=$id")->delete();
        /*
            输出最后一条sql语句
        */
        //return $this->getLastSql();
        //返回数据  控制器
        return $info;
    }


    /*
     * 新闻详情页
     * */
    public  function  detail(){
        $id = $_GET['news_id'];
        //echo $id;
        $info = $this->Table('news')->where("news_id=$id")->find();
        return $info;
    }

    public function guonei()
    {
        $info = $this->Table('news')->join('news_cate ON news.cate_id = news_cate.cate_id')->where("news.is_delete=1 and news.cate_id=1")->select();
        return $info;
    }
    public function guoji()
    {
        $info = $this->Table('news')->join('news_cate ON news.cate_id = news_cate.cate_id')->where("news.is_delete=1 and news.cate_id=2")->select();
        return $info;
    }

    public function junshi()
    {
        $info = $this->Table('news')->join('news_cate ON news.cate_id = news_cate.cate_id')->where("news.is_delete=1 and news.cate_id=3")->select();
        return $info;
    }

    public function yule()
    {
        $info = $this->Table('news')->join('news_cate ON news.cate_id = news_cate.cate_id')->where("news.is_delete=1 and news.cate_id=4")->select();
        return $info;
    }

}
?>