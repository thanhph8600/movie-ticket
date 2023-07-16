function kiem_tra_ngay(ngay_nhap_vao) {
    let ngay_nhap = ngay_nhap_vao.split('-')

    let d = new Date();
    if (ngay_nhap.length < 2) {
        console.log('Bạn chưa điền phần này')
        return false
    } else {
        if (Number(ngay_nhap[0]) < d.getFullYear()) {
            return false 
        } else if (Number(ngay_nhap[0]) == d.getFullYear()) {
            if (Number(ngay_nhap[1]) < d.getMonth() + 1) {
                return false
            } else if (Number(ngay_nhap[1]) == d.getMonth() + 1) {
                if (Number(ngay_nhap[2]) <= d.getDate()) {
                    return false
                }
            }
        }
    }
    return true
}

function getParent(children){
    return $(children).parent().parent().children('div')
}

$(document).on("change", ".id_film ", function() {
    if ($('.id_film').val() == 0) {
        $('.checkFiml').html('Bạn phải chọn phim')
        $(this).css('border', '1px solid red')
        $(".div1").html('');
    } else {
        $('.checkFiml').html('')
        $(this).css('border', '')
        $('.cursor_load').css('display', 'block')
        $.ajax({
            url: "./ajax.php?first",
            data: {
                nameFilm: $('.id_film').val()
            },
            success: function(result) {
                $('.cursor_load').css('display', 'none')
                $(".div1").html(result);
            }
        });
    }

});

$(document).on("click", ".add-rowShow", function() {
    if ($('.id_film').val() == 0) {
        $('.checkFiml').html('Bạn phải chọn phim')
        $(this).css('border', '1px solid red')
    } else {
        $('.checkFiml').html('')
        $(this).css('border', '')
        $('.cursor_load').css('display', 'block')
        $.ajax({
            url: "./ajax.php?first",
            data: {
                nameFilm: $('.id_film').val()
            },
            success: function(result) {
                $('.cursor_load').css('display', 'none')
                $(".div1").append(result);
            },
        });
    }
});

$(document).on("change", '.date', function() {
    let parent = getParent(this)
    if ($('.id_film').val() == 0) {
        parent.children('.checkDate').html('Chọn phim trước')
        $(this).css('border', '1px solid red')
        parent.children('.date').val('')
    } else {
        parent.children('input.price').val(0)
        if (!kiem_tra_ngay(parent.children('.date').val())) {
            parent.children('.checkDate').html('Bắt đầu từ ngày mai trở đi')
            parent.children('select').html('<option value="0">- - - Chọn phòng - - -</option>')
            $(this).css('border', '1px solid red')
        } else {
            parent.children('span').html('')
            $(this).css('border', '')
            $('.cursor_load').css('display', 'blcok')
            $.ajax({
                url: "./ajax.php?show_room",
                data: {
                    id_film: $('.id_film').val(),
                    date: $(this).val()
                },
                success: function(result) {
                    if (result.length < 30) {
                        $('.alert-ERR').html(result)
                        $('.alert-ERR').css('display', 'inline')
                        setTimeout(() => {
                            $('.alert-ERR').css('display', 'none')
                        }, 5000);
                        parent.children('input[type=date]').css('border','solid 1px red')
                        parent.children('select').html('<option value="0">- - - Chọn phòng - - -</option>')
                    } else {
                        parent.children('select').html(result)
                    }
                    $('.cursor_load').css('display', 'none')
                    parent.children('div.time_start').html('')
                },
            });
        }
    }
})

$(document).on("click", ".id_room ", function() {
    let parent = getParent(this)
    if (!kiem_tra_ngay(parent.children('.date').val())) {
        parent.children('.checkRoom').html('Chọn ngày trước')
        $(this).css('border', '1px solid red')
    } else {
        parent.children('.checkRoom').html('')
        $(this).css('border', '')

    }
})

$(document).on("change", ".id_room ", function() {
    let parent = getParent(this)
    parent.children('input.price').val(0)
    if ($(this).val() != 0 || $(this).val() == '') {
        let check = 0;
        for (let i = 0; i < $('.id_room').length; i++) {
            if ($('.id_room')[i].value == parent.children('.id_room').val()) {
                if ($('.date')[i].value == parent.children('.date').val()) {
                    check++;
                }
            }
        }
        if (check <= 1) {
            $(this).css('border', '')
            $('.cursor_load').css('display', 'block')
            $.ajax({
                url: "./ajax.php?show_shift",
                data: {
                    id_room: parent.children('.id_room').val(),
                    date: parent.children('.date').val()
                },
                success: function(result) {
                    parent.children('div.time_start').html(result)
                    parent.children('div.time_start').removeClass('py-4')
                    $('.cursor_load').css('display', 'none')
                },
            });
        } else {
            parent.children('div.time_start ').html('')
            parent.children('select').css('border','solid 1px red')
            $('.alert-ERR').html('Đã trùng ở trên')
            $('.alert-ERR').css('display', 'inline')
            setTimeout(() => {
                $('.alert-ERR').css('display', 'none')
            }, 5000);
        }
    } else {
        $(this).css('border', '1px solid red')
        parent.children('div.time_start ').html('')
    }
})

$(document).on("click", "div.time_start ", function() {
    let parent = getParent(this)
    if (parent.children('.id_room').val() == 0 || parent.children('.id_room').val() == '') {
        parent.children('.checkTime').html('Chọn phòng trước')
        $(this).css('border', '1px solid red')
    } else {
        parent.children('.checkTime').html('')
        $(this).css('border', '')
    }
});

$(document).on("click", ".price ", function() {
    let parent = getParent(this)
    let input = parent.children('div').children('div').children('input:checked').val()
    if (input == undefined) {
        parent.children('.checkPrice').html('Chọn xuất chiếu')
        parent.children('.time_start').css('color', 'red')
        $(this).css('border', '1px solid red')
        parent.children('.price').attr('readonly', true)
        $('.alert-ERR').html('Muốn chọn xuất chiếu thì chọn ngày và phòng trước')
        $('.alert-ERR').css('display', 'inline')
        setTimeout(() => {
            $('.alert-ERR').css('display', 'none')
        }, 5000);
    } else {
        parent.children('.price').removeAttr('readonly')
        parent.children('.checkPrice').html('')
        $(this).css('border', '')
    }
});

$(document).on("change", ".price ", function() {
    if($(this).val() <=0){
        $(this).val(0)
    }
})


$(document).on("click", ".close_row ", function() {
    let parent = $(this).parent().parent()
    parent.remove()
});
