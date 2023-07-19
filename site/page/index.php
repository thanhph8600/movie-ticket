<?php
require_once '../../global.php';
require_once '../../DAO/film.php';

if(exist_parma('tin_tuc')){
    $VIEW_NAME = 'news.php';
}
elseif(exist_parma('hoi_dap')){
    $VIEW_NAME = 'Q&A.php';
}
elseif(exist_parma('gioi_thieu')){
    $VIEW_NAME = 'introduce.php';
}
elseif(exist_parma('lien_he')){
    $VIEW_NAME = 'contac.php';
}
else{
    $VIEW_NAME = 'home.php';
}
$date = date("Y-m-d");
$top10_film = film_select_top10($date);
include '../layout.php';
?>