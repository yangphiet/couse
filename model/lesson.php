<?php
function getLessonByCourseId($course_id) {
    $sql = "
        SELECT c.*, l.lesson_name, l.video_url, l.content
        FROM courses c
        JOIN lessons l ON c.lesson_id = l.lesson_id
        WHERE c.course_id = ?
    ";
    return pdo_query_one($sql, $course_id);
}
function get_lessons_by_course($course_id) {
    $sql = "SELECT * FROM lessons WHERE course_id = ?";
    return pdo_query($sql, $course_id);
}

function add_lesson($course_id, $title, $video_url, $content) {
    $sql = "INSERT INTO lessons(course_id, title, video_url, content) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $course_id, $title, $video_url, $content);
}

?>
