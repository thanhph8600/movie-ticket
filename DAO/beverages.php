<?php
require_once '../../DAO/PDO.php';

class Beverages{

    static public function insert($name,$price,$thumb){
        $sql ="INSERT INTO `beverages`( `name`, `price`, `thumb`) VALUES (? , ? , ?)";
        pdo_execute($sql,$name,$price,$thumb);
    }

}
