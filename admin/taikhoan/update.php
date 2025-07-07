<?php
if(is_array($kh)){
    extract($kh);
    
}   

?>
<main>
<div class="row2 container">
        <div class="row2 font_title mt20 mb20">
        <h1>CẬP NHẬT CHỨC VỤ</h1>
      </div>
      <div class="row2 form_content ">
        <form action="index.php?act=updatetk" method="POST">
          <div class="row2 mb10 form_content_container">
            <H3>MÃ KHÁCH HÀNG</H3> <br>
            <input type="text" disabled name="user_id" value="<?php if(isset($user_id)&& $user_id != "") echo $user_id?>" placeholder="nhập vào khoá học">
          </div>
          <div class="row2 mb10 form_content_container">
            <H3>VAI TRÒ</H3> <br>
            <input type="text" name="role" value="<?php if(isset($role)&& $role != "") echo $role?>" placeholder="nhập vào khoá học">
          </div>
          <div class="row mb10 btn_adddm">
            <input type="hidden" name="user_id" value="<?=$user_id?>">
            <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
            <a href="index.php?act=dstk"><input class="mr20" type="button" value="DANH SÁCH"></a>
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