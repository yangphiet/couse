<?php
function get_flashcards_by_course($course_id) {
    $sql = "SELECT * FROM flashcards WHERE course_id = ?";
    return pdo_query($sql, $course_id);
}
?>
