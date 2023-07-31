<?php
require_once '../../DAO/PDO.php';

function ticket_select_by_idShowtime($id){
    $sql = "SELECT * FROM `ticket` WHERE `id_showtime` = ?";
    return pdo_query_one($sql,$id);
}

function ticket_insert($code,$id_user,$id_showtime,$quantity,$id_discount,$price,$activated){
    $sql = "INSERT INTO `ticket`( `code`, `id_user`, `id_showtime`, `quantity`, `id_discount`, `price`, `activated`) VALUES (?,?,?,?,?,?,?)";
    return last_id($sql,$code,$id_user,$id_showtime,$quantity,$id_discount,$price,$activated);
}

function ticket_update_code($code,$id_ticket){
    $sql = "UPDATE `ticket` SET `code`= ? WHERE id = ?";
    return last_id($sql,$code,$id_ticket);
}

function ticket_update_activated($activated,$id_ticket){
    $sql = "UPDATE `ticket` SET `activated`= ? WHERE id = ?";
    return last_id($sql,$activated,$id_ticket);
}

function ticket_sum_quantity(){
    $sql = "SELECT sum(quantity) as quantity FROM `ticket`";
    return pdo_query_value($sql);
}
function ticket_sum_price(){
    $sql = "SELECT sum(price) as price FROM `ticket`";
    return pdo_query_value($sql);
}

function ticket_select_last_index_byUser($id_user){
    $sql = "SELECT * FROM `ticket` GROUP BY id DESC LIMIT 0,1";
    return pdo_query_value($sql,$id_user);
}

function ticket_check_discount_used($id_user,$id_discount){
    $sql = "SELECT * FROM `ticket` WHERE id_user = 2 AND id_discount =1";
    return pdo_query($sql,$id_user);
}

function ticket_select_infoTicket_WHERE_idUser($id_user){
    $sql = "SELECT ticket.id, ticket.code,ticket.activated,ticket.price AS price_ticket,".
    " SUM(bill_beverages.price) as price_bill,showtimes.date,film.name, film.thumb,".
    " shift.time_start,shift.time_end FROM `ticket`".
    " JOIN showtimes on showtimes.id = ticket.id_showtime ".
    "JOIN shift ON shift.id = showtimes.id_shift".
    " JOIN film ON film.id = showtimes.id_film ".
    "LEFT JOIN bill_beverages on bill_beverages.id_ticket = ticket.id".
    " WHERE id_user = ? GROUP BY ticket.id ORDER BY showtimes.date DESC;";
    return pdo_query($sql,$id_user);
}

function ticket_select_detail_by_idTicket($id_ticket){
    $sql = "SELECT ticket.id, ticket.code,ticket.activated,ticket.quantity,showtimes.price,".
    "ticket.id_discount, SUM(bill_beverages.price) as price_bill,film.name, room.name as name_room,".
    " film.thumb,film.rated,showtimes.date,shift.time_start,shift.time_end ".
    "FROM `ticket` JOIN showtimes on showtimes.id = ticket.id_showtime ".
    " JOIN film ON film.id = showtimes.id_film JOIN room on room.id = showtimes.id_room ".
    " JOIN shift ON shift.id = showtimes.id_shift ".
    " LEFT JOIN bill_beverages on bill_beverages.id_ticket = ticket.id ".
    " WHERE ticket.id = ?";
    return pdo_query_one($sql,$id_ticket);
}
