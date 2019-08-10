<?php
namespace app\admin\validate;
use think\Validate;

class Lunbo extends Validate{
  //验证规则
  protected $rule = [
    'img'=>'require',
    'href'=>'require',
  ];
  //验证消息
  protected $message = [
    'img:require'=>'上传图片不能为空',
    'href:require'=>'图片链接不能为空',
  ];
  //验证场景
  protected $scene = [
    'add'=>['img', 'href'],
  ];
}
 ?>
