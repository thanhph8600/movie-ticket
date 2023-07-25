$(document).on("click", ".formLogin", function () {
  $(".cursor_load").css("display", "block");
  $(".popup").css("display", "block");
  $.ajax({
    url: "../user/index.php?formLogin",
    data: {
      formLogin: "",
    },
    success: function (result) {
      $(".cursor_load").css("display", "none");
      $(".form").html(result);
    },
  });
});

$(document).on("click", ".formRegis", function () {
  $(".cursor_load").css("display", "block");
  $(".popup").css("display", "block");
  $.ajax({
    url: "../user/index.php?formRegis",
    data: { formRegis: "" },
    success: function (result) {
      $(".cursor_load").css("display", "none");
      $(".form").html(result);
    },
  });
});

$(document).on("click", ".formForgot", function () {
  $(".cursor_load").css("display", "block");
  $(".popup").css("display", "block");
  $.ajax({
    url: "../user/index.php?formForgot",
    data: {
      formForgot: "",
    },
    success: function (result) {
      $(".cursor_load").css("display", "none");

      $(".form").html(result);
    },
  });
});

$(".close").click(function () {
  $(".popup").css("display", "none");
});

function open_form_login() {
  $(".cursor_load").css("display", "block");
  $(".popup").css("display", "block");
  $.ajax({
    url: "../user/index.php?formLogin",
    data: {
      formLogin: "",
    },
    success: function (result) {
      $(".cursor_load").css("display", "none");

      $(".form").html(result);
    },
  });
}
