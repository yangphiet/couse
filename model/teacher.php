<?php
function get_teacher_name($teacher_id) {
    $sql = "SELECT full_name FROM teachers WHERE teacher_id = ?";
    $row = pdo_query_one($sql, $teacher_id);
    return $row && isset($row['full_name']) ? $row['full_name'] : 'Chưa cập nhật';
}
?>
