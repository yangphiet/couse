<?php
// process_payment.php

if (isset($_POST['redirect'])) {
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost/duan1/index.php?act=invoice";
    $vnp_TmnCode = "064XW8TO"; //Mã website tại VNPAY 
    $vnp_HashSecret = "PBYPHCHFWNDCOURIICWZRBYJOJDOETKG"; //Chuỗi bí mật

    $vnp_TxnRef = rand(00,9999) ;//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Nội dung thanh toán';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $_POST['course_price'] * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    // $vnp_ExpireDate = $_POST['txtexpire'];
    // //Billing
    // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
    // $vnp_Bill_Email = $_POST['txt_billing_email'];
    // $fullName = trim($_POST['txt_billing_fullname']);
    // if (isset($fullName) && trim($fullName) != '') {
    //     $name = explode(' ', $fullName);
    //     $vnp_Bill_FirstName = array_shift($name);
    //     $vnp_Bill_LastName = array_pop($name);
    // }
    // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
    // $vnp_Bill_City = $_POST['txt_bill_city'];
    // $vnp_Bill_Country = $_POST['txt_bill_country'];
    // $vnp_Bill_State = $_POST['txt_bill_state'];
    // // Invoice
    // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
    // $vnp_Inv_Email = $_POST['txt_inv_email'];
    // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
    // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
    // $vnp_Inv_Company = $_POST['txt_inv_company'];
    // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
    // $vnp_Inv_Type = $_POST['cbo_inv_type'];
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
        // "vnp_ExpireDate" => $vnp_ExpireDate,
        // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
        // "vnp_Bill_Email" => $vnp_Bill_Email,
        // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
        // "vnp_Bill_LastName" => $vnp_Bill_LastName,
        // "vnp_Bill_Address" => $vnp_Bill_Address,
        // "vnp_Bill_City" => $vnp_Bill_City,
        // "vnp_Bill_Country" => $vnp_Bill_Country,
        // "vnp_Inv_Phone" => $vnp_Inv_Phone,
        // "vnp_Inv_Email" => $vnp_Inv_Email,
        // "vnp_Inv_Customer" => $vnp_Inv_Customer,
        // "vnp_Inv_Address" => $vnp_Inv_Address,
        // "vnp_Inv_Company" => $vnp_Inv_Company,
        // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
        // "vnp_Inv_Type" => $vnp_Inv_Type
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    // }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
    // vui lòng tham khảo thêm tại code demo
}




if (isset($_POST['redirect'])) {
    // Lấy thông tin từ form
    $fullname = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $coursename = $_POST['course_name'];
    $thoigian = $_POST['thoigian'];
    $price = $_POST['course_price'];
    $instructor = $_POST['instructor'];
    $classname = $_POST['classname'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $pttt = $_POST['redirect'];
    // ... Các thông tin khác

    // Gửi thông tin đến cổng thanh toán (nếu có)
    // Xác nhận thanh toán và cập nhật trạng thái trong cơ sở dữ liệu

    // Ví dụ: In ra thông báo thành công sau khi thanh toán

} else {
    // Xử lý nếu không có dữ liệu POST được gửi đến trang này
    echo '
    <section class="breadcrumb-area">
    <div class="container4">
    <label class="form-label" for="full_name">  <h1>Chúc mừng bạn đã tham gia khoá học 💕</h1></label>
    <p class="form-label">Bạn có thể lựa chọn thêm khoá học phù hợp</p>
    <button type="button" class="btn btn-primary" ><a href="index.php?act=course">CHỌN THÊM</a></button>
</div>
</section>';
    exit();
}

?>

<section class="breadcrumb-area">

    <div class="container5">
        <!-- Hiển thị thông tin xác nhận -->
        <h2>CHÚC MỪNG <?php echo $fullname; ?> ĐÃ ĐĂNG KÍ KHOÁ HỌC THÀNH CÔNG</h2>
       
        <p><strong>Tên khóa học:</strong> <?php echo $coursename; ?></p>
        <p><strong>Giá khóa học:</strong> $<?php echo number_format($price, 2); ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo $phone; ?></p>
        <p><strong>Giáo Viên</strong> <?php echo $instructor; ?></p>
        <p><strong>Tên Lớp:</strong> <?php echo $classname; ?></p>
        <p><strong>Thời gian bắt đầu:</strong> <?php echo $time_start; ?></p>
        <p><strong>Thời gian kết thúc:</strong> <?php echo $time_end; ?></p>
        <p><strong>Phương thức thanh toán:</strong> <?php echo $pttt; ?></p>


    </div>

</section>