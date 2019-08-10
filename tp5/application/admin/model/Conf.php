<?php
namespace app\admin\model;
use think\Model;
class Conf extends Model{
  //删除
  public function delC($arr){
    $res = $this::destroy($arr);
    return $res;
  }
}
