<?php
require_once '../../global.php';
require_once '../../DAO/film.php';
require_once '../../DAO/user.php';
require_once '../../DAO/question.php';
require_once '../../DAO/banner.php';
require_once '../../DAO/news.php';

extract($_REQUEST);

if(exist_parma('tin_tuc')){
    $news = news_select_by_role(0);
    $VIEW_NAME = 'news.php';
}
elseif(exist_parma('detail_news')){
    $news = news_select_byId($id);
    $VIEW_NAME = 'detail_news.php';
}
elseif(exist_parma('hoi_dap')){
    $questions = question_getALL();
    $VIEW_NAME = 'Q&A.php';
}
elseif(exist_parma('question')){
    $questions = question_getALL();
    $VIEW_NAME = 'Q&A.php';

    if(!empty($_SESSION['user']['email'])){
        $user = user_select_by_email($_SESSION['user']['email']);
        $check = question_select_byUserId($user['id']);
        if(!empty($check)){
            foreach ($check as $key => $value) {
                if($value['date'] == date('Y-m-d')){
                    $check = 0;
                    break;
                }
            }
        }
        if($check != 0 ){
            question_insert($user['id'],$question,date('Y-m-d'));
        }
    }
    
}
elseif(exist_parma('gioi_thieu')){
    $VIEW_NAME = 'introduce.php';
}
elseif(exist_parma('lien_he')){
    $VIEW_NAME = 'contac.php';
}
else{
    $news = news_select_by_role(1);
    $VIEW_NAME = 'home.php';
}
$user = 0;
if(!empty($_SESSION['user']['email']))
    $user = $_SESSION['user']['email'];
$date = date("Y-m-d");
$top10_film = film_select_top10($date);
$top_film_week = film_select_trong_tuan($date);
$banner = banner_select_byName('banner home');
$SLIDE = './banner_home.php';

include '../layout.php';
?>