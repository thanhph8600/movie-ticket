$(document).on('click','.formLogin',function(){
  $(".popup").css("display", "block");
  $.ajax({
    url: "../user/index.php?formLogin",
    data:{
      formLogin:'',
    } ,
    success: function (result) {
      $(".form").html(result);
    },
  });
});

$(document).on('click','.formRegis',function(){
    $(".popup").css("display", "block");
    $.ajax({
      url: "../user/index.php?formRegis",
      data:{formRegis : ''},
      success: function (result) {
        $(".form").html(result);
      },
    });

})

$(document).on('click','.formForgot',function(){
  $(".popup").css("display", "block");
  $.ajax({
    url: "../user/index.php?formForgot",
    data:{
      formForgot:'',
    } ,
    success: function (result) {
      $(".form").html(result);
    },
  });
});

$(".close").click(function () {
  $(".popup").css("display", "none");
});


function open_form_login(){
    $(".popup").css("display", "block");
    $.ajax({
      url: "../user/index.php?formLogin",
      data:{
        formLogin:'',
      } ,
      success: function (result) {
        $(".form").html(result);
      },
    });
}