<?php
session_start();

$score = $_SESSION['quiz_score'] ?? 0;
$total = $_SESSION['quiz_total'] ?? 0;
$correct = $_SESSION['quiz_correct'] ?? 0;
?>

<h2>Kết quả làm bài</h2>
<p>Số câu đúng: <?= $correct ?> / <?= $total ?></p>
<p>Điểm: <?= $score ?> / 10</p>
