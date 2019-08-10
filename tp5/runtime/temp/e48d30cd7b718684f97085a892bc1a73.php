<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\htdocs\tp5\public/../application/admin\view\login\index.html";i:1547822844;}*/ ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/static/public/bs/css/bootstrap.min.css">
    <script src="/static/public/bs/js/jquery.min.js"></script>
    <script src="/static/public/bs/js/bootstrap.min.js"></script>
    <title>后台登录</title>
    <link href="/static/admin/css/style.css" rel="stylesheet" type="text/css">
    <style>
        .btn {
            width: 40px;
            font-size: 10px;
            padding-left: 8px;
        }

    </style>
</head>

<body>
    <div id="web">
        <p style="height:180px;"></p>
        <p align="center"><img src="/static/admin/img/logzi.png"></p>
        <p style="height:40px;"></p>
        <div class="login">
            <div class="banner">
                <iframe id="frame_banner" src="/static/admin/img/11.jpg" height="218" width="100%" allowtransparency="true" title="test" scrolling="no" frameborder="0"></iframe>
            </div>
            <div class="logmain">
                <form action="" method="post">
                    <h2>&nbsp;</h2>
                    <div class="logdv">
                        <span class="logzi">账 号：</span>
                        <input name="username" type="text" id="textarea" class="ipt" placeholder="请输入账号">
                    </div>
                    <div class="logdv">
                        <span class="logzi">密 码：</span>
                        <input name="password" type="password" id="textarea" class="ipt" placeholder="请输入密码">
                    </div>
                    <div class="logdv">
                      <span class="logzi">验证码：</span>
                      <img id="captcha_img" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="refreshVerify()"/><a href="javascript:refreshVerify()">点击刷新</a>
                     <input name="code" type="text" id="textarea" class="ipt" placeholder="请输入验证码" style="margin-top:8px;">
                    <span class="logzi"></span>
                        </div>
                        <div class="logdv" style="height:40px;margin-top:50px">
                            <p class="logzi">&nbsp;</p>
                            <button type="submit" class="btn btn-default">登录</button>
                            <button type="reset" class="btn btn-default">重置</button>

                        </div>
                </form>
                </div>
            </div>
            <p style="height:100px;"></p>
            <p align="center">技术支持:WJCHumble</p>
        </div>


</body>
<script type="text/javascript">
  function refreshVerify(){
    var ts = Date.parse(new Date());
    $('#captcha_img').attr('src', '/captcha?id='+ts);
  }
</script>
</html>
