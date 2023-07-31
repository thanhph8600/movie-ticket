<section class=" bg-gray-100">
    <div class="container m-auto py-4">
        <h2 class=" uppercase text-2xl text-center font-bold pb-4">tin tức</h2>
        <?php
        $i=0;
        foreach ($news as $key => $value) {
            $i++;
            if($i<4){
                $class = "float-left";
            }elseif($i>=4 && $i<7){
                $class  = "float-right"; 
            }elseif($i>=7 && $i<10){
                $class = "float-left";
            }
            extract($value); ?>
            <a href="./?detail_news&id=<?=$id?>" class="w-1/3 p-1 <?=$class?>">
                <div class=" row-span-2 bg-white h-min  p-3 rounded overflow-hidden border hover:bg-pink-400 hover:text-white cursor-pointer">
                    <img src="<?= $UPLOAD_NEWS_URL . $thumb ?>" alt="" class=" shadow-xl rounded-md">
                    <p class=" font-bold"><?=$title?></p>
                    <p><?=$content?></p>
                </div>
            </a>

        <?php
        }
        ?>
    </div>
    <div class=" clear-both pb-8"></div>

</section>

<script>
    $('.tin_tuc').addClass('bg-yellow-600')
</script>