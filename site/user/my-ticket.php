<section>
    <div class=" container w-4/5 m-auto py-4">
        <h2 class=" uppercase text-2xl font-bold py-4">Lịch sử mua hàng</h2>
        <?php
        foreach ($ticket as $key => $value) {
            extract($value); 
            $date_now = date('Y-m-d');
            if($date < $date_now){
                ticket_update_activated(0,$id);
            }
            $time_now = date('H:i:s');
            if($time_end < $time_now && $date = $date_now ){
                ticket_update_activated(0,$id);
            }
            if($activated == 0){
                $activated = '<span class=" text-red-500">Không hoạt động</span>';
            }else{
                $activated = '<span class=" text-green-500">Đang hoạt động</span>';
            }
            $price = $price_ticket + $price_bill;
            ?>
            <div class=" border-t border-b rounded-md p-4 my-4 flex gap-4  items-center">
                <div class=" w-1/6">
                    <div class=" w-3/6 m-auto">
                        <img src="<?=$UPLOAD_FILM_URL.$thumb?>" alt="">
                    </div>
                </div>
                <div class=" w-3/5 flex gap-2">
                    <div>
                        <p>Mã vé </p>
                        <p>Ngày chiếu</p>
                        <p>Trạng thái sử dụng</p>
                        <p>Tên phim</p>
                        <p>Tổng tiền thanh toán</p>
                    </div>
                    <div class=" font-bold">
                        <p><?=$code?></p>
                        <p><?=$date?></p>
                        <p><?=$activated?></p>
                        <p><?=$name?></p>
                        <p><?=currency_format($price)?></p>
                    </div>
                </div>
                <div>
                    <a href="../user/?detail_ticket&&id_ticket=<?=$id?>" class=" hover:text-rose-500 hover:border-b-rose-500">
                        Xem chi tiết
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>


    </div>
</section>