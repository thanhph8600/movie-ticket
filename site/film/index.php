<?php
require_once '../../global.php';
require_once '../../DAO/film.php';
require_once '../../DAO/user.php';
require_once '../../DAO/showtime.php';
require_once '../../DAO/ticket.php';
require_once '../../DAO/seat.php';
require_once '../../DAO/discount.php';
require_once '../../DAO/beverages.php';
require_once '../../DAO/statistical.php';
require_once '../../DAO/comment.php';
require_once '../../DAO/banner.php';

extract($_REQUEST);
$date = date("Y-m-d");

$top_film_week = film_select_trong_tuan($date);
$film_dang_chieu = film_select_dang_chieu($date);
$film_sap_chieu = film_select_sap_chieu($date);

if (exist_parma('detail')) {
    $film = film_select_by_id($id_film);
    echo '
    <script>
        var id_film = ' . $film['id'] . '
    </script>
    ';
    $comment = comment_select_by_idFilm($id_film);
    $check_phim = film_check_phim_da_chieu($id_film, $date);
    $user = 0;
    if (!empty($_SESSION['user']))
        $user = $_SESSION['user'];
    //sở thích theo giới tính
    $preferences_by_gender = statistical_preferences_by_gender($id_film);
    $sum_sex = 0;
    $female = 0;
    $male = 0;
    if (!empty($preferences_by_gender)) {
        foreach ($preferences_by_gender as $key => $value) {
            if ($value['sex'] == 0) {
                $female = $value['quantity'];
            } else {
                $male = $value['quantity'];
            }
            $sum_sex += $value['quantity'];
        }
        $male = round($male * 100 / $sum_sex, 2);
        $female = round($female * 100 / $sum_sex, 2);
    }

    //Sở thích theo độ tuổi
    $tuoi20 = 0;
    $tuoi30 = 0;
    $tuoi40 = 0;
    $tuoi50 = 0;
    $sum_age = statistical_preferences_sum_by_age($id_film);
    if (!empty($sum_age)) {
        $sum_age = $sum_age['quantity'];
        $tuoi_duoi_20 = statistical_preferences_by_age($id_film, '2003-01-01', '2023-01-01');
        $tuoi_duoi_30 = statistical_preferences_by_age($id_film, '1993-01-01', '2003-01-01');
        $tuoi_duoi_40 = statistical_preferences_by_age($id_film, '1983-01-01', '1993-01-01');
        $tuoi_tren_40 = statistical_preferences_by_age($id_film, '1903-01-01', '1983-01-01');
    }


    if (!empty($tuoi_duoi_20)) {
        $tuoi20 = round($tuoi_duoi_20['quantity'] * 100 / $sum_age, 2);
    }
    if (!empty($tuoi_duoi_30)) {
        $tuoi30 = round($tuoi_duoi_30['quantity'] * 100 / $sum_age, 2);
    }
    if (!empty($tuoi_duoi_40)) {
        $tuoi40 = round($tuoi_duoi_40['quantity'] * 100 / $sum_age, 2);
    }
    if (!empty($tuoi_duoi_50)) {
        $tuoi50 = round($tuoi_duoi_50['quantity'] * 100 / $sum_age, 2);
    }
    $VIEW_NAME = 'detail-ui.php';
} elseif (exist_parma('showtime')) {

    if (!empty($date_show))
        $date = $date_show;
    $list_film = film_select_trong_ngay($date);

    $SLIDE = './banner_film.php';
    $banner = banner_select_byName('banner film');
    $VIEW_NAME = 'showtime-ui.php';
} elseif (exist_parma('detail_showtime')) {
    $film = film_select_by_id($id_film);

    $tat_ca_ngay_chieu = Showtime::select_by_date_and_idFilm_groupBy_date($date, $id_film);
    if(!empty($tat_ca_ngay_chieu)){
        $ngay_chieu = $tat_ca_ngay_chieu[0]['date'];
        $SLIDE = './banner_film.php';
        $banner = banner_select_byName('banner film');
        $VIEW_NAME = 'detail_showtime.php';
    }else{
        header('location: ../404-not-found/');
    }

} elseif (exist_parma('room')) {
    $id_showtime = $_GET['id_showtime'];
    $showtime = Showtime::select_nameFilm_date_time_by_idShowtime($_GET['id_showtime']);
    if ($showtime['date'] < $date || $showtime['date'] == $date && $showtime['time_start'] < date('H:i:s')) {
        header('location: ../404-not-found/');
    }

    $id_user = 0;
    if (!empty($_SESSION['user'])) {
        $id_user = $_SESSION['user']['id'];
    }
    $ghe_da_chon = seat_select_by_id_showtime($_GET['id_showtime']);
    $ghe_dang_chon = chair_is_waiting_select_by_id_showtime($_GET['id_showtime']);

    $beverages = Beverages::getAll();
    $VIEW_NAME = 'room.php';
} elseif (exist_parma('form_check_out')) {
    $showtime = Showtime::select_nameFilm_date_time_by_idShowtime($_GET['id_showtime']);
    $tong_tien_ve = count($tat_ca_ghe) * $showtime['price'];
    $tong_tien = $tong_tien_ve;
    include './form_check_out.php';
    die;
} elseif (exist_parma('check_out')) {
    extract($_REQUEST);
    $user = user_select_by_email($_SESSION['user']['email']);
    if (!empty($discount)) {
        $id_discount = Discount::get_ID_byName($discount);
        $discount = Discount::get_byId($id_discount);
        $discount['quantity'] -= 1;
        Discount::update_quantity($discount['quantity'], $id_discount);
    } else {
        $id_discount = null;
    }
    $code = 0;
    $actived = 1;
    $id_ticket = ticket_insert($code, $user['id'], $id_showtime, $quantity_seat, $id_discount, $price_ticket, $actived);
    $code = $id_ticket . rand(1000, 9999);
    ticket_update_code($code, $id_ticket);

    for ($i = 0; $i < count($row); $i++) {
        seat_insert($id_ticket, $row[$i], $col[$i]);
    }
    if (!empty($id_beverages)) {
        for ($i = 0; $i < count($id_beverages); $i++) {
            $beverages =  Beverages::select_by_id($id_beverages[$i]);
            Beverages::insert_bill($id_ticket, $id_beverages[$i], $quantity_beverages[$i], $beverages['price'] * $quantity_beverages[$i]);
        }
    }

    header('location: ../user/?detail_ticket&&id_ticket=' . $id_ticket);
} elseif (exist_parma('comment')) {
    $email = $_SESSION['user']['email'];
    $user = user_select_by_email($email);
    comment_insert($user['id'], $id_film, $comment, date('Y-m-d'), $vote);
    echo '
    <div class=" p-4 border-b">
        <span class=" px-2 py-1 bg-menu text-white font-bold">' . $user['name'] . '</span>
        <span>';
    for ($i = 0; $i < $vote; $i++) {
        echo '<i class="fa fa-star text-yellow-600" aria-hidden="true"></i>';
    }
    for ($i = $vote; $i < 5; $i++) {
        echo '<i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>';
    }

    echo '     </span>
        <p class=" py-2">' . $comment . '</p>
        <p class=" text-sm">' . format_date(date('Y-m-d')) . '</p>
    </div>
    ';
    die;
} elseif (exist_parma('search')) {
    $film = film_search($name);
    foreach ($film as $key => $value) {
        echo '
        <a href="../film/?detail&id_film=' . $value['id'] . '" class=" p-2 bg-white border flex items-center gap-2">
            <div class=" w-1/12">
                <img src="' . $UPLOAD_FILM_URL . $value['thumb'] . '" alt="">
            </div>
            <div class=" w-11/12">
                <p class=" font-bold truncate">' . $value['name'] . '</p>
            </div>
        </a>
        ';
    }
    die;
} else {
    $SLIDE = './banner_film.php';
    $banner = banner_select_byName('banner film');
    $VIEW_NAME = 'list-ui.php';
}

include '../layout.php';
