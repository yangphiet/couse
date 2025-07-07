<body>
        <div class="containerr" id="containerr">
            <div class="form-containerr sign-in">
                <form action="index.php?act=forgot_password" method="post" id="loginForm">

                    <h1>Quên mật khẩu</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email password</span>
                    <input type="email" name="email" placeholder="email">
                    <p style="color: red; margin: 2px;"  class="error_message" >
                    <?php
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    ?>
                </p>

                    <a style=" margin: 2px;" href="index.php?act=login">Sign In</a>
                    <!-- <a style="margin: 2px;" href="index.php?act=doimatkhau">Change Password</a> -->

                    <!-- Sửa thành -->
                    <button type="submit" name="forgot_password">Submit</button>

                </form>
              
            </div>
            <div class="toggle-containerr">
                <div class="toggle">
                    <div class="toggle-panel toggle-right">
                        <h1>Hello, Friend!</h1>
                        <p>Có vẻ như là bạn đã quên mật khẩu của mình nhỉ !</p>

                    </div>
                </div>
            </div>
        </div>
      

    </body>

