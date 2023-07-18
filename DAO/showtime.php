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

    static public function insert($id_film,$id_room,$price,$date,$id_shift){
        $sql = "INSERT INTO `showtimes` ( `id_film`, `id_room`, `price`, `date`, `id_shift`) VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql,$id_film,$id_room,$price,$date,$id_shift);
    }

    static public function update($id_film,$id_room,$price,$date,$id_shift,$id){
        $sql = "UPDATE `showtimes` SET `id_film`=?,`id_room`=?,`price`=?,`date`=?,`id_shift`=? WHERE `id` = ?";
        pdo_execute($sql,$id_film,$id_room,$price,$date,$id_shift,$id);
    }

    static public function update_price($price,$id_room,$date,$id_shift){
        $sql = "UPDATE `showtimes` SET `price`=? WHERE `date` = ? AND id_room = ? AND id_shift = ?";
        pdo_execute($sql,$price,$id_room,$date,$id_shift);
    }

    static public function delete($id){
        $sql = "DELETE FROM `showtimes` WHERE `id` = ?";
        pdo_execute($sql,$id);
    }

    static public function delete_by_idFilm_date_id_Room($id_film,$date,$id_room){
        $sql = "DELETE FROM `showtimes` WHERE `id_film` = ?  AND `date` = ? AND id_room = ?";
        pdo_execute($sql,$id_film,$date,$id_room);
    }

    static public function select_groupBy_nameFilm($date){
        $sql = "SELECT *,COUNT(*) as tong FROM `showtimes` WHERE `date` > ? GROUP BY id_film";
        return pdo_query($sql,$date);
    }

    static public function select_by_date_and_idFilm_groupByDate($date,$id_film){
        $sql = "SELECT * FROM `showtimes` WHERE  `date` > ? AND `id_film` = ?  GROUP BY `date`,id_room";
        return pdo_query($sql,$date,$id_film);
    }

    static public function select_by_date_and_idFilm_and_id_room($date,$id_film,$id_room){
        $sql = "SELECT * FROM `showtimes` WHERE `date` = ? AND `id_film` = ?  AND `id_room` = ?";
        return pdo_query($sql,$date,$id_film,$id_room);
    }

    static public function find_shift_by_date_and_idFilm_and_id_room($date,$id_film,$id_room){
        $sql = "SELECT DISTINCT `id_shift` FROM `showtimes` WHERE `date` = ? AND `id_film` = ?  AND `id_room` = ?";
        return pdo_query($sql,$date,$id_film,$id_room);
    }


    static public function select_by_id_room_and_date($date,$id_room){
        $sql = "SELECT * FROM `showtimes` WHERE `date` = ? AND id_room = ?";
        return pdo_query($sql,$date,$id_room);
    }
    
    static public function find_id_by_date_idRoom_idShift($date,$id_room,$id_shift){
        $sql = "SELECT * FROM `showtimes` WHERE `date` = ? AND id_room = ? AND id_shift = ?";
        return pdo_query_value($sql,$date,$id_room,$id_shift);
    }

    // static public function check_exist($date,$id_room,$id_shift){
    //     $sql = "SELECT * FROM `showtimes` WHERE `date` = ? AND id_room = ? AND id_shift = ?";
    //     return pdo_query_value($sql,$date,$id_room,$id_shift);
    // }

}

?>