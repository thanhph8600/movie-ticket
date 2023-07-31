<section>
    <div class="owl-carousel slide-banner owl-theme owl-loaded">
        <div class="owl-stage-outer">
            <div class="owl-stage">
                <?php
                    foreach ($banner as $key => $value) {
                        echo '
                        <div class="owl-item ">
                            <img src="'. $UPLOAD_BANNER_HOME_URL . $value['thumb'].'" class="  " alt="...">
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
