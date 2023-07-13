function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imgSrc').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).on('change','#imgUpload',function(){
    readURL(this);
});

$(document).on('click','.regis',function(){
    validateName();
    validatePhone();
    validateEmail();
    validateDate();
    validatePass();
    validateRePass();

    if( validateName() && validatePhone && validateEmail() && validateDate() && validatePass() && validateRePass){
        var file_data = document.getElementById('imgUpload').files[0];
        console.log(file_data);
        var form_data = new FormData();
        form_data.append('regis', '');
        form_data.append('thumb',document.getElementById('imgUpload').files[0] );
        form_data.append('name', $('#name').val());
        form_data.append('phone', $('#phone').val());
        form_data.append('birtday', $('#date').val());
        form_data.append('email', $('#email').val());
        form_data.append('pass', $('#pass').val());
        form_data.append('repass', $('#rePass').val());
        form_data.append('sex', $('.sex:checked').val());
        form_data.append('role', 1);
        form_data.append('activated', 1);

        $('.regis').html('<i class=" text-lg fa fa-spinner fa-spin fa-3x fa-fw"></i>')
        $('.regis').addClass('dang_load').removeClass('regis')
        $.ajax({
            url: '../user/index.php?regis', // <-- point to server-side PHP script 
            dataType: 'text', // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(php_script_response) {
                $('.dang_load').html('Đăng ký')
                $('.dang_load').addClass('regis').removeClass('dang_load')

                if (php_script_response == 'ok' || php_script_response.length < 5) {
                    alert('đăng kí thành công')
                    setTimeout(() => {
                        window.location.reload(true)
                    }, 0);
                } else {
                    $('.check-form').html(php_script_response)
                }
            }
        });
    }
})