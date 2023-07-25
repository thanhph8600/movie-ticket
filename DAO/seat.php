<?php
require_once '../../DAO/PDO.php';

function seat_select_by_id_showtime($id_showtime){
    $sql = "SELECT seats.* FROM `seats` ".
    " JOIN ticket ON ticket.id = seats.id_ticket ".
    " JOIN showtimes ON ticket.id_showtime = showtimes.id ".
    " WHERE showtimes.id = ?";
    return pdo_query($sql,$id_showtime);
}

function seat_select_by_id_ticket($id_ticket){
    $sql = "SELECT * FROM `seats` WHERE id_ticket =?";
    return pdo_query($sql,$id_ticket);
}

function chair_is_waiting_select_by_id_showtime($id_showtime){
    $sql = "SELECT * FROM `chair_is_waiting` WHERE id_showtime = ?";
    return pdo_query($sql,$id_showtime);
}

function seat_insert($id_ticket,$row_index,$col_index){
    $sql = "INSERT INTO `seats`(`id_ticket`, `row_index`, `col_index`) VALUES (?,?,?)";
    return pdo_query($sql,$id_ticket,$row_index,$col_index);
}