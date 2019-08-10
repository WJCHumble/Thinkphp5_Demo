<?php
namespace app\admin\model;
use think\Model;
class AuthGroup extends Model{
	// 添加
	public function addA($arr){
		if($this->save($arr)){
			return true;
		}else{
			return false;
		}
	}
  //删除
  public function delA($arr){
    //查询该条记录
    $res =  explode(",", $arr);
    for ($i=0; $i < count($res); $i++) {
      $data = $this->find($res[$i]);
      //注意双引号不解析变量
      //删除本地文件夹中该图片
  		$this::destroy($res[$i]);
    }
    return count($res);
    // return $res;
	}
}
