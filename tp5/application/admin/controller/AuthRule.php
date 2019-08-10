<?php
namespace app\admin\controller;
use app\admin\model\AuthRule as AuthRuleModel;

class AuthRule extends Allow{
  public function index(){
    $authr = new AuthRuleModel;
    $res = $authr->authRuletree();
    $this->assign('authtree', $res);
    $count = $authr->count();
    $this->assign('count', $count);
    return view();
  }
  //排序
  public function sort(){
   //  print_r(input('post.'));
   $data = input('post.');
   $colum = new AuthRuleModel;
   $res = $colum->save($data, ['id'=>$data['id']]);
   if ($res) {
     echo 1;
   }else {
     echo 2;
   }
  }
  //添加
  public function add(){
    if (request()->isPost()) {
      $data = input('post.');
      $plevel = db('auth_rule')->where('id', $data['pid'])->field('level')->find();
      // dump($plevel);
      if($plevel){
        $data['level'] = $plevel['level']+1;
      }else {
        $data['level'] = 0;
      }
      $res = db('auth_rule')->insert($data);
      if ($res) {
        $this->success("添加成功",  url('index'));
      }else {
        $this->error("添加失败");
      }
    }else {
      $authr = new AuthRuleModel;
      $res = $authr->authRuletree();
      $this->assign('authtree', $res);
      return view();
    }

  }
  //修改
  public function update($id){
    if (request()->isPost()) {
      $data = input('post.');
      $plevel = db('auth_rule')->where('id', $data['pid'])->field('level')->find();
      // dump($plevel);
      if($plevel){
        $data['level'] = $plevel['level']+1;
      }else {
        $data['level'] = 0;
      }
      $authr = new AuthRuleModel;
      $res  = $authr->save($data, ['id'=>$data['id']]);
      if ($res) {
        $this->success('修改成功', url('index'));
      }else {
        $this->error("修改失败");
      }
      // dump($data);
      // return view();
    }else {
      $data = db('auth_rule')->find($id);
      $authr = new AuthRuleModel;
      $res = $authr->authRuletree();
      $this->assign([
        'data'=>$data,
        'authtree'=>$res
      ]);
      return view();
    }
  }
  //前置操作
  protected $beforeActionList=[
    'delson' => ['only'=>'del'],
  ];
  public function delson(){
    $id=input('id');
    $colum = new AuthRuleModel;
    $res = $colum->getChildId($id);
    // print_r($res);
    if($res){
      db('auth_rule')->delete($res);
    }
  }
  //删除
  public function del($id){
    $authr = new AuthRuleModel;
    $res = $authr->delA($id);
    if ($res) {
      $this->success("删除成功", url('index'));
    }else {
      $this->success("删除失败");
    }
  }
  //批量删除
  public function ajax_dellAll(){
    $arr = input('post.str');
    $authr = new AuthRuleModel;
    $res = $authr->delA($arr);
    // dump($arr);
    if ($res) {
      return $res;
    }else {
      return 0;
    }
  }
}
 ?>
