<?php
    function them_bl($user_id, $course_id, $content, $timestamp){
        $sql = "INSERT INTO comments(user_id, course_id, content, timestamp) VALUES ('$user_id', '$course_id', '$content', '$timestamp')";
        pdo_execute($sql);
    }

    function hien_thi_bl($course_id){
        $sql = "SELECT * FROM comments WHERE course_id = $course_id";
        return pdo_query($sql);
    }
  
    function hien_thi_binh_luan(){
        $sql = "SELECT * FROM comments ORDER BY comment_id DESC";
        return pdo_query($sql);
    }

    function xoa_binh_luan($comment_id){
        $sql = "DELETE FROM comments WHERE comment_id=?";
        pdo_execute($sql, $comment_id);
    }

?>