<?php
include_once '../../global.php';
include_once '../../DAO/beverages.php';
check_login();

extract($_REQUEST);
if(exist_parma('btn_add')){
    $VIEW_NAME ='add.php';
}
elseif(exist_parma('btn_insert')){
    try {
        $thumb =  save_file('upload', $UPLOAD_BEVERAGES_URL);
        Beverages::insert($name,$price,$detail,$thumb);
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Tạo thất bại</div>';
        $VIEW_NAME = './add.php';
    }
        
}
elseif(exist_parma('btn_edit')){
    $item = Beverages::select_by_id($id_beverages);
    $VIEW_NAME ="edit.php";
}
elseif(exist_parma('btn_update')){
    try {
        if(!empty($_FILES['upload']['name'])){
            $thumb = save_file('upload',$UPLOAD_BEVERAGES_URL);
            unlink($UPLOAD_BEVERAGES_URL.$thumb_old);
        }else{
            $thumb = $thumb_old;
        }
        Beverages::update($name,$price,$detail,$thumb,$id_beverages);
        $MESS = '<div class="alert alert-success text-white " role="alert">Cập nhật thành công</div>';
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Cập nhật thất bại</div>';
        $VIEW_NAME = './edit.php';
    }
}
elseif(exist_parma('btn_delete')){
    try {
        Beverages::delete($id_beverages);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Xóa thất bại</div>';
    }
    $VIEW_NAME ="list.php";
}
else {
    $VIEW_NAME = 'list.php';
}

$beverages = Beverages::getAll();

include '../layout.php';