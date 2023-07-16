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