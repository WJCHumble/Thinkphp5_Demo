<?php
namespace app\admin\validate;
use think\Validate;

class Conf extends Validate{
  //验证规则
  protected $rule = [
    'cname'=>'require|unique',
    'ename'=>'require|unique',
    'type'=>'require',
    'vals'=>'require'
  ];
  //验证消息
  protected $message = [
    'cname:require'=>'配置中文名不能为空',
    'cname:unique'=>'配置中文名已存在',
    'ename:require'=>'配置英文名不能为空',
    'ename:unique'=>'配置英文名不能已存在',
    'vals:require'=>'可选值不能为空',
    'type:require'=>'配置类型不能为空'
  ];
  //验证场景
  protected $scene = [
    'add'=>['cname', 'vals', 'ename', 'type'],
  ];
}
 ?>
