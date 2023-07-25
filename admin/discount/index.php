<?php
include_once '../../global.php';
include_once '../../DAO/discount.php';
check_login();

extract($_REQUEST);
if(exist_parma('btn_add')){
    $VIEW_NAME ='add.php';
}
elseif(exist_parma('btn_insert')){
    try {
        Discount::insert($name,$date_start,$date_end,$percent,$quantity);
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Tạo thất bại</div>';
        $VIEW_NAME = './add.php';
    }
}
elseif(exist_parma('btn_edit')){
    $discount = Discount::get_byId($id_discount);
    $VIEW_NAME ="edit.php";
}
elseif(exist_parma('btn_update')){
    try {
        Discount::update($name,$date_start,$date_end,$percent,$quantity,$id_discount);
        $MESS = '<div class="alert alert-success text-white " role="alert">Cập nhật thành công</div>';
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Cập nhật thất bại</div>';
        $VIEW_NAME = './edit.php';
    }
}
elseif(exist_parma('btn_delete')){
    try {
        Discount::delete($id_discount);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Xóa thất bại</div>';
    }
    $VIEW_NAME ="list.php";
}
else{
    $VIEW_NAME = 'list.php';
}

$discounts = Discount::getAll();

include '../layout.php';