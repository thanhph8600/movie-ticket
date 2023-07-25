<style>
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

    .table-responsive{
        overflow:visible;
    }
    .table-responsive .main {
        display: flex;
        gap: 20px;
        width: 80%;
        margin: auto;
    }

    .table-responsive .main .img {
        width: 200px;
        border-radius: 10px;
        overflow: hidden;
    }

    .table-responsive .main img {
        width: 100%;
    }

    .main .info p {
        font-weight: bold;
    }

    .main .name_film {
        font-size: 22px;
        text-transform: uppercase;
    }

    .w-80 {
        width: 80%;
        margin: auto;
        font-weight: bold;
        padding: 30px 0;
        text-align: center;
    }

    .w-80 p {
        font-weight: bold;
    }

    .input {
        text-align: center;
    }

    .input .nhap {
        font-weight: bold;
        border-radius: 10px;
        outline: none;
        padding: 10px 50px;
        color: white;
        border: none;
        transition: all 0.5s ease-in-out;
    }

    .input .nhap:hover {
        background: green !important;
    }
    .xac_nhan{
        font-weight: bold;
        border-radius: 10px;
        padding: 10px 50px;
        color: white;
        background: gray;
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
                        <h6 class="text-white text-capitalize ps-3">xác nhận vé</h6>
                    </div>
                    <div class="pst-ab">
                        <a href="./index.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-5">
                    <div class="table-responsive p-0">
                        <div class="main">
                            <div class="img">
                                <img src="<?= $UPLOAD_FILM_URL . $ticket['thumb'] ?>" alt="">
                            </div>
                            <div class="info">
                                <p class="name_film"><?= $ticket['name'] ?></p>
                                <p><?= format_date($ticket['date']) ?></p>
                                <p><?= $ticket['time_start'] . ' - ' . $ticket['time_end']  ?></p>
                                <p><?= $ticket['name_room'] ?></p>
                                <p><?= $ticket['rated'] ?></p>
                                <p>Ghế:
                                    <?php
                                    foreach ($seat as $key => $value) {
                                        echo  $value['row_index'] . $value['col_index'] . '   ';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="w-80">
                            <p>Combo nước:</p>

                            <?php
                            foreach ($beverages as $key => $value) {
                                $name = Beverages::select_by_id($value['id_beverages']);
                                echo '<p>' . $value['quantity'] . ' x ' . $name['name'] . '</p>';
                            }
                            ?>

                        </div>
                        <div class="input">

                            <?php
                            if ($ticket['activated'] == 1) {
                                echo '
                                    <form action="./?xac_nhan" method="post">
                                        <input class="nhap bg-gradient-primary" type="hidden" name="id" value="'.$ticket['id'].'">
                                        <input class="nhap bg-gradient-primary" type="submit" value="Xác nhận">
                                    </form>
                                ';
                            }else{
                                echo '
                                    <span class="xac_nhan">Xác nhận</span>
                                ';
                            }
                            ?>
                        </div>

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


<script type="text/javascript">
    $('.qr').addClass('active')
    $('.qr').addClass('bg-gradient-primary')
</script>