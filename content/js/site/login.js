$(document).on("click", ".login", function () {
  validateEmail();
  validatePass();
  if (validateEmail() || validatePass()) {
    $(".login").html(
      '<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>'
    );
    $(".login").addClass("dang_load").removeClass("login");
    $.ajax({
      url: "../user/index.php?login",
      data: {
        email: $("#email").val(),
        pass: $("#pass").val(),
        remenber: $("#remenber:checked").val(),
      },
      success: function (result) {
        $(".dang_load").html("Đăng nhập");
        $(".dang_load").addClass("login").removeClass("dang_load");
        if (result == "ok" || result.length < 5) {
          alert("đăng nhập thành công");
          setTimeout(() => {
            window.location.reload(true);
          }, 0);
        } else {
          $(".check-form").html(result);
        }
      },
    });
  }
});

$(document).on("click", ".log_out", function () {
  $(".log_out").html(
    '<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>'
  );
  $(".log_out").addClass("dang_load").removeClass("log_out");
  $.ajax({
    url: "../user/index.php?log_out",
    success: function (result) {
      // $(".dang_load").html("Đăng xuất");
      $(".dang_load").addClass("log_out").removeClass("dang_load");
      setTimeout(() => {
        window.location.reload(true);
      }, 0);
    },
  });
});
