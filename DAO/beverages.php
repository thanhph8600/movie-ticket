<?php
require_once '../../DAO/PDO.php';

class Beverages{
    static public function getAll(){
        $sql = "SELECT * FROM `beverages`";
        return pdo_query($sql);
    }

    static public function select_by_id($id){
        $sql = "SELECT * FROM `beverages` WHERE id = ?";
        return pdo_query_one($sql,$id);
    }

    static public function insert($name,$price,$detail,$thumb){
        $sql ="INSERT INTO `beverages`( `name`, `price`, `detail`, `thumb`) VALUES (? , ? , ?, ?)";
        pdo_execute($sql,$name,$price,$detail,$thumb);
    }

    static public function update($name,$price,$detail,$thumb,$id){
        $sql ="UPDATE `beverages` SET `name`=?,`price`=?, `detail` = ?,`thumb`=? WHERE `id` =?";
        pdo_execute($sql,$name,$price,$detail,$thumb,$id);
    }
    
    static public function delete($id){
        $sql ="DELETE FROM `beverages` WHERE `id` =?";
        pdo_execute($sql,$id);
    }

}
