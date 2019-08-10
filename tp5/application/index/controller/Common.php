<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Colum as ColumModel;
class Common extends Controller{
  //初始化
  public function _initialize(){
    //配置
    $data = db('Conf')->select();
    $conf = array();
    //构造数组
    foreach ($data as $key => $value) {
      $conf[$value['ename']] = $value['val'];
    }
    // dump($conf);
    $this->assign('dat', $conf);
    //栏目获取
    $colum = new ColumModel();
    $data = db('colum')->select();
    $colum = $colum->getClass($data);
    $this->assign('colum', $colum);
    //最新热文
    $hot = db('article')->order('click desc')->limit(2)->select();
    $this->assign('hot', $hot);
    //作者
    // $author = db('author')->limit(2)->select();

  }
}
 ?>
