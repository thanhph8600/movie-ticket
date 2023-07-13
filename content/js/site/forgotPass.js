$(document).on("click", ".forgot", function () {
  validateEmail();
  if (validateEmail()) {
    $(".forgot").html('<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>');
    $(".forgot").addClass("dang_load").removeClass("forgot");
    $.ajax({
      url: "../user/index.php?forgotPass",
      data: {
        forgotPass: "",
        email: $("#email").val(),
      },
      success: function (result) {
        $(".dang_load").html("Gửi");
        $(".dang_load").addClass("forgot").removeClass("dang_load");
        if (result == "ok" || result.length < 5) {
          $(".forgot").html(
            '<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>'
          );
          $(".forgot").addClass("dang_load").removeClass("forgot");
          $.ajax({
            url: "../user/sendEmail.php?forgotPass",
            data: {
              forgotPass: "",
              email: $("#email").val(),
            },
            success: function (result) {
              $(".dang_load").html("Gửi");
              $(".dang_load").addClass("forgot").removeClass("dang_load");
              if (result == "Message could not be sent. Mailer Error") {
                $(".check-form").html("Lỗi gửi email");
              } else {
                $("#email").val("");
                $(".check-form").html(
                  '<div class=" bg-green-600 p-2">Mật khẩu của mới của bạn đã được gửi trong email</div>'
                );
              }
            },
          });
        } else {
          $(".check-form").html(result);
        }
      },
    });
  }
});

$(document).on("click", ".forgotPassNow", function () {
  $.ajax({
    url: "../user/sendEmail.php?forgotPass",
    data: {
      forgotPass: "",
      daDangNhap: "Đã đăng nhập",
    },
    success: function (result) {
      $(".dang_load").html("Gửi");
      $(".dang_load").addClass("forgot").removeClass("dang_load");
      if (result == "Message could not be sent. Mailer Error") {
        $(".check-form").html("Lỗi gửi email");
      } else {
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
