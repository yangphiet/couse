
<?php
// ... (Các hàm và mã nguồn khác)

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_info = hien_thi_mot_khach_hang($user_id);
} else {
    header("Location: index.php");
    exit();
}

// Xử lý cập nhật thông tin tài khoản
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_account"])) {
    $ma_kh = $user_id;
    $ho_ten = $_POST["full_name"];
    $email = $_POST["email"];
    $username = $user_info['username'];
    $current_password = $_POST["password"]; // Thêm trường mật khẩu hiện tại
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Kiểm tra mật khẩu hiện tại có khớp hay không
    if (!kiem_tra_mat_khau_hien_tai($ma_kh, $current_password)) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                alert("Mật khẩu hiện tại không chính xác!");
                window.location.href = "index.php?act=catnhattk";
            });
        </script>';
        exit();
    }

    // Validate form
    if ($new_password !== $confirm_password) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                alert("Mật khẩu mới và xác nhận mật khẩu mới không khớp!");
                window.location.href = "index.php?act=catnhattk";
            });
        </script>';
        exit();
    }

    // Tiếp tục xử lý khi validate thành công
    sua_khach_hang($ma_kh, $new_password, $ho_ten, $email, $username, $new_password);

    // Redirect hoặc thông báo cập nhật thành công
    echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                alert("Cập nhật thông tin tài khoản thành công!");
                window.location.href = "index.php?act=updatetk";
            });
          </script>';
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Tài Khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
          
            margin: 0;
            padding: 0;
        }

        .container2 {
            max-width: 800px;
            margin: 150px auto;
            background: #f2f2f2;
            padding: 45px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        button:hover {
            background-color: #45a049;
        }

        .link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .link a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/testimonial/test-bg.png)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2> SỬA THÔNG TIN TÀI KHOẢN</h2>
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">
                                    <a href="index.php?act=lienhe">Liên Hệ</a>
                                    
                                       
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="container2">
    <form method="post" action="index.php?act=catnhattk">
            <h3>Thông tin tài khoản:</h3>
            
            <label for="full_name">Họ Tên:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo $user_info['full_name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user_info['email']; ?>"  readonly >
            <label for="password">Mật Khẩu Cũ:</label>
            <input type="password" id="password" name="password" required>

            <label for="password">Mật Khẩu Mới:</label>
            <input type="password" id="password" name="new_password" required>

            <label for="confirm_password">Nhập Lại Mật Khẩu Mới:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit" name="update_account">Cập Nhật</button>
        </form>
    </div>
    
</body>
</html>
