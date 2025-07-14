<?php
include "../../model/pdo.php";
include "../../model/lesson.php";

$lesson_id = isset($_GET['lesson_id']) ? (int)$_GET['lesson_id'] : 0;
$lesson = null;
if ($lesson_id > 0) {
    $lesson = lesson_select_one($lesson_id);
}
?>
<main>
<div class="row2 container mt20">
  <div class="row2 font_title mb">
    <h1>CHI TIẾT BÀI HỌC</h1>
  </div>
  <?php if ($lesson): ?>
    <div class="row2 form_content ">
      <h2><?php echo htmlspecialchars($lesson['lesson_name']); ?></h2>
      <p><strong>Mô tả:</strong> <?php echo htmlspecialchars($lesson['description']); ?></p>
      <p><strong>Nội dung:</strong></p>
      <div><?php echo nl2br(htmlspecialchars($lesson['content'])); ?></div>
      <?php if (!empty($lesson['video_url'])): ?>
        <div class="video-container">
          <iframe width="560" height="315" src="<?php echo htmlspecialchars($lesson['video_url']); ?>" frameborder="0" allowfullscreen></iframe>
        </div>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-danger">Không tìm thấy bài học.</div>
  <?php endif; ?>
</div>
</main>
