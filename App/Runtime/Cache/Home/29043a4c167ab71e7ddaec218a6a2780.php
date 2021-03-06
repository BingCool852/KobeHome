<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>KobeHome</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/KobeHome/Public/Home/css/login.css" type="text/css">
    <script type="text/javascript" src="/KobeHome/Public/common/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/KobeHome/Public/common/common.js"></script>
    <script type="text/javascript" src="/KobeHome/Public/Home/js/login_box.js"></script>
    <script type="text/javascript" src="/KobeHome/Public/Home/js/login.js"></script>
    <script type="text/javascript" language="JavaScript">
    register_url = "<?php echo U('Login/checkRegisterUser');?>";
    login_url = "<?php echo U('Login/checkLoginUser');?>";
    pass_url = "<?php echo U('Login/checkLogin');?>";
    </script>
</head>
<div class="materialContainer">
    <div class="box">
        <div class="title">Login</div>
        <form action="<?php echo U('Login/login');?>" method="post" id="form1">
            <div class="input">
                <label for="name">用户名</label>
                <input type="text" name="username" id="name">
                <span class="spin"></span>
                <span style="display:none" id="login_usernotin">用户名不存在，清注册</span>
                <span style="display:none" id="login_usernull">用户名为空</span>
            </div>
            <div class="input">
                <label for="pass">密码</label>
                <input type="password" name="password" id="pass">
                <span class="spin"></span>
                <span style="display:none" id="password_error">密码错误</span>
                <span style="display:none" id="passnull">密码不能为空</span>
            </div>
            <div class="button login">
                <button id="login_btn"><span>登录</span><i class="fa fa-check"></i></button>
            </div>
        </form>
        <a href="#" class="pass-forgot">忘记密码</a>
    </div>
    <div class="overbox">
        <div class="material-button alt-2"><span class="shape"></span></div>
        <form action="<?php echo U('Login/register');?>" method="post" id="form2">
            <div class="title">注册新用户</div>
            <div class="input">
                <label for="regname">用户名</label>
                <input type="text" name="regname" id="regname">
                <span class="spin"></span>
                <span style="display:none" id="userin">用户名已存在</span>
                <span style="display:none" id="usernotin">用户名可用</span>
                <span style="display:none" id="usernull">用户名为空</span>
            </div>
            <div class="input">
                <label for="regpass">密码</label>
                <input type="password" name="regpass" id="regpass">
                <span class="spin"></span>
            </div>
            <div class="input">
                <label for="reregpass">确认密码</label>
                <input type="password" name="reregpass" id="reregpass">
                <span class="spin"></span>
                <span style="display:none" id="check_password">两次输入密码不一致</span>
            </div>
            <div class="button">
                <button><span>注册</span></button>
            </div>
        </form>
    </div>
</div>

<body>
</body>

</html>