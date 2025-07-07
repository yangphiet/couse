<?php
include_once "model/pdo.php";
include_once "model/flashcard.php";


$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$flashcards = get_flashcards_by_course($course_id);
$currentIndex = 0;
$current_card = $flashcards[$currentIndex] ?? null;
?>

<link rel="stylesheet" href="css/flashcard.css">

<div class="flashcard-container">
  <?php if ($current_card): ?>
    <div class="flashcard-box" onclick="flipCard(this)">
      <div class="front">
        <?= htmlspecialchars($current_card['tu_vung']) ?>
      </div>
      <div class="back">
        <?= htmlspecialchars($current_card['nghia']) ?>
      </div>
    </div>

<div class="flashcard-controls">
  <button onclick="markKnown()">Biết</button>
  <button onclick="markUnknown()">Không biết</button>
  <button id="nextCardBtn" onclick="nextCard()" style="display:none;">Từ tiếp theo</button>
</div>

    <div class="flashcard-progress">
      <span><?= $currentIndex + 1 ?>/<?= count($flashcards) ?></span>
    </div>
  <?php else: ?>
    <p class="text-center">Không tìm thấy flashcard nào cho khóa học này.</p>
  <?php endif; ?>
</div>
<script id="flashcardData" type="application/json">
  <?= json_encode($flashcards) ?>
</script>

<script src="js/flashcard.js"></script>

