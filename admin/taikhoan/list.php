<div class="row2 container">
         <div class="row2 font_title mb">
          <h1>DANH SÁCH TÀI KHOẢN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai"> 
           <table border="1" cellpadding="10px" >
            <tr>
             
                <th>Mã tài khoản</th>
                <th>Tên Tài Khoản</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Ngày Tạo Tài Khoản</th>
                <th>Vai Trò</th>
                <th>Hành Động</th>
            </tr>

            <?php
                foreach ($danhsachtk as $dstk) {
                    extract($dstk);
                    // $suatk = "index.php?act=suatk&ma_kh=".$ma_kh;
                    $xoatk = "index.php?act=xoatk&user_id=".$user_id;
                    $suatk = "index.php?act=suatk&user_id=".$user_id;
                    echo '<tr>
                           
                            <td>'.$user_id.'</td>
                            <td>'.$username.'</td>
                            <td>'.$password.'</td>
                            <td>'.$email.'</td>
                           
                            <td>'.$registration_date.'</td>
                            <td>'.$role.'</td>
                            <td> 
                                <a href="'.$suatk.'"><input class="btn_edit_listdm" type="button" value="Sửa"></a>  
                                <a href="'.$xoatk.'"><input class="btn_delete_listdm"  type="button" value="Xóa"></a>
                            </td>
                        </tr>';
                }
                
            ?>
            
           </table>
           </div>
          
          </form>   
         </div>
        </div>