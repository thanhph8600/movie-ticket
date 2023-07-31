<?php
require_once '../../DAO/PDO.php';

function news_getAll(){
    $sql ="SELECT * FROM `news` order by created_date desc";
    return pdo_query($sql);
}

function news_select_byId($id){
    $sql ="SELECT * FROM `news` WHERE id = ?";
    return pdo_query_one($sql,$id);
}

function news_insert($title,$content,$detail_content,$thumb,$date,$role){
    $sql = "INSERT INTO `news`( `title`, `content`, `detail_content`,`thumb`, `created_date`,`role`) VALUES ( ? , ? , ? ,? ,? ,?)";
    pdo_execute($sql,$title,$content,$detail_content,$thumb,$date,$role);
}

function news_select_by_role($role){
    $sql ="SELECT * FROM `news` WHERE `role` = ?  order by created_date desc";
    return pdo_query($sql,$role);
}


function news_update($title,$content,$detail_content,$thumb,$role,$id){
    $sql = "UPDATE `news` SET `title`= ?,`content`= ?,`detail_content`= ?,`thumb`= ? , `role` = ? WHERE id = ?";
    pdo_execute($sql,$title,$content,$detail_content,$thumb,$role,$id);
}

function news_delete($id){
    $sql ="DELETE FROM `news` WHERE id = ?";
    return pdo_query($sql,$id);
}