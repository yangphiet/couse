<?php
if(is_array($kh)){
  extract($kh);
}
// Đảm bảo $lessons là mảng để tránh lỗi undefined/null
if (!isset($lessons) || !is_array($lessons)) {
  $lessons = [];
}
if (!isset($quizzes) || !is_array($quizzes)) {
  $quizzes = [];
}
if (!isset($flashcards) || !is_array($flashcards)) {
  $flashcards = [];
}
?>
<main>
<div class="row2 container mt20">
        <div class="row2 font_title">
        <h1>CẬP NHẬT KHOÁ HỌC</h1>
      </div>
      <div class="row2 form_content ">
        <form action="index.php?act=updatekh" method="POST" enctype="multipart/form-data">
                  
          <div class="row2 mb10 form_content_container">
            <!-- Mã -->
            <h1>MÃ KHOÁ HỌC </h1> <br>
            <input type="text" disabled name="course_id" value="<?= $course_id?>" placeholder="nhập vào mã sản phẩm">
          </div>
          <!-- Tên -->
          <div class="row2 mb10 form_content_container">
            <h1>TÊN KHOÁ HỌC</h1><br>
            <input type="text" name="course_name" value="<?= $course_name?>" placeholder="nhập vào tên">
          </div>
          <!-- Mô tả -->
          <div class="row2 mb10">
            <h1>MÔ TẢ</h1><br>
            <textarea name="mo_ta" cols="30" rows="10"><?=$description?></textarea>
          </div>
          <!-- Ảnh -->
          <div class="row2 mb10">
           <h1>ẢNH</h1><br>
            <div>
              <input type="file" name="hinh">
              <br>
              <input type="hidden" name="old_image" value="<?=$image?>">
              <br>
              <img src="./image/<?=$image?>" width="200px" alt="">
            </div>
          </div>
          <!-- Giảng viên  -->
          <div class="row2 mb10 form_content_container">
          <H1>GIẢNG VIÊN</H1> <br>
            <input type="text" name="giangvien" value="<?= isset($instructor) ? htmlspecialchars($instructor) : '' ?>" placeholder="nhập vào tên giảng viên">
          </div>
          <!-- Giá -->
          <div class="row2 mb10 form_content_container">
            <label> GIÁ </label> <br>
            <input type="text" name="don_gia" value="<?=$price?>" placeholder="nhập vào giá">
          </div>
         
         <!-- Thời gian -->
         <div class="row2 mb10 form_content_container">
            <label> THỜI GIAN KHAI GIẢNG</label> <br>
            <input type="text" name="thoigian" value="<?=$thoigian?>" placeholder="nhập thời gian ">
          </div>
           <!-- intro -->
           <div class="row2 mb10 form_content_container">
            <label> THỜI GIAN BẮT ĐẦU</label> <br>
            <input type="text" name="time_start" value="<?=$time_start?>" placeholder="nhập intro ">
          </div>
           <!-- intro -->
           <div class="row2 mb10 form_content_container">
            <label> THỜI GIAN KẾT THÚC</label> <br>
            <input type="text" name="time_end" value="<?=$time_end?>" placeholder="nhập intro ">
          </div>
           <!-- intro -->
           <div class="row2 mb10 form_content_container">
            <label> TÊN LỚP</label> <br>
            <input type="text" name="classname" value="<?=$classname?>" placeholder="nhập intro ">
          </div>
          <!-- intro -->
          <div class="row2 mb10 form_content_container">
            <label> INTRO</label> <br>
            <textarea name="intro" cols="30" rows="10"><?=$intro?></textarea>
            
          </div>
          <div class="row2 mb10">
            <h1>DANH MỤC</h1> <br>
            <select name="category">
              <option value="0" selected>Tất cả</option>
                <?php
                  foreach ($danhmuc as $dm) {
                    $category_id_option = $dm['category_id']; // Trích xuất giá trị 'ma_loai' từ mảng $dm
                    $category_name_option = $dm['category_name']; // Trích xuất giá trị 'ten_loai' từ mảng $dm
                    if ($category_id_option  == $category_id){
                      echo'<option value="'.$category_id_option .'" selected>'.$category_name_option .'</option>';
                    }else{
                      echo'<option value="'.$category_id_option .'">'.$category_name_option .'</option>';
                    }       
                  }
                ?>
            </select>
          </div>
          <div class="row2 mb10">
           <H1>BUỔI HỌC</H1> <br>
            <select name="lesson">
              <option value="0" selected>Tất cả</option>
                <?php
                  foreach ($buoihoc as $bh) {
                    $lesson_id_option = $bh['lesson_id']; // Trích xuất giá trị 'ma_loai' từ mảng $dm
                    $lesson_name_option = $bh['lesson_name']; // Trích xuất giá trị 'ten_loai' từ mảng $dm
                    if ($lesson_id_option  == $lesson_id){
                      echo'<option value="'.$lesson_id_option .'" selected>'.$lesson_name_option .'</option>';
                    }else{
                      echo'<option value="'.$lesson_id_option .'">'.$lesson_name_option .'</option>';
                    }       
                  }
                ?>
            </select>
          </div>
          

          
          <div class="row mb10 btn_adddm">
            <input type="hidden" name="course_id" value="<?=$course_id?>">
            <input class="btn_update_kh" type="submit" name="capnhat" value="CẬP NHẬT">
            <a href="index.php?act=listkh"><input  type="button" value="DANH SÁCH"></a>
          </div>
          
        </form>
        </div>
        <?php
            if (isset($thongbao) && $thongbao != "") {
              echo $thongbao;
            }
         
          ?>
          
</div>
</main>
</section>