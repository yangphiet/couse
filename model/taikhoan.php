<?php

// Sửa khách hàng
function sua_khach_hang($ma_kh, $mat_khau, $ho_ten, $email, $username, $new_password)
{
    $sql = "UPDATE users SET password = ?, full_name = ?, email = ?, username = ? WHERE user_id = ?";

    // Kiểm tra nếu có mật khẩu mới thì cập nhật
    if (!empty($new_password)) {
        $sql = "UPDATE users SET password = ?, full_name = ?, email = ?, username = ? WHERE user_id = ?";
        pdo_execute($sql, $new_password, $ho_ten, $email, $username, $ma_kh);
    } else {
        // Nếu không có mật khẩu mới, cập nhật thông tin khác
        $sql = "UPDATE users SET full_name = ?, email = ?, username = ? WHERE user_id = ?";
        pdo_execute($sql, $ho_ten, $email, $username, $ma_kh);
    }
}
function check_teacher($username, $password) {
    $sql = "SELECT * FROM teachers WHERE username = ?";
    $teacher = pdo_query_one($sql, $username);

    if ($teacher && $teacher['password'] === $password) {
        return $teacher;
    }
    return false;
}

// Xóa khách hàng
function xoa_khach_hang($ma_kh)
{
    $sql = "DELETE FROM users WHERE user_id=?";
    pdo_execute($sql, $ma_kh);
}

// Quên mật khẩu
function check_email($email)
{
    $sql = "SELECT * FROM users WHERE email=?";
    return pdo_query_one($sql, $email);
}

// Hiển thị khách hàng
function hien_thi_khach_hang()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

// Hiển thị 1 khách hàng
function hien_thi_mot_khach_hang($ma_kh)
{
    $sql = "SELECT * FROM users WHERE user_id=?";
    return pdo_query_one($sql, $ma_kh);
}
function them_khach_hang($username, $full_name, $password, $email)
{
    $sql = "INSERT INTO users(password, full_name, username, email, role) VALUES (?, ?, ?, ?, ?)";

    pdo_execute($sql, $password, $full_name, $username, $email, 'user');
}

// Đăng nhập
function check_user($password, $username)
{
    $sql = "SELECT * FROM users WHERE password=? AND username=?";
    return pdo_query_one($sql, $password, $username);
}
function kiem_tra_ton_tai($username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    return pdo_query_one($sql, $username, $email);
}

function edit_taikhoan($role, $user_id)
{
    $sql = "UPDATE users SET role =? WHERE user_id= ?";
    pdo_execute($sql, $role, $user_id);
}
function kiem_tra_mat_khau_hien_tai($ma_kh, $password)
{
    $sql = "SELECT * FROM users WHERE user_id=? AND password=?";
    $user = pdo_query_one($sql, $ma_kh, $password);
    return !empty($user);
}

?>