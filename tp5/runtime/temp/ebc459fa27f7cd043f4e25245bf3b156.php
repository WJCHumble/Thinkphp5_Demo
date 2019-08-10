<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\htdocs\tp5\public/../application/admin\view\auth_group\add.html";i:1547830186;s:55:"D:\htdocs\tp5\application\admin\view\public\layout.html";i:1547827523;}*/ ?>
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
	  <li><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;首页</a></li>
	  <li><a href="#">规则管理</a></li>
	  <li class="active">添加规则</li>
	  <a href="" style="float:right;height:25px;" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
	  <span style="clear:both"></span>
	</ol>
	<div class="panel panel-default">

		</div>
		<div class="panel-body">
        <form action="<?php echo url('add'); ?>" method="post">
          <div class="form-group">
            <label for="">管理员名称</label>
            <select  name="title" class="form-control">
              <?php if(is_array($mdata) || $mdata instanceof \think\Collection || $mdata instanceof \think\Paginator): $i = 0; $__LIST__ = $mdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mdata): $mod = ($i % 2 );++$i;?>
              <option value="<?php echo $mdata['id']; ?>"><?php echo $mdata['username']; ?></option>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">状态</label>
            <br>
            <label for="radio-inline">
              <input type="radio" name="status" value="1" >正常
            </label>
            <br>
            <label for="radio-inline">
              <input type="radio" name="status" value="0" checked>禁用
            </label>
          </div>
          <div class="form-group">
            <label for="">规则</label>
            <table>
              <?php if(is_array($authRTree) || $authRTree instanceof \think\Collection || $authRTree instanceof \think\Paginator): $i = 0; $__LIST__ = $authRTree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tree): $mod = ($i % 2 );++$i;?>
              <tr>
                <td>
                  <?php
                  echo str_repeat("&nbsp", $tree['level']*5);
                  ?>
                  <input type="checkbox" name="rules[]" value="<?php echo $tree['id']; ?>" dataid="<?php echo $tree['dataid']; ?>" class="checkbox-parent <?php echo $tree['level']==0?'':'checkbox-child'; ?>">
                  <span><?php echo $tree['title']; ?></span>
                </td>
              </tr>
              <?php endforeach; endif; else: echo "" ;endif; ?>

            </table>
          </div>

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

<script type="text/javascript">
/* 权限配置 */
$(function () {
    //动态选择框，上下级选中状态变化
    $('input.checkbox-parent').on('change', function () {
        var dataid = $(this).attr("dataid");
        $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
    });
    $('input.checkbox-child').on('change', function () {
        var dataid = $(this).attr("dataid");
        dataid = dataid.substring(0, dataid.lastIndexOf("-"));
        var parent = $('input[dataid=' + dataid + ']');
        if ($(this).is(':checked')) {
            parent.prop('checked', true);
        } else {
            //父级
            if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                parent.prop('checked', false);
            }
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
