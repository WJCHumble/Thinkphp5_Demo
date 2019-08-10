<?php
namespace app\index\controller;
use think\Controller;

class Index extends Common
{
    public function index()
    {
      //轮播
      $lunbo = db('lunbo')->order('sort desc')->limit(3)->select();;
      $this->assign('lunbo', $lunbo);
      return view();
    }
}
