
<section>
    <div class="container m-auto py-4">
        <h2 class=" uppercase text-2xl text-center font-bold pb-4">liên hệ với chúng tôi</h2>
        <iframe class=" w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8858.67384602297!2d108.17313315080503!3d16.078292924394866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b509a30cfb%3A0xb93a05e26b3b28ff!2zUGjhu5UgdGjDtG5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYyDEkMOgIE7hurVuZw!5e0!3m2!1sfr!2s!4v1689093495828!5m2!1sfr!2s"  height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<section>
    <div class="container m-auto py-16">
        <h2 class=" uppercase text-2xl text-center font-bold pb-4">Gửi nội dung liên hệ</h2>
        <form action="" method="post" class="w-3/5  m-auto flex flex-col justify-center items-center">
            <textarea class=" w-full focus:shadow-lg focus:outline-none border-2  rounded p-4" name="" id="" rows="6"></textarea>
            <p  class=" <?= (!empty($user)) ? 'send_email' : 'formLogin' ?>  ml-auto w-1/6 mt-4 cursor-pointer py-4 text-center rounded bg-blue-500 hover:bg-blue-600 text-white">Gửi</p>
        </form>
    </div>
</section>


<?php
include '../film/top_week.php';
?>

<script>
    $('.lien_he').addClass('bg-yellow-600')

    let class_name = 0;

    $(document).on('click','.send_email',function(){
        if( $('textarea').val() == ''){
            $('textarea').addClass('border-red-500')
        }else{
            $('textarea').val('')
            $('textarea').removeClass('border-red-500')
            $('cursor_load').css('display', 'block')
            $.ajax({
                url: '../user/sendEmail.php?lien_he',
                data :{
                    noi_dung : $('textarea').val()
                },
                success: function(data){
                    fun_alert(class_name++,'Chúng tôi đã nhận được email của bạn<br> hãy chờ phản hồi từ chúng tôi')
                    $('cursor_load').css('display','none');
                }
            })

        }

    })
</script>

