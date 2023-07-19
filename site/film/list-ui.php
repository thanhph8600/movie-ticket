

<section>
    <div class="lg:w-4/5 m-auto container">
        <div class=" py-8">
            <div class=" pb-4 text-center">
                <span class="show-phimDangChieu cursor-pointer text-lg font-semibold py-2 px-4 bg-menu text-white rounded hover:bg-yellow-600">Phim đang chiếu</span>
                <span class="show-phimSapChieu cursor-pointer text-lg font-semibold py-2 px-4 bg-gray-300 text-white rounded hover:bg-pink-600">Phim sắp chiếu</span>
            </div>
            <div class="phimDangChieu grid grid-cols-5 gap-4 pt-4">
                <?php
                foreach ($film_dang_chieu as $key => $value) {
                    $film = film_select_by_id($value['id_film']);
                ?>
                    <div class=" owl-item relative overflow-hidden flex flex-col ">
                        <a href="../film?detail&&id_film=<?= $film['id'] ?>" class="flex flex-row">
                            <div class=" flex-1 rounded-t hover:opacity-80">
                                <img src="<?= $UPLOAD_FILM_URL . $film['thumb'] ?>" alt="">
                            </div>
                            <div class=" absolute bg-black bg-opacity-80  w-full bottom-0 hidden">
                                <h3 class=" text-white uppercase text-lg text-center m-auto font-bold pt-2"><?= $film['name'] ?></h3>
                                <div class=" flex m-auto w-full justify-center">
                                    <a href="../film?detail&&id_film=<?= $film['id'] ?>" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500">Xem chi tiết</a>
                                    <a href="" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500 ">Mua vé</a>
                                </div>
                            </div>
                            <div class="border flex-auto flex flex-col">
                                <p class=" flex-auto truncate px-2 border-b uppercase text-lg text-center font-bold py-2"><?= $film['name'] ?></p>
                                <div class=" text-center text-sm py-2">
                                    <p><?= $film['time'] ?> phút | <?= $film['premiere'] ?></p>
                                </div>
                            </div>

                        </a>
                    </div>
                <?php
                }
                ?>


            </div>

            <div class="phimSapChieu hidden grid-cols-5 gap-4 pt-4">
                <?php
                foreach ($film_sap_chieu as $key => $value) {
                    extract($value) ?>
                    <div class=" owl-item relative overflow-hidden flex flex-col ">
                        <a href="../film?detail&&id_film=<?= $id ?>" class="flex flex-row">

                            <div class=" flex-1 rounded-t hover:opacity-80">
                                <img src="<?= $UPLOAD_FILM_URL . $thumb ?>" alt="">
                            </div>
                            <div class=" absolute bg-black bg-opacity-80  w-full bottom-0 hidden">
                                <h3 class=" text-white uppercase text-lg text-center m-auto font-bold pt-2"><?= $name ?></h3>
                                <div class=" flex m-auto w-full justify-center">
                                    <a href="../film?detail&&id_film=<?= $id ?>" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500">Xem chi tiết</a>
                                </div>
                            </div>
                            <div class="border flex-auto flex flex-col">
                                <p class=" flex-auto truncate px-2 border-b uppercase text-lg text-center font-bold py-2"><?= $name ?></p>
                                <div class=" text-center text-sm py-2">
                                    <p><?= $time ?> phút | <?= $premiere ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>


            </div>
        </div>
    </div>
</section>

<script>
    $('.phim').addClass('bg-yellow-600')
    $('.show-phimSapChieu').on('click', function() {
        $('.show-phimSapChieu').addClass('bg-menu').removeClass('bg-gray-300')
        $('.show-phimDangChieu').removeClass('bg-menu').addClass('bg-gray-300')

        $('.phimSapChieu').removeClass('hidden').addClass('grid')
        $('.phimDangChieu').addClass('hidden').removeClass('grid')
    })

    $('.show-phimDangChieu').on('click', function() {
        $('.show-phimDangChieu').addClass('bg-menu').removeClass('bg-gray-300')
        $('.show-phimSapChieu').removeClass('bg-menu').addClass('bg-gray-300')

        $('.phimDangChieu').removeClass('hidden').addClass('grid')
        $('.phimSapChieu').addClass('hidden').removeClass('grid')
    })
</script>