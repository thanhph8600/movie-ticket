<style>
    .owl-carousel .owl-nav button.owl-next,
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel button.owl-dot {
        background: 0 0;
        color: inherit;
        border: none;
        padding: 5px 15px !important;
        font: inherit;
        background: gray;
        font-size: 18px;
        opacity: 0.5;
    }
</style>
<section>
    <div class="container m-auto lg:w-4/5 py-4">
        <div class="flex items-center py-3">
            <div class=" h-1 py-1 border-t-2 border-b-2 border-t-gray-600 border-b-gray-600 flex-auto"></div>
            <h2 class=" font-bold lg:text-6xl text-xl px-5">MOVIE SELECTION</h2>
            <div class=" h-1 py-1 border-t-2 border-b-2 border-t-gray-600 border-b-gray-600 flex-auto"></div>
        </div>
        <div class="slide">
            <div class="owl-carousel slide-first owl-theme owl-loaded">
                <div class="owl-stage-outer ">
                    <div class="owl-stage flex">

                        <?php
                        foreach ($top10_film as $key => $value) {
                            extract($value); ?>
                            <div class=" h-full owl-item ">
                                <div class=" h-full relative item">
                                    <div class=" h-full rounded overflow-hidden hover:opacity-80">
                                        <a href="../film/?detail&id_film=<?= $id ?>">
                                            <img class=" h-full" src="<?= $UPLOAD_FILM_URL . $thumb ?>" alt="">

                                        </a>
                                    </div>
                                    <div class=" absolute bg-black w-full bottom-0 bg-opacity-80 hidden">
                                        <h3 class=" text-white uppercase lg:text-lg text-center font-bold pt-2"><?= $name ?></h3>
                                        <div class=" flex m-auto w-full justify-center">
                                            <a href="../film/?detail&id_film=<?= $id ?>" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500">Xem chi tiết</a>
                                            <a href="../film/?detail_showtime&id_film=<?= $id ?>" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500 ">Mua vé</a>
                                        </div>
                                    </div>
                                </div>
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

<section>
    <div class="container m-auto lg:w-4/5 py-8">
        <div class=" py-4">
            <div class="flex justify-center items-center">
                <img class=" w-8 lg:w-16" src="https://www.cinestar.com.vn/catalog/view/theme/default/images/iocn-news.png" alt="">
                <h2 class=" uppercase  font-bold text-xl lg:text-4xl px-5"> Tin tức</h2>
            </div>
            <div class=" item-tintuc grid lg:grid-cols-2 gap-1 pt-4 ">
                <?php
                $i = 1;
                foreach ($news as $key => $value) {
                    extract($value);
                    if ($i == 1 || $i == 4) {
                        $class = "rounded-tr-3xl rounded-bl-3xl bg-menu hover:bg-orange-500";
                    } elseif ($i == 2 || $i == 3) {
                        $class = "rounded-tl-3xl rounded-br-3xl bg-yl hover:bg-pink-600";
                    }
                ?>
                    <a href="./?detail_news&&id=<?=$id?>">
                        <div class=" transition cursor-pointer ease-in-out delay-100  flex p-5  text-white <?= $class ?>">
                            <div class=" w-7/12 pr-4 text-right ">
                                <h2 class=" font-bold text-lg"><?= $title ?> </h2>
                                <p class=" text-sm max-h-10 overflow-hidden "><?= $content ?></p>
                            </div>
                            <div class=" w-5/12 flex items-center ">
                                <img class="border-4 border-white <?= $class ?>  ml-auto" src="<?= $UPLOAD_NEWS_URL . $thumb ?>" alt="">
                            </div>
                        </div>
                    </a>
                <?php
                    $i++;
                    if ($i == 5) $i = 0;
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    $('.trang_chu').addClass('bg-yellow-600')
</script>