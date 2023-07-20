<!-- <?php
require_once '../../global.php';
require_once '../../DAO/film.php';
require_once '../../DAO/showtime.php';
extract($_REQUEST);

$list_film = film_select_trong_ngay($date);

foreach ($list_film as $key => $value) {
    extract($value);
    $film = film_select_by_id($id_film);
?>

    <div class="py-4 flex items-center">
        <div class="w-1/3 bg-orange-400 p-3 rounded shadow-lg shadow-gray-400">
            <a href="../film/index.php?detail&&id_film=<?= $film['id'] ?>" class=" flex gap-3">
                <img class=" float-left -ml-12 w-2/4 border-4 border-orange-200" src="<?= $UPLOAD_FILM_URL . $film['thumb'] ?>" alt="">
                <div class="float-right text-white w-3/5  ">
                    <h2 class=" text-3xl  font-bold whitespace-pre-line"><?= $film['name'] ?></h2>
                    <p class=" pt-2 h-44 overflow-hidden"><?= $film['description'] ?>.</p>
                </div>
            </a>
            <div class=" clear-both block"></div>
        </div>
        <div class="w-2/3  shadow-lg shadow-gray-400 rounded-e-xl  flex pl-10 bg-orange-500 py-4 flex-wrap gap-3 ">
            <?php
            $xuat_chieu1 = film_select_xuat_chieu_trong_ngay($date, $film['id'], date('H:m:s'));

            if (!empty($date_today)) {
                $xuat_chieu2 = film_select_xuat_chieu_da_chieu_trong_ngay($date, $film['id'], date('H:m:s'));
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

                $xuat_chieu1 = film_select_xuat_chieu_chua_chieu_trong_ngay($date, $film['id'], date('H:m:s'));
            }

            foreach ($xuat_chieu1 as $key => $value) {
                extract($value)
                ?>
                <a href="../film/?room&&id_showtime=<?=$id_showtime?>" class="  bg-orange-400 border border-white hover:bg-orange-600 cursor-pointer rounded text-white text-center">
                    <p class=" py-1 px-6 border-b border-b-white text-sm"><?= $name ?></p>
                    <p class=" py-2 px-6 border-b border-b-white "><?= substr($time_start, 0, 5); ?></p>
                    <p class=" py-1 px-6 text-sm"><?= $seats - $quantity . '/' . $seats ?> ghế</p>
                </a>

        <?php
            }
            echo '        
            </div>
            </div>';
        }
        ?> -->