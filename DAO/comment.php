<?php
require_once '../../DAO/PDO.php';

function comment_insert($id_user,$id_film,$comment,$date,$vote){
    $sql ="INSERT INTO `comment`(`id_user`, `id_film`, `content`, `date_`, `vote`) VALUES (?,?,?,?,?)";
    pdo_execute($sql,$id_user,$id_film,$comment,$date,$vote);
}

function comment_select_by_idFilm($id_film){
    $sql = "SELECT * FROM `comment` WHERE id_film = ?";
    return pdo_query($sql,$id_film);
}

function comment_select_by_id($id_comment){
    $sql = "SELECT * FROM `comment` WHERE id = ?";
    return pdo_query($sql,$id_comment);
}