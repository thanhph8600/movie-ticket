function removeAscent(str) {
  if (str === null || str === undefined) return str;
  str = str.toLowerCase();
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/đ/g, "d");
  return str;
}

function validateName() {
  let value = $("#name").val();
  let check = ".chkName";
  let regex = /^([A-Za-z ]){6,32}$/;
  if(value == ''){
    $(check).html("Vui lòng nhập tên");
    return false;
  }else{
    if (!regex.test(removeAscent(value))) {
      $(check).html("6-32 kí tự, không có kí tự đặt biệt");
      return false;
    } else {
      $(check).html("");
      return true;
    }
  }
}

function validatePhone() {
  let value = $("#phone").val();
  let check = ".chkPhone";
  let regex = /^[0][0-9]{9}$/;
  if(value == ''){
    $(check).html("Vui lòng nhập số điện thoại");
    return false;
  }else{
    if (!regex.test(value)) {
      $(check).html("không đúng định dạng ");
      return false;
    } else {
      $(check).html("");
      return true;
    }
  }
}

function validateEmail() {
  let value = $("#email").val();
  let check = ".chkEmail";
  let regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  if (value == "") {
    $(check).html("Vui lòng nhập email");
    return false;
  } else {
    if (!regex.test(value)) {
      $(check).html("Email sai định dạng");
      return false;
    } else {
      $(check).html("");
      return true;
    }
  }
}

function validateDate() {
  let value = $("#date").val();
  let check = ".chkDate";
  let d = new Date();
  let year = d.getFullYear() -  value.split("-")[0] 
  if (value == "") {
    $(check).html("Vui lòng nhập ngày sinh");
    return false;
  } else {
    if(year < 12){
      $(check).html("Tuổi quá nhỏ");
      return false;
    }
    if(year > 120){
      $(check).html("Bạn còn sống à");
      return false;
    }
      $(check).html("");
      return true;
      
  }
}

function validatePass() {
  let value = $("#pass").val();
  let check = ".chkPass";
  let regex = /^([A-Za-z0-9_\-\.]){8,32}$/;
  if (value == "") {
    $(check).html("Mật khẩu không được để trống");
    return false;
  } else {
    if (!regex.test(value)) {
      $(check).html("8-32 kí tự, không có kí tự đặt biệt");
      return false;
    } else {
      $(check).html("");
      return true;
    }
  }
}

function validateRePass() {
  let value = $("#rePass").val();
  let check = ".chkRePass";
  if (value == "") {
    $(check).html(" không được để trống");
    return false;
  } else {
    if (value != $("#pass").val()) {
      $(check).html("không giống mật khẩu đã nhập");
      return false;
    } else {
      $(check).html("");
      return true;
    }
  }
}

function validatePassOld() {
  let value = $("#pass_old").val();
  let check = ".chkPassOld";
  let regex = /^([A-Za-z0-9_\-\.]){8,32}$/;
  if (value == "") {
    $(check).html("Mật khẩu không được để trống");
    return false;
  } else {
    if (!regex.test(value)) {
      $(check).html("8-32 kí tự, không có kí tự đặt biệt");
      return false;
    } else {
      $(check).html("");
      return true;
    }
  }
}

$(document).on('change keyup keydow','#name',function(){
  validateName()
})

$(document).on('change keyup keydow','#phone',function(){
  validatePhone()
})

$(document).on('change keyup keydow','#email',function(){
  validateEmail()
})

$(document).on('change keyup keydow','#date',function(){
  validateDate()
})

$(document).on('change keyup keydow','#pass',function(){
  validatePass();
})

$(document).on('change keyup keydow','#rePass',function(){
  validateRePass();
})

$(document).on('change keyup keydow','#pass_old',function(){
  validatePassOld();
})


$(document).on('click','.fa-eye',function(){
  $(this).parent().children('input').prop("type", "text");
  $(this).removeClass('fa-eye').addClass('fa-eye-slash')
})

$(document).on('click','.fa-eye-slash',function(){
  $(this).parent().children('input').prop("type", "password");
  $(this).removeClass('fa-eye-slash').addClass('fa-eye')
})