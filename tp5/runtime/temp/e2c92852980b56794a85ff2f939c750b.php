<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\htdocs\tp5\public/../application/index\view\article\index.html";i:1511922960;s:55:"D:\htdocs\tp5\application\index\view\public\header.html";i:1547867950;s:54:"D:\htdocs\tp5\application\index\view\public\right.html";i:1511923477;s:55:"D:\htdocs\tp5\application\index\view\public\footer.html";i:1511921333;}*/ ?>
﻿<link rel="stylesheet" type="text/css" href="/static/home/list.css"  />
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
			<div class="home_left">
				<div class="hlgd">
					<div class="hlgd-title">
						<div class="hlgdttxt">科技头条</div><hr>
					</div>
					<div class="hlgd-content">
						<div class="hlgd-box">
							<dl>
								<dt>
									<a href="" target="_blank" title="5亿美元融资恐无法完成  法拉第未来该何去何从？ "> <img src="/static/home/1.jpg"  alt="5亿美元融资恐无法完成  法拉第未来该何去何从？ " width="250" height="165"/> 
									</a>
								</dt>
								<dd>
									<h3>
										<span class="dj">原创</span>
										<a href="" target="_blank" title="5亿美元融资恐无法完成  法拉第未来该何去何从？ ">5亿美元融资恐无法完成 法拉第未来该何去何从？ </a>
									</h3>
									<p>据外媒报道，曾经号称要超越特斯拉的贾跃亭面临着一个新障碍，据知情人士透露，他的美国电动汽车初创公司可能无法完成5亿美元的最新一轮融资。知情人士称，如果法拉第无法在12月之前完成A轮融资，就需要立...</p>
									<p>李晓荆 / 原创 / 2017-11-28 16:57</p>
								</dd>
							</dl>
						</div>
						<div class="hlgd-box">
							<dl>
								<dt>
									<a href="" target="_blank" title="5亿美元融资恐无法完成  法拉第未来该何去何从？ "> <img src="/static/home/1.jpg"  alt="5亿美元融资恐无法完成  法拉第未来该何去何从？ " width="250" height="165"/> 
									</a>
								</dt>
								<dd>
									<h3>
										<span class="dj">原创</span>
										<a href="" target="_blank" title="5亿美元融资恐无法完成  法拉第未来该何去何从？ ">5亿美元融资恐无法完成 法拉第未来该何去何从？ </a>
									</h3>
									<p>据外媒报道，曾经号称要超越特斯拉的贾跃亭面临着一个新障碍，据知情人士透露，他的美国电动汽车初创公司可能无法完成5亿美元的最新一轮融资。知情人士称，如果法拉第无法在12月之前完成A轮融资，就需要立...</p>
									<p>李晓荆 / 原创 / 2017-11-28 16:57</p>
								</dd>
							</dl>
						</div>
					</div>
					<div class="hlgd-page page-nav">
						<ul class='paginationall'>
							<a href="javascript:void(0);" class="prev disable">&lt;</a><a href="javascript:void(0);" class="current">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">... 50</a><a href="" class="next">&gt;</a> 
						</ul>
					</div>
				</div>
			</div>
			<div class="home_right" style="float: right;">
				<div class="hrtpic">
					<div class="view third-effect"> 
						<img src="/static/home/1.jpg"  width="350" height="230"/>
						<div class="mask">
							<div class="imgshow">
								<a href="" class="info" target="_blank">刘强东称时尚业务是京东必赢之战</a> 
							</div>
						</div>
					</div>
				</div>
				<div class="hrsaomiao">
					<dl>
						<dt>
							<img src="/static/home/1.jpg" width="115" height="115" border="0">
						</dt>
						<dd>
							<div class="hrwxtitle">微信扫一扫，关注我们</div>
							<div class="hrwxcontent"> 
								<a href="#wb" class="trwbico"></a> 
								<a href="#qqwb" class="trqqwbico"></a> 
								<a href="#wx" class="trwxico"></a> 
							</div>
						</dd>
					</dl>
				</div>
				<div class="hrrmht">
					<div class="hrrmht-title">
						<div class="hrrmhtttxt">热门话题</div><hr>
					</div>
					<div class="hrrmht-content">
						<ul>
							<li><a href="" class="btn">微信</a></li>
							<li><a href="" class="btn">百度</a></li>
							<li><a href="" class="btn">小米</a></li>
							<li><a href="" class="btn">O2O</a></li>
							<li><a href="" class="btn">腾讯</a></li>
							<li><a href="" class="btn">P2P</a></li>
							<li><a href="" class="btn">手机</a></li>
							<li><a href="" class="btn">金融</a></li>
							<li><a href="" class="btn">社交</a></li>
							<li><a href="" class="btn">阿里</a></li>
							<li><a href="" class="btn">马云</a></li>
							<li><a href="" class="btn">周鸿祎</a></li>
							<li><a href="vr/index.htm" class="btn">VR</a></li>
							<li><a href="" class="btn">华为</a></li>
							<li><a href="" class="btn">王石</a></li>
							<li><a href="" class="btn">扎克伯格</a></li>
						</ul>
					</div>
				</div>
				<div class="hrrwbd">
					<div class="hrrwbd-title">
						<div class="hrrwbdttxt">热文榜单</div><hr>
					</div>
					<div class="hrrwbd-content">
						<ul>
							<li class="rwbd-1">
								<a href="" target="_blank" title="融360股价重挫10.81% 市值蒸发19亿人民币">融360股价重挫10.81% 市值蒸发19亿人民币</a>
							</li>
							<li class="rwbd-1">
								<a href="" target="_blank" title="融360股价重挫10.81% 市值蒸发19亿人民币">融360股价重挫10.81% 市值蒸发19亿人民币</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="hrtjzz">
					<div class="hrtjzz-title">
						<div class="hrtjzztxt">推荐作者</div><hr>
					</div>
					<div class="hrtjzz-content">
						<div class="tjzz-box">
							<dl>
								<dt>
									<a href="" target="_blank" title="俞永福">
										<img src="/static/home/1.jpg" class="thumb" alt="" width="73" height="73" />
									</a>
								</dt>
								<dd>
									<h3><a href="" target="_blank" title="俞永福">俞永福</a></h3>
									<p><a href="" target="_blank" title="俞永福">阿里UC移动事业群总裁</a></p>
								</dd>
							</dl>
						</div>
						<div class="tjzz-box">
							<dl>
								<dt>
									<a href="" target="_blank" title="俞永福">
										<img src="/static/home/1.jpg" class="thumb" alt="" width="73" height="73" />
									</a>
								</dt>
								<dd>
									<h3><a href="" target="_blank" title="俞永福">俞永福</a></h3>
									<p><a href="" target="_blank" title="俞永福">阿里UC移动事业群总裁</a></p>
								</dd>
							</dl>
						</div>
					</div>
					<div class="frad2">
						<a href="" target="_blank">
							<img src="/static/home/1.jpg" alt="" width="300" height="90" />
						</a>
					</div>
				</div>
				<div class="hrrwbd">
					<div class="hrrwbd-title">
						<div class="hrrwbdttxt">最新快报</div><hr>
					</div>
					<div class="hrrwbd-content">
						<ul>
							<li class="rwbd-1">
								<a href=""  target="_blank" title="酷狗发力音效功能版图初显，互联网音乐的下一个蓝海？">酷狗发力音效功能版图初显，互联网音乐的下一个蓝海？</a>
							</li>
							<li class="rwbd-1">
								<a href=""  target="_blank" title="酷狗发力音效功能版图初显，互联网音乐的下一个蓝海？">酷狗发力音效功能版图初显，互联网音乐的下一个蓝海？</a>
							</li>
						</ul>
					</div>
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
