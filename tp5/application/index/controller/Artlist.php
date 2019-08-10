<?php
namespace app\index\controller;
use  app\index\model\Article as ArticleModel;

class Artlist extends Common{
  public function index($id){
    //点击率
    $num = db('article')->find($id);
    $data['click'] = ++$num['click'];
    $article = new ArticleModel;
    $article->save($data, ['id'=>$id]);
    $article = db('article')->join('author', 'author.id = article.authorid')
    ->field('article.*, author.name as aname')->where('article.id', $id)->select();
    $article = $article[0];
    $columname = db('colum')->find($article['columid']);

    // $article = $article->toArray();

    $this->assign([
      "article"=>$article,
      "columname"=>$columname
    ]);
    // dump($columname);
    return view();
  }
}
 ?>
