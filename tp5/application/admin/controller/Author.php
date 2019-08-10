<?php
namespace app\admin\controller;
use app\admin\model\Author as AuthorModel;
class Author extends Allow{
  public function index(){
    $data = db('author')->select();
    $search = input("get.search");
    $map['name'] = array("like", "%$search%");
    $data = db("author")->where($map)->paginate(6);
    $page = $data->render();
    $count = db("author")->where($map)->count();
    $this->assign([
      'data'=>$data,
      'count'=>$count,
      'page'=>$page,
    ]);
    return view();
  }
  //添加
  public function add(){
    $data = input('post.');
    // dump($data);
    $author = new AuthorModel;
    $validate = \think\Loader::validate('Author');
    if ($validate->scene('add')->check($data)) {
      $author->addA($data);
      $this->success('添加成功', url("index"));
    }else {
      $error_ = $validate->getError();
      $this->error($error_);
    }

  }
  //上传文件
  public function ajax_upload(){
    $file = request()->file('file');
    if($file){
        $info = $file->move('./static/uploads/author');
        if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
     }
  }
  //删除
  public function del($id){
    // dump($arr);
    $author = new AuthorModel;
    if ($author->delA($id)) {
      $this->success("删除成功", url('index'));
    }else {
      $this->error("删除失败");
    }
  }
  public function ajax_dellAll(){
    $author = new AuthorModel;
    $arr = input('post.str');
    // dump($arr);
    $res = $author->delA($arr);
    return $res;
  }
  //修改
  public function update($id){
    $author = new AuthorModel;
    if (request()->isPost()) {
      $res = input('post.');
      // db('author')->update($res, ['id'=>$res['id']]);
      // dump($res);
      if (!$res['photo']) {
        $res['photo'] = $res['oldphoto'];
      }else {
        unlink("./static/uploads/author/{$res['oldphoto']}");
      }
      unset($res['oldphoto']);
      $a = db('author')->update($res, ['id'=>$res['id']]);
      if ($a) {
        $this->success("修改成功", url('index'));
      }else {
        $this->error("修改失败");
      }
    }else {
      $data = db('author')->find($id);
      $this->assign("dat", $data);
      return view();
    }

  }
}
 ?>
