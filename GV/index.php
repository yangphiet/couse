<?php

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/khoahoc.php";
include "../model/lesson.php";
include "../model/quiz.php";    

include "header.php";

if (!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || $_SESSION["role"] !== "teacher") {

    header("Location: ..\index.php");
    exit();
};

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {


           
            // khoá học
        case 'addkh':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $ten_kh = $_POST['ten_kh'];
                $mo_ta = $_POST['mo_ta'];
                $don_gia = $_POST['don_gia'];
                $danhmuc = $_POST['danhmuc'];
                $buoihoc = $_POST['buoi_hoc'];
                $teacher_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
                $thoigian = $_POST['thoigian'];
                $intro = $_POST['intro'];
                $time_start = $_POST['time_start'];
                $classname = $_POST['classname'];
                $time_end = $_POST['time_end'];
                $file = $_FILES['hinh'];
                $hinh = $file['name'];
                move_uploaded_file($file['tmp_name'], "./image/" . $hinh);

                add_course($ten_kh, $mo_ta, $hinh, $teacher_id, $don_gia, $danhmuc, $buoihoc, $thoigian, $intro, $time_start, $classname, $time_end);
                header("Location: index.php?act=addkh&success=1");
                exit();
            }
            $danhmuc = danhmuc_selectAll();
            $buoihoc = lesson_selectAll();
            $thongbao = (isset($_GET['success']) && $_GET['success'] == 1) ? 'Thêm thành công' : '';
            include "khoahoc/add.php";
            break;
        case 'listkh':
            if (isset($_POST['listloc']) && $_POST['listloc']) {
                $key = $_POST['key'];
                $category = $_POST['danhmuc'];
            } else {
                $key = '';
                $category = 0;
            }
            $teacher_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
            $listkh =  khoahoc_selectAll($key, $category, $teacher_id);
            $danhmuc = danhmuc_selectAll();
            include "khoahoc/list.php";
            break;


        case 'xoakh':
            if (isset($_GET['course_id']) && ($_GET['course_id'] > 0)) {
                $course_id  = $_GET['course_id'];
                delete_kh($course_id);
            }
            $listkh = khoahoc_selectAll("", 0);
            include "khoahoc/list.php";
            break;
        case 'suakh':
            if (isset($_GET['course_id']) && ($_GET['course_id'] > 0)) {
                $course_id = $_GET['course_id'];
                $kh =  select_kh_one($course_id);
            }
            $danhmuc = danhmuc_selectAll();
            $buoihoc = lesson_selectAll();
            $listkh = khoahoc_selectAll("", 0);

            include "khoahoc/update.php";
            break;
        case 'updatekh':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $course_name = $_POST['course_name'];
                $course_id = $_POST['course_id'];
                $price = $_POST['don_gia'];
                $description = $_POST['mo_ta'];
                $category_id = $_POST['category'];
                $instructor = $_POST['giangvien'];
                $lesson_id = $_POST['lesson'];
                $thoigian = $_POST['thoigian'];
                $intro = $_POST['intro'];
                $time_start = $_POST['time_start'];
                $classname = $_POST['classname'];
                $time_end = $_POST['time_end'];
                $file = $_FILES['hinh'];
                if ($file['size'] > 0) {
                    $hinh = $file['name'];
                    move_uploaded_file($file['tmp_name'], "./image/" . $hinh);
                } else {
                    // Nếu không có tệp tải lên, giữ nguyên ảnh cũ bằng cách lấy giá trị từ trường ẩn
                    $hinh = $_POST['old_image'];
                }
                // them_hang_hoa($ten_hh, $don_gia, $hinh,  $mo_ta,  $ma_loai);
                cap_nhat_kh($course_name, $description, $hinh, $instructor,  $price, $category_id, $lesson_id, $thoigian, $intro, $time_start, $classname, $time_end, $course_id);

                $thongbao = "cập nhật thành công";
            }

            $listkh = khoahoc_selectAll("", 0);
            include "khoahoc/list.php";
            break;

          
            // Thống kê
        case 'thongke':
            $listsp = load_thong_ke();
            include "thongke/thongke.php";
            break;
        case 'bieudo':
            $listsp = load_thong_ke();
            include "thongke/bieudo.php";
            break;
           

        // Thêm bài học
       // === Quản lý bài học ===
case 'addlesson':
    if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $course_id = (int)$_POST['course_id'];
        $lesson_name = $_POST['lesson_name'];
        $video_url = $_POST['video_url'];
        $content = $_POST['content'];
        $teacher_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;

        add_lesson($lesson_name, $video_url, $content, $course_id, $teacher_id);

        header("Location: index.php?act=addlesson&course_id=$course_id&success=1");
        exit();
    }
    $courses = get_all_courses();
    $selected_course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
    $thongbao = (isset($_GET['success']) && $_GET['success'] == 1) ? "Thêm bài học thành công!" : '';
    include "lesson/add.php";
    break;

case 'listlesson':
    $course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
    $lessons = get_lessons_by_course($course_id);
    include "lesson/list.php";
    break;

case 'xoalesson':
    if (isset($_GET['lesson_id']) && ($_GET['lesson_id'] > 0)) {
        $lesson_id = (int)$_GET['lesson_id'];
        delete_lesson($lesson_id);
    }
    $course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
    $lessons = get_lessons_by_course($course_id);
    include "lesson/list.php";
    break;

case 'sualesson':
    if (isset($_GET['lesson_id']) && $_GET['lesson_id'] > 0) {
        $lesson_id = (int)$_GET['lesson_id'];
        $lesson = get_lesson_by_id($lesson_id);
    }
    $courses = get_all_courses();
    include "lesson/update.php";
    break;

case 'updatelesson':
    if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $lesson_id = (int)$_POST['lesson_id'];
        $lesson_name = $_POST['lesson_name'];
        $video_url = $_POST['video_url'];
        $content = $_POST['content'];
        $course_id = (int)$_POST['course_id'];

        update_lesson($lesson_id, $lesson_name, $video_url, $content, $course_id);

        $thongbao = "Cập nhật thành công";
    }
    $course_id = (int)$_POST['course_id'];
    $lessons = get_lessons_by_course($course_id);
    include "lesson/list.php";
    break;

        // Thêm câu hỏi trắc nghiệm
        case 'addquiz':
            $lessons = lesson_selectAll();
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $lesson_id = $_POST['lesson_id'];
                $question = $_POST['question'];
                $option_a = $_POST['option_a'];
                $option_b = $_POST['option_b'];
                $option_c = $_POST['option_c'];
                $option_d = $_POST['option_d'];
                $correct_answer = $_POST['correct_answer'];
                add_quiz($lesson_id, $question, $option_a, $option_b, $option_c, $option_d, $correct_answer);
                $thongbao = "Thêm câu hỏi thành công!";
            }
            include "quiz/add.php";
            break;
        // Thêm flashcard
        case 'addflashcard':
            $lessons = lesson_selectAll();
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $lesson_id = $_POST['lesson_id'];
                $term = $_POST['term'];
                $definition = $_POST['definition'];
                add_flashcard($lesson_id, $term, $definition);
                $thongbao = "Thêm flashcard thành công!";
            }
            include "flashcard/add.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "boxleft.php";
