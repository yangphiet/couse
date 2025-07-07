<?php


?>
<!-- footer -->
<footer class="footer-bg footer-p fix"
    style="background-image: url(img/bg/footer-bg.png); background-repeat: no-repeat; background-position: center;">
    <div class="footer-top pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12">
                    <div class="footer-widget mb-30">
                        <!-- <img src="img/logo/f_logo.png" alt="img"> -->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-sm-12">
                    <div class="footer-widget footer-link mt-20 text-center">
                        <ul>
                            <li><a href="index.php?act=home">Trang chủ</a></li>
                            <li><a href="index.php?act=course">Khoá học </a></li>
                            <li><a href="index.php?act=lienhe">Liên hệ</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-12">
                    <div class="footer-widget footer-social mt-15 text-right text-xl-right">
                        <a href="https://www.facebook.com/inhyangphiet" target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <!-- chat box ai -->
                 <!-- Hình ảnh Chat AI -->
<img src="img/icon/chatbox.png"
     class="chat-icon"
     onclick="toggleChat()"
     alt="Chat AI">
                <!-- Chat Box -->
<div class="chatbox" id="chatbox">
  <div class="chatbox-header">Trợ lý AI</div>
  <div class="chatbox-messages" id="chatbox-messages">
    <div class="message ai">Chào bạn! Tôi là trợ lý AI, cần giúp gì?</div>
  </div>
  <div class="chatbox-input">
    <input type="text" id="user-input" placeholder="Nhập tin nhắn...">
    <button onclick="sendMessage()">Gửi</button>
  </div>
</div>

<script>
  function toggleChat() {
    const box = document.getElementById("chatbox");
    box.style.display = (box.style.display === "flex") ? "none" : "flex";
  }

  function sendMessage() {
    const input = document.getElementById("user-input");
    const msg = input.value.trim();
    if (msg === "") return;

    const chat = document.getElementById("chatbox-messages");

    // User message
    const userMsg = document.createElement("div");
    userMsg.className = "message user";
    userMsg.textContent = msg;
    chat.appendChild(userMsg);

    // Fake AI response
    setTimeout(() => {
      const aiMsg = document.createElement("div");
      aiMsg.className = "message ai";
      aiMsg.textContent = "Cảm ơn bạn! Tôi sẽ phản hồi sớm.";
      chat.appendChild(aiMsg);
      chat.scrollTop = chat.scrollHeight;
    }, 500);

    input.value = "";
    chat.scrollTop = chat.scrollHeight;
  }
</script>
                <div class="footer-center pt-70 pb-40">
                    <div class="container">
                        <div class="row justify-content-between">
                            <!-- ... (No changes in this part) ... -->
                        </div>
                    </div>
                </div>
                <!-- <div class="copyright-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6 text-right text-xl-right">
                                 <ul>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Legal</a></li>
                    </ul> -->
            </div>
        </div>
    </div>
    </div>


</footer>
<!-- footer-end -->
<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/one-page-nav-min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/paroller.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/js_isotope.pkgd.min.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.meanmenu.min.js"></script>
<script src="js/parallax-scroll.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/element-in-view.js"></script>
<script src="js/main.js"></script>
</body>


</html>