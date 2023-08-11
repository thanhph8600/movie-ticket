<style>
    .row div:nth-child(3) {
        margin-right: 50px;
    }

    .row div {
        background: url(https://www.cinestar.com.vn/catalog/view/theme/default/images/single-chair.png) no-repeat center -136px;
        transition: all 0.5s ease-in-out;
    }

    .row div.seat:hover {
        background-position: center -92px;
        cursor: pointer;
    }

    .row div:focus {
        background-position: center -92px;
    }

    .seat_show {
        background-position: center -136px !important;
    }

    .seat_active {
        background-position: center -92px !important;
    }

    .seat_actived {
        background-position: center 0px !important;
    }

    .form_beverages .form_beverages_con {
        animation: load_form 0.5s ease-in-out;
    }

    @keyframes load_form {
        0% {
            top: -500px
        }

        100% {
            top: 0;
        }
    }
</style>
<section>
    <div class="container lg:w-4/5 m-auto py-4">
        <p class=" text-bold">Tên phim</p>
        <h2 class=" text-2xl font-bold uppercase py-2"><?= $showtime['name'] ?></h2>
        <div class="flex">
            <div class="w-2/3 text-white">
                <div class=" flex  border  ">
                    <div class=" flex-auto p-2  bg-orange-400">
                        <p>Ngày</p>
                        <p class=" text-xl font-bold"><?= format_date($showtime['date']) ?></p>
                    </div>
                    <div class=" flex-auto p-2  border-l bg-orange-400">
                        <p>Phòng chiếu</p>
                        <p class=" text-xl font-bold"><?= $showtime['name_room'] ?></p>
                    </div>
                    <div class=" flex-auto p-2  border-l bg-orange-400">
                        <p>Xuất chiếu</p>
                        <p class=" text-xl font-bold"><?= $showtime['time_start'] . ' - ' . $showtime['time_end'] ?></p>
                    </div>

                    <div class=" flex-auto p-2  border-l bg-sky-900">
                        <p>Số lượng vé</p>
                        <p class=" text-xl font-bold"><span class="count_ve">0</span> vé</p>
                    </div>
                    <div class=" flex-auto p-2  border-l bg-sky-900">
                        <p>Tổng số tiền</p>
                        <p class=" text-xl font-bold"><span class="total">0 đ</span> </p>
                    </div>
                </div>
                <div class="flex font-bold  bg-orange-400 border-b border-r border-l  ">
                    <div class=" p-4  ">
                        <p>Số ghế</p>
                    </div>
                    <div class="seat_index flex-auto flex items-center  border-l ">

                    </div>
                </div>
            </div>
            <div class=" w-1/3 font-bold  flex flex-col justify-center items-center">
                <span class=" text-lg">Thời gian giữ ghế</span>
                <span style="font-size:70px" class="time_out">05:00</span>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container lg:w-4/5 m-auto py-4 form_check_out ">
        <div class=" text-center  lg:w-4/5 m-auto text-lg font-bold text-white bg-gray-600 p-2 rounded-full">MÀN HÌNH</div>
        <div class=" w-3/5 m-auto py-8">
            <?php
            $so_ghe_moi_hang = 12;
            $row = ceil($showtime['seats'] / $so_ghe_moi_hang);
            $ghe_du = $showtime['seats'] %  $so_ghe_moi_hang;
            for ($i = 1; $i < $row; $i++) {
                $row_index = number_to_letter($i);
                echo '<div class="row flex  py-2 gap-2 justify-center items-center">
                    <p class=" pr-10  font-bold">' . number_to_letter($i) . '</p>';
                for ($j = 1; $j <= $so_ghe_moi_hang; $j++) {
                    $check = 0;
                    foreach ($ghe_da_chon as $key => $value) {
                        if ($value['row_index'] == $row_index && $value['col_index'] == $j) {
                            $check = 1;
                        }
                    }
                    foreach ($ghe_dang_chon as $key => $value) {
                        if ($value['row_index'] == $row_index && $value['col_index'] == $j) {
                            $check = 1;
                        }
                    }
                    if ($check == 1)
                        echo '   <div  class=" seat_actived flex-auto py-6 relative bg-gray-200 ">
                                    <span class=" absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-white ">' . $j . '</span>
                                </div>';
                    else
                        echo '   <div row="' . $row_index . '" col="' . $j . '" class=" relative seat flex-auto py-6  bg-gray-200 ">
                                    <span class=" absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-white">' . $j . '</span>
                                </div>';
                }
                echo '</div>';
            }


            echo '<div class="row flex  py-2 gap-2 justify-center items-center">';
            if($ghe_du !=0){
                echo '<p class=" pr-10 font-bold">' .number_to_letter($i) . '</p>';
            }
            
            for ($j = 1; $j <= $ghe_du; $j++) {
                $row_index = number_to_letter($row);
                $check = 0;
                foreach ($ghe_da_chon as $key => $value) {
                    if ($value['row_index'] == $row_index && $value['col_index'] == $j) {
                        $check = 1;
                    }
                }
                foreach ($ghe_dang_chon as $key => $value) {
                    if ($value['row_index'] == $row_index && $value['col_index'] == $j) {
                        $check = 1;
                    }
                }
                if ($check == 1)
                    echo '   <div  class=" seat_actived flex-auto py-6 relative  bg-gray-200 ">
                                <span class=" absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-white">' . $j . '</span>
                            </div>';
                else
                    echo '   <div row="' . $row_index . '" col="' . $j . '" class=" relative seat flex-auto py-6  bg-gray-200 ">
                                <span class=" absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-white">' . $j . '</span>
                            </div>';
            }
            echo '</div>';

            ?>
        </div>


        <div class="row flex justify-center items-center py-4">
            <span>Ghế còn trống</span>
            <div class=" seat_show px-8 py-6 inline bg-gray-200 mr-10">
            </div>
            <span>Ghế bạn chọn</span>
            <div class=" seat_active px-8 py-6  inline bg-gray-200  mr-10">
            </div>
            <span>Ghế đã được chọn</span>
            <div class=" seat_actived  px-8 py-6  inline bg-gray-200  mr-10">
            </div>
        </div>
        <div class="show_nuoc_uong flex justify-center items-center flex-col py-3">

        </div>
        <div class=" flex justify-center items-center text-white py-4 text-lg font-bold gap-4  uppercase">
            <div class="open_form_beverages py-2 px-8 bg-menu rounded-bl-3xl rounded-tr-3xl cursor-pointer">Mua nước</div>
            <div class="check_out_none py-2 px-8 bg-gray-300 rounded-br-3xl rounded-tl-3xl ">thanh toán</div>
        </div>
    </div>


    <div class="form_beverages z-40 relative hidden">
        <div class=" fixed h-screen w-screen z-10 bg-gray-700 bg-opacity-70 close top-0 left-0"></div>
        <div style="max-height:800px" class="form_beverages_con fixed rounded top-0 -translate-x-1/2 left-1/2 w-2/5 bg-white p-4 mt-8 z-20">
            <h2 class=" font-bold text-xl uppercase text-center">Bảng nước uống</h2>
            <div style="max-height:600px" class=" overflow-y-auto">
                <?php
                foreach ($beverages as $key => $value) {
                    extract($value);
                ?>
                    <div class=" flex gap-3 py-2 border-t border-b my-4">
                        <div class=" w-1/4 ">
                            <img src="<?= $UPLOAD_BEVERAGES_URL . $thumb ?>" alt="">
                        </div>
                        <div class=" w-2/4">
                            <p class=" font-bold text-lg"><?= $name ?></p>
                            <span><?= $detail ?></span>
                            <p class="price_beverages text-lg font-bold text-rose-500">Giá:<?= currency_format($price) ?></p>
                        </div>
                        <div class=" w-1/4 flex flex-col gap-2 justify-center items-center">
                            <p class="price">0 đ</p>
                            <div class="flex items-center border-gray-100">
                                <span class="tru_sp cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                                <input class="so_sp h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="0" min="0" />
                                <span class="cong_sp cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                                <input type="hidden" name="" class="id_beverages" value="<?= $id ?>">
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class=" text-right p-4 text-white">
                <span class="dong_y px-6 py-2 bg-blue-500 rounded cursor-pointer">Đồng ý</span>
            </div>
        </div>
    </div>

    <div class="popup_time_out hidden cursor-pointer">
        <div class=" fixed z-40 top-0 left-0 w-screen h-screen bg-gray-700 bg-opacity-80 ">
        </div>
        <div class=" text-2xl uppercase font-bold py-20 px-8 z-40 bg-white shadow rounded-md fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            Bạn đã hết thời gian mua vé !
        </div>
    </div>

</section>

<script>
    let class_name = [];
    function checkForm() {
        if ($('#dong_y:checked').length == 0) {
            $('.dong_y').css('border-bottom', '1px solid red')
            return false
        }


    }

    var mang_tat_ca_ghe = [];

    $('.seat').click(function() {
        if (id_user == 0) {
            open_form_login();
        } else {
            if (mang_tat_ca_ghe.length < 8 || $(this).hasClass("seat_active")) {
                if ($(this).hasClass("seat_active")) {
                    $(this).removeClass("seat_active")
                    if (!$('.seat').hasClass('seat_active')) {
                        $('.check_out_none').removeClass('check_out cursor-pointer bg-menu').addClass('bg-gray-300')
                    }

                    let mang_xoa_ghe = [$(this).attr('col'), $(this).attr('row')];
                    mang_tat_ca_ghe = mang_tat_ca_ghe.filter(item => item[0] !== mang_xoa_ghe[0] || item[1] !== mang_xoa_ghe[1])

                    xoa_ghe($(this).attr('col'), $(this).attr('row'))

                } else {
                    let check = them_ghe($(this).attr('col'), $(this).attr('row'))
                    if (check) {
                        $(this).addClass("seat_active")
                        $('.check_out_none').addClass('check_out cursor-pointer bg-menu').removeClass('bg-gray-300')

                        let mang_vi_tri_ghe = [$(this).attr('col'), $(this).attr('row')];
                        mang_tat_ca_ghe.push(mang_vi_tri_ghe)
                    } else {
                        fun_alert('class'+class_name++,'Ghế đã có người chọn')
                    }

                }
            } else {
                fun_alert('class'+class_name++,'Bạn chỉ đặt tối đa 8 ghế')
            }

            let so_ghe = mang_tat_ca_ghe.length;
            let total = formatter.format(so_ghe * <?= $showtime['price'] ?>)

            $(".count_ve").html(so_ghe)
            $('.total').html(total)

            let seat_index = '';
            mang_tat_ca_ghe.forEach(element => {
                seat_index = seat_index + '<p class=" p-2">' + element[1] + element[0] + '</p>'
            });
            $('.seat_index').html(seat_index);
            set_time_out()
        }
    })



    let time = 300;
    let check_ham_set_time_out = 0;
    const $timer = $('.time_out');

    function set_time_out() {
        if (check_ham_set_time_out == 0) {
            let interval = setInterval(function() {
                time--;
                let minutes = Math.floor(time / 60);
                let seconds = time % 60;
                $timer.text(('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2));
                if (time === 0) {
                    clearInterval(interval);
                    delete_tat_ca();
                    $('.popup_time_out').removeClass('hidden')
                }
            }, 1000);
        }
        check_ham_set_time_out = 1;
    }

    $(document).on('click', '.popup_time_out', function() {
        window.location.replace("../")
    })


    let id_user = <?= $id_user ?>;
    let id_showtime = <?= $id_showtime ?>;


    function them_ghe(col_index, row_index) {
        var i = true;
        $('cursor_load').css('display', 'block')
        $.ajax({
            url: './ajax.php?them_ghe',
            async: false,
            data: {
                id_user: id_user,
                id_showtime: id_showtime,
                col_index: col_index,
                row_index: row_index
            },
            success: function(result) {
                if (result.length > 10) {
                    i = false
                }
            }
        })
        $('cursor_load').css('display', 'none')
        return i
    }

    function xoa_ghe(col_index, row_index) {
        $('.cursor_load').css('display', 'block')
        $.ajax({
            url: './ajax.php?xoa_ghe',
            data: {
                id_user: id_user,
                id_showtime: id_showtime,
                col_index: col_index,
                row_index: row_index
            },
            success: function(result) {
                $('.cursor_load').css('display', 'none')
                $('.check').html(result)
            }
        })
    }

    function delete_tat_ca() {
        $.ajax({
            url: './ajax.php?xoa_tat_ca_ghe_dang_chon',
            data: {
                id_user: id_user,
                id_showtime: id_showtime,
            },
            success: function(result) {
                $('.check').html(result)
            }
        })
    }

    window.onbeforeunload = function() {
        delete_tat_ca();
    }

    if (id_user == 0) {
        open_form_login();
    }

    function open_form_login() {
        $('.cursor_load').css('display', 'block')
        $(".popup").css("display", "block");
        $.ajax({
            url: "../user/index.php?formLogin",
            data: {
                formLogin: '',
            },
            success: function(result) {
                $('.cursor_load').css('display', 'none')
                $(".form").html(result);
            },
        });
    }

    $(document).on('click', '.open_form_beverages', function() {
        $('.form_beverages').removeClass('hidden')
    })

    $(document).on('click', '.close', function() {
        $('.form_beverages').addClass('hidden')
    })


    let tong_nuoc_uong = []
    $(document).on('click', '.cong_sp', function() {
        
        let nuoc_uong = []
        let id_sp = $(this).parent().children('.id_beverages')
        let so_luong = $(this).parent().children('.so_sp')
        so_luong.val(Number(so_luong.val()) + 1)

        nuoc_uong.push(id_sp.val())
        nuoc_uong.push(so_luong.val())

        let check = 0;
        for (let i = 0; i < tong_nuoc_uong.length; i++) {
            if (tong_nuoc_uong[i][0] === nuoc_uong[0]) {
                tong_nuoc_uong[i][1] = parseInt(tong_nuoc_uong[i][1]) + 1;
                check = 1;
                break;
            }
        }
        if (check == 0)
            tong_nuoc_uong.push(nuoc_uong)
        console.log(tong_nuoc_uong);
    })
    $(document).on('click', '.tru_sp', function() {
        let so_luong = $(this).parent().children('.so_sp')
        if (Number(so_luong.val()) > 0)
            so_luong.val(Number(so_luong.val()) - 1)

        let nuoc_uong = []
        let id_sp = $(this).parent().children('.id_beverages')

        nuoc_uong.push(id_sp.val())
        nuoc_uong.push(so_luong.val())

        let check = 0;
        for (let i = 0; i < tong_nuoc_uong.length; i++) {
            if (tong_nuoc_uong[i][0] === nuoc_uong[0]) {
                tong_nuoc_uong[i][1] = parseInt(tong_nuoc_uong[i][1]) - 1;
                check = 1;
                break;
            }
        }
    })
    $(document).on('change', '.so_sp', function() {
        if ($(this).val() < 0)
            $(this).val(0)
    })
    $(document).on('click', '.dong_y', function() {
        $('.form_beverages').addClass('hidden')
        $('.cursor_load').css('display', 'block')
        $.ajax({
            url: "../film/ajax.php?nuoc_uong",
            data: {
                nuoc_uong: tong_nuoc_uong,
            },
            success: function(result) {
                $('.cursor_load').css('display', 'none')
                $(".show_nuoc_uong").html(result);
            },
        });
    })


    $(document).on('click', '.check_out', function() {
        $('.cursor_load').css('display', 'block')
        if ($('.seat').hasClass('seat_active'))
            $.ajax({
                url: './index.php?form_check_out',
                data: {
                    id_showtime: id_showtime,
                    tat_ca_ghe: mang_tat_ca_ghe,
                    tong_nuoc_uong: tong_nuoc_uong,
                },
                success: function(result) {
                    $('.cursor_load').css('display', 'none')
                    $('.form_check_out').html(result)
                }
            })
    })

    $('.phim').addClass('bg-yellow-600')

</script>