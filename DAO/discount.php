<?php
require_once '../../DAO/PDO.php';

class Discount{

    static public function getAll(){
        $sql = "SELECT * FROM `discount`";
        return pdo_query($sql);
    }

    static public function get_byId($id){
        $sql = "SELECT * FROM `discount` WHERE `id` = ?";
        return pdo_query_one($sql,$id);
    }

    static public function insert($name,$date_start,$date_end,$percent){
        $sql = "INSERT INTO `discount`( `name`, `date_start`, `date_end`, `percent`) VALUES (?,?,?,?)";
        pdo_execute($sql,$name,$date_start,$date_end,$percent);
    }

    static public function update($name,$date_start,$date_end,$percent,$id){
        $sql = "UPDATE `discount` SET `name`=?,`date_start`=?,`date_end`=?,`percent`=? WHERE `id` = ?";
        pdo_execute($sql,$name,$date_start,$date_end,$percent,$id);
    }

    static public function delete($id){
        $sql = "DELETE FROM `discount` WHERE `id` = ?";
        return pdo_query_one($sql,$id);
    }

}