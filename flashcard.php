<?php
include_once "model/pdo.php";
include_once "model/flashcard.php";

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$flashcards = get_flashcards_by_course($course_id);
?>
<div style="position: fixed; top: 30px; left: 30px; z-index: 999;">
  <a href="hocbai.php?course_id=<?= $course_id ?>" style="text-decoration: none;">
    <button style="padding: 10px 20px; background-color: #6c757d; color: white; border-radius: 8px; border: none;">
      ⬅ Quay lại học bài
    </button>
  </a>
</div>


<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Học từ vựng</title>
  <style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f2f6fa;
    margin: 0;
    padding: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    flex-direction: column;
    text-align: center;
  }
  h2 {
    margin-bottom: 20px;
    color: #1e88e5;
    font-size: 32px;
  }
  .flashcard-container {
    max-width: 600px;
    width: 100%;
    margin: auto;
  }
  .flashcard-box {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    padding: 40px;
    cursor: pointer;
    perspective: 1000px;
    position: relative;
    transition: transform 0.6s;
    min-height: 200px;
  }
  .front, .back {
    font-size: 28px;
    transition: 0.5s;
  }
  .back {
    display: none;
    color: #333;
  }
  .flashcard-box.flipped .front {
    display: none;
  }
  .flashcard-box.flipped .back {
    display: block;
  }
  .flashcard-details {
    font-size: 20px;
    margin-top: 12px;
    color: #666;
  }
  .flashcard-controls {
    margin-top: 25px;
  }
  .flashcard-controls button {
    padding: 12px 24px;
    margin: 6px;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    cursor: pointer;
    background-color: #2196F3;
    color: white;
    transition: background 0.3s ease;
    font-size: 16px;
  }
  .flashcard-controls button:hover {
    background-color: #0b7dda;
  }
  .flashcard-progress {
    margin-top: 20px;
    font-size: 18px;
    color: #333;
  }
  .summary-box {
    background: #fff;
    margin-top: 30px;
    padding: 25px;
    border-radius: 14px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-size: 18px;
  }
</style>

</head>
<body>

<h2>Học từ vựng</h2>

<div class="flashcard-container">
  <div id="card" class="flashcard-box" onclick="flipCard()">
    <div class="front" id="card-front"></div>
    <div class="back" id="card-back"></div>
  </div>

  <div class="flashcard-details" id="example-sentence"></div>

  <div class="flashcard-controls">
    <button onclick="markKnown()">✔ Đã thuộc</button>
    <button onclick="markUnknown()">✘ Chưa thuộc</button>
    <button id="nextCardBtn" onclick="nextCard()" style="display:none;">Từ tiếp theo ▶</button>
  </div>

  <div class="flashcard-progress" id="progress"></div>

  <div class="summary-box" id="summary" style="display:none;">
    <h3>Kết quả học</h3>
    <p id="summary-text"></p>
    <button onclick="restart()">Học lại</button>
  </div>
</div>

<script>
  const flashcards = <?= json_encode($flashcards) ?>;
  let currentIndex = 0;
  let knownCount = 0;
  let unknownCount = 0;

  const card = document.getElementById('card');
  const front = document.getElementById('card-front');
  const back = document.getElementById('card-back');
  const progress = document.getElementById('progress');
  const nextBtn = document.getElementById('nextCardBtn');
  const exampleBox = document.getElementById('example-sentence');
  const summary = document.getElementById('summary');
  const summaryText = document.getElementById('summary-text');

  function updateCard() {
    if (currentIndex >= flashcards.length) {
      card.style.display = 'none';
      document.querySelector('.flashcard-controls').style.display = 'none';
      summary.style.display = 'block';
      summaryText.innerText = `Bạn đã thuộc ${knownCount}/${flashcards.length} từ.`;
      return;
    }

    card.classList.remove('flipped');
    const current = flashcards[currentIndex];
    front.innerText = current.tu_vung;
    back.innerHTML = `<strong>Ý nghĩa:</strong> ${current.nghia}`;
    exampleBox.innerText = current.vi_du ? `Ví dụ: ${current.vi_du}` : '';
    progress.innerText = `Từ ${currentIndex + 1} / ${flashcards.length}`;
    nextBtn.style.display = 'none';
  }

  function flipCard() {
    card.classList.toggle('flipped');
    nextBtn.style.display = 'inline-block';
  }

  function markKnown() {
    knownCount++;
    nextCard();
  }

  function markUnknown() {
    unknownCount++;
    nextCard();
  }

  function nextCard() {
    currentIndex++;
    updateCard();
  }

  function restart() {
    currentIndex = 0;
    knownCount = 0;
    unknownCount = 0;
    card.style.display = 'block';
    document.querySelector('.flashcard-controls').style.display = 'block';
    summary.style.display = 'none';
    updateCard();
  }

  updateCard();
</script>


</body>
</html>
