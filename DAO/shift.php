<?php
require_once '../../DAO/PDO.php';

function shift_select_by_id_room($id_room){
    $sql = "SELECT * FROM `shift` WHERE `id_room` = ?";
    return pdo_query($sql,$id_room);
}

function shift_select_by_id($id){
    $sql = "SELECT * FROM `shift` WHERE `id` = ?";
    return pdo_query_one($sql,$id);
}

function shift_find_id($id_room,$name){
    $sql = "SELECT * FROM `shift` WHERE `id_room` = ? AND `name` = ?";
    return pdo_query_value($sql,$id_room,$name);
}

function shift_find_id_by_idRoom($id_room){
    $sql = "SELECT `id` FROM `shift` WHERE `id_room` = ?";
    return pdo_query($sql,$id_room);
}

function shift_insert($name,$id_room,$time_start,$time_end){
    $sql = "INSERT INTO `shift`(`name`, `id_room`, `time_start`, `time_end`) VALUES (?,?,?,?)";
    return pdo_query($sql,$name,$id_room,$time_start,$time_end);
}
function shift_update($time_start,$time_end,$id_shift){
    $sql = "UPDATE `shift` SET `time_start`= ?,`time_end`= ? WHERE id = ?";
    return pdo_query($sql,$time_start,$time_end,$id_shift);
}