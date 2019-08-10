<?php
namespace app\admin\model;
use think\Model;
class Lunbo extends Model{
	// 添加
	public function addL($arr){
		if($this->save($arr)){
			return true;
		}else{
			return false;
		}
	}
  //删除
  public function delL($arr){
    //查询该条记录
    $res =  explode(",", $arr);
    for ($i=0; $i < count($res); $i++) {
      $data = $this->find($res[$i]);
      //注意双引号不解析变量
      //删除本地文件夹中该图片
      unlink("./static/uploads/lunbo/{$data['img']}");
  		$this::destroy($res[$i]);
    }
    return count($res);
    // return $res;
	}
}
