<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if (isset($title)) {
    echo $title;
} else {
    echo "Website quản lý văn bản hành chính khoa CNTT";
}?></title>
    <meta name="description" content="<?php if (isset($description)) {
    echo $description;
} else {
    echo "Website quản lý văn bản hành chính khoa CNTT";
}?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once('style.php'); ?>
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo $config->domain;?>"> Đồ án CNTT 2</a>
                <a class="navbar-brand hidden" href="<?php echo $config->domain;?>">IT</a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo $config->domain;?>"><i class="menu-icon fa fa-home"></i>Trang chủ </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo $config->domain;?>/category/"><i class="menu-icon fa fa-list-ul"></i> Thể Loại</a>
                    <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Văn bản</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus-square"></i><a href="<?php echo $config->domain; ?>/post">Đăng văn bản</a></li>
                            <li><i class="menu-icon fa fa-wrench"></i><a href="<?php echo $config->domain; ?>/edit">Sửa văn bản</a></li>
                            <li><i class="menu-icon fa fa-trash-o"></i><a href="<?php echo $config->domain; ?>/recyclebin">Thùng rác</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="<?php echo $config->domain;?>/contact"> <i class="menu-icon fa fa-users"></i>Liên Hệ</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /Left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                    <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo $config->domain; ?>/public/images/dui-2.png" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(-108px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="nav-link" href="<?php echo $config->domain; ?>/profile"><i class="fa fa-user"></i> Trang cá nhân</a>
                            <a class="nav-link" href="<?php echo $config->domain; ?>/logout"><i class="fa fa-power-off"></i> Đăng xuất</a>
                        </div>
                    <?php
                        } else {
                            ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo $config->domain; ?>/public/images/guest.jpg" alt="Guest">
                        </a>
                        <div class="user-menu dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(-108px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="nav-link" href="<?php echo $config->domain; ?>/login"><i class="fa fa-user"></i> Đăng nhập</a>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
