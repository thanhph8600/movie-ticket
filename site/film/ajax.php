<?php
require_once '../../global.php';
require_once '../../DAO/film.php';
require_once '../../DAO/showtime.php';
require_once '../../DAO/chair_is_waiting.php';
require_once '../../DAO/beverages.php';
extract($_REQUEST);

if (exist_parma('list_in_showtime')) {
    $list_film = film_select_trong_ngay($date);

    foreach ($list_film as $key => $value) {
        extract($value);
        $film = film_select_by_id($id_film);
?>

        <div class="py-4 flex items-center">
            <div class="w-1/3 bg-orange-400 p-3 rounded shadow-xl shadow-gray-400">
                <a href="../film/index.php?detail&&id_film=<?= $id_film ?>" class=" flex gap-3">
                    <img class=" float-left -ml-12 w-2/4 border-4 border-orange-200" src="<?= $UPLOAD_FILM_URL . $film['thumb'] ?>" alt="">
                    <div class="float-right text-white w-3/5  ">
                        <h2 class=" text-3xl  font-bold whitespace-pre-line"><?= $film['name'] ?></h2>
                        <p class=" pt-2 h-44 overflow-hidden"><?= $film['description'] ?>.</p>
                    </div>
                </a>
                <div class=" clear-both block"></div>
            </div>
            <div class="w-2/3 shadow-lg shadow-gray-400 rounded-e-xl  flex pl-10 bg-orange-500 py-4 flex-wrap gap-3 ">
                <?php
                $xuat_chieu1 = film_select_xuat_chieu_trong_ngay($date, $id_film, date('H:m:s'));

                if (!empty($date_today)) {
                    $xuat_chieu2 = film_select_xuat_chieu_da_chieu_trong_ngay($date, $id_film, date('H:m:s'));
                    foreach ($xuat_chieu2 as $key => $value) {
                        extract($value)
                ?>
                        <div class="  bg-gray-600 border border-black  rounded text-black shadow-sm text-center">
                            <p class=" py-1 px-6 border-b border-b-black text-sm"><?= $name ?></p>
                            <p class=" py-2 px-6 border-b border-b-black "><?= substr($time_start, 0, 5); ?></p>
                            <p class=" py-1 px-6 text-sm"><?= $seats - $quantity . '/' . $seats ?> ghế</p>
                        </div>

                    <?php
                    }

                    $xuat_chieu1 = film_select_xuat_chieu_chua_chieu_trong_ngay($date, $id_film, date('H:m:s'));
                }

                foreach ($xuat_chieu1 as $key => $value) {
                    extract($value)
                    ?>
                    <a href="../film/?room&&id_showtime=<?= $id_showtime ?>" class="  bg-orange-400 border border-white hover:bg-orange-600 cursor-pointer rounded text-white text-center">
                        <p class=" py-1 px-6 border-b border-b-white text-sm"><?= $name ?></p>
                        <p class=" py-2 px-6 border-b border-b-white "><?= substr($time_start, 0, 5); ?></p>
                        <p class=" py-1 px-6 text-sm"><?= $seats - $quantity . '/' . $seats ?> ghế</p>
                    </a>

                <?php

                }
                ?>

            </div>
        </div>
    <?php
    }
} elseif (exist_parma('show_xuat_chieu_trong_ngay_cua_1film')) {
    ?>
    <div class=" text-black bg-amber-400 font-bold p-6  relative before:block before:absolute before:-inset-1 before:skew-x-12 before:bg-orange-500 before:h-72 before:-top-3 before:left-80 before:w-full">
        <h3 class=" uppercase text-2xl font-bold pb-12">Kin start ĐÀ nẵng</h3>
        <div class=" pb-4 text-lg font-bold">
            <p><?= date("d-m", strtotime($ngay_chieu)) ?></p>
            <p><?= date("Y", strtotime($ngay_chieu)) ?></p>
        </div>
        <div class=" absolute left-32 top-16">
            <div class="flex font-normal gap-3 flex-wrap py-4 px-6 bg-gray-700 bg-opacity-30 w-full rounded-md">
                <?php


                $xuat_chieu1 = film_select_xuat_chieu_trong_ngay($ngay_chieu, $id_film);
                if (date('Y-m-d') == $ngay_chieu) {
                    $xuat_chieu2 = film_select_xuat_chieu_da_chieu_trong_ngay($ngay_chieu, $id_film, date('H:m:s'));
                    foreach ($xuat_chieu2 as $key => $value) {
                        extract($value)
                ?>

                        <div class="  bg-gray-600 border border-black  rounded text-black shadow-sm text-center">
                            <p class=" py-1 px-6 border-b border-b-black text-sm"><?= $name ?></p>
                            <p class=" py-2 px-6 border-b border-b-black "><?= substr($time_start, 0, 5); ?></p>
                            <p class=" py-1 px-6 text-sm"><?= $seats - $quantity . '/' . $seats ?> ghế</p>
                        </div>

                    <?php
                    }
                    $xuat_chieu1 = film_select_xuat_chieu_chua_chieu_trong_ngay($ngay_chieu, $id_film, date('H:m:s'));
                }


                foreach ($xuat_chieu1 as $key => $value) {
                    extract($value)
                    ?>
                    <a href="../film/?room&&id_showtime=<?= $id_showtime ?>" class="  bg-orange-400 border border-white hover:bg-orange-600 cursor-pointer rounded text-white text-center">
                        <p class=" py-1 px-6 border-b border-b-white text-sm"><?= $name ?></p>
                        <p class=" py-2 px-6 border-b border-b-white "><?= substr($time_start, 0, 5); ?></p>
                        <p class=" py-1 px-6 text-sm"><?= $seats - $quantity . '/' . $seats ?> ghế</p>
                    </a>

                <?php
                }

                ?>


            </div>
        </div>
    </div>
<?php
} elseif (exist_parma('nuoc_uong')) {
    $sum = 0;
    if (!empty($nuoc_uong)) {
        foreach ($nuoc_uong as $key => $value) {
            $beverages = Beverages::select_by_id($value[0]);
            $price = $beverages['price'] * $value[1];
            $sum += $price;
        }
        echo '<div>
                <img src="https://www.cinestar.com.vn/catalog/view/theme/default/images/icon-promotion.png" alt="">
            </div>
            <div class=" text-xl font-bold text-rose-500">'.currency_format($sum).'</div>';
        foreach ($nuoc_uong as $key => $value) {
            $beverages = Beverages::select_by_id($value[0]);
            echo '<div>'. $value[1].' x '.$beverages['detail'].'</div>';
        }
    }
} elseif (exist_parma('kiem_tra_ghe')) {
    $check = chair_is_waiting_check_chair($id_showtime, $row_index, $col_index);
    if (empty($check)) {
        return false;
    }
} elseif (exist_parma('them_ghe')) {
    chair_is_waiting_insert($id_user, $id_showtime, $col_index, $row_index);
} elseif (exist_parma('xoa_ghe')) {
    chair_is_waiting_delete_row($id_user, $id_showtime, $col_index, $row_index);
} elseif (exist_parma('xoa_tat_ca_ghe_dang_chon')) {
    chair_is_waiting_delete_by_user_idShowtime($id_user, $id_showtime);
} elseif (exist_parma('form_thanh_toan')) {
    extract($_REQUEST);
    var_dump($_REQUEST);
}

?>