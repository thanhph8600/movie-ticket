
<form action="" method="post">
    <h2 class=" uppercase text-2xl font-bold text-center py-4">Đăng nhập</h2>
    <div class="check-form bg-red-400 text-white"></div>
    <div class=" lg:w-3/5 w-full  m-auto p-2">
        <div class="flex border-b border-b-rose-700 pb-2">
            <label for="email" class=" pr-4 text-lg"><i class="fa fa-user" aria-hidden="true"></i> </label>
            <input class=" flex-auto focus:outline-none" type="text" id="email" name="email" placeholder="Nhập email" value="<?=$email?>">
        </div>
        <p class="chkEmail text-red-600"></p>
    </div>
    <div class=" lg:w-3/5 w-full  m-auto p-2">
        <div class="flex border-b border-b-rose-700 pb-2">
            <label for="pass" class=" pr-4 text-lg"><i class="fa fa-lock" aria-hidden="true"></i> </label>
            <input class=" flex-auto focus:outline-none" type="password" id="pass" name="pass" placeholder="Nhập mật khẩu" value="<?=$pass?>">
        </div>
        <p class="chkPass text-red-600"></p>
    </div>
    <div class=" lg:w-3/5 w-full  m-auto flex justify-between py-2">
        <div>
            <input type="checkbox" name="remenber" id="remenber" value="ok" checked>
            <label for="remenber">Ghi nhớ tài khoản</label>
        </div>
        <p class="formForgot hover:text-rose-800 cursor-pointer">Quên mật khẩu?</p>
    </div>
    <div class="login my-4 text-white py-2 m-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 cursor-pointer rounded text-center w-1/4">
        Đăng nhập
    </div>
    <div class=" lg:w-3/5 w-full  m-auto flex">
        <p>Bạn chưa có tài khoản </p>
        <p class=" text-blue-500 hover:text-rose-800 cursor-pointer pl-2 formRegis"> Đăng ký?</p>
    </div>
</form>
<script>
    $(document).on('click', '.formForgot', function() {
        $(".popup").css("display", "block");
        $.ajax({
            url: "../user/index.php?formForgot",
            data: {
                formForgot: '',
            },
            success: function(result) {
                $(".form").html(result);
            },
        });
    });
</script>