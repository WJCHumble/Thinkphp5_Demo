<?php
namespace app\admin\model;
use think\Model;
class AuthRule extends Model{
  //无限分类展示
	public function authRuletree(){
    $authrule = $this->order('sort desc')->select();
    return $this->sort($authrule);
  }
  //改造数组
  public function sort($data, $pid=0){
    static $arr = array();
    foreach ($data as $key => $value) {
      if ($value['pid'] == $pid) {
        $arr[] = $value;
        $value['dataid'] = $this->getParentId($value['id']);
        $this->sort($data, $value['id']);
      }
    }
    return $arr;
  }
  //删除
  public function delA($arr){
    //查询该条记录
		$res =  explode(",", $arr);
		for ($i=0; $i < count($res); $i++) {
			$data = $this->find($res[$i]);
			//注意双引号不解析变量
			$this::destroy($res[$i]);
		}
		return count($res);
  }
  //获取父分类id
  public function getParentId($id){
    $authrule = $this->order('sort desc')->select();
    return $this->_getParentId($authrule, $id, true);
  }
  public function _getParentId($authrule, $id, $clear=false){
    static $arr = array();
    if ($clear==true) {
      $arr = array();
    }
    foreach ($authrule as $key => $value) {
      if ($value['id']==$id) {
        $arr[] = $value['id'];
        $this->_getParentId($authrule, $value['pid']);
      }
    }
    asort($arr);
    $str = implode('-', $arr);
    return $str;
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

}
