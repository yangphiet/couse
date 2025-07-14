<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
  }
  .content_khdki {
    margin: 40px auto 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 90%;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 12px;
    background-color: #fff;
    overflow: hidden;
  }

  th,
  td {
    padding: 14px 20px;
    text-align: left;
    border-bottom: 1px solid #eee;
  }

  th {
    background-color: #2196F3;
    color: white;
    font-weight: bold;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  .h1 {
    margin-top: 80px;
    text-align: center;
  }

  .btn-flashcard {
    padding: 8px 14px;
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    transition: background-color 0.3s ease;
    display: inline-block;
  }

  .btn-flashcard:hover {
    background-color: #218838;
  }
</style>

<body>
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/testimonial/test-bg.png); padding: 50px 0;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-xl-12 col-lg-12">
        <div class="breadcrumb-wrap text-left">
          <div class="breadcrumb-title">
            <h2>KHÓA HỌC CỦA TÔI</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="index.php?act=course">Khoá học</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="h1">
  <h1>Danh sách khóa học đã đăng ký</h1>
</div>

<div class="content_khdki">
  <table>
    <thead>
      <tr>
        <th>TÊN KHOÁ HỌC</th>
        <th>HỌC PHÍ</th>
        <th>GIÁO VIÊN</th>
        <th>LỚP</th>
        <th>KHAI GIẢNG</th>
        <th>THỜI GIAN BẮT ĐẦU</th>
        <th>THỜI GIAN KẾT THÚC</th>
        <th>THỜI GIAN ĐĂNG KÍ</th>
        <th>THANH TOÁN</th>
        <th>HỌC BÀI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (is_array($courses_dki) && !empty($courses_dki)) {
        foreach ($courses_dki as $kh) {
          extract($kh);
          echo '<tr>
            <td>' . htmlspecialchars($course_name) . '</td>
            <td>' . number_format($course_price) . 'đ</td>
            <td>' . htmlspecialchars($instructor) . '</td>
            <td>' . htmlspecialchars($classname) . '</td>
            <td>' . htmlspecialchars($thoigian) . '</td>
            <td>' . htmlspecialchars($time_start) . '</td>
            <td>' . htmlspecialchars($time_end) . '</td>
            <td>' . htmlspecialchars($timestamp) . '</td>
            <td>' . htmlspecialchars($pttt) . '</td>';

          if (!empty($course_id)) {
            echo '<td><a href="hocbai.php?course_id=' . $course_id . '" class="btn-flashcard">Học bài</a></td>';
          } else {
            echo '<td><span style="color:red;">Không có ID</span></td>';
          }

          echo '</tr>';
        }
      } else {
        echo '<tr><td colspan="10" style="text-align: center; color: red;">Chưa đăng ký khoá học nào</td></tr>';
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>