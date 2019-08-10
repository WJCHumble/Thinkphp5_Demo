<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Manger as MangerModel;

class Login extends Controller{
  public function index(){
    if (request()->isPost()) {
      $data = input("post.");
      // dump($data);
      if ($this->check($data['code'])) {
        $model = new MangerModel;
        $res = $model->login($data);
        if ($res==1) {
          //修改语句
          $this->success("登录成功", url('index/index'));
        }elseif ($res==2) {
          $this->error("输入密码不正确");
        }elseif ($res==3) {
          $this->error("用户名不存在");
        }
      }else {
        $this->error("输入验证码错误");
      }
    }else {
      return view();
    }
  }
  //验证码验证
  public function check($code){
    if(captcha_check($code)){
     return true;
   }else {
     return false;
   }
  }
  //退出
  public function logout(){
    session(null);
    $this->success("退出成功", url('index'));
  }

}
 ?>
