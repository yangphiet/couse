<?php
include_once "model/pdo.php";
include_once "model/quiz.php";
session_start();
$user_id = $_SESSION['user']['user_id'] ?? ($_SESSION['user_id'] ?? 0);
include_once "model/lesson.php";

$user_id = $_SESSION['user']['user_id'] ?? 0; // đảm bảo user đã đăng nhập
$lesson_id = $_POST['lesson_id'] ?? 0;
$answers = $_POST['answers'] ?? [];

$quizzes = getQuizzesByLessonId($lesson_id);
$total = count($quizzes);
$correct = 0;

foreach ($quizzes as $quiz) {
    $quiz_id = $quiz['quiz_id'];
    $correct_option = $quiz['correct_option'];
    $selected = $answers[$quiz_id] ?? null;
    $is_correct = ($selected == $correct_option) ? 1 : 0;

    if ($is_correct) $correct++;

    // Lưu kết quả vào bảng quiz_results
    $sql = "INSERT INTO quiz_results (quiz_id, user_id, selected_option, is_correct)
            VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $quiz_id, $user_id, $selected, $is_correct);
}

// Lưu điểm để hiển thị
$score = round(($correct / $total) * 10, 2); // Thang điểm 10
$_SESSION['quiz_score'] = $score;
$_SESSION['quiz_total'] = $total;
$_SESSION['quiz_correct'] = $correct;

// Quay lại trang kết quả
header("Location: quiz_result.php");
exit;
?>
