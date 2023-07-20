<?php
require_once '../../global.php';
require_once '../../DAO/film.php';
require_once '../../DAO/showtime.php';
require_once '../../DAO/seat.php';

extract($_REQUEST);
$date = date("Y-m-d");

$top_film_week = film_select_trong_tuan($date);
$film_dang_chieu = film_select_dang_chieu($date);
$film_sap_chieu = film_select_sap_chieu($date);

if(exist_parma('detail')){
    $film = film_select_by_id($id_film);
    $check_phim = film_check_phim_da_chieu($id_film,$date);
    $VIEW_NAME = 'detail-ui.php';
}
elseif(exist_parma('showtime')){

    if(!empty($date_show))
        $date = $date_show;
    $list_film = film_select_trong_ngay($date);

    $SLIDE = './slide.php';
    $VIEW_NAME = 'showtime-ui.php';
}
elseif(exist_parma('detail_showtime')){
    $film = film_select_by_id($id_film);

    $tat_ca_ngay_chieu = Showtime::select_by_date_and_idFilm_groupBy_date($date,$id_film);
    $ngay_chieu = $tat_ca_ngay_chieu[0]['date'];
    $SLIDE = './slide.php';
    $VIEW_NAME = 'detail_showtime.php';
}
elseif(exist_parma('room')){
    $showtime = Showtime::select_nameFilm_date_time_by_idShowtime($_GET['id_showtime']);
    $ghe_da_chon = seat_select_by_id_showtime($_GET['id_showtime']);
    $VIEW_NAME = 'room.php';
}
else{
    $SLIDE = './slide.php';
    $VIEW_NAME = 'list-ui.php';
}

include '../layout.php';
?>