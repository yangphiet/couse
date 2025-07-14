<?php
function getQuizzesByLessonId($lesson_id) {
    $sql = "SELECT * FROM quizzes WHERE lesson_id = ?";
    return pdo_query($sql, $lesson_id);
}
function get_quiz_by_lesson($lesson_id) {
    $sql = "SELECT * FROM quizzes WHERE lesson_id = ?";
    return pdo_query($sql, $lesson_id);
}

function add_quiz($lesson_id, $question, $option_a, $option_b, $option_c, $option_d, $answer) {
    $sql = "INSERT INTO quizzes (lesson_id, question, option_a, option_b, option_c, option_d, answer)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $lesson_id, $question, $option_a, $option_b, $option_c, $option_d, $answer);
}

?>
