<?php
namespace app\admin\controller;
use app\admin\model\Manger as MangerModel;
use app\admin\model\AuthRule as AuthRuleModel;
use app\admin\model\AuthGroup as AuthGroupModel;


class AuthGroup extends Allow{
  public function index(){
    $data = db('auth_group')->alias('a')->join('manger b', 'a.title = b.id')->
            field('a.*, b.username')->paginate(6);
    $authG = new AuthGroupModel;
    // $data = $authG->select();
    $page = $data->render();
    $count = $authG->count();
    $this->assign([
      'data'=>$data,
      'count'=>$count,
      'page'=>$page,
    ]);
    // dump($data);
    return view();
  }
  //添加
  public function add(){
    if(request()->isPost()){
      $data = input('post.');
      // dump($data);
      if ($data['rules']) {
        $data['rules'] = implode(',', $data['rules']);
      }
      $manger = new AuthGroupModel;
      $res = $manger->insert($data);
      if ($res) {
        $data1['uid'] = $data['title'];
        $data1['group_id'] = db("auth_group")->getLastInsID();
        db('auth_group_access')->insert($data1);
        // $res_ = db('auth_group_access')->insert();
        $this->success("添加成功", url('index'));
      }else {
        $this->error("添加失败");
      }
    }else {
      //管理员名称
      $manger = new MangerModel;
      $mdata = $manger->select();
      // dump($mdata);
      //规则显示
      $authR = new AuthRuleModel;
      $authRTree = $authR->authRuletree();
      $this->assign([
        'mdata'=>$mdata,
        'authRTree'=>$authRTree
      ]);
      return view();
    }
  }
  //删除
  public function del($id){
    $authr = new AuthGroupModel;
    $res = $authr->delA($id);
    db('auth_group_access')->where('group_id', $id)->delete();
    if ($res) {
      $this->success("删除成功", url('index'));
    }else {
      $this->success("删除失败");
    }
  }
  //批量删除
  public function ajax_dellAll(){
    $arr = input('post.str');
    $authr = new AuthGroupModel;
    $res = $authr->delA($arr);
    // dump($arr);
    if ($res) {
      return $res;
    }else {
      return 0;
    }
  }
  //修改
  public function update($id){
    if (request()->isPost()) {
      $data = input('post.');
      // dump($data);
      if ($data['rules']) {
        $data['rules'] = implode(',', $data['rules']);
      }
      $authG = new AuthGroupModel;
      $res = $authG->save($data, ['id'=>$data['id']]);
      if ($res) {
        $this->success("修改成功", url('index'));
      }else {
        $this->error("修改失败");
      }
    }else {
      $authM = new MangerModel;
      $data = $authM->select();
      $authR = new AuthRuleModel;
      $authRTree = $authR->authRuletree();
      $authG = new AuthGroupModel;
      $udata = $authG->find($id);
      $udata['rules'] = explode(',', $udata['rules']);
      $arr = $udata['rules'];
      // dump($arr);
      // dump($udata);
      $this->assign([
        'mdata'=>$data,
        'udata'=>$udata,
        'authRTree'=>$authRTree,
        'arr'=>$arr
      ]);
      return view();
    }
  }
}
 ?>
