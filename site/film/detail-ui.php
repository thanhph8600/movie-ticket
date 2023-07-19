<section>
    <div class=" lg:w-4/5 m-auto container pt-8 pb-4 ">
        <div class=" flex pb-4">
            <div class=" w-4/12 rounded">
                <img class="rounded-xl" src="<?= $UPLOAD_FILM_URL . $film['thumb'] ?>" alt="">
            </div>
            <div class=" flex flex-col gap-2 w-full pl-12">
                <h2 class=" text-3xl font-semibold pb-3 mb-3 border-b-2"><?= $film['name'] ?></h2>
                <div class="flex gap-2">
                    <p class=" font-bold">Đạo diễn: </p>
                    <p><?= $film['directors'] ?></p>
                </div>
                <div class="flex gap-2">
                    <p class=" font-bold">Diễn viên: </p>
                    <p><?= $film['actor'] ?></p>
                </div>
                <div class="flex gap-2">
                    <p class=" font-bold">Thể loại: </p>
                    <p><?= $film['genre'] ?></p>
                </div>
                <div class="flex gap-2">
                    <p class=" font-bold">Khởi chiếu: </p>
                    <p><?= $film['premiere'] ?></p>
                </div>
                <div class="flex gap-2">
                    <p class=" font-bold">Thời lượng: </p>
                    <p><?= $film['time'] ?> phút</p>
                </div>
                <div class="flex gap-2">
                    <p class=" font-bold">Ngôn ngữ: </p>
                    <p><?= $film['language'] ?></p>
                </div>
                <div class="flex gap-2 items-center">
                    <p class=" font-bold">Rated: </p>
                    <p class=" font-bold text-lg"><?= $film['rated'] ?></p>
                </div>
                <div class="gap-2 items-center ">
                    <h2 class=" text-xl font-bold">Tóm tắt</h2>
                    <p class=""><?= $film['description'] ?></p>
                </div>
                <div class="flex gap-2 items-center py-8">
                    <p class="watch-movie cursor-pointer uppercase font-bold text-base bg-menu hover:bg-yellow-600 text-white px-4 py-2 rounded"><i class="fa fa-play-circle" aria-hidden="true"></i> trailer</p>
                    <?php
                    if (!empty($check_phim)) {
                        echo '<a href="" class="uppercase font-bold text-base bg-menu hover:bg-yellow-600 text-white px-4 py-2 rounded "><i class="fa fa-cart-plus" aria-hidden="true"></i> đặt vé</a>';
                    }
                    ?>

                </div>

            </div>

        </div>

    </div>
</section>


<section>
    <div class="movie fixed top-0 left-0 w-full h-full z-40 bg-black bg-opacity-80">
        <div class="container relative m-auto z-40">
            <div class="close text-3xl flex justify-center items-center cursor-pointer text-white bg-opacity-40 hover:bg-black absolute top-0 right-0 w-20 h-20 bg-rose-600 rounded-full">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <div class=" flex justify-center items-center h-screen">
                <iframe id="id_movie" width="100%" height="600" src="<?= $film['trailer'] ?>" title="<?= $film['name'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                </iframe>
            </div>
        </div>
        <div class=" close bg-black bg-opacity-80"></div>
    </div>
</section>

