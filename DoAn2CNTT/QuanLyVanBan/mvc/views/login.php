<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <?php require_once('pages/style.php');?>
</head>
<body class="kbg">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1>
                        <a href="<?php echo $config->domain;?>/home">ĐĂNG NHẬP</a>
                    </h1>
                </div>
                <div class="login-form">
                    <form method="post" action="<?php echo $config->domain;?>/login">
                        <?php if ($data=="fail") {
    echo '<div class="form-group"><div class="alert alert-danger">Sai tài khoản hoặc mật khẩu</div></div>';
}?>
                        <div class="form-group">
                            <label for="user">Tên đăng nhập</label>
                            <input type="text" id="user" required="required" class="form-control" placeholder="Tên đăng nhập" name="user">
                        </div>
                            <div class="form-group">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" required="required" id="pass" class="form-control" placeholder="Mật khẩu" name="pass">
                        </div>
                        <input type="hidden" value="<?php echo $_SERVER['HTTP_REFERER'];?>" name="url">
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
