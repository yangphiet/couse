<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    session_unset();
    session_destroy();
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Solvia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="font-flaticon/flaticon.css">
    <link rel="stylesheet" href="css/dripicons.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/stylelogin.css">
     <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
</head>

<body>
    <!-- header -->
    <header class="header-area header-three">
        <div id="header-sticky" class="menu-area">
            <div class="container">
                <div class="second-menu">
                    <div class="row align-items-center">

                        <div class="col-xl-2 col-lg-2" style="height: 120px;">
                            <div class="logo">
                                <a href="index.php?act=home"><img src="img/logo/logo.png" alt="logo"></a>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu text-right text-xl-right">
                                <nav id="mobile-menu" style="display: block;">
                                    <ul>
                                        <li><a href="index.php?act=home">Trang chủ</a></li>
                                        <li><a href="index.php?act=course">Khóa học</a></li>
                                        <li><a href="index.php?act=lienhe">Liên hệ</a></li>

                                        <?php if (isset($_SESSION['username'])): ?>
                                            <?php
                                                $role = $_SESSION["role"] ?? "";
                                                if ($role === "user") {
                                                    echo '<li><a href="index.php?act=khdadangki">Khóa học đã đăng ký</a></li>';
                                                } elseif ($role === "teacher") {
                                                    echo '<li><a href="GV/index.php">Trang giảng viên</a></li>';
                                                } elseif ($role === "admin") {
                                                    echo '<li><a href="http://localhost/duan1/admin/">Trang quản trị</a></li>';
                                                }
                                            ?>
                                            <li><a href="index.php?act=updatetk">Thông tin tài khoản</a></li>
                                            <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                                        <?php else: ?>
                                            <li><a href="index.php?act=login">Đăng nhập</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
