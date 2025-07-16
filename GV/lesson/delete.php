<?php
// delete lesson
include_once __DIR__ . '/../../model/lesson.php';
if (isset($_GET['lesson_id'])) {
    $lesson_id = $_GET['lesson_id'];
    delete_lesson($lesson_id);
    header("Location: ../lesson/list.php");
    exit;
}
?>
