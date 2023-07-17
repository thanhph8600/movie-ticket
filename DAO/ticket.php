<?php
require_once '../../DAO/PDO.php';

function ticket_select_by_idShowtime($id){
    $sql = "SELECT * FROM `ticket` WHERE `id_showtime` = ?";
    return pdo_query_one($sql,$id);
}
