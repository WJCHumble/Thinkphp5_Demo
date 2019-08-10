<?php
namespace app\admin\controller;
use app\admin\model\Conf as ConfModel;
class Conf extends Allow{
  //配置列表
  public function index(){
    $data = db('conf')->paginate(6);
    $page = $data->render();
    $count = db('conf')->count();
    $this->assign([
      'data'=>$data,
      'page'=>$page,
      'count'=>$count
    ]);
    return view();
  }
  //配置项
  public function list(){
    if (request()->isPost()) {
      $data = input('post.');

      // dump($data);
      foreach ($data as $key => $value) {
        ConfModel::where('ename', $key)->update(['val'=>$value]);
      }
      $this->success("插入成功", url('list'));
    }else {
      $data = db('Conf')->select();
      // dump($data);
      $this->assign('data', $data);
      return view();
    }

  }
  //添加
  public function add(){
    if (request()->isPost()) {
      $data = input('post.');
      // dump($data);
      $conf = new ConfModel;
      if ($data['vals']) {
        $data['vals'] = str_replace('，', ',', $data['vals']);
      }
      $res = $conf->save($data);
      if ($res) {
        $this->success('添加成功', url('index'));
      }else {
        $this->error('添加失败');
      }
    }else {
      return view();
    }
  }
  //删除
  public function del($id){
    $conf = new ConfModel;
    $conf->delC($id);
    if ($conf) {
      $this->success("删除成功", url('index'));
    }else {
      $this->error("删除失败");
    }
  }
  public function ajax_dellAll(){
    $arr = input('post.str');
    $conf = new ConfModel;
    $res = $conf->delC($arr);
    return $res;
  }
  //修改
  public function update($id){
    if (request()->isPost()) {
      $data = input('post.');
      $data['vals'] = str_replace('，', ',', $data['vals']);
      // // dump($data);
        // $validate = \think\Loader::validate('Conf');
        // if (!$validate->scene('add')->check($data)) {
        //   $this->error($validate->getError());
        // }
      $conf = new ConfModel;
      $res = $conf->save($data, ['id'=>$data['id']]);
      if ($res) {
        $this->success('修改成功', url('index'));
      }else {
        $this->error('修改失败');
      }
      // db('conf')->update()
    }else {
      $data = db('conf')->find($id);
      $data['vals'] = str_replace(',', '，', $data['vals']);
      $this->assign('data', $data);
      return view();
    }
  }
}
 ?>
