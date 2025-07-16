
<main>
<div class="row2 container mt20">
    <div class="row2 font_title mb">
        <h1 style="font-size:2rem;color:#1976d2;text-transform:uppercase;letter-spacing:2px;">THÊM DANH MỤC KHÓA HỌC MỚI</h1>
    </div>
    <div class="row2 form_content" style="background:#f9f9f9;border-radius:8px;padding:20px;box-shadow:0 2px 8px rgba(0,0,0,0.05);max-width:500px;margin:auto;">
        <form action="index.php?act=adddm" method="POST">
            <div class="row2 mb10 form_content_container">
                <h3 style="font-size:1.2rem;color:#333;margin-bottom:8px;">TÊN DANH MỤC KHÓA HỌC</h3>
                <input type="text" name="category_name" placeholder="Nhập tên danh mục" required style="width:100%;padding:8px 12px;border-radius:4px;border:1px solid #ccc;">
            </div>
            <div class="row mb20 mt20 btn_adddm" style="display:flex;gap:12px;justify-content:center;">
                <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI" style="background:#1976d2;color:#fff;padding:8px 24px;border:none;border-radius:4px;cursor:pointer;font-weight:bold;">
                <a href="index.php?act=listdm"><input class="mr20" type="button" value="DANH SÁCH" style="background:#eee;color:#333;padding:8px 24px;border:none;border-radius:4px;cursor:pointer;font-weight:bold;"></a>
            </div>
        </form>
        <?php
            if (isset($thongbao) && $thongbao != "") {
                echo '<p style="color:green;font-weight:bold;text-align:center;margin-top:16px;">'.$thongbao.'</p>';
            }
        ?>
    </div>
</div>
</main>
</section>
