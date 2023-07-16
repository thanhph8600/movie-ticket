<section>
    <div class="container m-auto py-4">
        <div class="flex gap-3">
            <div class="w-1/4 border rounded-md shadow-lg">
                <div class="flex p-4 items-center gap-3 border-b">
                    <div class=" w-20 h-20 rounded-full overflow-hidden border-2 border-gray-400">
                        <img class=" w-full h-full" src="<?= $UPLOAD_USER_URL . $user['thumb'] ?>" alt="">
                    </div>
                    <h2 class=" text-xl font-bold"><?= $user['name'] ?></h2>
                </div>
                <div class=" px-4">
                    <p class="py-2">
                        <span class="btn_update text-rose-500 hover:text-rose-500 hover:border-b hover:border-b-rose-600 cursor-pointer pb-1">
                            Cập nhật tài tài khoản
                        </span>
                    </p>
                    <p class="btn_changePass py-2">
                        <span class=" hover:text-rose-500 hover:border-b hover:border-b-rose-600 cursor-pointer pb-1">
                            Đổi mật khẩu
                        </span>
                    </p>
                </div>
            </div>
            <div class="w-3/4 p-4 border rounded-md shadow-md">
                <div class="infoUser">
                    <div class=" check-form">
                        <?php
                        if (!empty($mess)) {
                            echo $mess;
                        }
                        ?>
                    </div>
                    <h2 class=" font-bold text-xl text-center py-3">Thông tin tài khoản</h2>
                    <form action="../user/?update" method="post" class=" w-3/4 m-auto" enctype="multipart/form-data">
                        <div class="flex gap-4 py-2">
                            <div class=" w-1/2 m-auto p-2">
                                <div class="flex border-b border-b-rose-700 pb-2">
                                    <label for="name" class=" pr-4 text-lg"><i class="fa fa-user" aria-hidden="true"></i> </label>
                                    <input class=" flex-auto focus:outline-none" type="text" id="name" name="name" placeholder="Nhập tên của bạn" value="<?= $user['name'] ?>">
                                </div>
                                <div class="chkName text-red-600"></div>
                            </div>
                            <div class=" w-1/2 m-auto p-2">
                                <div class="flex border-b border-b-rose-700 pb-2">
                                    <label for="phone" class=" pr-4 text-lg"><i class="fa fa-phone" aria-hidden="true"></i> </label>
                                    <input class=" flex-auto focus:outline-none" type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" value="<?= 0 . $user['phone'] ?>">
                                </div>
                                <p class="chkPhone text-red-600"></p>
                            </div>
                        </div>
                        <div class="flex gap-4 py-2">
                            <div class=" w-1/2 m-auto p-2">
                                <div class="flex border-b border-b-rose-700 pb-2">
                                    <label for="email" class=" pr-4 text-lg"><i class="fa fa-envelope" aria-hidden="true"></i> </label>
                                    <input class=" flex-auto focus:outline-none" type="text" id="email" name="email" placeholder="Nhập email" value="<?= $user['email'] ?>">
                                </div>
                                <div class="chkEmail text-red-600"></div>
                            </div>
                            <div class=" w-1/2 m-auto p-2">
                                <div class="flex border-b border-b-rose-700 pb-2">
                                    <label for="date" class=" pr-4 text-lg"><i class="fa fa-calendar" aria-hidden="true"></i> </label>
                                    <input class=" flex-auto focus:outline-none" type="date" id="date" name="birtday" value="<?= $user['birtday'] ?>">
                                </div>
                                <p class="chkDate text-red-600"></p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class=" w-1/2 m-auto p-2">
                                <div class="flex items-center gap-4">
                                    <label for="" class=" text-lg">Giới tính:</label>
                                    <div>
                                        <input class="sex" type="radio" name="sex" id="nam" value="1" <?= ($user['sex'] == 1) ? 'checked' : '' ?>>
                                        <label for="nam">Nam</label>
                                    </div>
                                    <div>
                                        <input class="sex" type="radio" name="sex" id="nu" value="0" <?= ($user['sex'] == 0) ? 'checked' : '' ?>>
                                        <label for="nu">Nữ</label>
                                    </div>

                                </div>
                                <p class="chkSex text-red-600"></p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class=" w-1/2 p-2">
                                <label for="imgUpload">Chọn ảnh đại diện:</label>
                                <input type="file" name="imgUpload" id="imgUpload" accept="image/*">
                            </div>
                        </div>
                        <div class="img-product w-1/5">
                            <img style="display: block;" src="<?= $UPLOAD_USER_URL . $user['thumb'] ?>" alt="" id="imgSrc">
                        </div>
                        <button class="update my-4 text-white py-2 m-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 cursor-pointer rounded text-center w-1/4">
                            Cập nhật
                        </button>
                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                        <input type="hidden" name="thumb_old" value="<?= $user['thumb'] ?>">
                    </form>
                </div>
                <div class="formChangePass hidden">
                    <form action="" method="post">
                        <div class="check-form text-white pl-10 rounded-md p-2">
                        </div>
                        <h2 class=" uppercase text-2xl font-bold text-center py-4">Cập nhật mật khẩu</h2>

                        <div class=" w-3/5 m-auto p-2">
                            <div class="flex border-b border-b-rose-700 pb-2">
                                <label for="" class=" pr-4 text-lg"><i class="fa fa-key" aria-hidden="true"></i> </label>
                                <input class=" flex-auto focus:outline-none" id="pass_old" type="password" name="password_old" placeholder="Nhập mật khẩu cũ" value="">
                                <i class="fa fa-eye cursor-pointer" aria-hidden="true"></i>

                            </div>
                            <p class="chkPassOld text-red-600"></p>
                        </div>
                        <div class=" w-3/5 m-auto p-2">
                            <div class="flex border-b border-b-rose-700 pb-2 items-center">
                                <label for="pass" class=" pr-4 text-lg"><i class="fa fa-lock" aria-hidden="true"></i> </label>
                                <input class=" flex-auto focus:outline-none" type="password" id="pass" name="pass" placeholder="Nhập mật khẩu mới">
                                <i class="fa fa-eye cursor-pointer" aria-hidden="true"></i>
                            </div>
                            <p class="chkPass text-red-600"></p>
                        </div>
                        <div class=" w-3/5 m-auto p-2">
                            <div class="flex border-b border-b-rose-700 pb-2 items-center">
                                <label for="rePass" class=" pr-4 text-lg"><i class="fa fa-lock" aria-hidden="true"></i> </label>
                                <input class=" flex-auto focus:outline-none" type="password" id="rePass" name="rePass" placeholder="Nhập lại mật khẩu mới">
                                <i class="fa fa-eye cursor-pointer" aria-hidden="true"></i>
                            </div>
                            <p class="chkRePass text-red-600"></p>
                        </div>
                        <div class="changePass my-4 text-white py-2 m-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 cursor-pointer rounded text-center w-1/4">
                            Gửi
                        </div>
                        <div class=" w-3/5 m-auto py-2">
                            <p class="forgotPassNow hover:text-rose-800 cursor-pointer">Quên mật khẩu?</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).on('click', '.btn_update', function() {
        $('.infoUser').removeClass('hidden')
        $('.formChangePass').addClass('hidden')
        $('.btn_changePass').removeClass('text-rose-500')
        $(this).addClass('text-rose-500')
        $('.check-form').addClass('hidden')
    })
    $(document).on('click', '.btn_changePass', function() {
        $('.infoUser').addClass('hidden')
        $('.formChangePass').removeClass('hidden')
        $('.btn_update').removeClass('text-rose-500')
        $(this).addClass('text-rose-500')
        $('.check-form').addClass('hidden')
    })

    $(document).on("click", ".forgotPassNow", function() {
        $(".forgotPassNow").html('<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>');
        $(".forgotPassNow").addClass("dang_load").removeClass("forgotPassNow");
        $.ajax({
            url: "../user/sendEmail.php?forgotPass",
            data: {
                forgotPass: "",
                daDangNhap: "daDangNhap",
            },
            success: function(result) {
                $(".dang_load").html("Quên mật khẩu");
                $(".dang_load").addClass("forgotPassNow").removeClass("dang_load");
                if (result == "Message could not be sent. Mailer Error") {
                    $(".check-form").html("Lỗi gửi email");
                } else {
                    $(".dang_load").html("Gửi");
                    $(".dang_load").addClass("forgot").removeClass("dang_load");
                    $("#pass_old").val("");
                    $("#pass").val("");
                    $("#rePass").val("");
                    $(".check-form").removeClass("hidden");
                    $(".check-form").addClass("bg-green-400").removeClass("bg-red-400");
                    $(".check-form").html("Mật khẩu mới đã được gửi trong email của bạn");
                }
            },
        });
    });
</script>