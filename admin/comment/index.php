<?php
require_once '../../global.php';
require_once '../../DAO/comment.php';

check_login();

extract($_REQUEST);

if(exist_parma('btn_detail')){
    $comment = comment_select_detail($id_film);
    $VIEW_NAME = './detail.php';
}
elseif(exist_parma('btn_delete')){
    try {
        comment_delete($id_comment);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Xóa thất bại</div>';
    }
    $comment = comment_select_list_groupBy_idFilm();
    $VIEW_NAME = './list.php';
}
else{
    $comment = comment_select_list_groupBy_idFilm();
    $VIEW_NAME = './list.php';
}
include '../layout.php';