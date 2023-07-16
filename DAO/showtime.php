<?php
require_once '../../DAO/PDO.php';

class Showtime{
    static public function get_all(){
        $sql = "SELECT * FROM `showtimes`";
        return pdo_query($sql);
    }

    static public function select_by_id($id){
        $sql = "SELECT * FROM `showtimes` WHERE `id` = ?";
        return pdo_query_one($sql,$id);
    }

    static public function select_colum($colum){
        $sql = "SELECT ? FROM `showtimes`";
        return pdo_query($sql,$colum);
    }

    static public function insert($id_film,$id_room,$price,$date,$id_shift){
        $sql = "INSERT INTO `showtimes` ( `id_film`, `id_room`, `price`, `date`, `id_shift`) VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql,$id_film,$id_room,$price,$date,$id_shift);
    }

    static public function update($id_film,$id_room,$price,$date,$id_shift,$id){
        $sql = "UPDATE `showtimes` SET `id_film`=?,`id_room`=?,`price`=?,`date`=?,`id_shift`=? WHERE `id` = ?";
        pdo_execute($sql,$id_film,$id_room,$price,$date,$id_shift,$id);
    }

    static public function delete($id){
        $sql = "DELETE FROM `showtimes` WHERE `id` = ?";
        pdo_execute($sql,$id);
    }

    static public function select_groupBy_nameFilm(){
        $sql = "SELECT *,COUNT(*) as tong FROM `showtimes` JOIN `film` on showtimes.id_film = film.id GROUP BY showtimes.id_film";
        return pdo_query($sql);
    }

    static public function select_shift_by_id_room_and_date($date,$id_room){
        $sql = "SELECT * FROM `showtimes` WHERE date = ? AND id_room = ?";
        return pdo_query($sql,$date,$id_room);
    }
}
?>