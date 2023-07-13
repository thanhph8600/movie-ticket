$(document).on("click", ".changePass", function () {
  validatePassOld();
  validatePass();
  validateRePass();
  if (validatePassOld() && validatePass() && validateRePass()) {
    $(".changePass").html(
      '<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>'
    );
    $(".changePass").addClass("dang_load").removeClass("changePass");
    $.ajax({
      url: "../user/index.php?changePass",
      data: {
        changePass: "",
        passOld : $('#pass_old').val(),
        pass : $('#pass').val(),
        rePass : $('#rePass').val()
    },
      success: function (result) {
        $(".dang_load").html("Gửi");
        $(".dang_load").addClass("changePass").removeClass("dang_load");
        $(".check-form").removeClass('hidden');
        if(result == 'Cập nhật mật khẩu thành công' || result.length == 30 ) {
            $(".check-form").addClass('bg-green-400').removeClass('bg-red-400');
            $('#pass_old').val(''),
            $('#pass').val(''),
            $('#rePass').val('')
            $(".check-form").html(result);
        }else{
            $(".check-form").addClass('bg-red-400').removeClass('bg-green-400');
            $(".check-form").html(result);
        }
      },
    });
  }
});
