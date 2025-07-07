
<!-- offcanvas-area -->
<div class="offcanvas-menu">
    <span class="menu-close"><i class="fas fa-times"></i></span>
    <form role="search" method="get" id="searchform" class="searchform" action="http://wordpress.zcube.in/xconsulta/">
        <input type="text" name="s" id="search" value="" placeholder="Search" />
        <button><i class="fa fa-search"></i></button>
    </form>


    <div id="cssmenu3" class="menu-one-page-menu-container">
        <ul id="menu-one-page-menu-2" class="menu">
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.html">Home</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="about.html">About Us</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="services.html">Services</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="pricing.html">Pricing </a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="team.html">Team </a></li>

            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="projects.html">Gallery Study</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="blog.html">Blog</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="contact.html">Contact</a></li>
        </ul>
    </div>

    <div id="cssmenu2" class="menu-one-page-menu-container">
        <ul id="menu-one-page-menu-1" class="menu">
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home"><span>+8 12 3456897</span></a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#howitwork"><span>info@example.com</span></a></li>
        </ul>
    </div>
</div>
<div class="offcanvas-overly"></div>
<!-- offcanvas-end -->
<main>
    <!-- search-popup -->
    <div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content search-popup">
                <div class="text-center">
                    <a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
                </div>
                <div class="row search-outer">
                    <div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
                    <div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                </div>
            </div>
        </div>
    </div>


    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(../img/testimonial/test-bg.png)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2>CHI TIẾT KHOÁ HỌC</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?act=home">TRANG CHỦ</a></li>

                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- Project Detail -->
    <section class="project-detail">
        <div class="container">
            <!-- Lower Content -->
            <div class="lower-content">
                <div class="row">
                    <?php

                    // Assume $courseId is the variable containing the selected course ID
                    $courseId = isset($_GET['spct']) ? $_GET['spct'] : 0;

                    // Fetch details based on $courseId and populate $course array
                    $course = get_course_details($courseId);

                    // Check if $course is not null before proceeding
                    if ($course) :
                    ?>
                        <!-- Display course details -->
                        <div class="text-column col-lg-8 col-md-8 col-sm-12">
                            <h2><?php echo $course['course_name']; ?></h2>
                            <ul class="course-meta review style2 clearfix mb-30">
                                <li class="author">
                                    <div class="thumb">
                                        <img src="./img/testimonial/testi_avatar.png" alt="image">
                                    </div>
                                    <div class="text">
                                        <a href="#"><?php echo $course['instructor']; ?></a>
                                        <p>Giảng viên</p>
                                    </div>
                                </li>
                                <li class="categories">
                                    <a href="#" class="course-name"><?php echo $course['course_name']; ?></a>
                                    <p>Tên khoá học</p>
                                </li>
                            </ul>
                            <div class="upper-box">
                                <div class="single-item-carousel owl-carousel owl-theme">

                                    <figure class="image">
                                        <img src="admin/image/<?php echo $course['image']; ?>" alt="">
                                    </figure>



                                </div>
                            </div>
                            <div class="inner-column">

                                <p><span class="dropcap">U</span> <?php echo $course['intro']; ?></p> <br>

                                <h4>Study Options:</h4>
                                <table class="table table-bordered mb-30">
                                    <thead>
                                        <tr>
                                            <th>Trình độ chuyên môn</th>
                                            <th>Thời gian bắt đầu khoá học</th>
                                            <th>Ngôn ngữ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pro</td>
                                            <td><?php echo $course['thoigian']; ?></td>
                                            <td><?php echo $course['course_name']; ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <h4>BẠN SẼ HỌC ĐƯỢC NHỮNG GÌ</h4>
                                <p> "Mỗi dòng code bạn viết là như một cây cầu nối giữa khả năng sáng tạo của bạn và thế giới số, mở ra những cánh cửa mới của trải nghiệm và tương tác." </p>
                                <p> "Dòng code không chỉ là những kí tự đơn thuần, mà là những chương trình nhỏ nằm trong hệ sinh thái lớn, góp phần tạo ra những trải nghiệm tương tác và ảo diệu." </p>
                                <ul class="pr-ul">
                                    <li>
                                        <div class="icon"><i class="fal fa-check"></i></div>
                                        <div class="text">
                                            "Lập trình không phải là về việc nhớ mọi điều, mà là về cách bạn giải quyết vấn đề và tìm kiếm thông tin.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fal fa-check"></i></div>
                                        <div class="text">
                                            "Không có gì là không thể trong lập trình, chỉ là có những giải pháp chưa được tìm ra."
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fal fa-check"></i></div>
                                        <div class="text">
                                            "Khám phá, học hỏi và không ngừng cải tiến - đó là chìa khóa để trở thành một lập trình viên xuất sắc.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fal fa-check"></i></div>
                                        <div class="text">
                                            "Không phải ai cũng bắt đầu từ sự hoàn hảo. Quan trọng là hành trình của bạn và sự kiên trì để tiếp tục học hỏi."
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fal fa-check"></i></div>
                                        <div class="text">
                                            "Mỗi dòng code là một cơ hội để làm cho thế giới trở nên tốt đẹp hơn."
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar with course details -->

                        <div class="col-lg-4">
                            <aside class="sidebar-widget">
                                <section class="widget widget_search">
                                    <div class="course-widget-price">

                                        <h2 class="widget-title"><?php echo $course['course_name']; ?></h2>
                                        <ul>
                                            <!-- Additional details here -->
                                        </ul>
                                        <h6 class="pt-20 pb-20">HỌC PHÍ: <span><?php echo $course['price']; ?>VNĐ</span></h6>

                                        <?php
                                        if (isset($_SESSION['username'])) {
                                        ?>

                                            <form action="index.php?act=pay" method="post">
                                                <input type="hidden" name="instructor" value="<?php echo $course['instructor']; ?>">
                                                <input type="hidden" name="thoigian" value="<?php echo $course['thoigian']; ?>" >
                                                <input type="hidden" name="time_start" value="<?php echo $course['time_start']; ?>">
                                                <input type="hidden" name="time_end" value="<?php echo $course['time_end']; ?>">
                                                <input type="hidden" name="classname" value="<?php echo $course['classname']; ?>">
                                                <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                                                <input type="hidden" name="course_name" value="<?php echo $course['course_name']; ?>">
                                                <input type="hidden" name="price" value="<?php echo $course['price']; ?>">
                                                 <input class="btn ss-btn mb-2" name="addpay" type="submit" value="ĐĂNG KÍ KHOÁ HỌC">

                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <a class="btn ss-btn" href="index.php?act=login">ĐĂNG KÍ KHOÁ HỌC</a>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <section id="categories-1" class="widget widget_categories">
                                        <h2 class="widget-title">THÔNG TIN KHOÁ HỌC</h2>

                                        <ul>
                                            <li class="cat-item cat-item-16"><a href="#">Lớp học</a> <?php echo $course['classname']; ?></li>
                                            <li class="cat-item cat-item-23"><a href="#">Bắt đầu</a> <?php echo $course['time_start']; ?></li>
                                            <li class="cat-item cat-item-18"><a href="#">Kết thúc</a> <?php echo $course['time_end']; ?></li>
                                            <li class="cat-item cat-item-22"><a href="#">Giáo viên</a> <?php echo $course['instructor']; ?></li>
                                        </ul>
                                    </section>
                                </section>
                            </aside>
                        </div>
                    <?php else : ?>
                        <div class="col-lg-12">
                            <p>Course not found!</p>
                        </div>
                    <?php endif; ?>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#binhluan").load("views/formbluan.php", {
                            course_id: <?= $course['course_id'] ?>
                        });
                    });
                </script>
                <div class="mb" id="binhluan"></div>

            </div>

        </div>

        </div>


    </section>
    <!-- End Project Detail -->
    <!-- End Project Detail -->
</main>
<<!-- main-area-end -->


    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Include other JS dependencies as needed -->
    </body>

    </html>