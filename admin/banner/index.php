<?php
require_once '../../global.php';
require_once '../../DAO/banner.php';

check_login();
extract($_REQUEST);
$date_now = date('Y-m-d');
if(exist_parma('btn_detail')){
    $banner = banner_select_byName($name_banner);
    if($name_banner == 'banner film'){
        $URL = $UPLOAD_BANNER_FILM_URL;
    }else{
        $URL = $UPLOAD_BANNER_HOME_URL;
    }
    $VIEW_NAME = './detail_list.php';
}
elseif(exist_parma('btn_add')){
    $VIEW_NAME = './add.php';
}
elseif(exist_parma('btn_insert')){
    if($name_banner == 'banner film'){
        $URL = $UPLOAD_BANNER_FILM_URL;
    }else{
        $URL = $UPLOAD_BANNER_HOME_URL;
    }

    try {
        $thumb = save_file('upload',$URL);
        banner_insert($name_banner,$thumb,$date_now);
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
        $banner = banner_getAll();
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Tạo thất bại</div>';
        $VIEW_NAME = './add.php';
    }
}
elseif(exist_parma('btn_edit')){
    if($name_banner == 'banner film'){
        $URL = $UPLOAD_BANNER_FILM_URL;
    }else{
        $URL = $UPLOAD_BANNER_HOME_URL;
    }

    $banner = banner_select_byId($id_banner);
    $VIEW_NAME = 'edit.php';
}
elseif(exist_parma('btn_update')){
    if($name_banner == 'banner film'){
        $URL = $UPLOAD_BANNER_FILM_URL;
    }else{
        $URL = $UPLOAD_BANNER_HOME_URL;
    }

    try {
        $thumb = save_file('upload',$URL);
        unlink($URL.$thumb_old);
        banner_update($thumb,$id_banner);
        $MESS = '<div class="alert alert-success text-white " role="alert">Sửa thành công</div>';
        $banner = banner_getAll();
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Sửa thất bại</div>';
        $banner = banner_getAll();
        $VIEW_NAME = './list.php';
    }
}
elseif(exist_parma('btn_delete')){
    if($name_banner == 'banner film'){
        $URL = $UPLOAD_BANNER_FILM_URL;
    }else{
        $URL = $UPLOAD_BANNER_HOME_URL;
    }
    
    try {
        banner_delete($id_banner);
        unlink($URL.$thumb_old);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">xóa thất bại</div>';
    }
    $banner = banner_getAll();
    $VIEW_NAME = './list.php';
}
else{
    $banner = banner_getAll();
    $VIEW_NAME = './list.php';
}

include '../layout.php';
