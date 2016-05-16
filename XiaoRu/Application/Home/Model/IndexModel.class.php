<?php
namespace Home\Model;
use Think\Model;
class IndexModel extends Model
{
 /*
  * 获取图片
  * */
  public function images(){
    $Model = M('news');
    $arr = $Model->where("img != 'NULL'")->order('id desc')->limit(4)->select();
    return $arr;
  }



}

?>