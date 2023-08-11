<?php
require_once '../../DAO/PDO.php';


function film_insert($name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb,$activated){
    $sql ="INSERT INTO `film`( `name`, `directors`, `actor`, `genre`, `premiere`, `time`, `language`, `rated`, `trailer`, `description`, `thumb`,`activated`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb,$activated);
}


function film_update($name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb,$activated,$id){
    $sql ="UPDATE `film` SET `name`=?,`directors`=?,`actor`=?,`genre`=?,`premiere`=?,`time`=?,`language`=?,`rated`=?,`trailer`=?,`description`=?,`thumb`=? , `activated` = ? WHERE `id` = ?";
    pdo_execute($sql,$name,$directors,$actor,$genre,$premiere,$time,$language, $rated, $trailer, $description, $thumb,$activated,$id);
}


function film_select_all(){
    $sql = "SELECT * FROM `film`  ORDER BY  `film`.`premiere` DESC";
    return pdo_query($sql);
}

function film_select_dang_hoat_dong($activated){
    $sql = "SELECT * FROM `film`WHERE activated = ? ORDER BY `film`.`premiere` DESC";
    return pdo_query($sql,$activated);
}

function film_select_by_id($id){
    $sql = "SELECT * FROM `film` where `id` = ?";
    return pdo_query_one($sql,$id);
}

function film_select_top10($date){
    $sql = "SELECT film.* FROM `film` JOIN showtimes on film.id = showtimes.id_film WHERE film.premiere <= ? AND showtimes.date >= ? GROUP BY film.id DESC LIMIT 0, 9;
    ";
    return pdo_query($sql,$date,$date);
}

function film_select_dang_chieu($date){
    $sql = "SELECT * FROM `film` JOIN showtimes ON film.id = showtimes.id_film WHERE premiere <= ? AND showtimes.date >= ? GROUP BY film.id";
    return pdo_query($sql,$date,$date);
}

function film_select_sap_chieu($date){
    $sql = "SELECT * FROM `film` WHERE premiere > ? ORDER BY premiere ASC";
    return pdo_query($sql,$date);
}

function film_select_trong_tuan($date){
    $sql = "SELECT * FROM `film` JOIN showtimes ON film.id = showtimes.id_film WHERE premiere <= ? AND showtimes.date >= ? GROUP BY film.id limit 0,10";
    return pdo_query($sql,$date,$date);
}

function film_check_phim_da_chieu($id,$date){
    $sql = "SELECT * FROM `film` ".
    " JOIN showtimes ON showtimes.id_film = film.id ".
    " WHERE film.id = ? AND film.premiere <= ? ".
    " AND showtimes.date >= ? GROUP BY film.id";
    return pdo_query($sql,$id,$date,$date);
}

function film_select_trong_ngay($date){
    $sql = "SELECT * FROM `showtimes` WHERE date = ? GROUP BY id_film";
    return pdo_query($sql,$date);
}

function film_select_xuat_chieu_trong_ngay($date,$id_film){
    $sql = "SELECT room.name,shift.time_start, shift.time_end,sum( ticket.quantity) as quantity, room.seats, showtimes.id as id_showtime".
    " FROM `showtimes` JOIN shift on showtimes.id_shift = shift.id ".
    " JOIN room on room.id = showtimes.id_room ".
    " LEFT JOIN ticket on showtimes.id = ticket.id_showtime ".
    " WHERE date = ? AND id_film = ?  GROUP BY showtimes.id";
    return pdo_query($sql,$date,$id_film);
}

function film_select_xuat_chieu_chua_chieu_trong_ngay($date,$id_film,$time){
    $sql = "SELECT room.name,shift.time_start, shift.time_end,sum( ticket.quantity) as quantity, room.seats, showtimes.id as id_showtime".
    " FROM `showtimes` JOIN shift on showtimes.id_shift = shift.id ".
    " JOIN room on room.id = showtimes.id_room ".
    " LEFT JOIN ticket on showtimes.id = ticket.id_showtime ".
    " WHERE date = ? AND id_film = ?  AND time_start > ? GROUP BY showtimes.id";
    return pdo_query($sql,$date,$id_film,$time);
}

function film_select_xuat_chieu_da_chieu_trong_ngay($date,$id_film,$time){
    $sql = "SELECT room.name,shift.time_start, shift.time_end,sum( ticket.quantity) as quantity, room.seats, showtimes.id as id_showtime".
    " FROM `showtimes` JOIN shift on showtimes.id_shift = shift.id ".
    " JOIN room on room.id = showtimes.id_room ".
    " LEFT JOIN ticket on showtimes.id = ticket.id_showtime ".
    " WHERE date = ? AND id_film = ?  AND time_start < ? GROUP BY showtimes.id";
    return pdo_query($sql,$date,$id_film,$time);
}

function film_find_name_by_id($id){
    $sql = "SELECT `name` FROM `film` where `id` = ?";
    return pdo_query_value($sql,$id);
}

function film_delete($id){
    $sql = "DELETE FROM `film` WHERE `id` = ?";
    pdo_execute($sql,$id);
}

function film_search($name){
    $sql = "SELECT * FROM `film` WHERE name LIKE '%".$name."%' limit 0,5";
    return pdo_query($sql);
}

