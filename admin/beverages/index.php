<?php
include_once '../../global.php';
include_once '../../DAO/beverages.php';
check_login();

extract($_REQUEST);
if(exist_parma('btn_add')){
    $VIEW_NAME ='add.php';
}
elseif(exist_parma('btn_insert')){
        $thumb =  save_file('upload', $UPLOAD_BEVERAGES_URL);
        Beverages::insert($name,$price,$thumb);
        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
        $VIEW_NAME = './list.php';

}
else {
    $VIEW_NAME = 'list.php';
}

include '../layout.php';