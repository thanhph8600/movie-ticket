<?php

require_once '../../global.php';
require_once '../../DAO/statistical.php';
require_once '../../DAO/ticket.php';

check_login();

extract($_REQUEST);

$sum_quantity_ticket = ticket_sum_quantity();
$sum_price_ticket = ticket_sum_price();

if (exist_parma('btn_detail')) {

    $statistical = statistical_count_ticket_price_gourpBy_id_film();
    $VIEW_NAME = './chart.php';
    
} else {
   
    $VIEW_NAME = 'list.php';
}

include '../layout.php';
