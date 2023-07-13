<?php
include '../../DAO/PDO.php';

function user_insert($name,$phone,$birtday,$email,$pass,$sex,$role,$activated,$thumb){
    $sql = "INSERT INTO `user` ( `name`, `phone`, `birtday`, `email`, `pass`, `sex`, `role`, `activated`, `thumb`) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$name,$phone,$birtday,$email,$pass,$sex,$role,$activated,$thumb);
}

function user_update($name,$phone,$birtday,$email,$sex,$thumb,$id){
    $sql = "UPDATE `user` SET `name`=?,`phone`=?,`birtday`=?,`email`=?,`sex`=?,`thumb`=? WHERE `id_user` = ?";
    pdo_execute($sql,$name,$phone,$birtday,$email,$sex,$thumb,$id);
}


function user_select_by_email($email){
    $sql = "SELECT * FROM `user` WHERE `email` = ?";
    return pdo_query_one($sql,$email);
}

function user_changer_pass($pass,$email) {
    $sql = "UPDATE `user` SET `pass` = ? WHERE `user`.`email` = ?";
    pdo_execute($sql,$pass,$email);
}