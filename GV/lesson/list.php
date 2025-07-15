<main>
<div class="row2 container mt20">
  <div class="row2 font_title mb">
    <h1>DANH SÁCH BÀI HỌC</h1>
  </div>
  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table border="1" cellpadding="10px">
          <tr>
            <th>TÊN KHOÁ HỌC</th>
            <th>TÊN BÀI HỌC</th>
            <th>NỘI DUNG</th>
            <th>VIDEO</th>
            <th>CÂU HỎI TRẮC NGHIỆM</th>
            <th>FLASHCARD</th>
            <th>HÀNH ĐỘNG</th>
          </tr>
          <?php
          include_once __DIR__ . '/../../model/khoahoc.php';
          include_once __DIR__ . '/../../model/quiz.php';
          include_once __DIR__ . '/../../model/flashcard.php';
          foreach ($lessons as $lesson) {
            $course = select_kh_one($lesson['course_id']);
            $course_name = $course ? $course['course_name'] : 'Không xác định';
            $quizzes = get_quiz_by_lesson($lesson['lesson_id']);
            $flashcards = get_flashcards_by_course($lesson['course_id']);
            $edit_url = "index.php?act=sualesson&lesson_id=" . $lesson['lesson_id'];
            $delete_url = "index.php?act=xoalesson&lesson_id=" . $lesson['lesson_id'] . "&course_id=" . $lesson['course_id'];
            echo '<tr>';
            echo '<td>' . htmlspecialchars($course_name) . '</td>';
            $lesson_title = htmlspecialchars(isset($lesson['lesson_name']) ? $lesson['lesson_name'] : (isset($lesson['title']) ? $lesson['title'] : ''));
            $view_url = "index.php?act=viewlesson&lesson_id=" . $lesson['lesson_id'];
            echo '<td><a href="' . $view_url . '">' . $lesson_title . '</a></td>';
            echo '<td>' . htmlspecialchars(mb_strimwidth(strip_tags($lesson['content']),0,60,'...')) . '</td>';
            echo '<td>';
            if (!empty($lesson['video_url'])) {
              echo '<a href="' . htmlspecialchars($lesson['video_url']) . '" target="_blank">Xem video</a>';
            } else {
              echo '<span style="color:#888;">Không có</span>';
            }
            echo '</td>';
            echo '<td>';
            if ($quizzes && count($quizzes) > 0) {
              echo '<ul style="margin:0;padding-left:18px;">';
              foreach ($quizzes as $quiz) {
                echo '<li>' . htmlspecialchars(mb_strimwidth($quiz['question'],0,40,'...')) . '</li>';
              }
              echo '</ul>';
            } else {
              echo '<span style="color:#888;">Không có</span>';
            }
            echo '</td>';
            echo '<td>';
            if ($flashcards && count($flashcards) > 0) {
              echo '<ul style="margin:0;padding-left:18px;">';
              foreach ($flashcards as $fc) {
                echo '<li>' . htmlspecialchars((isset($fc['front'])?$fc['front']:'[front]')) . ' - ' . htmlspecialchars((isset($fc['back'])?$fc['back']:'[back]')) . '</li>';
              }
              echo '</ul>';
            } else {
              echo '<span style="color:#888;">Không có</span>';
            }
            echo '</td>';
            echo '<td class="btn_listdm">';
            echo '<a href="' . $edit_url . '"><input class="btn_edit_listdm" type="button" value="Sửa"></a>  ';
            echo '<a href="' . $delete_url . '" onclick="return confirm(\'Xóa bài học này?\')"><input class="btn_delete_listdm" type="button" value="Xóa"></a>';
            echo '</td>';
            echo '</tr>';
          }
          ?>
        </table>
      </div>
      <div class="row mb10 btn_adddm">
        <a href="index.php?act=addlesson"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
      </div>
    </form>
  </div>
</div>
</main>
</section>
