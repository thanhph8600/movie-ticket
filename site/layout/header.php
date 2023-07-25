<header>
    <div class="bg-main">
        <div class="container m-auto">
            <div class="flex justify-between items-center">
                <div class=" flex-none w-44 py-2">
                    <a href="../page/"><img src="../../content/img/logo.png" class=" w-full" alt=""></a>
                </div>
                <div class=" flex-auto mx-10 flex justify-between items-center bg-black opacity-80 text-white  py-3 px-2 rounded-2xl">
                    <input class=" bg-black focus:outline-none w-full opacity-80" type="text" placeholder="Tìm kiếm">
                    <i class="fa fa-search px-3 cursor-pointer hover:opacity-80" aria-hidden="true"></i>
                </div>
                <nav class=" flex-none rounded-3xl border border-menu p-0.5">
                    <div class=" rounded-3xl text-white font-semibold text-base flex bg-menu overflow-hidden uppercase">
                        <a href="../page" class="trang_chu py-2 px-4 hover:bg-yellow-600 border-r">Trang chủ <i class="fa fa-home" aria-hidden="true"></i></a>
                        <a href="../film" class="phim py-2 px-4 hover:bg-yellow-600 border-r">Phim</a>
                        <a href="../film?showtime" class="lich_chieu py-2 px-4 hover:bg-yellow-600 border-r">Lịch chiếu</a>
                        <a href="../page?hoi_dap" class="hoi_dap py-2 px-4 hover:bg-yellow-600 border-r">Hỏi đáp</a>
                        <a href="../page?tin_tuc" class="tin_tuc py-2 px-4 hover:bg-yellow-600 border-r">Tin tức</a>
                        <a href="../page?gioi_thieu" class="gioi_thieu py-2 px-4 hover:bg-yellow-600 border-r">Giới thiệu</a>
                        <a href="../page?lien_he" class="lien_he py-2 px-4 hover:bg-yellow-600">liên hệ</a>
                    </div>
                </nav>
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
    <div class=" fixed z-50  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-1/2 bg-white rounded">
        <div class="close absolute top-1 right-2"><i class="fa fa-times-circle  hover:text-white hover:bg-black rounded-full cursor-pointer" aria-hidden="true"></i></div>
        <div class="form p-4 z-50 ">

        </div>
    </div>
</section>

<script>
    window.addEventListener('scroll',() => {
        if(window.scrollY>100) {
            $('.show_user').slideUp();
            $('.closeShowUser').addClass('hidden')
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
</script>