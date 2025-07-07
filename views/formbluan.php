<?php
session_start();    
include "../model/pdo.php";
include "../model/binhluan.php";
$course_id = $_REQUEST['course_id'];   
$listbl = hien_thi_bl($course_id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bluan.css">
</head>
<body>
    <div class="mb">
        <div class="box_title">Bình luận</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                foreach ($listbl as $lbl) {
                    extract($lbl);
                    echo '<div class="comment">';
                    echo '<p class="author">' . $content . '</p>';
                    echo '<p class="timestamp">' . $timestamp . '</p>';
                    echo '</div>';
                }
                ?>
            </ul>
        </div>
    </div>
    <?php
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden" name="course_id" value="<?=$course_id?>">
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        <input class="comment-input" type="text" name="content" placeholder="Nội dung bình luận">
        <input class="comment-button" type="submit" name="guibinhluan" value="Gửi bình luận">
    </form>
    <?php
        if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
            $content = $_POST['content'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timestamp =  date("Y-m-d H:i:s");
            them_bl($user_id, $course_id,$content, $timestamp);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
            echo '<p style="color: red;">Vui lòng đăng nhập để thêm bình luận.</p>';
        }
    
    ?>
</body>
</html>
