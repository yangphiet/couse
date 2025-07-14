<main>
    <div class="row2 container">
        <div class="row2 font_title">
            <h1>DANH SÁCH DANH MỤC</h1>
        </div>
        <div class="row2 form_content ">
            <form class="mt20" action="#" method="POST">
                <div class="row2 mb10 formds_loai">
                    <table class="row2" border="1px" cellpadding="10px">
                        <tr>
                            <th>MÃ KHOÁ HỌC</th>
                            <th>TÊN KHOÁ HỌC</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                        <?php
                        foreach ($danhmuc as $dm) {
                            extract($dm);
                            // $category_id= $dm['category_id']; // Lấy mã loại từ dữ liệu hiện tại
                            $suadm = "index.php?act=suadm&category_id=" . $category_id;
                            $xoadm = "index.php?act=xoadm&category_id=" . $category_id;
                            echo '<tr>                           
                           <td>' . $category_id . '</td>
                            <td>' . $category_name . '</td>
                            <td class="btn_listdm"> 
             <a href="' . $suadm . '"><input class="btn_edit_listdm" type="button" value="Sửa"></a>  
             <a href="' . $xoadm . '"><input class="btn_delete_listdm" type="button" value="Xóa"></td></a>
                        </tr>'
                            ;
                        }
                        ?>
                    </table>
                </div>
                <div class="row btn_list mt20">
                    <a href="index.php?act=adddm"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
                </div>
            </form>
        </div>
    </div>
</main>
</section>
<?php
if (isset($thongbao) && $thongbao != "") {
    echo $thongbao;
}
?>