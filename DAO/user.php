<?php
require_once '../../DAO/PDO.php';

function user_insert($name,$phone,$birtday,$email,$pass,$sex,$role,$activated,$thumb){
    $sql = "INSERT INTO `user` ( `name`, `phone`, `birtday`, `email`, `pass`, `sex`, `role`, `activated`, `thumb`) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$name,$phone,$birtday,$email,$pass,$sex,$role,$activated,$thumb);
}

function user_update($name,$phone,$birtday,$email,$sex,$thumb,$id){
    $sql = "UPDATE `user` SET `name`=?,`phone`=?,`birtday`=?,`email`=?,`sex`=?,`thumb`=? WHERE `id_user` = ?";
    pdo_execute($sql,$name,$phone,$birtday,$email,$sex,$thumb,$id);
}

function user_update_all($name,$phone,$birtday,$email,$pass,$sex,$role,$activated,$thumb,$id){
    $sql = "UPDATE `user` SET `name`=?,`phone`=?,`birtday`=?,`email`=?,`pass`=?,`sex`=?,`role`=?,`activated`=?,`thumb`=? WHERE `id` = ?";
    pdo_execute($sql,$name,$phone,$birtday,$email,$pass,$sex,$role,$activated,$thumb,$id);
}

function user_delete($id){
    $sql = "DELETE FROM `user` WHERE `id` = ?";
    pdo_execute($sql,$id);
}

function user_select_by_email($email){
    $sql = "SELECT * FROM `user` WHERE `email` = ?";
    return pdo_query_one($sql,$email);
}

function user_select_by_id($id){
    $sql = "SELECT * FROM `user` WHERE `id` = ?";
    return pdo_query_one($sql,$id);
}

function user_select_all(){
    $sql = "SELECT * FROM `user`";
    return pdo_query($sql);
}

function user_changer_pass($pass,$email) {
    $sql = "UPDATE `user` SET `pass` = ? WHERE `user`.`email` = ?";
    pdo_execute($sql,$pass,$email);
}

function user_select_new_user() {
    $sql = "SELECT * FROM `user` WHERE role =1 ORDER BY id DESC";
    return pdo_query($sql);
}