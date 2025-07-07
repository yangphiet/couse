<?php
// File: views/khoahocdki.php
include "../model/pdo.php";
include "../model/khoahoc.php";
include "../model/video.php";
include "../model/quiz.php";
session_start();

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) {
    header("Location: login.php");
    exit();
}

$khoahoc_dadangky = getCoursesByUser($user_id); // giả sử có hàm lấy các khóa học người dùng đã mua
?>

<h2>Khóa học của tôi</h2>
<ul>
<?php foreach ($khoahoc_dadangky as $course): ?>
    <li>
        <h3><?= $course['tenkhoahoc'] ?></h3>
        <a href="video.php?id=<?= $course['id'] ?>">📺 Xem bài giảng</a> | 
        <a href="quiz.php?id=<?= $course['quiz_id'] ?? 1 ?>">📝 Làm bài kiểm tra</a>
    </li>
<?php endforeach; ?>
</ul>
