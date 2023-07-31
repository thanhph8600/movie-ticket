<?php

require_once '../../global.php';
require_once '../../DAO/ticket.php';
require_once '../../DAO/seat.php';
require_once '../../DAO/beverages.php';
check_login();

extract($_REQUEST);
if(exist_parma('xac_nhan')){
    ticket_update_activated(0,$id);
    $MESS = '<div class="alert alert-success text-white " role="alert">Xác nhận thành công</div>';
    $VIEW_NAME ='./qr.php';
}
elseif(exist_parma('id_ticket')){
    $code = $_GET['id_ticket'];
    $id_ticket = substr($code,0,2);
    $ticket = ticket_select_detail_by_idTicket($id_ticket);
    $seat = seat_select_by_id_ticket($ticket['id']);
    $beverages = Beverages::select_by_idTicket($ticket['id']);
    $date_now = date('Y-m-d');
    if($ticket['date'] < $date_now){
        ticket_update_activated(0,$ticket['id']);
    }
    $time_now = date('H:i:s');
    if($ticket['time_end'] < $time_now && $ticket['date'] = $date_now ){
        ticket_update_activated(0,$ticket['id']);
    }
    $VIEW_NAME = './detail_qr.php';
}
else{
    $VIEW_NAME ='./qr.php';
}
include '../layout.php';
