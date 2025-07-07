<div class="row2">
    <div class="row2 font_title mb">
        <h1>Thống kê sản phẩm</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table border="1">
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Số lượng</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá cao nhất</th>
                        <th>Giá trung bình</th>
                    </tr>

                    <?php
                    foreach ($listsp as $lsp) {
                        extract($lsp);
                        echo '<tr>
                                <td>' . $madm . '</td>
                                <td>' . $tendm . '</td>
                                <td>' . $soluong . '</td>
                                <td>'  . $gia_min . '</td>
                                <td>'  . $gia_max . '</td>
                                <td>'  . number_format($gia_avg, 0) . '</td>
                            </tr>';
                    }
                    ?>
                </table>

        </form>
        <li class="<?php echo (!isset($_GET['act']) || $_GET['act'] === 'bieudo') ? 'active' : ''; ?>">
            <a href="index.php?act=bieudo">
                <div class="row btn_list mt20">
             <input  class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
           </div>
            </a>
        </li>
    </div>
</div>