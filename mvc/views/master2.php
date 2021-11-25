<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Layout - 2</title>
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


    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/style.min.css"> -->
</head>

<body>

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
                            <h3 class="title-3">Chi tiết sản phẩm</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Chi tiết sản phẩm</li>
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
        <!-- END MAIN CONTENT PHP CONNECT -->

    </div>

    <!-- Modal: Start Here -->
    <div class="modal fade obrien-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 text-center">
                                <div class="product-image">
                                    <img src="<?php echo BASE_URL; ?>/public/assets/images/product/1.jpg" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title">Product dummy name</h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>1 Review</span>
                                        </div>
                                        <p class="desc-content">we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound
                                            to ensue; and equal blame bel...</p>
                                        <form class="d-flex flex-column w-100" action="#">
                                            <div class="form-group">
                                                <select class="form-control nice-select w-100">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                    <option>XXL</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="quantity-with_btn">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="0" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                            <div class="add-to_cart">
                                                <a class="btn obrien-button primary-btn" href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: End Here -->
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