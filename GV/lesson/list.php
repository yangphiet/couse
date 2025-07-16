<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/../../model/pdo.php';
include_once __DIR__ . '/../../model/khoahoc.php';
include_once __DIR__ . '/../../model/lesson.php';
include_once __DIR__ . '/../../model/quiz.php';
include_once __DIR__ . '/../../model/flashcard.php';

$teacher_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
$courses = khoahoc_selectAll('', 0, $teacher_id);
$lessons = [];

foreach ($courses as $course) {
    $course_lessons = get_lessons_by_course($course['course_id']);
    foreach ($course_lessons as $lesson) {
        $lesson['course_name'] = $course['course_name'];
        $lessons[] = $lesson;
    }
}
?>

<main>
  <div class="row2 container mt20" style="max-width:1200px;margin:auto;">
    <div class="row2 form_content" style="background:#f5faff;border-radius:16px;padding:28px;box-shadow:0 4px 16px rgba(21,101,192,0.08);">
      <form action="#" method="POST">
        <div class="row2 mb10 formds_loai">
          <table border="0" cellpadding="12px" style="width:100%;border-collapse:separate;border-spacing:0;background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px #e3f2fd;">
            <tr style="background:#1976d2;color:#fff;font-weight:bold;text-align:center;">
              <th style="padding:16px;">Tên khoá học</th>
              <th style="padding:16px;">Tên bài học</th>
              <th style="padding:16px;">Nội dung</th>
              <th style="padding:16px;">Video</th>
              <th style="padding:16px;">Câu hỏi trắc nghiệm</th>
              <th style="padding:16px;">Flashcard</th>
              <th style="padding:16px;">Hành động</th>
            </tr>
            <?php foreach ($lessons as $lesson): ?>
              <?php
                $course_name = htmlspecialchars($lesson['course_name'] ?? 'Không xác định');
                $lesson_title = htmlspecialchars($lesson['lesson_name'] ?? $lesson['title'] ?? '');
                $content_preview = htmlspecialchars(mb_strimwidth(strip_tags($lesson['content']), 0, 60, '...'));
                $quizzes = get_quiz_by_lesson($lesson['lesson_id']);
                $flashcards = get_flashcards_by_course($lesson['course_id']) ?? [];
                $edit_url = "index.php?act=sualesson&lesson_id=" . $lesson['lesson_id'];
                $delete_url = "index.php?act=xoalesson&lesson_id=" . $lesson['lesson_id'] . "&course_id=" . $lesson['course_id'];
                $view_url = "index.php?act=viewlesson&lesson_id=" . $lesson['lesson_id'];
              ?>
              <tr>
                <td><?= $course_name ?></td>
                <td><a href="<?= $view_url ?>"><?= $lesson_title ?></a></td>
                <td><?= $content_preview ?></td>
                <td>
                  <?php if (!empty($lesson['video_url'])): ?>
                    <a href="<?= htmlspecialchars($lesson['video_url']) ?>" target="_blank">Xem video</a>
                  <?php else: ?>
                    <span style="color:#888;">Không có</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if ($quizzes && count($quizzes) > 0): ?>
                    <ul style="margin:0;padding-left:18px;">
                      <?php foreach ($quizzes as $quiz): ?>
                        <li><?= htmlspecialchars(mb_strimwidth($quiz['question'], 0, 40, '...')) ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php else: ?>
                    <span style="color:#888;">Không có</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if ($flashcards && count($flashcards) > 0): ?>
                    <ul style="margin:0;padding-left:18px;">
                      <?php foreach ($flashcards as $fc): ?>
                        <li><?= htmlspecialchars($fc['front'] ?? '[front]') ?> - <?= htmlspecialchars($fc['back'] ?? '[back]') ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php else: ?>
                    <span style="color:#888;">Không có</span>
                  <?php endif; ?>
                </td>
                <td style="text-align:center;">
                  <a href="<?= $edit_url ?>"><input class="btn_edit_listdm" type="button" value="Sửa"></a>
                  <a href="<?= $delete_url ?>" onclick="return confirm('Bạn có chắc muốn xóa bài học này?')">
                    <input class="btn_delete_listdm" type="button" value="Xóa">
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="row mb10 btn_adddm" style="text-align:right;">
          <a href="index.php?act=addlesson">
            <input class="mr20" type="button" value="Thêm bài học mới" style="background:#1565c0;color:#fff;padding:10px 28px;border:none;border-radius:6px;cursor:pointer;font-weight:bold;box-shadow:0 2px 8px #90caf9;">
          </a>
        </div>
      </form>
    </div>
  </div>
</main>

<style>
table tr:not(:first-child):hover {
  background:#e3f2fd;
  transition:background 0.2s;
}
.btn_edit_listdm, .btn_delete_listdm {
  padding:8px 18px;
  margin:2px 0;
  border:none;
  border-radius:6px;
  font-weight:bold;
  cursor:pointer;
  box-shadow:0 2px 6px #bbdefb;
}
.btn_edit_listdm {
  background:#42a5f5;
  color:#fff;
}
.btn_delete_listdm {
  background:#ef5350;
  color:#fff;
}
</style>
