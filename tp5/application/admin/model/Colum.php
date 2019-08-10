<?php
namespace app\admin\model;
use think\Model;
class Colum extends Model{
  //无限分类展示
	public function coltree(){
    $col = $this->order('sort desc')->select();
    return $this->sort($col);
  }
  //改造数组
  public function sort($data, $pid=0, $level=0){
    static $arr = array();
    foreach ($data as $key => $value) {
      if ($value['pid'] == $pid) {
        $value['level'] = $level;
        $arr[] = $value;
        $this->sort($data, $value['id'], $level+2);
      }
    }
    return $arr;
  }
	//获取子分类id
	public function getChildId($id){
		$col = $this->select();
		return $this->_getChildId($col, $id);
	}
	public function _getChildId($col, $id){
		//定义一个静态数组
		static $arr = array();
		//遍历表中的所有数据，注此时这个$col是一个二维数组
		foreach ($col as $key => $value) {
			if ($value['pid'] == $id) {
				$arr[] = $value['id'];
				$this->_getChildId($col, $value['id']);
			}
		}
		return $arr;
	}
	//删除
	// public function delcol($id){
	// 	if ($this::destroy($id)) {
	// 		return true;
	// 	}else {
	// 		return false;
	// 	}
	// }
	public function delcol($arr){
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
