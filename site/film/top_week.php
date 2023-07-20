<section>
    <div class="lg:w-4/5 m-auto container  pb-2 mb-4  px-2 bg-gray-200 rounded">
        <h2 class=" text-center font-bold text-3xl py-4 "> PHIM HAY TRONG TUẦN</h2>
        <div class="slide">
            <div class="owl-carousel slide-first owl-theme owl-loaded">
                <div class="owl-stage-outer ">
                    <div class="owl-stage flex">
                        <?php
                        foreach ($top_film_week as $key => $value) {
                            extract($value);
                            $film = film_select_by_id($id_film);
                        ?>
                            <div class="owl-item">
                                <a href="../film/?detail&id_film=<?= $film['id'] ?>" class=" h-full relative item">
                                    <div class=" h-full rounded overflow-hidden hover:opacity-80">
                                        <img class=" h-full" src="<?= $UPLOAD_FILM_URL . $film['thumb'] ?>" alt="">
                                    </div>
                                    <div class=" absolute bg-main w-full bottom-0 hidden">
                                        <h3 class=" text-white uppercase text-lg text-center font-bold pt-2"><?= $film['name'] ?></h3>
                                        <div class=" flex m-auto w-full justify-center">
                                            <a href="../film/?detail&id_film=<?= $film['id'] ?>" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500">Xem chi tiết</a>
                                            <a href="../film/?detail_showtime&id_film=<?= $film['id'] ?>" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500 ">Mua vé</a>
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
        </div>
    </div>
</section>