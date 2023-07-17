<?php
require_once '../../DAO/PDO.php';


function film_insert($name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb){
    $sql ="INSERT INTO `film`( `name`, `directors`, `actor`, `genre`, `premiere`, `time`, `language`, `rated`, `trailer`, `description`, `thumb`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb);
}


function film_update($name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb,$id){
    $sql ="UPDATE `film` SET `name`=?,`directors`=?,`actor`=?,`genre`=?,`premiere`=?,`time`=?,`language`=?,`rated`=?,`trailer`=?,`description`=?,`thumb`=? WHERE `id` = ?";
    pdo_execute($sql,$name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb,$id);
}


function film_select_all(){
    $sql = "SELECT * FROM `film`";
    return pdo_query($sql);
}

function film_select_by_id($id){
    $sql = "SELECT * FROM `film` where `id` = ?";
    return pdo_query_one($sql,$id);
}

function film_find_name_by_id($id){
    $sql = "SELECT `name` FROM `film` where `id` = ?";
    return pdo_query_value($sql,$id);
}

function film_delete($id){
    $sql = "DELETE FROM `film` WHERE `id` = ?";
    pdo_execute($sql,$id);
}


