<?php
if (is_array($dm)) {
  extract($dm);

}

?>
<main>
  <div class="row2 container">
    <div class="row2 font_title mt20 mb20">
      <h1>CẬP NHẬT DANH MỤC KHOÁ HỌC</h1>
    </div>
    <div class="row2 form_content ">
      <form action="index.php?act=updatedm" method="POST">
        <div class="row2 mb10 form_content_container">
          <H3>MÃ DANH MỤC KHOÁ HỌC</H3> <br>
          <input type="text" disabled name="category_id"
            value="<?php if (isset($category_id) && $category_id != "")
              echo $category_id ?>"
              placeholder="nhập vào khoá học">
          </div>
          <div class="row2 mb10 form_content_container">
            <H3>TÊN DANH MỤC KHOÁ HỌC</H3> <br>
            <input type="text" name="category_name"
              value="<?php if (isset($category_name) && $category_name != "")
              echo $category_name ?>"
              placeholder="nhập vào khoá học">
          </div>
          <div class="row mb10 btn_adddm">
            <input type="hidden" name="category_id" value="<?= $category_id ?>">
          <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
          <a href="index.php?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
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