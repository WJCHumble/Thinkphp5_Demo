<?php
namespace app\index\controller;


class Imglist extends Common{
  public function index($id){
    //栏目名称
    $columname = db('colum')->find($id);
    $article = db('article')->join('author', 'author.id = article.authorid')
    ->field('article.*, author.name as aname')->where('article.columid', $id)->paginate(2);
    $page = $article->render();
    $this->assign([
      "article"=>$article,
      "columname"=>$columname,
      "page"=>$page
    ]);

    return view();
  }
}
 ?>
