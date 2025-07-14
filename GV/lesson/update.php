<?php
if (is_array($lesson)) {
  extract($lesson);
}
?>
<main>
  <div class="row2 container mt20">
    <div class="row2 font_title">
      <h1>CẬP NHẬT BÀI HỌC</h1>
    </div>

    <div class="row2 form_content">
      <form action="index.php?act=updatelesson" method="POST">
        
        <!-- Mã bài học (ẩn) -->
        <input type="hidden" name="lesson_id" value="<?= $id ?>">

        <!-- Khóa học -->
        <div class="row2 mb10 form_content_container">
          <h1>KHÓA HỌC</h1> <br>
          <select name="course_id" required>
            <option value="0">Chọn khóa học</option>
            <?php
            foreach ($courses as $course) {
              $selected = ($course['course_id'] == $course_id) ? 'selected' : '';
              echo '<option value="' . $course['course_id'] . '" ' . $selected . '>' . $course['course_name'] . '</option>';
            }
            ?>
          </select>
        </div>

        <!-- Tên bài học -->
        <div class="row2 mb10 form_content_container">
          <h1>TÊN BÀI HỌC</h1><br>
          <input type="text" name="lesson_name" value="<?= htmlspecialchars($lesson_name) ?>" placeholder="Nhập tên bài học" required>
        </div>

        <!-- Video URL -->
        <div class="row2 mb10 form_content_container">
          <h1>VIDEO URL</h1><br>
          <input type="text" name="video_url" value="<?= htmlspecialchars($video_url) ?>" placeholder="Nhập đường dẫn video" required>
        </div>

        <!-- Nội dung -->
        <div class="row2 mb10 form_content_container">
          <h1>NỘI DUNG BÀI HỌC</h1><br>
          <textarea name="content" cols="30" rows="10" placeholder="Nhập nội dung bài học"><?= htmlspecialchars($content) ?></textarea>
        </div>

        <!-- Nút hành động -->
        <div class="row mb10 btn_adddm">
          <input type="submit" class="btn_update_kh" name="capnhat" value="CẬP NHẬT">
          <a href="index.php?act=listlesson&course_id=<?= $course_id ?>"><input type="button" value="DANH SÁCH"></a>
        </div>

      </form>
    </div>

    <?php if (isset($thongbao) && $thongbao != "") echo "<p style='color: green;'>$thongbao</p>"; ?>
  </div>
</main>
