
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/admin.css">
	<link rel="stylesheet" href="../css/contentadmin.css">

	<title>GIẢNG VIÊN SOLVIA</title>


</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
<a href="#" class="brand" style="
    display: flex;
    align-items: center;
    padding: 10px 20px;
    text-decoration: none;
    background-color: #f9f9f9;
    border-radius: 8px;
    margin: 0 auto;
    width: fit-content;
">
    <img src="../img/favicon.png" alt="Logo" style="
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin-right: 12px;
    ">
    <span class="text" style="
        font-weight: bold;
        font-size: 20px;
        color: #333;
        display: inline-block;
    ">SOLVIA</span>
</a>

		
		<ul class="side-menu top">
		<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'home') ? 'active' : ''; ?>">
				<a href="index.php?act=home">
					<i class='bx bxs-home' ></i>
					<span class="text">TRANG CHỦ</span>
				</a>
			</li>


			<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'addkh') ? 'active' : ''; ?>">
				<a href="index.php?act=addkh">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">KHOÁ HỌC</span>
				</a>
			</li>
			<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'thongke') ? 'active' : ''; ?>">
				<a href="index.php?act=thongke">
					<i class='bx bxs-group' ></i>
					<span class="text">THỐNG KÊ</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li > 
				<a href="http://localhost/online%20course/index.php?act=login">
					<i class='bx bxs-cog' ></i>
					<span class="text">BACK</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Đăng xuất</span>
				</a>
			</li>
		</ul>
	</section>
	<script src="./js/script.js"></script>
	<!-- SIDEBAR -->