<section>
    <div class="lg:w-4/5 m-auto container pb-4">
        <div class=" flex border-t border-b">
            <div class=" w-1/2 border-r py-6 text-center ">
                <h4 class=" text-lg font-semibold pb-3">Sở thích theo độ tuổi</h4>
                <div class="flex justify-center gap-4 text-sm">
                    <div class=" flex flex-col justify-center items-center gap-1">
                        <p>13,3%</p>
                        <p class=" w-4 bg-gray-200 h-32 relative ">
                            <span style="height: 13.3%;background-image: url(https://www.lottecinemavn.com/LCHS/Image/Bg/bg_age10.png);" class="absolute contents-[] w-full  bottom-0 left-0"></span>
                        </p>
                        <p>
                            < 20 tuổi</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center gap-1">
                        <p>70,3%</p>
                        <p class=" w-4 bg-gray-200 h-32 relative ">
                            <span style="height: 70.3%;background-image: url(https://www.lottecinemavn.com/LCHS/Image/Bg/bg_age20.png);" class="absolute contents-[] w-full  bottom-0 left-0"></span>
                        </p>
                        <p> 20 > 30 tuổi</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center gap-1">
                        <p>4,3%</p>
                        <p class=" w-4 bg-gray-200 h-32 relative ">
                            <span style="height: 4.3%;background-image: url(https://www.lottecinemavn.com/LCHS/Image/Bg/bg_age30.png);" class="absolute contents-[] w-full  bottom-0 left-0"></span>
                        </p>
                        <p> 30 > 40 tuổi</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center gap-1">
                        <p>1,3%</p>
                        <p class=" w-4 bg-gray-200 h-32 relative ">
                            <span style="height: 1.3%;background-image: url(https://www.lottecinemavn.com/LCHS/Image/Bg/bg_age40.png);" class="absolute contents-[] w-full  bottom-0 left-0"></span>
                        </p>
                        <p> > 40 tuổi</p>
                    </div>
                </div>
            </div>
            <div class=" w-1/2 border-r py-6 text-center ">
                <h4 class=" text-lg font-semibold pb-3">Sở thích theo giới tính</h4>
                <div class=" text-sm py-8">
                    <div class=" flex flex-row items-center gap-1 pb-6">
                        <p class=" w-1/4">Nữ</p>
                        <p class=" w-2/5 bg-gray-200 h-6 relative ">
                            <span style=" width: 22.1%;background-image: url(https://www.lottecinemavn.com/LCHS/Image/Bg/bg_gender_01.png);" class="absolute contents-[] h-full  bottom-0 left-0"></span>
                        </p>
                        <p class=" w-1/4"> 22,1%</p>
                    </div>
                    <div class=" flex flex-row  items-center gap-1">
                        <p class=" w-1/4">Nam</p>
                        <p class="w-2/5 bg-gray-200 h-6 relative ">
                            <span style=" width: 79.9%;background-image: url(https://www.lottecinemavn.com/LCHS/Image/Bg/bg_gender_02.png);" class="absolute contents-[] h-full  bottom-0 left-0"></span>
                        </p>
                        <p class=" w-1/4"> 77,9%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="lg:w-3/5 m-auto container  py-8">
        <div class=" flex border">
            <div class=" w-1/5 text-center border-r p-4 flex flex-col gap-3">
                <p>Xếp hạng</p>
                <div class="flex gap-1 justify-center">
                    <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="1" aria-hidden="true"></i>
                    <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="2" aria-hidden="true"></i>
                    <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="3" aria-hidden="true"></i>
                    <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="4" aria-hidden="true"></i>
                    <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="5" aria-hidden="true"></i>
                </div>
                <p class=" text-yellow-400 font-semibold danh-gia"></p>
            </div>
            <div class=" w-3/5">
                <textarea name="" id="" class=" w-full h-full p-3 focus:outline-none " placeholder="Viết bình luận tại đây........."></textarea>
            </div>
            <div class=" w-1/5 bg-main flex justify-center items-center  font-bold text-yellow-600">Bình luận</div>
        </div>
        <div class="my-4 border-t-2 border-t-black"></div>
        <div>
            <div class=" p-4 border-b">
                <span class=" px-2 py-1 bg-menu text-white font-bold">Khách</span>
                <span>
                    <i class="fa fa-star text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                </span>
                <p class=" py-2">Phim rất hay vac nó làm tôi khóc</p>
                <p class=" text-sm">29/06/2023</p>
            </div>
            <div class=" p-4 border-b">
                <span class=" px-2 py-1 bg-menu text-white font-bold">Khách</span>
                <span>
                    <i class="fa fa-star text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                    <i class="fa fa-star-o text-yellow-600" aria-hidden="true"></i>
                </span>
                <p class=" py-2">Phim rất hay vac nó làm tôi khóc</p>
                <p class=" text-sm">29/06/2023</p>
            </div>
        </div>
    </div>
</section>

<?php
include './top_week.php';
?>

<script>
    $('.phim').addClass('bg-yellow-600')

    var vote = 0
    $(document).on('click', '.vote', function() {
        // console.log($(this).attr('data-vote'))
        vote = Number($(this).attr('data-vote'))
        $('.vote').each(function(i, obj) {
            if (Number($(obj).attr('data-vote')) <= vote) {
                $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
                $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
        let danhGia = '';
        switch (vote) {
            case 1:
                danhGia = "Rất tệ"
                break;
            case 2:
                danhGia = "Tệ"
                break;
            case 3:
                danhGia = "Bình thường"
                break;
            case 4:
                danhGia = "Tốt"
                break;
            case 5:
                danhGia = "Rất tốt"
                break;
            default:
                danhGia = ""
                break;
        }
        $('.danh-gia').html(danhGia)
    })


    $('.movie').css('display', 'none')


    $(document).on('click', '.watch-movie', function() {
        $(".movie").css('display', 'block')
    });

    $(document).on('click', '.close', function() {
       window.location.reload(true);

    })
</script>