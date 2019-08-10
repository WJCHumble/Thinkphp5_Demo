<?php
namespace app\admin\controller;
//导入相应的模型类
use app\admin\model\Manger as MangerModel;
// use app\admin\model\AuthGroup as AuthGroupModel;
class Manger extends Allow{
  public function index(){
    $search = input("get.search");
    $map['username'] = array("like", "%$search%");
    $data = db("manger")->where($map)->paginate(6);
    $page = $data->render();
    $count = db("manger")->where($map)->count();
    // $this->assign('count', $count);
    // $this->assign('data', $data);
    $this->assign([
      'data'=> $data,
      'count'=>$count,
      'page'=>$page
    ]);
    return view();
  }
  //添加
  public function ajax_add(){
    parse_str(input("post.str"), $arr);
    $model = new MangerModel;
    //验证
    $validate = \think\Loader::validate('Manger');
    if (!$validate->scene('add')->check($arr)) {
      return $arr = ['error'=>$validate->getError(), 'code'=>1];
    }else {
      $res = $model->addM($arr);
      if ($res) {
        $arr['id'] = $model->id;
        $arr['lastlogin'] = 0;
        $this->assign('dat', $arr);
        return view();
      }
    }

  }
  //删除
  public function ajax_del(){
    $id = input('post.id');
    $model = new MangerModel;
    // $data = db('manger')->find($id);
    // $username = $data['username'];
    // $authG = new AuthGroupModel;
    // $arr = $authG->select();
    // foreach ($arr as $key => $value) {
    // 	if (value['title']==$username) {
    // 		$authG->delete(value['id']);
    // 	}
    // }
    $res = $model->delM($id);
    if ($res) {
      echo 1;
    }else {
      echo 2;
    }
  }
  //查找
  public function ajax_find(){
    $id = input("post.id");
    $data = db("Manger")->find($id);
    // print_r($data);
    $this->assign("dat", $data);
    return view();
  }
  //修改
  public function ajax_update(){
    //将字符串转化成数组
    parse_str(input("post.str"), $arr);
    $model = new MangerModel;
    $res = $model->editM($arr);
    if ($res) {
      // echo 1;
      $data = db('Manger')->find($arr['id']);
      $this->assign('dat', $data);
      return view();
    }else {
      echo 2;
    }
  }
  //批量删除
  public function ajax_dellAll(){
    // echo "<pre/>";
    // print_r(input('post.str'));
    // echo "</pre>";
    $model = new MangerModel;
    $res = $model->delM(input('post.str'));
    return $res;
  }
  //状态改变
  public function ajax_status(){
    $data = input('post.');
    $res = db("manger")->where("id", $data['id'])->update(['status'=>$data['status']]);
    if ($res) {
      echo 1;
    }else {
      echo 2;
    }
  }
}
 ?>
