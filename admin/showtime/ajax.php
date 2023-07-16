<?php
require_once '../../global.php';
require_once '../../DAO/showtime.php';
require_once '../../DAO/film.php';
require_once '../../DAO/room.php';
require_once '../../DAO/shift.php';
extract($_REQUEST);
$rooms = room_select_all();

if (exist_parma('first')) {
?>
    <div class="row pb-4 row-select">
        <div class="col-2">
            <label for="date"> Chọn ngày </label>
            <input type="date" name="date[]" class="date">
            <span class="checkDate text-danger"></span>

        </div>
        <div class="col-2">
            <label for="id_room"> Chọn phòng chiếu </label>
            <select name="id_room[]" class="id_room">
                <option value="0">- - - Chọn phòng - - -</option>
            </select>
            <span class="checkRoom text-danger"></span>

        </div>
        <div class="col-5">
            <label for="time_start"> Chọn Xuất chiếu</label>
            <div class="time_start d-flex gap-3 justify-content-evenly align-items-center">

            </div>
            <span class="checkTime text-danger"></span>

        </div>
        <div class="col-2">
            <label for="price"> Giá vé</label>
            <input type="number" readonly name="price[]" class="price input" id="" value="0">
            <span class="checkPrice text-danger"></span>

        </div>
        <div class="col-1 d-flex justify-content-center align-items-center">
            <i class="fa fa-times close_row cursor-pointer" aria-hidden="true"></i>
        </div>
    </div>

<?php
} elseif (exist_parma('show_room')) {
    $film = film_select_by_id($id_film);
    $dateFilm =  explode('-', $film['premiere']);
    $date =  explode('-', $date);
    $check=0;
    if (count($date) < 2) {
        $date_err = '<div class="text-danger">Nhập thiếu</div>';
        $check = 1;
    } else {
        if ($date[0] < $dateFilm[0]) {
            $check = 1;
        } elseif($date[0] == $dateFilm[0]) {
            if ($date[1] < $dateFilm[1]) {
                $check = 1;
            } elseif($date[1] == $dateFilm[1]) {
                if ($date[2] < $dateFilm[2]) {
                    $check = 1;
                }
            }
        }
    }
    if ($check==1) {
        echo 'Nhập sau ngày khởi chiếu';
    } else {
        echo '<option value="0">- - - Chọn phòng - - -</option>';
        foreach ($rooms as $key => $value) {
            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
    }

} elseif (exist_parma('show_shift')) {
    $times = Showtime::select_shift_by_id_room_and_date($date, $id_room);
    $shifts = shift_select_by_id_room($id_room);
    for ($i = 0; $i < 5; $i++) {

        $check = 0;
        foreach ($times as $key => $value) {
            $shift = shift_select_by_id($value['id_shift']);
            if ($shift['name'] - 1 == $i) {
                $check = 1;
            }
        }

        if ($check == 0) {
            echo '
            <div class="d-flex flex-column gap-2 justify-content-center align-items-center">
                <input type="checkbox" name="id_shift-' . $date . '-' . $id_room . '[]" id="" class="id_shift" value="' . $i . '">
                <label class="m-0" for="">' . $shifts[$i]['time_start'] . '</label>
            </div>  
            ';
        } else {
            echo '
            <div class="d-flex flex-column gap-2 justify-content-center align-items-center">
                <i class="fa fa-check-square" aria-hidden="true"></i>
                <label class="m-0" for="">' . $shifts[$i]['time_start'] . '</label>
            </div>
            ';
        }
    }
} else {
    echo 1;
}
?>