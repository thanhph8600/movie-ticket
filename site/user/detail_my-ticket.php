<!-- <img src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" alt="" title="" /> -->
<section>
    <div class=" container lg:w-3/5 m-auto py-4 px-8 border my-4 rounded-md text-lg shadow-md bg-gray-200">
        <h2 class=" uppercase text-2xl font-bold py-4 ">Chi tiết vé</h2>
        <div class="flex gap-4  m-auto">
            <div class=" w-2/5">
                <div class=" w-3/5 ml-auto shadow-md rounded-md overflow-hidden">
                    <img src="<?= $UPLOAD_FILM_URL . $ticket['thumb'] ?>" alt="">
                </div>
            </div>
            <div class=" w-3/5 mx-auto flex flex-col gap-3   font-bold">
                <p class=" uppercase "><?= $ticket['name'] ?></p>
                <p><?= format_date($ticket['date']) ?></p>
                <p><?= $ticket['time_start'] . ' - ' . $ticket['time_end'] ?></p>
                <p><?= $ticket['name_room'] ?></p>
                <p><?= $ticket['rated'] ?></p>
                <div class=" flex gap-2">
                    <p>Ghế: </p>
                    <?php
                    foreach ($seats as $key => $value) {
                        echo '<p>' . $value['row_index'] . $value['col_index'] . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class=" py-4 border-b-4 border-dashed border-white"></div>
        <h4 class=" text-center text-green-500 font-bold py-3">Thông tin thanh toán</h4>
        <div class="flex gap-4">
            <div class=" w-2/5 text-center font-bold">
                <img class=" m-auto bg-white p-4" src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $ADMIN_URL . '/QR/?id_ticket=' . $ticket['code'] ?>&amp;size=160x160" alt="" title="" />
                <p><?= $ticket['code'] ?></p>
            </div>
            <div class=" w-3/5 flex flex-col gap-3">
                <div class=" flex gap-3 justify-between">
                    <p class="">Snack: </p>
                    <p class=" font-bold"><?= (empty($ticket['price_bill'])) ? '0 đ' : currency_format($ticket['price_bill']) ?></p>
                </div>
                <div class=" flex gap-3  justify-between">
                    <p class="">Giá vé: </p>
                    <p class=" font-bold"><?= currency_format($ticket['quantity'] * $ticket['price']) ?></p>
                </div>
                <div class=" flex gap-3  justify-between">
                    <p class="">Giảm giá: </p>
                    <p class=" font-bold"><?= (empty($ticket['id_discount'])) ? '0 đ' : currency_format($discount) ?></p>
                </div>
                <div class=" flex gap-3 border-t-2 border-white justify-between py-2 text-xl">
                    <p class="">Tổng cộng: </p>
                    <p class=" font-bold"><?= currency_format($sum) ?></p>
                </div>
            </div>
        </div>
        <p class=" italic text-center py-2">Vui lòng đưa mã này cho nhân viên</p>
        <div class="flex flex-row-reverse">
            <?php
            if ($ticket['activated'] == 1) {
                $class = 'cancel cursor-pointer bg-menu hover:bg-rose-600';
            } else {
                $class = 'bg-gray-500';
            }
            ?>
            <p class="<?= $class ?> inline-block   px-6 py-2  text-white rounded-md hover:shadow ">Hủy vé</p>
            <p class=" checkk"></p>
        </div>
    </div>
</section>

<script>
    $(document).on('click', '.cancel', function() {
        if (confirm('Bạn có chắc chắn muốn hủy vé không')) {
            $('.cursor_load').css('display', 'block')
            $.ajax({
                url: './index.php?cancel_ticket',
                data: {
                    id_ticket: <?= $ticket['id'] ?>
                },
                success: function(data) {
                    $('.cursor_load').css('display', 'none')
                    $('.cancel').addClass('bg-gray-500').removeClass('cancel cursor-pointer bg-menu hover:bg-rose-600')
                    fun_alert('a','Hủy vé thành công')
                    $('.checkk').html(data)
                }
            })
        }
    })
</script>