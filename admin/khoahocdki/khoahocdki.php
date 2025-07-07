
  
<main>
<div class="row2 container mt20">
  <div class="row2 font_title mb">
    <h1>KHOÁ HỌC ĐÃ ĐƯỢC ĐĂNG KÍ</h1>
  </div>
  
  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table border="1" cellpadding="10px">
          <tr>

           
            <th>TÊN KHOÁ HỌC</th>
            <th>HỌC PHÍ</th>
            <th>TÊN HỌC SINH</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>PHƯƠNG THỨC THANH TOÁN</th>
            <th>GIÁO VIÊN</th>
            <th>LỚP HỌC</th>
            <th>KHAI GIẢNG</th>
            <th>THỜI GIAN BẮT ĐẦU</th>
            <th>THỜI GIAN KẾT THÚC</th>
            <th>THỜI GIAN ĐĂNG KÍ</th>
            <th>TRẠNG THÁI THANH TOÁN</th>
         
         
            <!-- <th>BUỔI HỌC</th> -->
          </tr>

          <?php
foreach ($allcourses as $all) {
  extract($all);

    $temp =  '<label class="custom-button">
    <input type="submit" class="hidden-checkbox" />
    <span class="icon-cross">✘</span> 
    <input type="hidden" name="bill_id" value="'.$bill_id.'">
</label>
<input type="submit" name="xacnhan" class="confirm-button" value="Xác Nhận">';

  $temp2 = ' <label class="custom-button-1">
  <input type="submit" class="hidden-checkbox" />
  <span class="icon-checkbox">✔</span> 
</label>';
    if (isset($all["trangthai"]) && $all["trangthai"] == "Đã thanh toán") {
        $test = $temp2;
    } else {
        $test = $temp;
    }
  
  
if (isset($_POST['xacnhan']) && ($_POST['xacnhan'])) {
  $test2 = isset($_POST['test2']) ? htmlspecialchars($_POST['test2']) : '';
  $billId = isset($_POST['bill_id']) ? htmlspecialchars($_POST['bill_id']) : '';
  $update= updatetrangthai($test2, $billId);
  if ($update) {
    $test= $temp2;
    
    }

}

    echo '<tr>
        <td>' . $course_name. '</td>
        <td>' . $course_price . '</td>
        <td>' . $full_name . '</td>
        <td>' . $email . '</td>
        <td>' . $phone . '</td>
        <td>' . $pttt. '</td>
        <td>' . $instructor . '</td>
        <td>' . $classname . '</td>
        <td>' . $thoigian. '</td>
        <td>' . $time_start . '</td>
        <td>' . $time_end . '</td>
        <td>' . $timestamp . '</td>
        <td>' . $test . '</td>
    </tr>';
  }
?>
<input type="hidden" name="test2" id="" value="Đã thanh toán">


        </table>
      </div>
     
    </form>
  </div>
</div>
</main>
</section>