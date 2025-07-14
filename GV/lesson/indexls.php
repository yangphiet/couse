<?php
include "../../model/pdo.php";
include "../../model/lesson.php";

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$lessons = [];
if ($course_id > 0) {
    $lessons = lesson_select_by_course($course_id);
}
include "list.php";
