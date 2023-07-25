<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= $SITE_URL ?>/" target="_blank">
            <img src="<?= $CONTENT_URL ?>/public/admin/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Kin Star</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class=" w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white dashboard" href="../dashboard/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white movie" href="../film/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-film" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Phim</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white room" href="../room/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Phòng chiếu</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white showtime" href="../showtime/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lịch chiếu</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white user" href="../user/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Khách hàng</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white discount" href="../discount/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-cc-discover" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Khuyến mãi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white beverages" href="../beverages/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-coffee" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Nước uống</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white qr" href="../QR/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-qrcode" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quét mã QR</span>
                </a>
            </li>
        </ul>
    </div>

</aside>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <!-- End Navbar -->