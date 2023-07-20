<style>
    .row div:nth-child(3) {
        margin-right: 50px;
    }

    .row div {
        background: url(https://www.cinestar.com.vn/catalog/view/theme/default/images/single-chair.png) no-repeat center top;
        transition: all 0.5s ease-in-out;
    }

    .row div.seat:hover {
        background-position: center -46px;
        cursor: pointer;
    }

    .row div:focus {
        background-position: center -46px;
    }

    .seat_show {
        background-position: center 0 !important;
    }

    .seat_active {
        background-position: center -46px !important;
    }

    .seat_actived {
        background-position: center -92px !important;
    }
</style>
<section>
    <div class="container lg:w-4/5 m-auto py-4">
        <p class=" text-bold">Tên phim</p>
        <h2 class=" text-2xl font-bold uppercase py-2"><?= $showtime['name'] ?></h2>
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
    </div>
</section>


<section>
    <div class="container  lg:w-4/5 m-auto py-4">
        <div class=" text-center  lg:w-4/5 m-auto text-lg font-bold text-white bg-gray-600 p-2 rounded-full">MÀN HÌNH</div>
        <div class=" w-3/5 m-auto py-8">
            <?php
            $so_ghe_moi_hang = 12;
            $row = ceil($showtime['seats'] / $so_ghe_moi_hang);
            $ghe_du = $showtime['seats'] %  $so_ghe_moi_hang;
            for ($i = 1; $i < $row; $i++) {
                $row_index = number_to_letter($i);
                echo '<div class="row flex  py-2 gap-2 justify-center">';
                for ($j = 1; $j <= $so_ghe_moi_hang; $j++) {
                    $check = 0;
                    foreach ($ghe_da_chon as $key => $value) {
                        if ($value['row_index'] == $row_index && $value['col_index'] == $j) {
                            $check = 1;
                        }
                    }
                    if ($check == 1)
                        echo '   <div  class=" seat_actived flex-auto py-6  bg-gray-200 ">
                        </div>';
                    else
                        echo '   <div row="' . $row_index . '" col="' . $j . '" class=" seat flex-auto py-6  bg-gray-200 ">
                        </div>';
                }
                echo '</div>';
            }


            echo '<div class="row flex  py-2 gap-2 justify-center">';
            for ($j = 0; $j < $ghe_du; $j++) {
                echo '<div class="seat flex-auto py-6 bg-gray-200 "></div>';
            }
            echo '</div>';

            ?>
        </div>
        <div class="row flex justify-center items-center py-4">
            <span>Ghế còn trống</span>
            <div class=" seat_show px-8 py-6 inline bg-gray-200 ">
            </div>
            <span>Ghế bạn chọn</span>
            <div class=" seat_active px-8 py-6  inline bg-gray-200 ">
            </div>
            <span>Ghế đã được chọn</span>
            <div class=" seat_actived  px-8 py-6  inline bg-gray-200 ">
            </div>

        </div>
        <div class="check_out">thanh toan</div>
    </div>
    <div class="check"></div>
</section>

<script>
    const formatter = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
    });


    var mang_tat_ca_ghe = [];

    $('.seat').click(function() {
        if (mang_tat_ca_ghe.length < 8 || $(this).hasClass("seat_active")) {
            if ($(this).hasClass("seat_active")) {
                $(this).removeClass("seat_active")
                let mang_xoa_ghe = [$(this).attr('col'), $(this).attr('row')];
                mang_tat_ca_ghe = mang_tat_ca_ghe.filter(item => item[0] !== mang_xoa_ghe[0] || item[1] !== mang_xoa_ghe[1])
            } else {
                $(this).addClass("seat_active")
                let mang_vi_tri_ghe = [$(this).attr('col'), $(this).attr('row')];
                mang_tat_ca_ghe.push(mang_vi_tri_ghe)
            }

        } else {
            alert('Bạn chỉ được đặt tối đa là 8 ghế')
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
        console.log(so_ghe);


    })
    $('.check_out').click(function() {
        if ($('.seat').hasClass('seat_active'))
            console.log(mang_tat_ca_ghe);
        $.ajax({
            url: './ajax.php?chon_ghe',
            data: {
                mang_cha: mang_tat_ca_ghe
            },
            success: function(result) {
                $('.check').html(result)
            }
        })
    })
</script>