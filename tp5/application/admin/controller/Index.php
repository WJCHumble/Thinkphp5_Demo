<?php
namespace app\admin\controller;
// use think\Session;
class Index extends Allow{
  public function index(){
    // $res = Session::get('id');
    // dump($res);
    return view();
  }
  //清除缓存
  public function clear(){
    $this->dDir('../runtime');
    $this->success("清除缓存成功", url('index'));
  }
  public function dDir($dir){
    if (!file_exists($dir)) {
      return false;
    }
    $arr = scandir($dir);
    foreach ($arr as $key => $value) {
      if($key>1){
        $path = $dir.'/'.$value;
        //判断path是否是路径
        if (is_dir($path)) {
          //递归调用该方法，直到查找到文件
          $this->dDir($path);
        }
        if (is_file($path)) {
          //使用unlink删除文件
          unlink($path);
        }
      }
    }
    //最后只剩一个空文件夹
    rmdir($dir);
  }
}
 ?>
