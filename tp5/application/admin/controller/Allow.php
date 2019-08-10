<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\controller\Auth;
class Allow extends Controller{
  public function _initialize(){
    if (!session('?name') || !session('?id')) {
      $this->error('请登录', url('login/index'));
    }
    // 权限把控
    $auth = new Auth();
    //获取当前控制器方法
    $request = request();
    $request = Request::instance();
    //控制器
    $con = $request->controller();
    //方法
    $action = $request->action();
    $name = $con.'/'.$action;
    //组合成字符串
    // echo $name = $con.'/'.$action;
    //无需检测
    $nocheck = array('Index/index', 'Index/clear');
    if (session('id')!=42) {
      if (!in_array($name, $nocheck)) {
        if (!$auth->check($name, session('id'))) {
          $this->error("没有权限", url('index/index'));
        }
      }
    }
  }

}
 ?>
