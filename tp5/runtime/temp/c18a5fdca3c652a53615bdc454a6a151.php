<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\htdocs\tp5\public/../application/index\view\imglist\index.html";i:1547876100;s:55:"D:\htdocs\tp5\application\index\view\public\header.html";i:1547867950;s:55:"D:\htdocs\tp5\application\index\view\public\footer.html";i:1511921333;}*/ ?>

<link rel="stylesheet" type="text/css" href="/static/home/list.css"  />
	<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title><?php echo $dat['title']; ?></title>
<link rel="shortcut icon" href="http://www.ikanchai.com/favicon.ico" />
<meta name="keywords" content="<?php echo $dat['keywords']; ?>" />
<meta name="description" content="<?php echo $dat['des']; ?>" />
<link rel="stylesheet" type="text/css" href="/static/home/style.css"  />
<link rel="stylesheet" type="text/css" href="/static/home/index.css" />
<script type="text/javascript" src="/static/home/jquery-1.9.1.min.js" ></script>
<script type="text/javascript" src="/static/home/Common.js" ></script>
<script type="text/javascript" src="/static/home/script.js" ></script>
<script type="text/javascript" language="javascript" src="/static/home/jquery.easing.1.3.js" ></script>
<script type="text/javascript" language="javascript" src="/static/home/jquery.skitter.min.js" ></script>
<script type="text/javascript" language="javascript" src="/static/home/more.js" ></script>
<script src="/static/home/unslider.min.js"></script>
<link rel="stylesheet" href="/static/home/slide.css">
</head>
<body>
<div class="warp">
<div class="header">
	<div class="head">
		<div class="logo">
			<a href="index.htm"></a>
		</div>
		<div class="global-nav">
			<ul class="main-menu">
				<li>
					<a href="<?php echo url('Index/index'); ?>">首页</a>
				</li>
        <?php if(is_array($colum) || $colum instanceof \think\Collection || $colum instanceof \think\Paginator): $i = 0; $__LIST__ = $colum;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$colum): $mod = ($i % 2 );++$i;?>
				<li class="dropdown nav-dropdown">
					<a href="javascript:;" class="has-drop-menu"><?php echo $colum['name']; ?><i class="arrow"></i></a>
					<ul class="dropdown-menu">
						<div class="sort channel clearfix">

							<ul>
								<?php if(is_array($colum['child']) || $colum['child'] instanceof \think\Collection || $colum['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $colum['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ccolum): $mod = ($i % 2 );++$i;?>
								<li>
									<?php if($ccolum['type'] == 1): ?>
									<a href="<?php echo url('article/index', array('id'=>$ccolum['id'])); ?>" ><?php echo $ccolum['name']; ?></a>
									<?php else: ?>
									<a href="<?php echo url('imglist/index', array('id'=>$ccolum['id'])); ?>" ><?php echo $ccolum['name']; ?></a>
									<?php endif; ?>
								</li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<div class="tags channel clearfix">
							<ul></ul>
						</div>
					</ul>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="user">
			<!-- <div class="loginok">
				<ul id="nav">
					<li class="nav_li3_on">
						<a class="btn-loginok" href="javascript:;">
							<img src="/static/home/1.jpg" alt="" align="absmiddle" width="20" height="20"><em class="head-username" style="font-style:normal"></em>
						</a>
						<div id="nav_menu3" class="nav_li_child" style="display: none;">
							<div class="showdown">
								<a href="" class="head-member" target="_blank">会员中心</a>
								<a href="" target="_blank">个人设置</a>
								<a href="" target="_blank">在线投稿</a>
								<a href="" target="_blank">我的稿件</a>
								<a href="" class="head-logout" target="_blank">安全退出</a>
							</div>
						</div>
					</li>
				</ul>
			</div> -->
			<div class="login" style=" display:;">
				<a href="" class="btn btn-login">登陆</a>
			</div>
			<div class="tougao" style=" display:;">
				<a href="" class="btn btn-login">注册</a>
			</div>
			<div class="search">
				<ul>
					<li>
						<form class="form-search" action="">
							<input type="text" placeholder="输入搜索内容..." class="nav-search-input" name="search" id="baiduSearch"/>
							<i class="icon-search"></i>
							<i class="close"></i>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>


	<div class="content">
		<div class="content_home">
			<div class="znyj">
				<div class="znyj-title">
					<div class="znyjtxt"><?php echo $columname['name']; ?></div>
					<div class="znyjtxtr">硬件评测、合作请联系：WJCHumble 	</div><hr>
				</div>
				<div class="znyj_c">
					<?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
					<div class="znyj_c_box">
						<ul>
							<li class="boxpic">
								<a href="<?php echo url('artlist/index', array('id'=>$article['id'])); ?>" target="_blank" title="">
									<img src="/static/uploads/article/<?php echo $article['img']; ?>" width="360" height="230"/>
								</a>
							</li>
							<li>
								<dl>
									<dt>
										<a href="" target="_blank" title=""><?php echo $article['title']; ?></a>
									</dt>
									<dd>
										<p class="d"><?php echo $article['aname']; ?> / <?php echo date('Y-m-d H:i:s',  $article['time']); ?></p>
										<p class="c"> <?php echo $article['title']; ?>...</p>
									</dd>
								</dl>
							</li>
						</ul>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="hlgd-page page-nav">
					<ul class='paginationall'>
						<?php echo $page; ?>
						<!-- <a href="javascript:void(0);" class="prev disable">&lt;</a><a href="javascript:void(0);" class="current">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">... 50</a><a href="" class="next">&gt;</a> -->
					</ul>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="footert">
		<div class="footertw">
			<div class="footertl">
				<div class="fabout">
					<dl>
						<dt>砍柴网，有态度的科技媒体！</dt>
						<dd>
							<a href="aboutme/index.htm" >关于我们</a> | <a href="aboutme/contact.html" >联系我们</a> | <a href="aboutme/cooperation.html" >商务合作</a>
						</dd>
						<dd>
							<a href="aboutme/index.htm" >关于我们</a> | <a href="aboutme/contact.html" >联系我们</a> | <a href="aboutme/cooperation.html" >商务合作</a>
						</dd>
					</dl>
				</div>
				<div class="ftousu">
					<dl>
						<dt>投诉建议</dt>
						<dd>通过E-mail将您的想法和建议发给我们</dd>
						<dd>稿件投诉：post@ikanchai.com</dd>
						<dd>版权建议：copy@ikanchai.com</dd>
					</dl>
				</div>
				<div class="flianxi">
					<dl>
						<dt>联系我们</dt>
						<dd>砍柴网热线：400-8558-350</dd>
						<dd>官方客服QQ：1963519635</dd>
						<dd>微信公众号：ikanchai</dd>
					</dl>
				</div>
			</div>
			<div class="footertr">
				<ul>
					<li><img src="/static/home/1.jpg" width="124" height="123" border="0"></li>
					<li><img src="/static/home/1.jpg" width="124" height="123" border="0"></li>
				</ul>
			</div>
		</div>
		<div class="footerb">
			<div class="footerbtxt">
				<div class="footerbtxts">&copy; 2013-2015 砍柴网（www.ikanchai.com）版权所有 / 工信部备案：京ICP备15042874号-1 / <a target="_blank" href=""><img src="/static/home/1.jpg" style="width:16px;"><font color="#fff">京公网安备 11010502032797号</font></a> <a key="564ad173efbfb05d87e1fcc6" logo_size="83x30" logo_type="realname" href="" ></a></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
