<?php 

// function hien_thi_bill($course_id) {
//     $sql = "
//         SELECT
//             c.*,
//             en.user_id,
//             u.username,
//             u.email
//         FROM
//             courses c
//         JOIN enrollments en ON c.course_id = en.course_id
//         JOIN users u ON en.user_id = u.user_id
//         WHERE
//             c.course_id = ?;
//     ";

//     // Sử dụng PDO để thực hiện truy vấn
//     return pdo_query_one($sql, $course_id);
// }
// function createInvoice($full_name, $email, $phone, $address, $course_name, $course_price) {
//     // Tạo hóa đơn - bạn có thể thêm các thông tin khác cần thiết
//     $invoice = array(
//         'full_name' => $full_name,
//         'email' => $email,
//         'phone' => $phone,
//         'email' => $email,
//         'address' => $address,
//         'course_name' => $course_name,
//         'course_price' => $course_price,
//         'created_at' => date('Y-m-d H:i:s'),
//     );

//     return $invoice;
// }
function addbill($user_id, $full_name, $email, $phone, $course_name, $course_price, $pttt, $instructor, $classname, $thoigian, $time_start, $time_end, $timestamp, $trangthai, $course_id) {
    $sql = "INSERT INTO bills(user_id, full_name, email, phone, course_name, course_price, pttt, instructor, classname, thoigian, time_start, time_end, timestamp, trangthai, course_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $user_id, $full_name, $email, $phone, $course_name, $course_price, $pttt, $instructor, $classname, $thoigian, $time_start, $time_end, $timestamp, $trangthai, $course_id);
}

function updatetrangthai( $newStatus ,$billId) {
    try {
        // Gọi hàm kết nối cơ sở dữ liệu
        $conn = pdo_get_connection();

        // Câu truy vấn cập nhật trạng thái sản phẩm
        $sql = "UPDATE bills SET trangthai = ? WHERE bill_id = ? ";

        // Thực thi truy vấn
        pdo_execute($sql, $newStatus, $billId);

        // Đóng kết nối cơ sở dữ liệu
        unset($conn);

        // Trả về true nếu cập nhật thành công
        return true;
    } catch (PDOException $e) {
        // Xử lý lỗi và in thông báo
        echo "Lỗi cập nhật trạng thái sản phẩm: " . $e->getMessage();

        // Trả về false nếu có lỗi
        return false;
    }
}


?>