<?php
// Thêm mới danh mục
function them_danhmuc($ten_danhmuc){
    $sql = "INSERT INTO category(category_name) VALUES (?)";
    pdo_execute($sql,$ten_danhmuc);
}
// hiển thị all danh mục
function danhmuc_selectAll(){
    $sql = "SELECT * FROM category ORDER BY category_id DESC";
    return pdo_query($sql);
}
function buoihoc_selectAll(){
    $sql = "SELECT * FROM lessons ORDER BY lessons_id DESC";
    return pdo_query($sql);
}
// xoá danh mục
function xoa_loai($ma_loai){
    $sql = "DELETE FROM category  WHERE category_id=?";
    pdo_execute($sql, $ma_loai);
}
// Lấy thông tin 1 id danh mục
function select_danhmuc_one($ma_loai){
    $sql = "SELECT * FROM category WHERE category_id=?";
    return pdo_query_one($sql, $ma_loai);
}
function edit_danhmuc($ma_loai, $ten_loai){
    $sql = "UPDATE category SET category_name=? WHERE category_id=?";
    pdo_execute($sql, $ten_loai, $ma_loai);
}
?>