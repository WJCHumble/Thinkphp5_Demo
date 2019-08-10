<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\htdocs\tp5\public/../application/admin\view\auth_group\index.html";i:1547830771;s:55:"D:\htdocs\tp5\application\admin\view\public\layout.html";i:1547827523;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
	<link rel="stylesheet" href="/static/public/bs/css/bootstrap.min.css">
	<script src="/static/public/bs/js/jquery.min.js"></script>
	<script src="/static/public/bs/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/static/admin/css/admin.css">
</head>
<body>

<!-- 导航 -->
<nav class="navbar navbar-default index">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">后台管理系统</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo url('Index/clear'); ?>"><span class="glyphicon glyphicon-refresh"></span>清除缓存</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">后台管理 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="javascript:;" data-toggle="modal" data-target="#pass_edit"><?php echo $_SESSION['think']['name']; ?></a></li>
            <li><a href="<?php echo url('Login/logout'); ?>">退出</a></li>

          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- 内容 -->
<div class="container">
	<!-- 左边菜单 -->
	<div class="col-md-2">
		<div class="panel panel-primary">
			<div class="panel-heading titles" id="Admin">
				<span class="glyphicon glyphicon-user"></span>
				管理员管理
			</div>
			<ul class="list-group">
				<li class="list-group-item"><a href="<?php echo url('Manger/index'); ?>">管理员列表</a></li>
        <li class="list-group-item"><a href="<?php echo url('AuthGroup/index'); ?>">权限管理</a></li>
        <li class="list-group-item"><a href="<?php echo url('AuthRule/index'); ?>">规则管理</a></li>
			</ul>
		</div>
    <div class="panel panel-primary">
      <div class="panel-heading titles" id="Admin">
        <span class="glyphicon glyphicon-facetime-video"></span>
        轮播管理
      </div>
      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo url('Lunbo/index'); ?>">轮播列表</a></li>
      </ul>
    </div>
		<div class="panel panel-primary">
			<div class="panel-heading titles" id="Admin">
				<span class="glyphicon glyphicon glyphicon-tasks"></span>
				文章管理
			</div>
			<ul class="list-group">
				<li class="list-group-item"><a href="<?php echo url('Colum/index'); ?>">栏目列表</a></li>
				<li class="list-group-item"><a href="<?php echo url('Article/index'); ?>">文章列表</a></li>
				<li class="list-group-item"><a href="<?php echo url('Author/index'); ?>">作者列表</a></li>
			</ul>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading titles" id="Admin">
				<span class="glyphicon glyphicon glyphicon-cog"></span>
				配置管理
			</div>
			<ul class="list-group">
				<li class="list-group-item"><a href="<?php echo url('Conf/index'); ?>">配置列表</a></li>
				<li class="list-group-item"><a href="<?php echo url('Conf/list'); ?>">配置项管理</a></li>
			</ul>
		</div>
	</div>
	
<div class="col-md-10">
    <ol class="breadcrumb">
        <li><a href="<?php echo url('Index/index'); ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;首页</a></li>
        <li><a href="#">权限管理</a></li>
        <li class="active">权限列表</li>
        <a href="" style="float:right;height:25px;" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
        <span style="clear:both"></span>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-danger" onclick="delAll()"> <span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;批量删除</button>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span><a href="<?php echo url('add'); ?>" style="color:white">&nbsp;&nbsp;添加权限</a></button>
            <div class="pull-right" style="margin-left:30px;">
                <p class="tot">共有数据:&nbsp;<b id="tot"><?php echo $count; ?></b>&nbsp;条</p>
            </div>
            <form class="form-inline pull-right" action="<?php echo url('index'); ?>" role="form">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="请输入要搜索内容">
                </div>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search">&nbsp;搜索</span></button>
            </form>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th><input type="checkbox" class="checkAll" name="items"></th>
                    <th>id</th>
                    <th>管理员名称</th>
                    <!-- <th>密码</th> -->
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dat): $mod = ($i % 2 );++$i;?>
                <tr id="tr<?php echo $dat['id']; ?>">
                  <td><input type="checkbox" class="checks" value="<?php echo $dat['id']; ?>"></td>
                  <td><?php echo $dat['id']; ?></td>
                  <td><?php echo $dat['username']; ?></td>
                  <td>
  							  	<?php if($dat['status'] == 1): ?>
  									<button class="btn btn-info" onclick="status(this, <?php echo $dat['id']; ?>, <?php echo $dat['status']; ?>)">正常</button>
  									<?php else: ?>
  									<button class="btn btn-danger" onclick="status(this, <?php echo $dat['id']; ?>, <?php echo $dat['status']; ?>)">禁止</button>
  									<?php endif; ?>
  							  </td>
                  <td>
                    <a class="glyphicon glyphicon-trash" href="<?php echo url('del', array('id'=>$dat['id'])); ?>"></a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a class="glyphicon glyphicon-pencil" href="<?php echo url('update', array('id'=>$dat['id'])); ?>"></a>
                  </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <?php echo $page; ?>
            </table>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>

<script>
//批量删除
$('.checkAll').click(function(){
	$('.checks').click();
});
//批量删除
function delAll(){
	datas = $('.checks:checked');
	arr = new Array();

	for(i = 0; i < datas.length; i++){
		arr[i] = datas.eq(i).val();
	}
	str = arr.join(',', arr);
  // console.log(str);
	$.post("<?php echo url('ajax_dellAll'); ?>", {str:str}, function(data){
		if (data == arr.length) {
			for (i = 0; i < arr.length; i++) {
				$('#tr' + arr[i]).remove();
			}
			$("[name=items]:checkbox").attr("checked", false);
		}else {
			alert("删除失败");
		}
	});
	// console.log(datas);
}
//排序
function sort(obj, id){
  //获取修改值
  num = $(obj).val();
  //传递的数据变量名必须与数据库中的字段名相同
  $.post("<?php echo url('sort'); ?>", {sort:num, id:id}, function(data){
    if(data == 1){
      $(this).val(num);
    }
  });
}

</script>

</div>

<!-- 添加弹出框 -->
<div class="modal fade" id="pass_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">修改密码</h4>
      </div>
      <div class="modal-body">
       	<form action="">
       		<div class="form-group">
       			<label for="">原始密码</label>
       			<input type="password" name="" class="form-control" id="">
       		</div>
       		<div class="form-group">
       			<label for="">修改密码</label>
       			<input type="password" name="" class="form-control" id="">
       		</div>
       		<div class="form-group">
       			<input type="submit" value="提交" class="btn btn-success">
       			<input type="reset" value="重置" class="btn btn-danger">
       		</div>
       	</form>
      </div>

    </div>
  </div>
</div>
</body>
<script>
	$(".titles").click(function(){
		$(".titles").next().hide();
		$(this).next().show();
	});
$("#<?php echo request()->module(); ?>").click();
</script>
</html>
