<form action="" method="post">
    <h2 class=" uppercase text-2xl font-bold text-center py-4">Đăng ký</h2>
    <div class="check-form bg-red-400 text-white"></div>
    <div class="flex gap-4">
        <div class=" w-1/2 m-auto p-2">
            <div class="flex border-b border-b-rose-700 pb-2">
                <label for="name" class=" pr-4 text-lg"><i class="fa fa-user" aria-hidden="true"></i> </label>
                <input class=" flex-auto focus:outline-none" type="text" id="name" name="name" placeholder="Nhập tên của bạn">
            </div>
            <div class="chkName text-red-600"></div>
        </div>
        <div class=" w-1/2 m-auto p-2">
            <div class="flex border-b border-b-rose-700 pb-2">
                <label for="phone" class=" pr-4 text-lg"><i class="fa fa-phone" aria-hidden="true"></i> </label>
                <input class=" flex-auto focus:outline-none" type="text" id="phone" name="phone" placeholder="Nhập số điện thoại">
            </div>
            <p class="chkPhone text-red-600"></p>
        </div>
    </div>
    <div class="flex gap-4">
        <div class=" w-1/2 m-auto p-2">
            <div class="flex border-b border-b-rose-700 pb-2">
                <label for="email" class=" pr-4 text-lg"><i class="fa fa-envelope" aria-hidden="true"></i> </label>
                <input class=" flex-auto focus:outline-none" type="text" id="email" name="email" placeholder="Nhập email">
            </div>
            <div class="chkEmail text-red-600"></div>
        </div>
        <div class=" w-1/2 m-auto p-2">
            <div class="flex border-b border-b-rose-700 pb-2">
                <label for="date" class=" pr-4 text-lg"><i class="fa fa-calendar" aria-hidden="true"></i> </label>
                <input class=" flex-auto focus:outline-none" type="date" id="date" name="date">
            </div>
            <p class="chkDate text-red-600"></p>
        </div>
    </div>
    <div class="flex gap-4">
        <div class=" w-1/2 m-auto p-2">
            <div class="flex border-b border-b-rose-700 pb-2 items-center">
                <label for="pass" class=" pr-4 text-lg"><i class="fa fa-lock" aria-hidden="true"></i> </label>
                <input class=" flex-auto focus:outline-none" type="password" id="pass" name="pass" placeholder="Nhập mật khẩu">
                <i class="fa fa-eye cursor-pointer" aria-hidden="true"></i>
            </div>
            <p class="chkPass text-red-600"></p>
        </div>
        <div class=" w-1/2 m-auto p-2">
            <div class="flex border-b border-b-rose-700 pb-2 items-center">
                <label for="rePass" class=" pr-4 text-lg"><i class="fa fa-lock" aria-hidden="true"></i> </label>
                <input class=" flex-auto focus:outline-none" type="password" id="rePass" name="rePass" placeholder="Nhập lại mật khẩu">
                <i class="fa fa-eye cursor-pointer" aria-hidden="true"></i>
            </div>
            <p class="chkRePass text-red-600"></p>
        </div>
    </div>
    <div class="flex gap-4">
        <div class=" w-1/2 m-auto p-2">
            <div class="flex items-center gap-4">
                <label for="" class=" text-lg">Giới tính:</label>
                <div>
                    <input class="sex" type="radio" name="sex" id="nam" value="1" checked>
                    <label for="nam">Nam</label>
                </div>
                <div>
                    <input class="sex" type="radio" name="sex" id="nu" value="0">
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
        <img style="display: block;" src="" alt="" id="imgSrc">
    </div>
    <div class="regis my-4 text-white py-2 m-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 cursor-pointer rounded text-center w-1/4">
        Đăng ký
    </div>
    <div class=" w-3/5 m-auto flex">
        <p>Bạn đã có tài khoản </p>
        <p class="formLogin text-blue-500 hover:text-rose-800 cursor-pointer pl-2 "> Đăng nhập?</p>
    </div>
</form>