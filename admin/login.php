<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Quản trị</title>
    <link rel="stylesheet" href="../css/admin-login.css">
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="post" class="login-form">
            <h2>Đăng nhập Quản trị</h2>
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit" name="admin_login">Đăng nhập</button>
            <?php if(isset($error_message)) echo '<p style="color:red">'.$error_message.'</p>'; ?>
        </form>
    </div>
</body>
</html>
<?php
// Xử lý đăng nhập admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["admin_login"])) {
    include_once "../model/pdo.php";
    include_once "../model/taikhoan.php";
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $admin = check_user($username, $password, "admin");
    if ($admin && $admin["role"] === "admin") {
        $_SESSION["logged_in"] = true;
        $_SESSION["full_name"] = $admin["full_name"];
        $_SESSION["email"] = $admin["email"];
        $_SESSION["user_id"] = $admin["user_id"];
        $_SESSION["username"] = $admin["username"];
        $_SESSION["role"] = $admin["role"];
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Sai tài khoản hoặc mật khẩu quản trị!";
    }
}
?>
