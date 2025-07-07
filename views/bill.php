<?php
// process_payment.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $userid = $_POST['user_id'];
    $fullname = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $thoigian = $_POST['thoigian'];
    $coursename = $_POST['course_name'];
    $price = $_POST['course_price'];
    $instructor = $_POST['instructor'];
    $classname = $_POST['classname'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];

    // ... Các thông tin khác

    // Gửi thông tin đến cổng thanh toán (nếu có)
    // Xác nhận thanh toán và cập nhật trạng thái trong cơ sở dữ liệu

    // Ví dụ: In ra thông báo thành công sau khi thanh toán

} else {
    // Xử lý nếu không có dữ liệu POST được gửi đến trang này
    echo "Invalid access!";
    exit();
}

?>

<section class="breadcrumb-area">
    <div class="container5">
        <!-- Hiển thị thông tin xác nhận -->
        <h2>Xác nhận thông tin thanh toán:</h2>
        <p><strong>Họ và tên:</strong> <?php echo $fullname; ?></p>
        <p><strong>Tên khóa học:</strong> <?php echo $coursename; ?></p>
        <p><strong>Giá khóa học:</strong> <?php echo number_format($price, 2); ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo $phone; ?></p>



        <!-- Nút để xác nhận thanh toán -->
        <form action="index.php?act=invoice" method="post">
            <input type="hidden" name="user_id" value="<?php echo $userid; ?> ">
            <input type="hidden" name="full_name" value="<?php echo $fullname; ?> ">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <input type="hidden" name="thoigian" value="<?php echo $thoigian; ?>">
            <input type="hidden" name="course_name" value="<?php echo $coursename; ?>">
            <input type="hidden" name="course_price" value="<?php echo $price; ?>">
            <input type="hidden" name="instructor" value="<?= $instructor ?>">
            <input type="hidden" name="classname" value="<?= $classname ?>">
            <input type="hidden" name="time_start" value="<?= $time_start ?>">
            <input type="hidden" name="time_end" value="<?= $time_end ?>">

            <label for="shipping_method">Phương Thức Thanh Toán:</label>
            <!-- <select name="pttt" required>
                <option value="Thanh toán tại Trung Tâm">Thanh toán tại Trung Tâm</option>
            </select> -->
            <input type="submit" class="mt-4" name="redirect" value="Thanh toán Ví VNPAY">
           <a href="index.php?act=invoice"> <input type="submit" class="mt-4" name="redirect-2" value="Thanh toán tại Trung tâm"></a>
           <input type="hidden" class="mt-4" name="trangthai" value="Đã thanh toán">
           <input type="hidden" class="mt-4" name="trangthai-2" value="Chưa thanh toán">
            <!-- <input type="submit" class="mt-4" name="submit_pay" value="Xác nhận thanh toán"> -->
        </form>
    </div>
</section>