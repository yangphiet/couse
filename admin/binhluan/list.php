<main>
    <div class="row2 container">
        <div class="row2 font_title mt-5">
            <h1>DANH SÁCH BÌNH LUẬN</h1>
        </div>
        <div class="row2 form_content ">
            <form action="#" method="POST">
                <div class="row2 mb10 formds_loai">
                    <table border="1">
                        <tr>
                            <th>Mã bình luận</th>
                            <th>Mã người bình luận</th>
                            <th>Mã khóa học</th>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th></th>
                        </tr>
                        <?php
                        foreach ($danhsachbl as $dsbl) {
                            extract($dsbl);
                            // $suatk = "index.php?act=suatk&ma_kh=".$ma_kh;
                            $xoabl = "index.php?act=xoabl&comment_id=" . $comment_id;
                            echo '<tr>
                                    <td>' . $comment_id . '</td>
                                    <td>' . $user_id . '</td>
                                    <td>' . $course_id . '</td>
                                    <td>' . $content . '</td>
                                    <td>' . $timestamp . '</td>
                                    <td>  
                        <a href="' . $xoabl . '"><input class="btn_delete_listdm" type="button" value="Xóa"></a>                                 
                                    </td>
                                </tr>';
                        }
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
</main>
</section>