<div class="container-fluid py-4">
    <div class="row pt-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <h2 class="text-lg mb-0 text-capitalize col-8 ms-auto">Tổng phim đang được chiếu</h2>
                        <h4 class="mb-0"><?= count($film_dang_chieu) ?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="../showtime/">Xem chi tiết <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <div class="text-end pt-1">
                        <h2 class="text-lg mb-0 text-capitalize col-8 ms-auto">Số lượng discount còn hoạt động</h2>
                        <h4 class="mb-0"><?= count($discount) ?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="../discount/">Xem chi tiết <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <div class="text-end pt-1">
                        <h2 class="text-lg mb-0 text-capitalize  col-8 ms-auto">Thu nhập từ bán vé xem phim</h2>
                        <h4 class="mb-0"><?= currency_format($price_ticket_Bill['price_ticket']) ?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="../statistical/">Xem chi tiết <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <div class="text-end pt-1">
                        <h2 class="text-lg mb-0 text-capitalize  col-8 ms-auto">Thu nhập từ bán bắp và nước</h2>
                        <h4 class="mb-0"><?= currency_format($price_ticket_Bill['price_bill']) ?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="../statistical/">Xem chi tiết <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-xl-8 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <h2 class="text-lg mb-0 text-capitalize">Khách hàng</h2>
                        <h4 class="mb-0"><?= count($user) ?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class=" p-4">
                    <div class="row">
                        <h4>Khách hàng mới</h4>
                        <?php
                        $i = 0;
                        foreach ($user as $key => $value) {
                            $i++;
                        ?>
                            <div class="col-2 text-center">
                                <div style="width:80px;height:80px;" class="rounded-circle overflow-hidden m-auto ">
                                    <img style="width:100%" src="../../uploaded/user/<?= $value['thumb'] ?>" class="border " alt="">
                                </div>
                                <p class="pt-3"><?= $value['name'] ?></p>
                            </div>

                        <?php

                        }
                        ?>

                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="../user/">Xem tất cả khách hàng <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">comment</i>
                    </div>
                    <div class="text-end pt-1">
                        <h2 class="text-lg mb-0 text-capitalize">Bính luận mới</h2>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class=" p-3">
                    <?php
                    $i = 0;
                    foreach ($comment as $key => $value) {
                        $user_comment = user_select_by_id($value['id_user']);
                        $i++;
                    ?>
                        <div>
                            <h5><?= $user_comment['name'] ?></h5>
                            <p><?= $value['content'] ?></p>
                        </div>
                    <?php
                        if ($i == 3) {
                            break;
                        }
                    }
                    ?>

                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="../comment/">Xem tất cả bình luận <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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

    function deletecategory() {
        var result = confirm('Bạn có chắc chắn không!')
        if (result != true) {
            return false
        }
    }
    $('.dashboard').addClass('active')
    $('.dashboard').addClass('bg-gradient-primary')
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../public/admin/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>