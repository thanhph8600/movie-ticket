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
        $VIEW_NAME = './list.php';
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
    } catch (Exception $th) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm thất bại</div>';
    }
} else {
    $VIEW_NAME = './list.php';
}

$showtimes = Showtime::select_groupBy_nameFilm();
$films = film_select_all();
$rooms = room_select_all();
include '../layout.php';
