<?php
require_once '../../DAO/PDO.php';

function banner_getAll(){
    $sql ="SELECT id, name, COUNT(name) AS count FROM `banner` GROUP by name";
    return pdo_query($sql);
}

function banner_select_byName($name){
    $sql ="SELECT * FROM `banner` where name = ?";
    return pdo_query($sql,$name);
}

function banner_select_byId($id){
    $sql ="SELECT * FROM `banner` where id = ?";
    return pdo_query_one($sql,$id);
}


function banner_insert($name,$thumb,$date){
    $sql ="INSERT INTO `banner`( `name`, `thumb`, `created_date`) VALUES (?, ?, ?)";
    return pdo_query($sql,$name,$thumb,$date);
}

function banner_update($thumb,$id){
    $sql ="UPDATE `banner` SET `thumb`=? WHERE id = ?";
    pdo_execute($sql,$thumb,$id);
}

function banner_delete($id){
    $sql ="DELETE FROM `banner` WHERE id = ?";
    return pdo_query($sql,$id);
}