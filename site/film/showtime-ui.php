
<section>
    <div class="lg:w-4/5 m-auto container py-4">
        <div class="flex justify-center gap-7 py-8">
            <?php
            $daysOfWeek = array("Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy");
            for ($i = 0; $i <= 7; $i++) {
                $dates = strtotime("+$i day");
                $dayOfWeekIndex = date('w', $dates);
                if (date('Y-m-d', $dates) == $date) {
                    echo '
                    <div class="flex flex-col gap-2">
                        <p>' . $daysOfWeek[$dayOfWeekIndex] . '</p>
                        <input type="hidden" class="date_today" name="" value="' . date('Y-m-d', $dates) . '">
                        <p class="show_ngay_chieu cursor-pointer  w-12 h-12 flex justify-center items-center rounded-full bg-slate-700 text-white">' . date('d', $dates) . ' </p>
                    </div>
                    ';
                } else {
                    echo '
                    <div class="flex flex-col gap-2">
                        <p>' . $daysOfWeek[$dayOfWeekIndex] . '</p>
                        <input type="hidden" name="date_show" value="' . date('Y-m-d', $dates) . '">
                        <p class="show_ngay_chieu cursor-pointer w-12 h-12 flex justify-center items-center rounded-full text-black hover:bg-slate-700 hover:text-white">' . date('d', $dates) . '</p>
                    </div>
                    ';
                }
            }
            ?>

        </div>

        <div class="showFilm">
            <?php
            foreach ($list_film as $key => $value) {
                extract($value);
                $film = film_select_by_id($id_film);
            ?>

                <div class="py-4 flex items-center">
                    <div class="w-1/3 bg-orange-400 p-3 rounded shadow-xl shadow-gray-400">
                        <a href="../film/index.php?detail&&id_film=<?= $film['id'] ?>" class=" flex gap-3">
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
                        $xuat_chieu1 = film_select_xuat_chieu_da_chieu_trong_ngay($date, $film['id'], date('H:m:s'));
                        $xuat_chieu2 = film_select_xuat_chieu_chua_chieu_trong_ngay($date, $film['id'], date('H:m:s'));
                        foreach ($xuat_chieu1 as $key => $value) {
                            extract($value);
                        ?>
                            <div class="  bg-gray-600 border border-black  rounded text-black shadow-sm text-center">
                                <p class=" py-1 px-6 border-b border-b-black text-sm"><?= $name ?></p>
                                <p class=" py-2 px-6 border-b border-b-black "><?= $time_start ?></p>
                                <p class=" py-1 px-6 text-sm"><?= $seats - $quantity . '/' . $seats ?> ghế</p>
                            </div>

                        <?php
                        }
                        foreach ($xuat_chieu2 as $key => $value) {
                            extract($value)
                        ?>
                            <a href="" class="  bg-orange-400 border border-white hover:bg-orange-600 rounded text-white text-center">
                                <p class=" py-1 px-6 border-b border-b-white text-sm"><?= $name ?></p>
                                <p class=" py-2 px-6 border-b border-b-white "><?= $time_start ?></p>
                                <p class=" py-1 px-6 text-sm"><?= $seats - $quantity . '/' . $seats ?> ghế</p>
                            </a>

                        <?php

                        }
                        ?>

                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</section>


<script>
    $('.lich_chieu').addClass('bg-yellow-600')

    $(document).on('click', '.show_ngay_chieu', function() {
        $('.bg-slate-700').removeClass('bg-slate-700').removeClass('text-white').addClass('text_black')
        $(this).addClass('bg-slate-700').removeClass('text-black').addClass('text-white')
        console.log($(this).parent().children('input').val());
        $.ajax({
            url: './list_in_showtime.php',
            type: 'POST',
            data: {
                date: $(this).parent().children('input').val(),
                date_today: $(this).parent().children('.date_today').val(),
            },
            success: function(result) {
                $(".showFilm").html(result);
            },
        })
    })
</script>