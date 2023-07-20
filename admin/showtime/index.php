<?php
require_once '../../global.php';
require_once '../../DAO/showtime.php';
require_once '../../DAO/film.php';
require_once '../../DAO/room.php';
require_once '../../DAO/shift.php';
check_login();
extract($_REQUEST);

if (exist_parma('btn_add')) {
    $VIEW_NAME = './add.php';
} elseif (exist_parma('btn_insert')) {
    try {
        for ($i = 0; $i < count($date); $i++) {
            $shift = 'id_shift-' . $date[$i] . '-' . $id_room[$i];
            for ($j = 0; $j < count($_POST[$shift]); $j++) {
                $id_shift = shift_find_id($id_room[$i], $_POST[$shift][$j] + 1);
                Showtime::insert($id_film, $id_room[$i], $price[$i], $date[$i], $id_shift);
            }
        }
        $date = date("Y-m-d");
        $showtimes = Showtime::select_groupBy_nameFilm($date);
        $VIEW_NAME = './list.php';
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
    } catch (Exception $th) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm thất bại</div>';
    }
} elseif (exist_parma('btn_edit')) {
    $VIEW_NAME = './edit.php';
    $film = film_select_by_id($id_film);
    $date =  date("Y-m-d");
    $showtimes = Showtime::select_by_date_and_idFilm_groupBy_date_idFilm($date, $id_film);
} elseif (exist_parma('btn_update')) {
    
    $date_now =  date("Y-m-d");
    $showtimes = Showtime::select_by_date_and_idFilm_groupBy_date_idFilm($date_now, $id_film);

    //xóa 1 hàng
    if(empty($date)) $date =[];
    if(empty($id_room)) $id_room =[];
    $date_idRoom =[];
    
    $date_had = [];
    $idRoom_had =[];
    $date_idRoom_had =[];

    for ($i = 0; $i < count($date); $i++) {
        $date_idRoom[] = array($date[$i], $id_room[$i]);
    }

    foreach ($showtimes as $key => $value) {
        array_push($date_had,$value['date']);
        array_push($idRoom_had,$value['id_room']);
    }
    for ($i = 0; $i < count($date_had); $i++) {
        $date_idRoom_had[] = array($date_had[$i], $idRoom_had[$i]);
    }
    $result = array_diff_key($date_idRoom_had, $date_idRoom);
    foreach ($result as $key => $value) {
        Showtime::delete_by_idFilm_date_id_Room($id_film,$value[0],$value[1]);
    }


    //xóa và cập nhật từng ngày
    if (!empty($date)) {

        try {
            for ($i = 0; $i < count($date); $i++) {
                $shift = 'id_shift-' . $date[$i] . '-' . $id_room[$i];
                if (empty($_POST[$shift])) {
                    var_dump($id_film[$i], $date[$i], $id_room[$i]);
                    Showtime::delete_by_idFilm_date_id_Room($id_film, $date[$i], $id_room[$i]);
                    break;
                }

                $item = Showtime::find_shift_by_date_and_idFilm_and_id_room($date[$i], $id_film, $id_room[$i]);
                $shift_item = [];
                foreach ($item as $key => $value) {
                    array_push($shift_item, (string)$value[0]);
                    Showtime::update_price($price[$i], $date[$i], $id_room[$i], $value[0]);
                }

                $result = array_diff($shift_item, $_POST[$shift]);
                $result2 = array_diff($_POST[$shift], $shift_item);

                foreach ($result as $key => $value) {
                    $id_showtime = Showtime::find_id_by_date_idRoom_idShift($date[$i], $id_room[$i], $value);
                    Showtime::delete($id_showtime);
                }

                foreach ($result2 as $key => $value) {
                    Showtime::insert($id_film, $id_room[$i], $price[$i], $date[$i],  $value);
                }
            }

            $MESS = '<div class="alert alert-success text-white " role="alert">Cập nhật thành công</div>';
        } catch (Exception $th) {
            $MESS = '<div class="alert alert-warning text-white " role="alert">Cập nhật thất bại</div>';
        }
    }

    $VIEW_NAME = './edit.php';
    $film = film_select_by_id($id_film);
    $date_now =  date("Y-m-d");
    $showtimes = Showtime::select_by_date_and_idFilm_groupBy_date_idFilm($date_now, $id_film);

} else {
    $date = date("Y-m-d");
    $showtimes = Showtime::select_groupBy_nameFilm($date);
    $VIEW_NAME = './list.php';
}


$films = film_select_all();
$rooms = room_select_all();
include '../layout.php';
