<?php
require_once '../../global.php';
require_once '../../DAO/news.php';
check_login();
extract($_REQUEST);

if (exist_parma('btn_add')) {
    $VIEW_NAME = 'add.php';
} elseif (exist_parma('btn_insert')) {
    if(!empty($role)){
        $role = 1;
    }else{
        $role =0;
    }

    try {
        $thumb = save_file('upload', $UPLOAD_NEWS_URL);
        news_insert($title, $content, $detail_content, $thumb, date('Y-m-d'),$role);
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Tạo thất bại</div>';
        $VIEW_NAME = './add.php';
    }
} elseif (exist_parma('btn_edit')) {
    $item = news_select_byId($id_news);
    $VIEW_NAME = 'edit.php';
} elseif (exist_parma('btn_update')) {
    if(!empty($role)){
        $role = 1;
    }else{
        $role =0;
    }

    if(!empty($_FILES['upload']['name'])){
        $thumb = save_file('upload',$UPLOAD_NEWS_URL);
        unlink($UPLOAD_NEWS_URL.$thumb_old);
    }else{
        $thumb = $thumb_old;
    }
    news_update($title,$content,$detail_content,$thumb,$role,$id_news);
    $VIEW_NAME = 'list.php';
} elseif (exist_parma('btn_delete')) {
    try {
        unlink($UPLOAD_NEWS_URL . $thumb);
        news_delete($id_news);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Xóa thất bại</div>';
    }
    $VIEW_NAME = 'list.php';
} else {
    $VIEW_NAME = 'list.php';
}
$news = news_getAll();
include '../layout.php';
