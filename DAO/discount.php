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

    static public function get_byName($name){
        $sql = "SELECT * FROM `discount` WHERE `name` = ?";
        return pdo_query_one($sql,$name);
    }

    static public function get_ID_byName($name){
        $sql = "SELECT * FROM `discount` WHERE `name` = ?";
        return pdo_query_value($sql,$name);
    }

    static public function insert($name,$date_start,$date_end,$percent,$quantity){
        $sql = "INSERT INTO `discount`( `name`, `date_start`, `date_end`, `percent`,`quantity`) VALUES (?,?,?,?,?)";
        pdo_execute($sql,$name,$date_start,$date_end,$percent,$quantity);
    }

    static public function update($name,$date_start,$date_end,$percent,$quantity,$id){
        $sql = "UPDATE `discount` SET `name`=?,`date_start`=?,`date_end`=?,`percent`=? , `quantity` = ? WHERE `id` = ?";
        pdo_execute($sql,$name,$date_start,$date_end,$percent,$quantity,$id);
    }

    static public function update_quantity($quantity,$id){
        $sql = "UPDATE `discount` SET `quantity` = ? WHERE `id` = ?";
        pdo_execute($sql,$quantity,$id);
    }

    static public function delete($id){
        $sql = "DELETE FROM `discount` WHERE `id` = ?";
        return pdo_query_one($sql,$id);
    }

    static public function count_discout($date){
        $sql = "SELECT * FROM `discount` WHERE date_start <= ? AND date_end >= ? AND quantity > 0";
        return pdo_query($sql,$date,$date);
    }

}