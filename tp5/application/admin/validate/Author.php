<?php
namespace app\admin\validate;
use think\Validate;

class Author extends Validate{
  //验证规则
  protected $rule = [
    'photo'=>'require',
    'name'=>'require',
  ];
  //验证消息
  protected $message = [
    'photo:require'=>'上传图片不能为空',
    'name:require'=>'作者名字不能为空',
  ];
  //验证场景
  protected $scene = [
    'add'=>['photo', 'name'],
  ];
}
 ?>
