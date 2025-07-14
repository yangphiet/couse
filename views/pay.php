<?php



// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    // Lấy thông tin người dùng từ phiên làm việc
    $username = $_SESSION["username"];
    $userid = $_SESSION["user_id"];

    $username = $_SESSION["full_name"];

    // Lấy thêm thông tin khác nếu cần

}
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    // Xử lý nếu thông tin email không tồn tại
    echo "Không có thông tin email.";
    exit();
}
 // Lấy giá và tên khóa học từ POST
$coursename = isset($_POST['course_name']) ? htmlspecialchars($_POST['course_name']) : '';
$instructor = isset($_POST['instructor']) ? htmlspecialchars($_POST['instructor']) : '';
$thoigian = isset($_POST['thoigian']) ? htmlspecialchars($_POST['thoigian']) : '';
$classname = isset($_POST['classname']) ? htmlspecialchars($_POST['classname']) : '';
$time_start = isset($_POST['time_start']) ? htmlspecialchars($_POST['time_start']) : '';  
$time_end = isset($_POST['time_end']) ? htmlspecialchars($_POST['time_end']) : '';  // Thay bằng biến thời gian thực tế từ khóa học
// Thay bằng biến thời gian thực tế từ khóa học

// Chuyển đổi thời gian thành chuỗi hiển thị hoặc định dạng mong muốn
// $time_start = date('Y-m-d H:i:s', strtotime($courseTime));


$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
?>


<section class="breadcrumb-area">
    <div class="container5">
        <h2>Thông tin thanh toán</h2>
        <form action="index.php?act=bill" method="post">
            <label for="full_name">Tên học viên</label>
            <input type="text" name="full_name" value="<?= $username ?>" readonly> <br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $email ?>" readonly><br>

            <label for="sdt">Số điện thoại</label>
            <input type="number" name="phone" required><br>
            <!-- Địa chỉ -->
            <input type="hidden" name="instructor" value="<?= $instructor ?>" readonly>
            <input type="hidden" name="classname" value="<?= $classname ?>" readonly>
            <input type="hidden" name="thoigian" value="<?= $thoigian ?>" readonly>
            <input type="hidden" name="time_start" value="<?= $time_start ?>" readonly>
            <input type="hidden" name="user_id" value="<?= $userid ?>" readonly>
            <input type="hidden" name="course_id" value="<?= isset($_POST['course_id']) ? (int)$_POST['course_id'] : (isset($_GET['course_id']) ? (int)$_GET['course_id'] : '') ?>">
            <input type="hidden" name="time_end" value="<?= $time_end ?>" readonly>
            <!-- Thông tin khóa học -->
            <label for="course_name">Tên khóa học:</label>
            <input type="text" name="course_name" value="<?= $coursename ?>" readonly>

            <label for="course_price">Giá khóa học:</label>
            <input type="text" name="course_price" value="<?= $price ?>" readonly>

           
            
            <input type="submit" class="submit_pay" value="Submit">
        </form>
    </div>
</section>