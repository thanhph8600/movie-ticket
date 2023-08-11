<section>
    <div class=" container w-4/5 m-auto py-4">
        <h2 class=" uppercase text-2xl font-bold py-4">Lịch sử mua hàng</h2>
        <div class="list overflow-hidden">
            <?php
            foreach ($ticket as $key => $value) {
                extract($value);
                $date_now = date('Y-m-d');
                if ($date < $date_now) {
                    ticket_update_activated(0, $id);
                }
                $time_now = date('H:i:s');
                if ($time_end < $time_now && $date == $date_now) {
                    ticket_update_activated(0, $id);
                }
                if ($activated == 0) {
                    $activated = '<span class=" text-red-500">Phim đã xem</span>';
                } elseif($activated == 1) {
                    $activated = '<span class=" text-green-500">Phim sắp xem</span>';
                }elseif($activated == 2) {
                    $activated = '<span class=" text-red-500">Phim đã hủy</span>';
                }
                $price = $price_ticket + $price_bill;
            ?>
                <div class=" border-t border-b rounded-md p-4 my-4 flex flex-wrap gap-4  items-center">
                    <div class=" w-1/6">
                        <div class=" lg:w-3/6 m-auto">
                            <img src="<?= $UPLOAD_FILM_URL . $thumb ?>" alt="">
                        </div>
                    </div>
                    <div class=" lg:w-3/5 flex gap-2">
                        <div>
                            <p>Mã vé </p>
                            <p>Ngày chiếu</p>
                            <p>Trạng thái sử dụng</p>
                            <p>Tên phim</p>
                            <p>Tổng tiền thanh toán</p>
                        </div>
                        <div class=" font-bold">
                            <p><?= $code ?></p>
                            <p><?= $date ?></p>
                            <p><?= $activated ?></p>
                            <p><?= $name ?></p>
                            <p><?= currency_format($price) ?></p>
                        </div>
                    </div>
                    <div class=" ml-auto">
                        <a href="../user/?detail_ticket&&id_ticket=<?= $id ?>" class=" hover:text-rose-500 hover:border-b-rose-500">
                            Xem chi tiết
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class=" flex justify-center pt-8">
            <p class=" more-read cursor-pointer px-6 py-2 bg-menu text-white rounded-md hover:shadow hover:bg-rose-600">Xem thêm</p>
        </div>
    </div>
</section>
<script>
    $('.list').css('max-height','900px')
    if($('.list').height() < 900){
        $('.more-read').addClass('hidden')
    }
    $(document).on('click','.more-read',function(){
        $('.list').css('max-height','10000px')
        $(this).html('Rút gọn')
        $(this).addClass('close-read').removeClass('more-read')
    })

    $(document).on('click','.close-read',function(){
        $('.list').css('max-height','900px')
        $(this).html('Rút gọn')
        $(this).addClass('more-read').removeClass('close-read')
    })
</script>