<?php
namespace app\admin\validate;
use think\Validate;

class Article extends Validate{
  //验证规则
  protected $rule = [
    'title'=>'require|unique:Article',
    'authorid'=>'require',
    'columid'=>'require'
  ];
  //验证消息
  protected $message = [
    'title:require'=>'文章标题不能为空',
    'title:unique'=>'文章标题已存在',
    'authorid:require'=>'文章作者不能为空',
    'columid:require'=>'所属栏目不能为空'
  ];
  //验证场景
  protected $scene = [
    'add'=>['title', 'authorid', 'columid'],
  ];
}
 ?>
