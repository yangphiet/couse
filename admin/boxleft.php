
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

	<title>ADMIN SOLVIA💕</title>


</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">SOLVIA</span>
		</a>
		
		<ul class="side-menu top">
		<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'home') ? 'active' : ''; ?>">
				<a href="index.php?act=home">
					<i class='bx bxs-home' ></i>
					<span class="text">TRANG CHỦ</span>
				</a>
			</li>

			<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'adddm') ? 'active' : ''; ?>">
				<a href="index.php?act=adddm">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">DANH MỤC</span>
				</a>
			</li>
			
			<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'addkh') ? 'active' : ''; ?>">
				<a href="index.php?act=addkh">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">KHOÁ HỌC</span>
				</a>
			</li>
			<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'dsbl') ? 'active' : ''; ?>">
				<a href="index.php?act=dsbl">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">BÌNH LUẬN</span>
				</a>
			</li>
			</li><li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'khoahocdki') ? 'active' : ''; ?>">
				<a href="index.php?act=khoahocdki">
					<i class='bx bxs-group' ></i>
					<span class="text">HOÁ ĐƠN</span>
				</a>
			</li>
			<li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'dstk') ? 'active' : ''; ?>">
				<a href="index.php?act=dstk">
					<i class='bx bxs-group' ></i>
					<span class="text">THÀNH VIÊN</span>
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
				<a href="http://localhost:3000/index.php">
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
