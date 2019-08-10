<?php
namespace app\admin\controller;
use app\admin\model\Colum as ColumModel;
use app\admin\model\Article as ArticleModel;


class Article extends Allow{
  public function index(){
    $search = input("get.search");
    $map['title'] = array("like", "%$search%");
    $data = db('article')->alias('a')->join('colum b', 'a.columid = b.id')->join('author c', 'c.id = a.authorid')->where($map)->
            field('a.*, b.name as columname, c.name as authorname')->paginate(6);
    $page = $data->render();
    $count = db('article')->where($map)->count();
    $this->assign([
      'data'=>$data,
      'page'=>$page,
      'count'=>$count
    ]);

    return view();
  }
  //文章详情展示
  public function detail($id){
    $data = db('article')->find($id);
    $this->assign("dat", $data);
    return view();
  }
  //添加
  public function add(){
    if (request()->isPost()) {
      $data = input('post.');
      $data['time'] = time();
      $article = new ArticleModel;
      // $validate = \think\Loader::validate('Article');
      // if ($validate->scene('add')->check($data)) {
        $res = $article->addA($data);
        // dump($this->getLastSql());
        // dump($res);
        // exit;
        $this->success("添加成功", url('index'));
      // }else {
        // $this->error($validate->getError());
      // }

    }else {
      $colum = new ColumModel;
      $col = $colum->coltree();
      $author = db('author')->select();
      $this->assign([
        'col'=>$col,
        'author'=>$author
      ]);
      return view();
    }
  }
  //上传文件
  public function ajax_upload(){
    $file = request()->file('file');
    if($file){
        $info = $file->move('./static/uploads/article');
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
    $author = new ArticleModel;
    if ($author->delA($id)) {
      $this->success("删除成功", url('index'));
    }else {
      $this->error("删除失败");
    }
  }
  //批量删除
  public function ajax_dellAll(){
    $author = new ArticleModel;
    $arr = input('post.str');
    // dump($arr);
    $res = $author->delA($arr);
    return $res;
  }
  //更新
  public function update($id){
    if (request()->isPost()) {
      $data = input('post.');
      // dump($data);
      if (!$data['img']) {
        $data['img'] = $data['oldimg'];
      }else {
        unlink("./static/uploads/article/{$data['oldimg']}");

        }
        unset($data['oldimg']);
        $data['time'] = time();
        $res = db('article')->update($data, ['id'=>$data['id']]);
        if ($res) {
          $this->success("修改成功", url('index'));
        }else {
          $this->error("修改失败");
      }
      // $res = db('article')->update()
    }else {
      $data = db('article')->find($id);
      $colum = new ColumModel;
      $col = $colum->coltree();
      $author = db('author')->select();
      $this->assign([
        'dat'=>$data,
        'col'=>$col,
        'author'=>$author
      ]);

      return view();
    }
  }
}
 ?>
