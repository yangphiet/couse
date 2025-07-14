<?php
include "model/pdo.php";
include "model/taikhoan.php";
include "model/danhmuc.php";
include "model/khoahoc.php";
include "model/binhluan.php";
include "model/bill.php";
session_start();

include "views/header.php";


// $course_id = $_REQUEST['course_id'];   
// $listbl = hien_thi_bl($course_id);
$khnew = kh_selectAll_view();
$listbl = hien_thi_binh_luan();
$userId = selectAll_userid();


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

        case 'login':
            $isRegistrationSuccess = false;
            // Xử lý khi form được submit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["login"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $login_role = isset($_POST["role"]) ? $_POST["role"] : "user";

                    if ($login_role === "teacher") {
                        $teacher = check_teacher($username, $password);
                        if ($teacher && $teacher["role"] === "teacher") {
                            $_SESSION["logged_in"] = true;
                            $_SESSION["full_name"] = $teacher["full_name"];
                            $_SESSION["email"] = $teacher["email"];
                            $_SESSION["user_id"] = $teacher["teacher_id"];
                            $_SESSION["username"] = $teacher["username"];
                            $_SESSION["role"] = $teacher["role"];
                            header("Location: GV/index.php");
                            exit();
                        } else {
                            $error_message = "Sai tài khoản hoặc mật khẩu giáo viên!";
                        }
                    } else {
                        $user = check_user($username, $password, $login_role);
                        if ($user && ($user["role"] === "user" || $user["role"] === "admin")) {
                            $_SESSION["logged_in"] = true;
                            $_SESSION["full_name"] = $user["full_name"];
                            $_SESSION["email"] = $user["email"];
                            $_SESSION["user_id"] = $user["user_id"];
                            $_SESSION["username"] = $user["username"];
                            $_SESSION["role"] = $user["role"];
                            if ($_SESSION["role"] === "admin") {
                                header("Location: admin/index.php");
                            } else {
                                header("Location: index.php");
                            }
                            exit();
                        } else {
                            $error_message = "Sai tài khoản hoặc mật khẩu học viên!";
                        }
                    }
                } elseif (isset($_POST["register"])) {
                    $email = $_POST["email"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $full_name = $_POST["full_name"];
                    $register_role = isset($_POST["register_role"]) ? $_POST["register_role"] : "user";

                    // Kiểm tra tính hợp lệ của dữ liệu đăng ký
                    if (empty($username) || empty($email) ||  empty($password) ||  empty($full_name)) {
                        $error_message = "Nhập đầy đủ các dữ liệu để đăng kí";
                    } else {
                        if (kiem_tra_ton_tai($username, $email)) {
                            $error_message = "Tên hoặc gmail đã được đăng kí";
                        } else {
                            them_khach_hang($username, $full_name, $password, $email, $register_role);
                            if($isRegistrationSuccess = true) {
                                echo '<script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    alert("Đăng ký thành công! Bây giờ bạn có thể đăng nhập.");
                                    window.location.href = "index.php?act=login";
                                });
                                </script>';
                            }
                        }
                    }
                }
            }
            include "views/login.php";
            break;

        case 'forgot_password':

            // $isRegistrationSuccess = false; 

            if (isset($_POST['forgot_password'])) {
                $email = $_POST["email"];

                $check_email = check_email($email);

                if (is_array($check_email)) {
                    $error_message = "Mật khẩu của bạn là: " . $check_email['password'];
                    // header('location: index.php');
                 
                } else {
                    $error_message = "Email không tồn tại";
                  
                }
            } 
            include "views/forgot_password.php";
            break;



        case 'listkh_view':
            if (isset($_POST['listloc']) && $_POST['listloc']) {
                $key = $_POST['key'];
                $category = $_POST['danhmuc'];
            } else {
                $key = '';
                $category = 0;
            }
            $view =  search_selectAll_view($key, $category);
            $danhmuc = danhmuc_selectAll();
            include "views/khoahoc.php";
            break;
        case 'addpayment':
            if (isset($_POST['submit_pay']) && $_POST['submit_pay']) {



                add_course($ten_kh, $mo_ta, $hinh, $giangvien, $don_gia, $danhmuc, $buoihoc, $thoigian, $intro, $time_start, $classname, $time_end);
                $thongbao = "Thêm thành công";
            }

            include "khoahoc/add.php";
            break;
        case 'course':
            include "views/khoahoc.php";
            break;
        case 'detail':
            include "views/detail.php";
            break;
        case 'home':
            include "views/home.php";
            break;
        case "catnhattk":
            include "views/updatetk.php";
            break;
        case 'updatetk':
            include "views/information.php";
            break;
        case 'pay':
            if (isset($_GET['course_id']) && ($_GET['course_id'] > 0)) {
                $course_id = $_GET['course_id'];
                $price = $_POST['price'];
                $khnew =   get_course_details($course_id);
            }
            include "views/pay.php";
            break;
        case 'bill':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userid = $_POST['user_id'];
                $fullname = $_POST['full_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $coursename = $_POST['course_name'];
                $price = $_POST['course_price'];
                $instructor = $_POST['instructor'];
                $classname = $_POST['classname'];
                $thoigian = $_POST['thoigian'];
                $time_start = $_POST['time_start'];
                $time_end = $_POST['time_end'];
                $course_id = isset($_POST['course_id']) ? $_POST['course_id'] : null;
                $pttt = isset($_POST['pttt']) ? $_POST['pttt'] : '';
                $trangthai = 'Đã thanh toán';
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp =  date('Y-m-d H:i:s');
                addbill($userid, $fullname, $email, $phone, $coursename, $price, $pttt, $instructor, $classname, $thoigian, $time_start, $time_end, $timestamp, $trangthai, $course_id);
                // Redirect để tránh submit lại khi reload
                header('Location: index.php?act=khdadangki&success=1');
                exit();
            }
            include "views/bill.php";
            break;
        case 'lienhe':
            include "views/lienhe.php";
            break;
        case 'trungtam':
            include "views/khdadangki.php";
            break;
        case 'invoice':
            if (isset($_POST['redirect']) && $_POST['redirect'] || isset($_POST['redirect-2']) && $_POST['redirect-2']) {
                $userid = $_POST['user_id'];
                $fullname = $_POST['full_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $coursename = $_POST['course_name'];
                $price = $_POST['course_price'];
                if (isset($_POST['redirect-2']) && isset($_POST['trangthai-2'])) {
                    $pttt = $_POST['redirect-2'];
                    $trangthai = $_POST['trangthai-2'];
                } else {
                    $pttt = $_POST['redirect'];
                    $trangthai = $_POST['trangthai'];
                }

                $instructor = $_POST['instructor'];
                $thoigian = $_POST['thoigian'];
                $classname = $_POST['classname'];
                $time_start = $_POST['time_start'];
                $time_end = $_POST['time_end'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp =  date("Y-m-d H:i:s");
                // Bổ sung tham số $course_id cho đúng định nghĩa hàm addbill
                $course_id = isset($_POST['course_id']) ? $_POST['course_id'] : null;
                addbill($userid, $fullname, $email, $phone, $coursename, $price, $pttt, $instructor, $classname, $thoigian, $time_start, $time_end, $timestamp, $trangthai, $course_id);

                $thongbao = "Thêm thành công";
            }

            include "views/invoice.php";
            break;
        case 'khdadangki':

            if (isset($_SESSION['username'])) {
                // Lấy user_id từ username
                $sql = "SELECT user_id FROM users WHERE username = ?";
                $userData = pdo_query_one($sql, $_SESSION['username']);
                if ($userData) {
                    $userId = $userData['user_id'];
                    // Lấy danh sách khóa học đã đăng ký, đảm bảo có course_id
                    $courses_dki = get_courses_dki($userId);
                } else {
                    echo "Không tìm thấy user_id cho username: " . $_SESSION['username'];
                    $courses_dki = [];
                }
            } else {
                echo "Session 'username' không tồn tại.";
                $courses_dki = [];
            }
            // Đảm bảo truyền $courses_dki sang view
            include "views/khdadangki.php";
            break;

        default:
            include "views/home.php";
            break;
    }
} else {
    include "views/home.php";
}

include "views/fotter.php";
