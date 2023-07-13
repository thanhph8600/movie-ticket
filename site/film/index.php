<?php
include '../../global.php';


if(exist_parma('detail')){
    $VIEW_NAME = 'detail-ui.php';
}elseif(exist_parma('showtime')){
    $VIEW_NAME = 'showtime-ui.php';
}elseif(exist_parma('room')){
    $VIEW_NAME = 'room.php';
}else{
    $VIEW_NAME = 'list-ui.php';
}

include '../layout.php';
?>