<?php
include_once __DIR__ . '/../../model/lesson.php';
include_once __DIR__ . '/../../model/khoahoc.php';
include_once __DIR__ . '/../../model/quiz.php';

// Lấy danh sách khoá học cho giáo viên
$courses = khoahoc_selectAll('', 0, isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0);

if (isset($_POST['add_lesson'])) {
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];
    $content = $_POST['content'];
    $lesson_id = add_lesson($course_id, $title, $video_url, $content);
    // Thêm các câu hỏi trắc nghiệm
    if (isset($_POST['questions']) && is_array($_POST['questions'])) {
        foreach ($_POST['questions'] as $q) {
            if (!empty($q['question']) && !empty($q['answer'])) {
                add_quiz($lesson_id, $q['question'], $q['option_a'], $q['option_b'], $q['option_c'], $q['option_d'], $q['answer']);
            }
        }
    }
    echo '<p style="color:green">Thêm bài học thành công!</p>';
}
?>
<form method="POST">
    <label>Tên khoá học:</label>
    <select name="course_id" required>
        <?php foreach ($courses as $course): ?>
            <option value="<?= $course['course_id'] ?>"><?= htmlspecialchars($course['course_name']) ?></option>
        <?php endforeach; ?>
    </select><br>
    <label>Tên bài học:</label>
    <input type="text" name="title" required><br>
    <label>Video URL:</label>
    <input type="text" name="video_url"><br>
    <label>Nội dung:</label>
    <textarea name="content" required></textarea><br>
    <h3>Câu hỏi trắc nghiệm</h3>
    <div id="questions">
        <div class="question-block">
            <input type="text" name="questions[0][question]" placeholder="Nội dung câu hỏi" required><br>
            <input type="text" name="questions[0][option_a]" placeholder="Đáp án A" required>
            <input type="text" name="questions[0][option_b]" placeholder="Đáp án B" required>
            <input type="text" name="questions[0][option_c]" placeholder="Đáp án C" required>
            <input type="text" name="questions[0][option_d]" placeholder="Đáp án D" required><br>
            <label>Đáp án đúng:</label>
            <select name="questions[0][answer]">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
            <hr>
        </div>
    </div>
    <button type="button" onclick="addQuestion()">Thêm câu hỏi</button><br><br>
    <button type="submit" name="add_lesson">Thêm bài học</button>
</form>
<script>
let qIndex = 1;
function addQuestion() {
    const container = document.getElementById('questions');
    const block = document.createElement('div');
    block.className = 'question-block';
    block.innerHTML = `
        <input type="text" name="questions[${qIndex}][question]" placeholder="Nội dung câu hỏi" required><br>
        <input type="text" name="questions[${qIndex}][option_a]" placeholder="Đáp án A" required>
        <input type="text" name="questions[${qIndex}][option_b]" placeholder="Đáp án B" required>
        <input type="text" name="questions[${qIndex}][option_c]" placeholder="Đáp án C" required>
        <input type="text" name="questions[${qIndex}][option_d]" placeholder="Đáp án D" required><br>
        <label>Đáp án đúng:</label>
        <select name="questions[${qIndex}][answer]">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <hr>
    `;
    container.appendChild(block);
    qIndex++;
}
</script>
