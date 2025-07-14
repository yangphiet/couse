<main>
  <div class="row2 container">
    <div class="row2 mb10 font_title">
      <h1>THÊM KHOÁ DANH MỤC HỌC MỚI</h1>
    </div>
    <div class="row2 form_content ">
      <form action="index.php?act=adddm" method="POST">
        <div class="form_content">
          <div class="row2 mb10 form_content_container">
            <h3>TÊN DANH MỤC KHOÁ HỌC </h3> <br>
            <input type="text" name="category_name" placeholder="Nhập tên danh mục" required>
          </div>
        </div>
        <div class="row mb20 mt20 btn_adddm">
          <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
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