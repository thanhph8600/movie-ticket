<?php
require_once '../../DAO/PDO.php';



function chair_is_waiting_insert($id_user,$id_showtime,$col_index,$row_index){
    $sql = "INSERT INTO `chair_is_waiting`(`id_user`, `id_showtime`, `col_index`, `row_index`) VALUES (?,?,?,?)";
    pdo_execute($sql,$id_user,$id_showtime,$col_index,$row_index);
}

function chair_is_waiting_delete_row($id_user,$id_showtime,$col_index,$row_index){
    $sql = "DELETE FROM `chair_is_waiting` WHERE id_user = ? AND id_showtime = ? AND col_index = ? AND row_index = ?";
    pdo_execute($sql,$id_user,$id_showtime,$col_index,$row_index);
}

function chair_is_waiting_delete_by_user_idShowtime($id_user,$id_showtime){
    $sql = "DELETE FROM `chair_is_waiting` WHERE id_user = ? AND id_showtime = ?";
    pdo_execute($sql,$id_user,$id_showtime);
}


function chair_is_waiting_select_by_id_showtime($id_showtime){
    $sql = "SELECT * FROM `chair_is_waiting` WHERE id_showtime = ?";
    return pdo_query($sql,$id_showtime);
}

function chair_is_waiting_check_chair($id_showtime,$row_index,$col_index){
    $sql = "SELECT * FROM `chair_is_waiting` WHERE id_showtime = ? AND  `col_index` = ? AND row_index = ?";
    return pdo_query($sql,$id_showtime,$row_index,$col_index);
}