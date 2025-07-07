<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php?act=login");
    exit();
}
?>
 <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">

<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Học ngoại ngữ không khó</a>
		
			
		</nav>
  
		<!-- NAVBAR -->
	
  