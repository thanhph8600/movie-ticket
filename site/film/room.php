<section>
    <div class="container m-auto py-4">
        <p>Tên phim</p>
        <h2 class=" text-2xl font-bold uppercase py-2">Xứ sở các nguyên tố</h2>
        <div class="w-2/3 text-white">
            <div class=" flex  border  ">
                <div class=" flex-auto p-2  bg-orange-400">
                    <p>Xuất chiếu</p>
                    <p class=" text-xl font-bold">20:00</p>
                </div>
                <div class=" flex-auto p-2  border-l bg-orange-400">
                    <p>Ngày</p>
                    <p class=" text-xl font-bold">22/06/2023</p>
                </div>
                <div class=" flex-auto p-2  border-l bg-sky-900">
                    <p>Số lượng vé</p>
                    <p class=" text-xl font-bold">1 vé</p>
                </div>
                <div class=" flex-auto p-2  border-l bg-sky-900">
                    <p>Tổng số tiền</p>
                    <p class=" text-xl font-bold">96.000 đ</p>
                </div>
            </div>
            <div class="flex bg-orange-400 border-b border-r border-l  ">
                <div class=" p-4  ">
                    <p>Số ghế</p>
                </div>
                <div class=" flex-auto flex items-center  border-l ">
                    <p class=" font-bold p-2">H2</p>
                    <p class=" font-bold  p-2">H2</p>
                    <p class=" font-bold  p-2">H2</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container m-auto py-4">
        <div class=" text-center text-lg font-bold text-white bg-gray-400 p-2 rounded-full">MÀN HÌNH</div>
        <div class=" w-4/5 m-auto py-4 grid grid-cols-8 gap-4 mt-10">
            <?php
            for ($i = 0; $i < 40; $i++) {
            ?>
                <div class="item  h-8 border bg-red-900">

                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>