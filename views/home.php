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
                    <div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /search-popup -->
    <!-- slider-area -->
    <section id="home" class="slider-area slider-four fix p-relative">

        <div class="slider-active">
            <div class="single-slider slider-bg d-flex align-items-center"
                style="background: url(img/slider/slider_img_bg.png) no-repeat;background-position: center center;">
                <div class="container">
                    <div class="row justify-content-center pt-50  pb-150">
                        <div class="col-lg-7">
                            <div class="slider-content s-slider-content mt-200">

                                <h2 data-animation="fadeInUp" data-delay=".4s">Bắt đầu học với chúng tôi ngay bây giờ!
                                </h2>
                                <p data-animation="fadeInUp" data-delay=".6s">Học ngoại ngữ không chỉ là giao tiếp, mà
                                    là giải quyết khoảng cách – giữa con người, văn hóa và tư duy.
                                    Người giỏi ngoại ngữ không chỉ nói tốt, họ kết nối, truyền cảm và xây dựng cầu nối
                                    bằng lời.</p>


                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="slider-img" data-animation="fadeInUp" data-delay=".4s">
                                <img src="img/slider/slider_img05.png" alt="slider_img05">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </section>
    <!-- slider-area-end -->
    <!-- featured-courses-area -->
<section id="courses" class="courses-area fix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title center-align text-center mb-50">
                    <h5>KHOÁ HỌC TỐT NHẤT</h5>
                    <h2>KHOÁ HỌC MỚI NHẤT</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="featured-courses-active row">
                    <?php
                    // Kiểm tra mảng khoá học mới
                    if (isset($khnew) && is_array($khnew) && count($khnew) > 0) {
                        foreach ($khnew as $kh) {
                            $course_id = htmlspecialchars($kh['course_id']);
                            $course_name = htmlspecialchars($kh['course_name']);
                            $image = htmlspecialchars($kh['image']);

                            // Đường dẫn ảnh
                            $imagePath = "admin/image/" . $image;
                            if (!file_exists($imagePath) || empty($image)) {
                                $imagePath = "admin/image/default.png"; // Thay bằng ảnh mặc định có sẵn
                            }

                            echo '
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="box-courses text-center p-3 border rounded shadow-sm h-100">
                                    <a href="index.php?act=detail&spct=' . $course_id . '">
                                        <img src="' . $imagePath . '" class="img-fluid" alt="' . $course_name . '">
                                    </a>
                                    <div class="text mt-3">
                                        <h4>
                                            <a href="index.php?act=detail&spct=' . $course_id . '">' . $course_name . '</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<p class="text-center text-danger w-100">Không có khoá học mới nào để hiển thị.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- featured-courses-area-end -->
    <!-- about-area -->
    <section id="about" class="about-area about-p pt-70 pb-120 p-relative"
        style="background: url(img/features/about-bg-aliments.png) no-repeat;background-position: center center;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 pr-30">
                    <div class="s-about-img p-relative  wow fadeInLeft  animated" data-animation="fadeInLeft"
                        data-delay=".4s">
                        <img src="img/features/about_img.png" alt="img">
                        <div class="about-text second-about">
                            <div class="all-text">
                                <h3>50</h3>
                                <span>Số năm<br> kinh nghiệm</span>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-content s-about-content  wow fadeInRight  animated" data-animation="fadeInRight"
                        data-delay=".4s">
                        <div class="about-title second-atitle pb-25">
                            <h5>Về chúng tôi</h5>
                            <h2>Chào mừng đến với lớp học SOLVIA</h2>
                        </div>

                        <p>Học ngoại ngữ không chỉ là học nói, mà là học cách hiểu một nền văn hóa mới.</p>

                        <div class="about-content3">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="green">
                                        <li>Hello World là bắt đầu, chứ không phải là kết thúc.</li>
                                        <li>Học ngoại ngữ giống như giải một câu đố – nhưng bạn vừa là người học, vừa là
                                            người tạo ra ngữ cảnh, cảm xúc và cách diễn đạt. Mỗi tình huống đều có thể
                                            thay đổi, và bạn học cách thích nghi.</li>
                                    </ul>
                                </div>

                            </div>


                        </div>


                        <div class="slider-btn mt-10">
                            <a href="about.html" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Đọc
                                thêm</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- about-area-end -->
    <!-- testimonial-area -->
    <section class="testimonial-area pt-120 pb-120"
        style=" background-image: url(img/testimonial/test-bg-aliments.png); background-repeat: no-repeat; background-position: center; background-color: #fff7f5;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-title second-atitle pt-15">
                        <h5>Lời chứng thực</h5>
                        <h2>
                            Xem
                            khách hàng <br>của chúng tôi nói gì
                        </h2>
                        <p class="pt-15">"Học ngoại ngữ là một hành trình, không phải là một điểm đến.
                            Niềm vui không chỉ nằm ở việc nói trôi chảy hay đạt điểm cao, mà còn ở quá trình khám phá,
                            luyện tập và tiến bộ từng ngày.
                            Những lỗi phát âm bạn sửa, những từ vựng bạn quên rồi nhớ lại, và sự kiên trì học tập mỗi
                            ngày – chính là những cột mốc quý giá trên con đường chinh phục ngôn ngữ mới.
                            Thành công không đến trong một đêm, mà được xây dựng từ sự bền bỉ và đam mê."</p>
                    </div>

                </div>

                <div class="mb" id="binhluan"></div>
                <div class="col-lg-6">
                    <div class="testimonial-active">

                        <?php foreach ($listbl as $lbl): { ?>

                                <div class="single-testimonial">
                                    <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar.png" alt="img">
                                        <div class="ta-info">

                                            <span>
                                                <h5>Student</h5>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="qt-img">
                                        <img src="img/testimonial/qt-icon.png" alt="img">
                                    </div>
                                    <p><?= $lbl['content'] ?></p>

                                </div>
                            <?php }endforeach; ?>

                    </div>
                </div>
            </div>

    </section>

    <!-- vedio-area -->
    <section id="vedio" class="vedio-area pt-120 pb-90 fix"
        style=" background-image: url(img/video/vedio-bg.png); background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-align text-center">
                        <h5>Xem chúng tôi</h5>
                        <h2>
                            BẮT ĐẦU PHÁT TRIỂN CỘNG ĐỒNG
                        </h2>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="video-img wow fadeInRight animated" data-animation="fadeInDown animated"
                        data-delay=".2s"
                        style="background-image:url(img/logo/logovideo.png); background-repeat: no-repeat; background-position: center;">
                        <a href="https://www.bing.com/videos/riverview/relatedvideo?&q=h%e1%bb%8dc+hutech&&mid=412007CBBD5CEC697DA6412007CBBD5CEC697DA6&&FORM=VRDGAR"
                            class="video-i popup-video"> <img src="img/video/play.svg" alt="img"
                                class="active-icon"></a>
                    </div>


                </div>


            </div>
        </div>
    </section>
    <!-- vedio-area-end -->


    <!-- testimonial-area-end -->
</main>
<!-- main-area-end -->