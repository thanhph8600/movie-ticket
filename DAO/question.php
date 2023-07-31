<?php
require_once '../../DAO/PDO.php';

function question_insert($id_user,$question,$date){
    $sql = "INSERT INTO `question`(`id_user`, `question`, `date`) VALUES (?, ?, ?)";
    pdo_execute($sql,$id_user,$question,$date);
}

function question_getALL(){
    $sql = "SELECT question.*, user.name, user.email ".
    " FROM `question` JOIN user ON question.id_user = user.id ";
    return pdo_query($sql);
}

function question_select_byUserId($id_user){
    $sql = "SELECT * FROM `question` WHERE id_user = ?";
    return pdo_query($sql,$id_user);
}

function question_select_byId($id){
    $sql = "SELECT * FROM `question` WHERE id = ?";
    return pdo_query_one($sql,$id);
}

function question_insert_answer($answer,$id){
    $sql = "UPDATE `question` SET `answer`= ? WHERE id = ?";
    pdo_execute($sql,$answer,$id);
}

function question_delete($id){
    $sql = "DELETE FROM `question` WHERE id = ?";
    pdo_execute($sql,$id);
}

