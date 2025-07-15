
<?php
// Lấy danh sách file đã upload cho một bài học
function get_lesson_files($lesson_id) {
    $sql = "SELECT * FROM lesson_files WHERE lesson_id = ? ORDER BY uploaded_at DESC";
    return pdo_query($sql, $lesson_id);
}
// Thêm file tài liệu/video cho bài học
function add_lesson_file($lesson_id, $file_name, $file_path, $file_type) {
    $sql = "INSERT INTO lesson_files (lesson_id, file_name, file_path, file_type) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $lesson_id, $file_name, $file_path, $file_type);
}
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
    global $pdo;
    return $pdo->lastInsertId();
}

?>
