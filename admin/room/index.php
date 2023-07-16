<?php

include_once '../../global.php';
include_once '../../DAO/room.php';

check_login();

extract($_REQUEST);

if(exist_parma('btn_add')){
    $VIEW_NAME = './add.php';
}
elseif(exist_parma('btn_insert')){

    try {
        room_insert($name,$seats);
        $VIEW_NAME = './list.php';
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
    } catch (Exception $th) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm thất bại</div>';
    }
}
elseif(exist_parma('btn_edit')){
    $VIEW_NAME = './edit.php';
    $room = room_select_by_id($id_room);
}
elseif(exist_parma('btn_update')){
    $room = room_select_by_id($id_room);
    try {
        room_update($name,$seats,$id_room);
        $VIEW_NAME = './list.php';
        $MESS = '<div class="alert alert-success text-white " role="alert">Sửa thành công</div>';
    } catch (Exception $th) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Sửa thất bại</div>';
    }
}
elseif(exist_parma('btn_delete')){
    try {
        room_delete($id_room);
        $VIEW_NAME = './list.php';
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $th) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Xóa thất bại</div>';
    }
}
else{
    $VIEW_NAME = 'list.php';
}
$rooms = room_select_all();
include '../layout.php';