
<section>
    <div class="container m-auto py-4">
        <h2 class=" uppercase text-2xl text-center font-bold pb-4">hỏi & đáp</h2>
        <?php
        $i =0;
        foreach ($questions as $key => $value) {
            if($value['answer'] =='')
                break;
             ?>
            <div class=" w-4/5  m-auto pb-2">
                <p class=" show-qa bg-gray-700 p-4 text-lg rounded-bl-3xl rounded-tr-3xl text-white hover:bg-gray-600 cursor-pointer">
                    <span>0<?=++$i?> </span> 
                    <?=$value['question']?>
                </p>
                <div class="hidden rounded-xl bg-slate-300 border p-4 my-2 ">
                    <?=$value['answer']?>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</section>

<section>
    <div class="container m-auto py-16">
        <h2 class=" uppercase text-2xl text-center font-bold pb-4">Gửi câu hỏi</h2>
        <form action="./?question" method="post" class=" w-3/5 m-auto flex flex-col justify-center items-center" onsubmit="return checkForm()">
            <textarea class=" w-full focus:shadow-lg focus:outline-none border-2 rounded p-4" name="question" id="" rows="6"></textarea>
            <input type="submit" value="Gửi" class=" <?= (!empty($user)) ? '' : 'formLogin' ?> ml-auto w-1/6 mt-4 cursor-pointer py-4 text-center rounded bg-blue-500 hover:bg-blue-600 text-white">
        </form>
    </div>
</section>


<?php
include '../film/top_week.php';
?>

<script>
    $('.hoi_dap').addClass('bg-yellow-600')

    let user = '<?= $user ?>';

    function checkForm() {
        if (user == 0 || $('textarea').val().length == 0 || $('textarea').val() == '') {
            fun_alert('asd', 'asdasd')
            return false
        }
    }

    $(document).on('click', '.show-qa', function() {
        $(this).parent().children('div').slideToggle();
    })
</script>