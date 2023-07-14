<?php
include_once '../../global.php';
include_once '../../DAO/user.php';
check_login();

extract($_REQUEST);

if (exist_parma('btn_add')) {
    $VIEW_NAME = './add.php';
} 
elseif (exist_parma('btn_insert')) {
    $user = user_select_by_email($email);
    if (!empty($user)) {
        $MESS = '<div class="p-2">Email đã được dùng</div>';
        $VIEW_NAME = './add.php';
    } else {
        try {
            $thumb =  save_file('upload', $UPLOAD_USER_URL);
            user_insert($name, $phone, $birtday, $email, md5($pass), $sex, $role, $activated, $thumb);
            $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
            $VIEW_NAME = './list.php';
        } catch (Exception $ex) {
            $MESS = '<div class="alert alert-warning text-white">Tạo thất bại</div>';
            $VIEW_NAME = './add.php';
        }
    }
} 
elseif (exist_parma('btn_edit')) {
    $user = user_select_by_id($id_user);
    $VIEW_NAME = './edit.php';
}
elseif (exist_parma('btn_update')) {
    $user = user_select_by_id($id_user);
    if($pass != $pass_old){
        $pass = md5($pass);
    }

    try {
        if(!empty($_FILES['upload']['name'])){
            $thumb = save_file('upload', $UPLOAD_USER_URL);
            if(!empty($thumb_old)){
                unlink($UPLOAD_USER_URL . $thumb_old);
            }
        }else{
            $thumb = $thumb_old;
        }
        user_update_all($name,$phone,$birtday,$email,$pass,$sex,$role,$activated,$thumb,$id_user);
        $MESS = '<div class="alert alert-success text-white " role="alert">Cập nhật thành công</div>';
        $VIEW_NAME = './list.php';
    } catch (Exception $th) {
        $MESS = '<div class="alert alert-warning text-white">Cập nhật thất bại</div>';
        $VIEW_NAME = './edit.php';
    }
    
}
elseif (exist_parma('btn_delete')) {
    try {
        user_delete($id_user);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $th) {
        $MESS = '<div class="alert alert-warning text-white">Xóa thất bại</div>';
    }
    $VIEW_NAME = './list.php';
}
else {
    $VIEW_NAME = './list.php';
}
$users = user_select_all();
include '../layout.php';
