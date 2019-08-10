<?php
namespace app\admin\controller;
use app\admin\model\Colum as ColumModel;
class Colum extends Allow{
  public function index(){
    //栏目分类展示
    $count = db('colum')->count();
    $this->assign('count', $count);
    $colum = new ColumModel;
    // $data =  $colum::all();
    $res = $colum->coltree();
    // print_r($res);
    $this->assign("data", $res);
    // dump($res);

    // $this->assign("dat", $data);
    return view();
  }
  //添加
  public function add(){
    $colum = new ColumModel;
    $data = input('post.');
    $res = $colum->save($data);
    if ($res) {
      $this->success("添加成功", url('index'));
    }else {
      $this->error("添加失败");
    }
  }
  //前置操作
  protected $beforeActionList=[
    'delson' => ['only'=>'del'],
  ];
  public function delson(){
    $id=input('id');
    $colum = new ColumModel;
    $res = $colum->getChildId($id);
    // print_r($res);
    if($res){
      db('colum')->delete($res);
    }
  }
  //删除操作
  public function del($id){
    $colum = new ColumModel;
    $res = $colum->delcol($id);
    if ($res) {
      $this->success('删除成功', url('index'));
    }else {
      $this->error("删除失败");
    }
  }
  //修改
  public function update($id){
    $colum = new ColumModel;
    if (request()->isPost()) {
      $data = input('post.');
      $res = $colum->save($data, ['id'=>$id]);
      if($res){
        $this->success('修改成功', url('index'));
      }else {
        $this->error("修改失败");
      }
    }
    else {
      $fdata = db('colum')->find($id);
      $this->assign('fdata', $fdata);
      $colum = new ColumModel;
      // $data =  $colum::all();
      $res = $colum->coltree();
      $this->assign("data", $res);
      return view();
    }

  }
  //排序
  public function sort(){
   //  print_r(input('post.'));
   $data = input('post.');
   $colum = new ColumModel;
   $res = $colum->save($data, ['id'=>$data['id']]);
   if ($res) {
     echo 1;
   }else {
     echo 2;
   }
  }
  //批量删除
  public function ajax_dellAll(){
    $colum = new ColumModel;
    $res = $colum->delcol(input('post.str'));
    return $res;
    // print_r($res);
  }

}
 ?>
