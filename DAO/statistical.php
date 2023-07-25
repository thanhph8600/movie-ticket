<?php
require_once '../../DAO/PDO.php';

function statistical_preferences_by_gender($id_film){
    $sql = "SELECT user.sex,SUM(ticket.quantity) as quantity ".
    " FROM `ticket`  JOIN user ON user.id = ticket.id_user ".
    " JOIN showtimes ON showtimes.id = ticket.id_showtime ".
    " JOIN film ON showtimes.id_film = film.id ".
    " WHERE film.id = ? GROUP by user.sex";
    return pdo_query($sql,$id_film);
}

function statistical_preferences_by_age($id_film,$start,$end){
    $sql = "SELECT SUM(ticket.quantity) AS quantity FROM `ticket` ".
    " JOIN user ON user.id = ticket.id_user ".
    " JOIN showtimes ON showtimes.id = ticket.id_showtime ".
    " JOIN film ON showtimes.id_film = film.id ".
    " WHERE film.id = ? AND user.birtday > ? ".
    "  AND user.birtday < ? GROUP BY film.id";
    return pdo_query_one($sql,$id_film,$start,$end);
}
function statistical_preferences_sum_by_age($id_film){
    $sql = "SELECT SUM(ticket.quantity) AS quantity FROM `ticket` ".
    " JOIN user ON user.id = ticket.id_user ".
    " JOIN showtimes ON showtimes.id = ticket.id_showtime ".
    " JOIN film ON showtimes.id_film = film.id ".
    " WHERE film.id = ?  GROUP BY film.id";
    return pdo_query_one($sql,$id_film);
}