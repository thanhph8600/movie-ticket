<section class=" bg-slate-800">
    <div class="container lg:w-4/5 m-auto py-12 ">
        <div class=" text-center pb-4">
            <select class="date  border rounded-3xl bg-menu text-white px-2 py-4 outline-none" name="date_film" id="">
                <?php
                foreach ($tat_ca_ngay_chieu as $key => $value) {
                    echo '<option value="' . $value['date'] . '"  class="p-2">Ngày: ' . $value['date'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class=" p-6 rounded shadow-md shadow-gray-300 bg-orange-500 flex gap-5 overflow-hidden">
            <div class=" w-1/4">
                <img class=" rounded shadow-md shadow-gray-400" src="<?= $UPLOAD_FILM_URL . $film['thumb'] ?>" alt="">
            </div>
            <div class="w-3/4">
                <h2 class=" uppercase text-3xl font-bold text-white pb-6"><?= $film['name'] ?></h2>
                <div class="show">
                    <div class=" text-black bg-amber-400 font-bold p-6  relative before:block before:absolute before:-inset-1 before:skew-x-12 before:bg-orange-500 before:h-72 before:-top-3 before:left-80 before:w-full">
                        <h3 class=" uppercase text-2xl font-bold pb-12">Kin start ĐÀ nẵng</h3>
                        <div class=" pb-4 text-lg font-bold">
                            <p><?= date("d-m", strtotime($ngay_chieu)) ?></p>
                            <p><?= date("Y", strtotime($ngay_chieu)) ?></p>
                        </div>
                        <div class=" absolute left-32 top-16">
                            <div class="flex font-normal gap-3 flex-wrap py-4 px-6 bg-gray-700 bg-opacity-30 w-full rounded-md">
                                <?php


                                $xuat_chieu1 = film_select_xuat_chieu_trong_ngay($ngay_chieu, $film['id']);


                                if ($date == $ngay_chieu) {
                                    $xuat_chieu2 = film_select_xuat_chieu_da_chieu_trong_ngay($ngay_chieu, $film['id'], date('H:m:s'));
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
                                    $xuat_chieu1 = film_select_xuat_chieu_chua_chieu_trong_ngay($ngay_chieu, $film['id'], date('H:m:s'));
                                }


                                foreach ($xuat_chieu1 as $key => $value) {
                                    extract($value)
                                    ?>
                                    <a href="../film/?room&&id_showtime=<?=$id_showtime?>"  class="  bg-orange-400 border border-white hover:bg-orange-600 cursor-pointer rounded text-white text-center">
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
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<script>
    $(document).on('change', '.date', function() {
        $.ajax({
            url: './ajax.php?show_xuat_chieu_trong_ngay_cua_1film',
            data: {
                ngay_chieu: $('.date').val(),
                id_film: '<?= $film['id'] ?>'
            },
            success: function(result) {
                $('.show').html(result)
            }
        })
    })

    $('.phim').addClass('bg-yellow-600')

</script>