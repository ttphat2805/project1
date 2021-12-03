<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>G6FOOD</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/public/assets/images/logoweb.png">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/vendor/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/vendor/font.awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/vendor/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/plugins/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/plugins/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/plugins/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </script>
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/style.min.css"> -->
</head>

<body>
    <button onclick="autoTop();" class="btnScrollTop">
        <i class="far fa-arrow-up"></i>
    </button>

    <div class="shop-wrapper">
        <!-- HEADER: START -->
        <?php
        require_once './mvc/views/block/header.php';
        ?>
        <!-- HEADER: END -->
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3"><?= $_SESSION['namesite'] ?></h3>
                            <ul>
                                <li><a href="<?= BASE_URL ?>">Trang chủ</a>

                                </li>
                                <li><?= $_SESSION['namesite'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAIN CONTENT PHP CONNECT -->
        <div class="main-content">
            <?php
            require_once './mvc/views/pages/' . $data['pages'] . '.php';
            ?>
        </div>
    </div>
    <!-- FOOTER: START -->
    <?php
    require_once './mvc/views/block/footer.php';
    ?>
    <!-- FOOTER: END -->
    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="ion-chevron-up"></i>
    </a>
    <!-- Scroll to Top End -->


</body>

</html>