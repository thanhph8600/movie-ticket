<header>
    <div class="bg-main">
        <div class="container m-auto">
            <div class="flex justify-between items-center">
                <div class=" flex-none w-20 lg:w-44 py-2">
                    <a href="../page/"><img src="../../content/img/logo.png" class=" w-full" alt=""></a>
                </div>
                <div class="hidden  flex-auto mx-10 lg:flex justify-between items-center relative bg-black   py-3 px-2 rounded-2xl">
                    <input class="search bg-black text-white focus:outline-none w-full opacity-80" type="text" placeholder="Tìm kiếm">
                    <i class="fa fa-search px-3 text-white  cursor-pointer hover:opacity-80" aria-hidden="true"></i>
                    <div class=" show_search absolute top-full left-0 w-full z-10">

                    </div>
                </div>
                <nav class="header-menu lg:block flex-none rounded-3xl border border-menu p-0.5">
                    <div class="hidden fixed top-0 left-0 w-full h-full lg:static lg:rounded-3xl text-white font-semibold text-base lg:flex flex-col z-10 pt-16 lg:pt-0 lg:flex-row bg-menu overflow-hidden uppercase">
                        <a href="../page" class="trang_chu block lg:inline-block py-2 px-4 hover:bg-yellow-600 border-r">Trang chủ <i class="fa fa-home" aria-hidden="true"></i></a>
                        <a href="../film" class="phim py-2 block lg:inline-block  px-4 hover:bg-yellow-600 border-r">Phim</a>
                        <a href="../film?showtime" class="lich_chieu block lg:inline-block  py-2 px-4 hover:bg-yellow-600 border-r">Lịch chiếu</a>
                        <a href="../page?hoi_dap" class="hoi_dap block lg:inline-block  py-2 px-4 hover:bg-yellow-600 border-r">Hỏi đáp</a>
                        <a href="../page?tin_tuc" class="tin_tuc block lg:inline-block  py-2 px-4 hover:bg-yellow-600 border-r">Tin tức</a>
                        <a href="../page?gioi_thieu" class="gioi_thieu lg:inline-block  block  py-2 px-4 hover:bg-yellow-600 border-r">Giới thiệu</a>
                        <a href="../page?lien_he" class="lien_he block lg:inline-block  py-2 px-4 hover:bg-yellow-600">liên hệ</a>
                    </div>
                </nav>
                <div class="bars lg:hidden w-10 z-20 h-10 mr-4 rounded-full flex justify-center items-center bg-white">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <div class=" bg-white border-b-2">
        <div class="container m-auto">
            <div class="flex flex-row-reverse items-center py-3 gap-4">
                <?php
                if (empty($_SESSION['user'])) {
                ?>
                    <p class="formLogin cursor-pointer hover:text-rose-700">Đăng nhập</p>
                    <p class="formRegis cursor-pointer hover:text-rose-700">Đăng ký thành viên</p>
                <?php
                } else {
                ?>
                    <div class="relative ">
                        <p class="show  cursor-pointer hover:text-rose-700 font-bold">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <?= ($_SESSION['user']['name']) ?>
                        </p>
                        <div class="show_user hidden absolute bg-white top-full right-0 z-30 w-60 text-center p-3 border shadow-lg rounded mt-3">
                            <a href="../user?account" class=" block mb-2 border py-1 text-gray-700  rounded-md w-full hover:bg-gray-500 hover:text-white cursor-pointer">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                Quản lý tài khoản
                            </a>
                            <?= ($_SESSION['user']['role'] == 0 || $_SESSION['user']['role'] == 99) ? '
                                <a href="../../admin/" class="  block mb-2 border py-1 text-gray-700  rounded-md w-full hover:bg-gray-500 hover:text-white cursor-pointer">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Quản trị website
                                </a>
                            ' : '' ?>
                            <p class="log_out border py-1 text-white bg-gray-700 rounded-md w-full hover:bg-gray-500 cursor-pointer">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Đăng xuất
                            </p>
                        </div>
                    </div>

                    <a href="../user/?my-ticket" class=" cursor-pointer hover:text-rose-700">Vé của tôi</a>

                <?php
                }
                ?>
                <p class=" cursor-pointer hover:text-rose-700">Thông tin ưu đãi</p>
            </div>
        </div>
    </div>
</header>
<div class="closeShowUser z-10 hidden fixed w-full h-screen  top-0 left-0 bg-opacity-40"></div>
<section class="popup z-50 hidden">
    <div class="close z-50  fixed w-full h-screen bg-slate-800 top-0 left-0 bg-opacity-40"></div>
    <div class=" fixed z-50  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full lg:w-1/2 bg-white rounded">
        <div class="close absolute top-1 right-2"><i class="fa fa-times-circle  hover:text-white hover:bg-black rounded-full cursor-pointer" aria-hidden="true"></i></div>
        <div class="form p-4 z-50 ">

        </div>
    </div>
</section>

<script>
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            $('.show_user').slideUp();
            $('.closeShowUser').addClass('hidden')
            $('.show_search').html('')

        }
    })

    $(document).on('click', '.show', function() {
        $('.show_user').slideToggle();
        $('.closeShowUser').removeClass('hidden')
    })
    $('.closeShowUser').click(function() {
        $('.show_user').slideToggle();
        $('.closeShowUser').addClass('hidden')
    })

    $(document).on('keyup', '.search', function() {
        if ($(this).val() != '') {
            $.ajax({
                url: '../film/index.php?search',
                data: {
                    name: $('.search').val(),
                },
                success: function(data) {
                    $('.show_search').html(data)
                }
            })
        } else {
            $('.show_search').html('')
        }
    })

    $(document).on('click', '.bars', function() {
        $('.header-menu').removeClass('hidden')
        $('.header-menu').children('div').addClass('flex')
        $('.header-menu').children('div').slideToggle();
        // $('.closeShowUser').removeClass('hidden')
    })
</script>