<?php
namespace app\admin\controller;
use app\admin\model\Lunbo as LunboModel;
class Lunbo extends Allow
{
  public function index(){
    // $data = db('Lunbo')->select();
    $search = input("get.search");
    $map['img'] = array("like", "%$search%");
    $data = db("Lunbo")->where($map)->paginate(6);
    $page = $data->render();
    $count = db("Lunbo")->where($map)->count();

    $this->assign([
      'data'=> $data,
      'count'=>$count,
      'page'=>$page
    ]);
    return view();
  }
  //文件上传
  public function ajax_upload(){
    // 获取表单上传文件 例如上传了001.jpg
    $file = request()->file('file');
    // print_r($file);
    // // 移动到框架应用根目录/public/uploads/ 目录下
    if($file){
        $info = $file->move('./static/uploads/lunbo');
        if($info){
    //         // 成功上传后 获取上传信息
    //         // 输出 jpg
    //         echo $info->getExtension();
    //         // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
    //         // 输出 42a79759f284b767dfcb2a0197904287.jpg
    //         echo $info->getFilename();
        }else{
    //         // 上传失败获取错误信息
            echo $file->getError();
        }
     }
   }
   //添加轮播
   public  function add(){
    //  print_r(input('post.'));
    $LunboModel = new LunboModel;
    //验证
    $validate = \think\Loader::validate('Lunbo');
    if (!$validate->scene('add')->check(input('post.'))) {
      $this->error($validate->getError());
    }
    $res = $LunboModel->addL(input('post.'));
    if ($res) {
      $this->success("添加成功", url('index'));
    }else {
      $this->error("添加失败");
    }
   }
   //删除
   public function del($id){
     $LunboModel = new LunboModel;
     $res = $LunboModel->delL($id);
     if ($res) {
       $this->success("删除成功", url('index'));
     }else {
       $this->error("删除失败");
     }
   }
   //轮播图修改
   public function update($id){
     if (request()->isPost()) {
       $data = input('post.');
       if(!$data['img']){
         $data['img'] = $data['oldimg'];
       }else {
         unlink("./static/uploads/lunbo/{$data['oldimg']}");
       }
       //删除数组中的这个字段
       unset($data['oldimg']);
       $LunboModel = new LunboModel;
       $res = $LunboModel->save($data, ['id'=>$id]);
       if ($res) {
         $this->success("修改成功", url('index'));
       }else {
         $this->error("修改失败");
       }
     }else {
       $data = db('Lunbo')->find($id);
       $this->assign('dat', $data);
       return view();
     }
   }
   //排序
   public function sort(){
    //  print_r(input('post.'));
    $data = input('post.');
    $LunboModel = new LunboModel;
    $res = $LunboModel->save($data, ['id'=>$data['id']]);
    if ($res) {
      echo 1;
    }else {
      echo 2;
    }
   }
   //批量删除
   public function ajax_dellAll(){
     // echo "<pre/>";
     // print_r(input('post.str'));
     // echo "</pre>";
    //  print_r(input('post.'));
     $model = new LunboModel;
     $res = $model->delL(input('post.str'));
     return $res;
    // print_r($res);
    // $arr = explode(",", input("post.str"));
    // print_r($arr);
   }

}
?>
