<h2 class=" text-2xl font-bold text-center py-2 rounded bg-menu text-white"><?= $showtime['name'] ?></h2>
<form action="./?check_out" method="post" onsubmit="return checkForm()">
    <div class=" py-4 px-16 mt-4 bg-white rounded border shadow-md w-4/5 m-auto">
        <div class=" text-2xl italic text-center pb-8">
            <p>Cảm ơn quý khách đã đến với <span class=" font-bold">Kinstar !</span></p>
            <p>Xin quý khách vui lòng kiểm tra lại thông tin đặt vé</p>
        </div>
        <div class="flex gap-5">
            <div class=" w-1/5 rounded overflow-hidden shadow">
                <img src="<?= $UPLOAD_FILM_URL . $showtime['thumb'] ?>" alt="">
            </div>
            <div class=" w-2/3 flex flex-col gap-3">
                <h3 class=" text-lg font-bold"><?= $showtime['name'] ?></h3>
                <p>Ngày chiếu: <?= format_date($showtime['date']) ?></p>
                <p>Xuất chiếu: <?= $showtime['time_start'] . ' - ' . $showtime['time_end'] ?></p>
            </div>
        </div>
        <div class=" pt-8 pb-2">
            <div class="flex bg-gray-200 justify-center items-center text-lg">
                <div class="w-2/12 text-center">
                    <p>Ghế</p>
                </div>
                <div class=" w-10/12 flex  justify-between border-l border-l-white px-4 py-2">
                    <div class=" flex gap-3">
                        <?php
                        foreach ($tat_ca_ghe as $key => $value) {
                            echo '<p>' . $value[1] . $value[0] . '</p>';
                            echo '<input type="hidden" class="row" name="row[]" value="' . $value[1] . '">';
                            echo '<input type="hidden" class="col" name="col[]" value="' . $value[0] . '">';
                        }
                        ?>
                    </div>
                    <div class=" font-bold">
                        <?= currency_format($tong_tien_ve) ?>
                    </div>
                </div>
            </div>
            <?php
            if (!empty($tong_nuoc_uong)) {
            ?>
                <div class="flex bg-gray-200 justify-center items-center text-lg  border-t border-t-white">
                    <div class="w-2/12 text-center">
                        <p>Combo</p>
                    </div>
                    <div class=" w-10/12 flex flex-col border-l border-l-white">
                        <?php
                        foreach ($tong_nuoc_uong as $key => $value) {
                            $beverages = Beverages::select_by_id($value[0]);
                            $tong_tien += $value[1] * $beverages['price'];
                            echo '
                            <div class=" flex justify-between px-4 py-2 border-t border-t-white">
                                <p>' . $value[1] . ' x ' . $beverages['name'] . ' (' . $beverages['detail'] . ')</p>
                                <p class=" font-bold">
                                    ' . $value[1] * $beverages['price'] . '
                                </p>
                            </div>
                            ';
                            echo '<input type="hidden" class="beverages" name="id_beverages[]" value="' . $beverages['id'] . '">';
                            echo '<input type="hidden" class="quantity_beverages" name="quantity_beverages[]" value="' . $value[1] . '">';
                        }
                        ?>

                    </div>
                </div>
            <?php
            }
            ?>

            <div class=" flex justify-between text-xl py-4">
                <p>Tổng tiền:</p>
                <p class=" font-bold"><?= currency_format($tong_tien) ?></p>
            </div>
            <div class=" py-2 text-lg">
                <p>Quý khách nhập mã giảm giá ở đây (nếu có)</p>
            </div>
            <div class=" flex gap-3">
                <input class="in_discount border rounded p-2 outline-green-600" name="discount" type="text">
                <p class="check_discount px-4 py-2 bg-gray-200 rounded cursor-pointer">Gửi</p>
                <p class=" text-red-500"></p>
            </div>
            <div class=" flex justify-between text-xl py-4">
                <p>Số tiền giảm:</p>
                <p class="font-bold so_tien_giam">0 đ</p>
            </div>
            <div class=" flex justify-between text-2xl py-4 border-t mt-3">
                <p>Số tiền cần thanh toán:</p>
                <p class="so_tien_thanh_toan font-bold"><?= currency_format($tong_tien) ?></p>
            </div>
        </div>
    </div>
    <div class=" py-4 px-16 mt-4 bg-white rounded border shadow-md w-4/5 m-auto">
        <h2 class=" text-2xl text-center mb-4 uppercase">Điều khoản chung</h2>
        <div class=" h-80 overflow-x-auto">
            Việc bạn sử dụng website này đồng nghĩa với việc bạn đồng ý với những thỏa thuận dưới đây.Nếu bạn không đồng ý, xin vui lòng không sử dụng website. <br> <br>
            <p class=" font-bold">1. Trách nhiệm của người sử dụng:</p>Khi truy cập vào trang web này, bạn đồng ý chấp nhận mọi rủi ro. Kinstar và các bên đối tác khác không chịu trách nhiệm về bất kỳ tổn thất nào do những hậu quả trực tiếp, tình cờ hay gián tiếp; những thất thoát, chi phí (bao gồm chi phí pháp lý, chi phí tư vấn hoặc các khoản chi tiêu khác) có thể phát sinh trực tiếp hoặc gián tiếp do việc truy cập trang web hoặc khi tải dữ liệu về máy; những tổn hại gặp phải do virus, hành động phá hoại trực tiếp hay gián tiếp của hệ thống máy tính khác, đường dây điện thoại, phần cứng, phần mềm, lỗi chương trình, hoặc bất kì các lỗi nào khác; đường truyền dẫn của máy tính hoặc nối kết mạng bị chậm…<br>
            <p class=" font-bold">2. Về nội dung trên trang web:</p>Tất cả những thông tin ở đây được cung cấp cho bạn một cách trung thực như bản thân sự việc. Kinstar và các bên liên quan không bảo đảm, hay có bất kỳ tuyên bố nào liên quan đến tính chính xác, tin cậy của việc sử dụng hay kết quả của việc sử dụng nội dung trên trang web này. Nột dung trên website được cung cấp vì lợi ích của cộng đồng và có tính phi thương mại. Các cá nhân và tổ chức không được phếp sử dụng nội dung trên website này với mục đích thương mại mà không có sự ưng thuận của Kinstar bằng văn bản. Mặc dù Kinstar luôn cố gắng cập nhật thường xuyên các nội dung tại trang web, nhưng chúng tôi không bảo đảm rằng các thông tin đó là mới nhất, chính xác hay đầy đủ. Tất cả các nội dung website có thể được thay đổi bất kỳ lúc nào.<br>
            <p class=" font-bold">3. Về bản quyền:</p>Kinstar là chủ bản quyền của trang web này. Việc chỉnh sửa trang, nội dung, và sắp xếp thuộc về thẩm quyền của Kinstar. Sự chỉnh sửa, thay đổi, phân phối hoặc tái sử dụng những nội dung trong trang này vì bất kì mục đích nào khác được xem như vi phạm quyền lợi hợp pháp của Kinstar.<br>
            <p class=" font-bold">4. Về việc sử dụng thông tin:</p>Chúng tôi sẽ không sử dụng thông tin cá nhân của bạn trên website này nếu không được phép. Nếu bạn đồng ý cung cấp thông tin cá nhân, bạn sẽ được bảo vệ. Thông tin của bạn sẽ được sử dụng với mục đích, liên lạc với bạn để thông báo các thông tin cập nhật của Kinstar như lịch chiếu phim, khuyến mại qua email hoặc bưu điện. Thông tin cá nhân của bạn sẽ không được gửi cho bất kỳ ai sử dụng ngoài trang web Kinstar, ngoại trừ những mở rộng cần thiết để bạn có thể tham gia vào trang web (những nhà cung cấp dịch vụ, đối tác, các công ty quảng cáo) và yêu cầu cung cấp bởi luật pháp. Nếu chúng tôi chia sẻ thông tin cá nhân của bạn cho các nhà cung cấp dịch vụ, công ty quảng cáo, các công ty đối tác liên quan, thì chúng tôi cũng yêu cầu họ bảo vệ thông tin cá nhân của bạn như cách chúng tôi thực hiện.<br>
            <p class="font-bold">5. Vể việc tải dữ liệu:</p>Nếu bạn tải về máy những phần mềm từ trang này, thì phần mềm và các dữ liệu tải sẽ thuộc bản quyền của Kinstar và cho phép bạn sử dụng. Bạn không được sở hữu những phầm mềm đã tải và Kinstar không nhượng quyền cho bạn. Bạn cũng không được phép bán, phân phối lại, hay bẻ khóa phần mềm…<br>
            <p class="font-bold">6. Thay đổi nội dung:</p>Kinstar giữ quyền thay đổi, chỉnh sửa và loại bỏ những thông tin hợp pháp vào bất kỳ thời điểm nào vì bất kỳ lý do nào.<br>
            <p class=" font-bold">7. Liên kết với các trang khác:</p>Mặc dù trang web này có thể được liên kết với những trang khác, Kinstar không trực tiếp hoặc gián tiếp tán thành, tổ chức, tài trợ, đứng sau hoặc sát nhập với những trang đó, trừ phi điều này được nêu ra rõ ràng. Khi truy cập vào trang web bạn phải hiểu và chấp nhận rằng Kinstar không thể kiểm soát tất cả những trang liên kết với trang Kinstar và cũng không chịu trách nhiệm cho nội dung của những trang liên kết.<br>
            <p class=" font-bold">8. Đưa thông tin lên trang web:</p>Bạn không được đưa lên, hoặc chuyển tải lên trang web tất cả những hình ảnh, từ ngữ khiêu dâm, thô tục, xúc phạm, phỉ báng, bôi nhọ, đe dọa, những thông tin không hợp pháp hoặc những thông tin có thể đưa đến việc vi phạm pháp luật, trách nhiệm pháp lý. Kinstar và tất cả các bên có liên quan đến việc xây dựng và quản lý trang web không chịu trách nhiệm hoặc có nghĩa vụ pháp lý đối với những phát sinh từ nội dung do bạn tải lên trang web.<br>
            <p class=" font-bold">9. Luật áp dụng:</p>Mọi hoạt động phát sinh từ trang web có thể sẽ được phân tích và đánh giá theo luật pháp Việt Nam và toà án Tp. Hồ Chí Minh. Và bạn phải đồng ý tuân theo các điều khoản riêng của các toà án này.
        </div>
        <div class=" py-4">
            <input type="checkbox" name="dong_y" id="dong_y" value="1">
            <label for="dong_y" class="dong_y">Tôi đồng ý với những quy định trên</label>
        </div>
        <div class=" flex flex-row-reverse py-2">
            <input type="hidden" class="id_showtime" name="id_showtime" value="<?= $id_showtime ?>">
            <input type="hidden" name="quantity_seat" value="<?= count($tat_ca_ghe) ?>">
            <input type="hidden" class="price_ticket" name="price_ticket" value="<?= $tong_tien_ve ?>">
            <input type="hidden" name="price_beverages" value="<?= $tong_tien_ve ?>">
            <input type="submit" class="hoan_thanh_toan px-4 py-2 text-xl font-bold uppercase bg-orange-500 text-white rounded cursor-pointer" value="Thanh toán">
        </div>
    </div>
