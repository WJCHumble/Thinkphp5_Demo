<?php
namespace app\admin\model;
use think\Model;

class Manger extends Model{
	// 添加
	public function addM($arr){
		$arr['password']=md5($arr['password']);
		if($this->save($arr)){
			return true;
		}else{
			return false;
		}
	}
	//删除
	public function delM($id){

		return $this::destroy($id);
	}
	//修改
	public function editM($arr){
		if ($arr['password']) {
			$arr['password']=md5($arr['password']);
		}else {
			$data = $this->find($arr['id']);
		  $arr['password'] = $data['password'];
		}
		$res = $this::update(["username"=>$arr['username'], "password"=>$arr['password'], "status"=>$arr['status'], "id"=>$arr['id']]);
    return $res;
	}
	//验证登录
	public function login($data){
		$admin = Manger::getByusername($data['username']);
		if ($admin) {
			$id = $admin['id'];
			$user = $admin['username'];
			$pass = $admin['password'];
			if ($pass==md5($data['password'])) {
				//密码正确
				session('name', $user);
				session('id', $id);
				return 1;
			}else {
				//密码不正确
				return 2;
			}
		}else {
			//用户名不存在1
			return 3;
		}
	}

}
