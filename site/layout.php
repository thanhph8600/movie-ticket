<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://static.vecteezy.com/system/resources/previews/004/057/706/original/gold-star-decoration-free-vector.jpg">

    <title>Kin Star</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/output.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/home.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/admin.css">
    <!-- carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.green.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>
</head>

<body>
    <div class="cursor_load">

    </div>
    <div class=" min-h-screen flex flex-col">

        <?php
        include '../layout/header.php';
        ?>

        <div class=" flex-auto">
            <?php
            if (!empty($SLIDE))
                require $SLIDE;
            require $VIEW_NAME;
            ?>
        </div>

        <?php
        include '../layout/footer.php';
        ?>

        <div id="alert" class="alert fixed right-10 bottom-10 flex flex-col gap-4 z-10">
        </div>
    </div>

</body>

<script src="<?= $CONTENT_URL ?>/js/slide.js"></script>
<script src="<?= $CONTENT_URL ?>/js/openForm.js"></script>
<script src="<?= $CONTENT_URL ?>/js/validate.js"></script>
<script src="<?= $CONTENT_URL ?>/js/site/regis.js"></script>
<script src="<?= $CONTENT_URL ?>/js/site/login.js"></script>
<script src="<?= $CONTENT_URL ?>/js/site/forgotPass.js"></script>
<script src="<?= $CONTENT_URL ?>/js/site/changePass.js"></script>