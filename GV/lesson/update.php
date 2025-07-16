<?php
// update lesson
include_once __DIR__ . '/../../model/lesson.php';
if (isset($_GET['lesson_id'])) {
    $lesson_id = $_GET['lesson_id'];
    $lesson = get_lesson_by_id($lesson_id);
    if (!$lesson) {
        echo "<p>Bài học không tồn tại.</p>";
        exit;
    }
    if (isset($_POST['update_lesson'])) {
        $course_id = $_POST['course_id'];
        $title = $_POST['title'];
        $video_url = $_POST['video_url'];
        $content = $_POST['content'];
        update_lesson($lesson_id, $course_id, $title, $video_url, $content);
        header("Location: ../lesson/list.php");
        exit;
    }
}
?>
<!-- Form update lesson -->
<form method="POST">
    <label>Tên khóa học:</label>
    <input type="text" name="course_id" value="<?= htmlspecialchars($lesson['course_id']) ?>" required><br>
    <label>Tên bài học:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($lesson['title']) ?>" required><br>
    <label>Video URL:</label>
    <input type="text" name="video_url" value="<?= htmlspecialchars($lesson['video_url']) ?>"><br>
    <label>Nội dung:</label>
    <textarea name="content" required><?= htmlspecialchars($lesson['content']) ?></textarea><br>
    <button type="submit" name="update_lesson">Cập nhật bài học</button>
</form>
