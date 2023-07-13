<section>
    <div class="owl-carousel slide-banner owl-theme owl-loaded">
        <div class="owl-stage-outer">
            <div class="owl-stage">
                <div class="owl-item ">
                    <img src="<?= $CONTENT_URL ?>/img/slide-1.jpg" class="  " alt="...">
                </div>
                <div class="owl-item ">
                    <img src="<?= $CONTENT_URL ?>/img/slide-2.jpg" class="  " alt="...">
                </div>
                <div class="owl-item ">
                    <img src="<?= $CONTENT_URL ?>/img/slide-3.jpg" class="  " alt="...">
                </div>
                <div class="owl-item ">
                    <img src="<?= $CONTENT_URL ?>/img/slide-4.jpg" class="  " alt="...">
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container m-auto py-4">
        <h2 class=" uppercase text-2xl text-center font-bold pb-4">hỏi & đáp</h2>
        <div class=" w-4/5  m-auto pb-2">
            <p class=" show-qa bg-rose-950 p-4 text-lg rounded-bl-3xl rounded-tr-3xl text-white hover:bg-pink-600 cursor-pointer"><span>01 </span> Làm thế nào để mua vé online?</p>
            <div class="hidden rounded-xl bg-slate-300 border p-4 my-2 ">
                <p class=" text-center font-bold">HƯỚNG DẪN MUA VÉ ONLINE</p>
                <p class=" text-center">Điều kiện:</p>
                <p>- Bạn phải là thành viên Cinestar</p>
                <p>- Nếu không là thành viên vui lòng đăng ký thành viên trên website để được mua vé</p>
                <p class="text-center">Bước 2:</p>
                <p>Đăng nhập tài khoản thành viên</p>
                <p>Đăng nhập</p>
                <p class="text-center">Bước 3:</p>
                <p>- Chọn loại vé và số lượng:</p>
                <p class="text-center">Bước 4:</p>
                <p>Chọn ghế:</p>
                <p>Chọn thức ăn:</p>
                <p class="text-center">Bước 5:</p>
                <p>- Đồng ý.</p>
                <p>- Đồng ý các điều khoản</p>
                <p>- Chọn loại thẻ thanh toán.</p>
                <p>- Thanh toán.</p>
                <p class="text-center">Bước 6: Nhập thông tin tài khoản để thanh toán việc mua online.</p>
                <p class="text-center">HOÀN TẤT</p>
            </div>
        </div>
        <div class=" w-4/5  m-auto pb-2">
            <p class=" show-qa bg-rose-950 p-4 text-lg rounded-bl-3xl rounded-tr-3xl text-white hover:bg-pink-600 cursor-pointer"><span>02 </span> Thủ tục đặt vé online và phương thức thanh toán như thế nào?</p>
            <div class="hidden rounded-xl bg-slate-300 border p-4 my-2 ">
                <p class=" font-bold">CÁCH ĐẶT VÉ ONLINE:</p>
                <p>1/ Đặt vé online trên mục MUA VÉ ONLINE ở trang chủ Cinestar Cinema.</p>
                <p>2/ Chọn Phim, Rạp, Ngày va Suất chiếu .</p>
                <p>3/ Bạn chọn vị trí ghế, nhập thông tin liên hệ.</p>
                <p>4/ Bạn chọn phương thức thanh toán.</p>
                <p>5/Sau khi hoàn tất thanh toán hệ thống sẽ gửi thông tin vé đến liên hệ của bạn. Vui long xuất thông tin đặt vé khi đến rap.</p>
                <p class=" font-bold">CHÚC BẠN XEM PHIM VUI VẺ</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container m-auto py-4">
        <h2 class=" uppercase text-2xl text-center font-bold pb-4">Gửi câu hỏi</h2>
        <form action="" method="post" class=" flex flex-col justify-center items-center">
            <textarea class=" w-3/5 m-auto outline-dotted rounded p-4" name="" id="" rows="6"></textarea>
            <input type="submit" value="Gửi" class=" w-1/6 mt-4 cursor-pointer py-4 text-center rounded bg-blue-500 hover:bg-blue-600 text-white">
        </form>
    </div>
</section>

<section>
    <div class="container m-auto pb-2 mb-4  px-2 bg-gray-200 rounded">
        <h2 class=" text-center font-bold text-3xl py-4 "> PHIM HAY TRONG TUẦN</h2>
        <div class="slide">
            <div class="owl-carousel slide-first owl-theme owl-loaded">
                <div class="owl-stage-outer ">
                    <div class="owl-stage flex">
                        <div class="owl-item">
                            <a href="" class=" relative item">
                                <div class=" rounded overflow-hidden hover:opacity-80">
                                    <img src="https://cinestar.com.vn/pictures/Cinestar/05-2023/nang-tien-ca.jpg" alt="">
                                </div>
                                <div class=" absolute bg-main w-full bottom-0 hidden">
                                    <h3 class=" text-white uppercase text-lg text-center font-bold pt-2">Nàng tiên cá</h3>
                                    <div class=" flex m-auto w-full justify-center">
                                        <a href="" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500">Xem chi tiết</a>
                                        <a href="" class=" block text-white py-2 px-4 bg-menu m-2 rounded hover:bg-red-500 ">Mua vé</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    $(document).on('click', '.show-qa', function() {
        $(this).parent().children('div').slideToggle();
    })
</script>