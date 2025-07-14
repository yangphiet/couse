<body>

    <div class="containerr" id="containerr">
        <div class="form-containerr sign-up">
            <form action="index.php?act=login" method="post" id="registerForm">
                <h1>Đăng ký</h1>
                <span>hoặc sử dụng email của bạn để đăng ký</span>
                <input type="text" name="username" placeholder="Tên" required>
                <input type="text" name="full_name" placeholder="Tên đầy đủ" required>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <input type="email" name="email" placeholder="Email" required>
                <div style="display: flex; justify-content: center; gap: 30px; align-items: center; margin: 15px 0;">
                    <label style="font-size: 1.1em; font-weight: 500; display: flex; align-items: center; cursor: pointer;">
                        <input type="radio" name="register_role" value="user" checked style="accent-color: #007bff; width: 18px; height: 18px; margin-right: 8px;">
                        <span style="display: flex; align-items: center;">
                            <i class="fa fa-user-graduate" style="color: #007bff; font-size: 1.2em; margin-right: 6px;"></i> Học viên
                        </span>
                    </label>
                    <label style="font-size: 1.1em; font-weight: 500; display: flex; align-items: center; cursor: pointer;">
                        <input type="radio" name="register_role" value="teacher" style="accent-color: #28a745; width: 18px; height: 18px; margin-right: 8px;">
                        <span style="display: flex; align-items: center;">
                            <i class="fa fa-chalkboard-teacher" style="color: #28a745; font-size: 1.2em; margin-right: 6px;"></i> Giáo viên
                        </span>
                    </label>
                </div>
                <button type="submit" name="register">Đăng ký</button>
            </form>
        </div>
        <div class="form-containerr sign-in">
            <form action="index.php?act=login" method="post" id="loginForm">

                <h1>Đăng nhập</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>sử dụng mật khẩu email của bạn</span>
                <input type="text" name="username" placeholder="Tên người dùng" required>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <div style="margin: 10px 0;">
                    <div style="display: flex; justify-content: center; gap: 30px; align-items: center; margin: 15px 0;">
                        <label style="font-size: 1.1em; font-weight: 500; display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="role" value="user" checked style="accent-color: #007bff; width: 18px; height: 18px; margin-right: 8px;">
                            <span style="display: flex; align-items: center;">
                                <i class="fa fa-user-graduate" style="color: #007bff; font-size: 1.2em; margin-right: 6px;"></i> Học viên
                            </span>
                        </label>
                        <label style="font-size: 1.1em; font-weight: 500; display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="role" value="teacher" style="accent-color: #28a745; width: 18px; height: 18px; margin-right: 8px;">
                            <span style="display: flex; align-items: center;">
                                <i class="fa fa-chalkboard-teacher" style="color: #28a745; font-size: 1.2em; margin-right: 6px;"></i> Giáo viên
                            </span>
                        </label>
                    </div>
                </div>
                <p style="color: red; margin: 2px;" class="error_message">
                    <?php
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    ?>
                </p>
                <button type="submit" name="login">Đăng nhập</button>
                <a style="margin: 2px;" href="index.php?act=forgot_password">Bạn quên mật khẩu?</a>
                <!-- <a style="margin: 2px;" href="index.php?act=doimatkhau">Change Password</a> -->
            </form>
        </div>
        <div class="toggle-containerr">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Chào mừng!</h1>
                    <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="login">Đăng nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào, bạn!</h1>
                    <p>Đăng ký với thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="register">Đăng kí</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php
            if ($isRegistrationSuccess) {
                echo 'alert("Đăng ký thành công! Bây giờ bạn có thể đăng nhập.");';
            } elseif (!empty($error_message)) {
                echo 'alert("' . addslashes($error_message) . '");';
            }
            ?>
        });
    </script>
</body>