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

function comment_getAll(){
    $sql = "SELECT * FROM `comment` ORDER BY id DESC";
    return pdo_query($sql);
}

function comment_delete($id_comment){
    $sql = "DELETE FROM `comment` WHERE id = ?";
    pdo_execute($sql,$id_comment);
}

function comment_select_list_groupBy_idFilm(){
    $sql = "SELECT film.id,film.name,film.thumb,COUNT(film.id) as quantity FROM `comment` JOIN film ON comment.id_film = film.id GROUP BY id_film";
    return pdo_query($sql);
}


function comment_select_detail($id_film){
    $sql = "SELECT comment.*,user.name FROM `comment` JOIN user ON comment.id_user = user.id WHERE comment.id_film = ?";
    return pdo_query($sql,$id_film);
}