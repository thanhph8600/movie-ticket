<?php
require_once '../../DAO/PDO.php';

function seat_select_by_id_showtime($id_showtime){
    $sql = "SELECT seats.* FROM `seats` ".
    " JOIN ticket ON ticket.id = seats.id_ticket ".
    " JOIN showtimes ON ticket.id_showtime = showtimes.id ".
    " WHERE showtimes.id = ?";
    return pdo_query($sql,$id_showtime);
}