</form>
<script>
    function checkForm() {
        if ($('#dong_y').val() != 1) {
            return false
        }
    }

    $(document).on('click', '.check_discount', function() {
        $('.check_discount').html('<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>');
        $(".check_discount").addClass("dang_load").removeClass("check_discount");
        let paren = $(this).parent().parent()
        console.log($('.in_discount').val());
        $.ajax({
            url: './ajax.php?check_discount',
            data: {
                name: $('.in_discount').val()
            },
            success: function(data) {
                $(".dang_load").addClass("check_discount").removeClass("dang_load");
                $(".check_discount").html('Gửi')
                if (data.length < 100) {
                    discount(data)
                    $('.in_discount').attr('readonly', true);
                    paren.children('div').children('.text-red-500').html('')
                } else {
                    $('.in_discount').val('');
                    paren.children('div').children('.text-red-500').html('Mã không có')
                }
            }
        })
    })

    function discount(discount) {
        $('.price_ticket').val(<?= $tong_tien_ve ?> - discount * <?= $tong_tien_ve ?> / 100)
        $('.so_tien_giam').html(formatter.format(discount * <?= $tong_tien_ve ?> / 100))
        $('.so_tien_thanh_toan').html(formatter.format(<?= $tong_tien ?> - (discount * <?= $tong_tien_ve ?> / 100)))
    }
</script>