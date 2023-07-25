<?php
require_once '../../DAO/PDO.php';

function room_insert($name,$seats){
    $sql = "INSERT INTO `room`( `name`, `seats`) VALUES (?,?)";
    return last_id($sql,$name,$seats);
}

function room_update($name,$seats,$id){
    $sql = "UPDATE `room` SET `name`=?,`seats`=?  WHERE `id` = ?";
    pdo_execute($sql,$name,$seats,$id);
}

function room_delete($id){
    $sql = "DELETE FROM `room` WHERE `id` = ?";
    pdo_execute($sql,$id);
}

function room_select_all(){
    $sql = "SELECT * FROM `room`";
    return pdo_query($sql);
}

function room_select_by_id($id){
    $sql = "SELECT * FROM `room` where `id` = ?";
    return pdo_query_one($sql,$id);
}
