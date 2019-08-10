<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\htdocs\tp5\public/../application/admin\view\lunbo\update.html";i:1547781660;s:55:"D:\htdocs\tp5\application\admin\view\public\layout.html";i:1547827523;}*/ ?>
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
	
<script src="/static/public/up/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/static/public/up/uploadify.css">
<div class="col-md-10">
	<ol class="breadcrumb">
	  <li><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;首页</a></li>
	  <li><a href="#">轮播管理</a></li>
	  <li class="active">修改轮播</li>
	  <a href="" style="float:right;height:25px;" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
	  <span style="clear:both"></span>
	</ol>
	<div class="panel panel-default">

		</div>
		<div class="panel-body">
        <form action="<?php echo url('update'); ?>" method="post">
          <div class="form-group">
            <label for="">图片</label>
            <div class="">
              <img src="/static/uploads/lunbo/<?php echo $dat['img']; ?>" alt="" height="80px" width="120px">
            </div>
            <div id="queue"></div>
            <input type="hidden" name="img" id="addImg" value="">
            <input id="file_upload" name="file_upload" type="file" multiple="true">
            <input type="hidden" name="oldimg" value="<?php echo $dat['img']; ?>">
          </div>
          <div class="form-group">
            <label for="">链接</label>
            <input type="text" name="href" class="form-control" id="" value="<?php echo $dat['href']; ?>">
          </div>
          <input type="hidden" name="id" value="<?php echo $dat['id']; ?>">
          <div class="form-group">
            <input value="提交" class="btn btn-success" type="submit">
            <input type="reset" value="重置" class="btn btn-danger">
          </div>
        </form>
    </div>
		<div class="panel-footer">

		</div>
	</div>
</div>

<script>
//文件上传
<?php $timestamp = time();?>
$(function() {
  $('#file_upload').uploadify({
    'swf'      : '/static/public/up/uploadify.swf',
    'uploader' : '<?php echo url('ajax_upload'); ?>',
    'buttonText':'上传轮播图片',
    'fileObjName':'file',
    onUploadSuccess:function(file, data, response){
      img="<img src='/static/uploads/lunbo/"+data+"' alert='' width='200px' height='80px'>";
      $("#queue").html(img);
      $('#addImg').val(data);
    }
  });
});
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
