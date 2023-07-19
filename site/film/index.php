<?php
require_once '../../global.php';
require_once '../../DAO/film.php';
require_once '../../DAO/showtime.php';

extract($_REQUEST);
$date = date("Y-m-d");

$top_film_week = film_select_trong_tuan($date);
$film_dang_chieu = film_select_dang_chieu($date);
$film_sap_chieu = film_select_sap_chieu($date);

if(exist_parma('detail')){
    $film = film_select_by_id($id_film);
    $check_phim = film_check_phim_da_chieu($id_film,$date);
    $VIEW_NAME = 'detail-ui.php';
}elseif(exist_parma('showtime')){

    if(!empty($date_show))
        $date = $date_show;
    $list_film = film_select_trong_ngay($date);

    $SLIDE = './slide.php';
    $VIEW_NAME = 'showtime-ui.php';
}elseif(exist_parma('room')){
    $VIEW_NAME = 'room.php';
}else{
    $SLIDE = './slide.php';
    $VIEW_NAME = 'list-ui.php';
}

include '../layout.php';
?>