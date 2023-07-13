<?php
include '../../global.php';


if(exist_parma('tin_tuc')){
    $VIEW_NAME = 'news.php';
}
elseif(exist_parma('hoi_dap')){
    $VIEW_NAME = 'Q&A.php';
}
elseif(exist_parma('gioi_thieu')){
    $VIEW_NAME = 'introduce.php';
}
elseif(exist_parma('lien_he')){
    $VIEW_NAME = 'contac.php';
}
else{
    $VIEW_NAME = 'home.php';
}

include '../layout.php';
?>