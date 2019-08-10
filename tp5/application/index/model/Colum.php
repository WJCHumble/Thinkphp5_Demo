<?php
namespace  app\index\model;
use think\Model;

class Colum extends Model{
  public function getClass($data, $pid=0){
    // pid与id的关系
    $newArray = array();
    foreach ($data as $key => $value) {
      if ($value['pid']==$pid) {
        $newArray[$value['id']] = $value;
        $newArray[$value['id']]['child'] = $this->getClass($data, $value['id']);
      }
    }
    return $newArray;
  }
}
 ?>
