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

    static public function select_by_idTicket($id_ticket){
        $sql = "SELECT * FROM `bill_beverages` WHERE `id_ticket` = ?";
        return pdo_query($sql,$id_ticket);
    }

    static public function insert($name,$price,$detail,$thumb){
        $sql ="INSERT INTO `beverages`( `name`, `price`, `detail`, `thumb`) VALUES (? , ? , ?, ?)";
        pdo_execute($sql,$name,$price,$detail,$thumb);
    }
    
    static public function insert_bill($id_ticket,$id_beverages,$quantity,$price){
        $sql ="INSERT INTO `bill_beverages`(`id_ticket`, `id_beverages`, `quantity`, `price`) VALUES (?,?,?,?)";
        pdo_execute($sql,$id_ticket,$id_beverages,$quantity,$price);
    }

    static public function update($name,$price,$detail,$thumb,$id){
        $sql ="UPDATE `beverages` SET `name`=?,`price`=?, `detail` = ?,`thumb`=? WHERE `id` =?";
        pdo_execute($sql,$name,$price,$detail,$thumb,$id);
    }
    
    static public function delete($id){
        $sql ="DELETE FROM `beverages` WHERE `id` =?";
        pdo_execute($sql,$id);
    }

    static public function get_price_bill_and_ticket(){
        $sql ="SELECT SUM(ticket.price) AS price_ticket,".
        " SUM(bill_beverages.price * bill_beverages.quantity) AS price_bill ".
        "FROM `ticket` JOIN bill_beverages ON bill_beverages.id_ticket = ticket.id";
        return pdo_query_one($sql);
    }

}
