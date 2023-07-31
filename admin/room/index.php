<?php

include_once '../../global.php';
include_once '../../DAO/room.php';
include_once '../../DAO/shift.php';

check_login();

extract($_REQUEST);

if (exist_parma('btn_add')) {
    $VIEW_NAME = './add.php';
} elseif (exist_parma('btn_insert')) {
    if (empty($name) || empty($seats)) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm thất bại</div>';
    } else {
        try {
            $id_room = room_insert($name, $seats);
            if ($xuat_chieu == 'xuat1') {
                $time_start = ['09:00:00', '11:00:00', '14:00:00', '17:00:00', '20:00:00'];
                $time_end = ['10:30:00', '13:30:00', '16:30:00', '19:30:00', '22:30:00'];
            } elseif ($xuat_chieu == 'xuat2') {
                $time_start = ['09:15:00', '11:15:00', '14:15:00', '17:15:00', '20:15:00'];
                $time_end = ['10:45:00', '13:45:00', '16:45:00', '19:45:00', '22:45:00'];
            } else {
                $time_start = ['09:30:00', '11:30:00', '14:30:00', '17:30:00', '20:30:00'];
                $time_end = ['11:00:00', '14:00:00', '17:00:00', '20:00:00', '23:00:00'];
            }
            for ($i = 0; $i < 5; $i++) {
                shift_insert($i + 1, $id_room, $time_start[$i], $time_end[$i]);
            }
            $VIEW_NAME = './list.php';
            $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
        } catch (Exception $th) {
            $VIEW_NAME = './add.php';
            $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm thất bại</div>';
        }
    }
} elseif (exist_parma('btn_edit')) {
    $VIEW_NAME = './edit.php';
    $room = room_select_by_id($id_room);
    $shift = shift_select_by_id_room($id_room);
} elseif (exist_parma('btn_update')) {
    $room = room_select_by_id($id_room);
    if (empty($name) || empty($seats)) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm thất bại</div>';
    } else {
        try {
            room_update($name, $seats, $id_room);
            $shift = shift_select_by_id_room($id_room);
            if ($xuat_chieu == 'xuat1') {
                $time_start = ['09:00:00', '11:00:00', '14:00:00', '17:00:00', '20:00:00'];
                $time_end = ['10:30:00', '13:30:00', '16:30:00', '19:30:00', '22:30:00'];
            } elseif ($xuat_chieu == 'xuat2') {
                $time_start = ['09:15:00', '11:15:00', '14:15:00', '17:15:00', '20:15:00'];
                $time_end = ['10:45:00', '13:45:00', '16:45:00', '19:45:00', '22:45:00'];
            } elseif ($xuat_chieu == 'xuat3') {
                $time_start = ['09:30:00', '11:30:00', '14:30:00', '17:30:00', '20:30:00'];
                $time_end = ['11:00:00', '14:00:00', '17:00:00', '20:00:00', '23:00:00'];
            }
            for ($i = 0; $i < 5; $i++) {
                shift_update($time_start[$i], $time_end[$i], $shift[$i]['id']);
            }
            $VIEW_NAME = './list.php';
            $MESS = '<div class="alert alert-success text-white " role="alert">Sửa thành công</div>';
        } catch (Exception $th) {
            $VIEW_NAME = './add.php';
            $MESS = '<div class="alert alert-warning text-white " role="alert">Sửa thất bại</div>';
        }
    }
} elseif (exist_parma('btn_delete')) {
    try {
        shift_delete_by_idRoom($id_room);
        room_delete($id_room);
        $VIEW_NAME = './list.php';
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $th) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Xóa thất bại</div>';
    }
} else {
    $VIEW_NAME = 'list.php';
}
$rooms = room_select_all();
include '../layout.php';
