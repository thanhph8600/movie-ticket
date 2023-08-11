<style>
    .input_Addproduct {
        background-color: #04AA6D;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 5px 15px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }

    .edit {
        color: #EACD11;
    }

    .delete {
        color: #FF0000;
    }

    .text-xs {
        border-radius: 8px;
        border: none;
        font-weight: bold;
        /* font-size: 14px !important; */
        background: none;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input[type=text],
    .input,
    input[type=number],
    input[type=date],
    select {
        outline: none;
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100px;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .pst-re {
        position: relative;
    }

    .pst-ab {
        position: absolute;
        top: 50%;
        right: 10%;
        transform: translate(100%, -50%);
        color: #fff;
        font-size: 25px;
    }

    a {
        color: #fff;
        text-decoration: none;
        transition: all .2s ease-in-out;
    }

    .pst-ab a:hover {
        color: #4CAF50;
        font-size: 30px;

    }

    .img-product {
        width: 300px;
        padding: 15px 0;
    }

    .img-product img {
        width: 100%;
        display: none;
    }

    input[type=file] {
        border: none;
        background: none;
    }

    .add-rowShow {
        display: flex;
        justify-content: center;
        align-items: center;
        background: gray;
        color: white;
        font-size: 30px;
        height: 100px;
        width: 100px;
        border-radius: 10px;
        cursor: pointer;
        opacity: 0.4;
    }

    .add-rowShow:hover {
        opacity: 0.8;
    }
</style>


<div class="container-fluid py-4">
    <div class="ket-qua ">
        <?php
        if (!empty($MESS)) echo $MESS;
        ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Thêm Lịch chiếu</h6>
                    </div>
                    <div class="pst-ab">
                        <a href="./index.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <form action="./index.php?btn_insert" enctype="multipart/form-data" method="post" style="display:flex;width:95%;margin:auto" onsubmit="return checkForm()">
                            <div class="row pb-4">
                                <div class="col-6">
                                    <label for="id_film">Tên phim </label>
                                    <span class="checkFiml ps-4 text-danger"></span>
                                    <select name="id_film" class="id_film">
                                        <option value="0">- - - - - - - - - - - - Chọn film - - - - - - - - - - - - -</option>
                                        <?php
                                        var_dump($id_film);
                                        foreach ($film_dang_hoat_dong as $key => $value) {
                                            if($id_film == $value['id'] ){
                                                echo '<option  selected  value="' . $value['id'] . '" checked>' . $value['name'] . '</option>';
                                            }else{
                                                echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    if (!empty($name_err)) echo $name_err;
                                    ?>
                                </div>
                                <div class="col-3">
                                    <label for="id_film">Ngày khởi chiếu</label>
                                    <input type="text" name="" readonly id="">
                                </div>
                            </div>
                            <div class="div1">
                                <div class="row pb-4">

                                </div>
                            </div>
                            <div class=" row pb-4 ps-4">
                                <div class="add-rowShow">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                            </div>

                            <input name="add" type="submit" value="Thêm">
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>


</div>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../../public/admin/assets/js/core/popper.min.js"></script>
<script src="../../public/admin/assets/js/core/bootstrap.min.js"></script>
<script src="../../public/admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../../public/admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }



    function checkForm() {
        let check =0;
        if($('.id_film').val()==0 || $('.id_film').val()==''){
            $('.id_film').css('border','1px solid red')
            return false
        }
        for (let index = 0; index < $('.price').length; index++) {
            if($('.price')[index].value==0){
                $('.price')[index].style.border = '1px solid red';
                check ++;
            }          
        }
        if(check != 0){
            return false
        }
    }


    $('.showtime').addClass('active')
    $('.showtime').addClass('bg-gradient-primary')
</script>
<!-- Github buttons -->
<script src="<?= $CONTENT_URL ?>/js/admin/showtime.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../public/admin/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>