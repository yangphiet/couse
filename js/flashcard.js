// Dữ liệu flashcard từ PHP
let flashcards = JSON.parse(document.getElementById("flashcardData").textContent);
let currentIndex = 0;
const box = document.querySelector('.flashcard-box');

// Khi lật thẻ bằng click
function flipCard(card) {
  card.classList.add('flipped');
  document.getElementById("nextCardBtn").style.display = "inline-block";
}

// Xử lý khi chọn "Biết"
function markKnown() {
  if (!box.classList.contains('flipped')) {
    flipCard(box);
  }
  alert("👍 Bạn đã ghi nhớ từ này!");
  setTimeout(nextCard, 1000);
}

// Xử lý khi chọn "Không biết"
function markUnknown() {
  if (!box.classList.contains('flipped')) {
    flipCard(box);
  }
  alert("📌 Bạn nên ôn lại từ này.");
  setTimeout(nextCard, 1000);
}

// Chuyển sang từ tiếp theo
function nextCard() {
  currentIndex++;
  if (currentIndex < flashcards.length) {
    updateFlashcardDisplay();
  } else {
    document.querySelector('.flashcard-container').innerHTML =
      "<p class='text-center'>🎉 Bạn đã hoàn thành tất cả flashcard!</p>";
  }
}

// Cập nhật flashcard mới, không gây hiệu ứng lật ngược
function updateFlashcardDisplay() {
  const card = flashcards[currentIndex];

  // 1. Tạm tắt hiệu ứng lật
  box.style.transition = "none";
  box.classList.remove('flipped');

  // 2. Cập nhật nội dung thẻ
  box.querySelector('.front').textContent = card.tu_vung;
  box.querySelector('.back').textContent = card.nghia;

  // 3. Buộc trình duyệt render lại (force reflow)
  void box.offsetWidth;

  // 4. Khôi phục hiệu ứng
  box.style.transition = "transform 1s ease-in-out";

  // 5. Cập nhật tiến độ và ẩn nút
  document.querySelector('.flashcard-progress span').textContent = `${currentIndex + 1}/${flashcards.length}`;
  document.getElementById("nextCardBtn").style.display = "none";
}
