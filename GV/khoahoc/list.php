<main>
<div class="row2 container mt20">
  <div class="row2 font_title mb">
    <h1>DANH SÁCH KHOÁ HỌC</h1>
  </div>
  <form action="index.php?act=listkh" method="POST" class="row2 form_dm_listkh">
    <input class="form_dm_listkh" type="text" name="key" >
    <select name="danhmuc" class="danhmuc">
      <option value="0" selected>Tất cả</option>
      <?php
      foreach ($danhmuc as $dm) {
        extract($dm);
        echo '<option class=bgr_danhmuc value="' . $category_id . '">' . $category_name . '</option>';
      }
      ?>
    </select>
   
    <input type="submit" class="danhmuc_option " name="listloc" value="LỌC">
  </form>
  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table border="1" cellpadding="10px">
          <tr>

           
            <th>TÊN KHOÁ HỌC</th>
            <th>MÔ TẢ</th>
            <th>HÌNH ẢNH</th>
            <th>GIẢNG VIÊN</th>
            <th>HỌC PHÍ</th>
            <th>THỜI GIAN KHAI GIẢNG KHOÁ HỌC</th>
            <th>THỜI GIAN BẮT ĐẦU</th>
            <th>THỜI GIAN KẾT THÚC</th>
            <th>LỚP HỌC</th>
            <th>INTRO</th>
            <th>HÀNH ĐỘNG</th>
         
            <!-- <th>BUỔI HỌC</th> -->
          </tr>

          <?php
          foreach ($listkh as $kh) {
            extract($kh);
           
            $suakh = "index.php?act=suakh&course_id=" . $course_id;
            $xoakh = "index.php?act=xoakh&course_id=" . $course_id;

            echo '<tr>
                           
                          
                            <td>' . $course_name . '</td>
                            <td>' . $description . '</td>
                            <td> <img src="./image/' . $image . '" alt="" width="100px"> </td>
                            <td>' . $instructor . '</td>
                            <td>' . $price . '</td>
                            <td>' . $thoigian. '</td>
                            <td>' . $time_start. '</td>
                            <td>' . $time_end. '</td>
                            <td>' . $classname. '</td>
                            <td>' . $intro. '</td>
                            <td class="btn_listdm"> 
                                <a href="' . $suakh . '"><input class="btn_edit_listdm" type="button" value="Sửa"></a>  
                                <a href="' . $xoakh . '"><input class="btn_delete_listdm" type="button" value="Xóa"></a>
                            </td>
                        </tr>';
          }

          ?>

        </table>
      </div>
      <div class="row mb10 btn_adddm">

        <a href="index.php?act=addkh"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
      </div>
    </form>
  </div>
</div>
</main>
</section>