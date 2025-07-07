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
        form {
    max-width: 600px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}



p {
    margin: 10px 0;
    line-height: 1.5;
    
}

strong {
    font-weight: bold;
}

a.link {
    display: block;
    margin-top: 20px;
    text-align: center;
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
    border: 2px solid #4CAF50;
    padding: 10px;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

a.link:hover {
    background-color: #4CAF50;
    color: #fff;
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
                        <h2>THÔNG TIN TÀI KHOẢN</h2>
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
        <form>
            <h3>Thông tin tài khoản:</h3>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                $user_id = $_SESSION["user_id"];
                $user_info = hien_thi_mot_khach_hang($user_id);
                echo "<p><strong>Họ tên:</strong> " . $user_info['full_name'] . "</p>";
                echo "<p><strong>Email:</strong> " . $user_info['email'] . "</p>";
                echo "<p><strong>Tên đăng nhập:</strong> " . $user_info['username'] . "</p>";
                
                echo "<a href='index.php?act=khdadangki' class='link'>Xem khóa học đã đăng ký</a>";
                echo "<a href='index.php?act=catnhattk' class='link'>Cập nhật thông tin tài khoản</a>";
                
            } else {
               
            }
            ?>
        </form>
    </div>

</body>
</html>
