<?php
include_once "model/pdo.php";
include_once "model/lesson.php";
include_once "model/quiz.php";

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;

$course = getLessonByCourseId($course_id);
$quizzes = getQuizzesByLessonId($course['lesson_id']);

$score = null;
$total = null;
$correct = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answers'])) {
    $answers = $_POST['answers'];
    $total = count($quizzes);
    $correct = 0;
    $answer_feedback = [];
    foreach ($quizzes as $quiz) {
        $quiz_id = $quiz['quiz_id'];
        $correct_option = $quiz['correct_option'];
        $selected = $answers[$quiz_id] ?? null;
        $is_correct = ($selected == $correct_option);
        if ($is_correct) $correct++;
        $answer_feedback[$quiz_id] = [
            'selected' => $selected,
            'correct' => $correct_option,
            'is_correct' => $is_correct,
            'question' => $quiz['question'],
            'option_a' => $quiz['option_a'],
            'option_b' => $quiz['option_b'],
            'option_c' => $quiz['option_c'],
            'option_d' => $quiz['option_d'],
        ];
    }
    $score = round(($correct / $total) * 10, 2);
}
?>
<div style="margin-top: 30px;">
  <a href="http://localhost/online%20course/index.php?act=khdadangki=<?= $course_id ?>" style="text-decoration: none;">
    <button style="padding: 20px 30px; background-color: #6c757d; color: white; border-radius: 20px; border: none;">⬅ Quay lại học bài</button>
  </a>
</div>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Học bài: <?= htmlspecialchars($course['course_name']) ?></title>
  <link rel="stylesheet" href="css/hocbai.css">
</head>
<body>
  <div class="main-container">
  <?php if ($course): ?>
    <h1>Học bài: <?= htmlspecialchars($course['course_name']) ?></h1>

    <!-- Xem video bài học -->
    <div class="section">
      <h2>Video bài học: <?= htmlspecialchars($course['lesson_name']) ?></h2>
      <?php if (!empty($course['video_url'])): ?>
       <iframe src="<?= htmlspecialchars($course['video_url']) ?>" allowfullscreen></iframe>

      <?php else: ?>
        <p><em>Chưa có video cho bài học này.</em></p>
      <?php endif; ?>
    </div>

  <!-- Tài liệu học -->
<div class="section">
  <h2>Nội dung bài học</h2>
  <?php if (!empty($course['content'])): ?>
    <p><?= nl2br(htmlspecialchars($course['content'])) ?></p>
  <?php else: ?>
    <p><em>Chưa có nội dung cho bài học này.</em></p>
  <?php endif; ?>
</div>

   <!-- Bài trắc nghiệm -->
<div class="section">
  <h2>Bài trắc nghiệm</h2>

  <?php if (!empty($quizzes)): ?>
    <?php if ($score === null): ?>
      <form method="post">
        <input type="hidden" name="lesson_id" value="<?= $course['lesson_id'] ?>">
        <?php foreach ($quizzes as $index => $q): ?>
          <div class="question">
            <p><strong>Câu <?= $index + 1 ?>:</strong> <?= htmlspecialchars($q['question']) ?></p>
            <label style="display: block; margin-left: 15px;">
              <input type="radio" name="answers[<?= $q['quiz_id'] ?>]" value="A">
              <?= htmlspecialchars($q['option_a']) ?>
            </label>
            <label style="display: block; margin-left: 15px;">
              <input type="radio" name="answers[<?= $q['quiz_id'] ?>]" value="B">
              <?= htmlspecialchars($q['option_b']) ?>
            </label>
            <label style="display: block; margin-left: 15px;">
              <input type="radio" name="answers[<?= $q['quiz_id'] ?>]" value="C">
              <?= htmlspecialchars($q['option_c']) ?>
            </label>
            <label style="display: block; margin-left: 15px;">
              <input type="radio" name="answers[<?= $q['quiz_id'] ?>]" value="D">
              <?= htmlspecialchars($q['option_d']) ?>
            </label>
          </div>
          <hr style="margin: 20px 0;">
        <?php endforeach; ?>
        <button type="submit" style="padding: 10px 20px; background-color: #28a745; border: none; color: white; border-radius: 5px; font-size: 16px;">
          ✅ Nộp bài
        </button>
      </form>
    <?php else: ?>
      <div class="result-section">
        <h3>Kết quả làm bài</h3>
        <p>Số câu đúng: <?= $correct ?> / <?= $total ?></p>
        <p>Điểm: <?= $score ?> / 10</p>
        <hr>
        <h4>Đánh giá từng câu:</h4>
        <?php foreach ($answer_feedback as $qid => $fb): ?>
          <div class="question" style="margin-bottom:18px;">
            <strong><?= htmlspecialchars($fb['question']) ?></strong><br>
            <ul style="list-style:none;padding-left:0;">
              <li<?= ($fb['selected'] === 'A') ? ' style="font-weight:bold;"' : '' ?>>A. <?= htmlspecialchars($fb['option_a']) ?><?= ($fb['correct'] === 'A') ? ' <span style="color:green;">(Đáp án đúng)</span>' : '' ?><?= ($fb['selected'] === 'A' && $fb['selected'] !== $fb['correct']) ? ' <span style="color:red;">(Bạn chọn sai)</span>' : '' ?></li>
              <li<?= ($fb['selected'] === 'B') ? ' style="font-weight:bold;"' : '' ?>>B. <?= htmlspecialchars($fb['option_b']) ?><?= ($fb['correct'] === 'B') ? ' <span style="color:green;">(Đáp án đúng)</span>' : '' ?><?= ($fb['selected'] === 'B' && $fb['selected'] !== $fb['correct']) ? ' <span style="color:red;">(Bạn chọn sai)</span>' : '' ?></li>
              <li<?= ($fb['selected'] === 'C') ? ' style="font-weight:bold;"' : '' ?>>C. <?= htmlspecialchars($fb['option_c']) ?><?= ($fb['correct'] === 'C') ? ' <span style="color:green;">(Đáp án đúng)</span>' : '' ?><?= ($fb['selected'] === 'C' && $fb['selected'] !== $fb['correct']) ? ' <span style="color:red;">(Bạn chọn sai)</span>' : '' ?></li>
              <li<?= ($fb['selected'] === 'D') ? ' style="font-weight:bold;"' : '' ?>>D. <?= htmlspecialchars($fb['option_d']) ?><?= ($fb['correct'] === 'D') ? ' <span style="color:green;">(Đáp án đúng)</span>' : '' ?><?= ($fb['selected'] === 'D' && $fb['selected'] !== $fb['correct']) ? ' <span style="color:red;">(Bạn chọn sai)</span>' : '' ?></li>
            </ul>
            <?php if ($fb['is_correct']): ?>
              <span style="color:green;font-weight:bold;">✔ Bạn đã trả lời đúng</span>
            <?php else: ?>
              <span style="color:red;font-weight:bold;">✘ Bạn đã trả lời sai</span>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  <?php else: ?>
    <p><em>🔔 Chưa có bài trắc nghiệm nào cho bài học này.</em></p>
  <?php endif; ?>
</div>


    <!-- Nút học flashcard -->
    <div style="margin-top: 20px;">
      <a href="flashcard.php?course_id=<?= $course_id ?>" class="btn-flashcard">Học Flashcard</a>
    </div>
  <?php else: ?>
    <div class="section">
      <h2>Không tìm thấy thông tin bài học.</h2>
      <p>Vui lòng chọn lại khóa học hợp lệ.</p>
    </div>
  <?php endif; ?>
</div>
</body>
</html>
