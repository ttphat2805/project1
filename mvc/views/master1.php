<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>G6 - FOOD</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/public/assets/images/logoweb.png">

    <!-- CSS ============================================ -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/vendor/bootstrap.min.css">
    <!-- FontAwesome -->
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

</head>

<body>

    <div class="home-wrapper home-1">
        <!-- HEADER: START -->
        <?php
        require_once './mvc/views/block/header.php';
        ?>
        <!-- HEADER: END -->
        <!-- Begin Slider Area One -->
        <div class="slider-area">
            <div class="obrien-slider arrow-style" data-slick-options='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": true,
        "dots": true,
        "autoplay" : true,
        "fade" : true,
        "autoplaySpeed" : 7000,
        "pauseOnHover" : false,
        "pauseOnFocus" : false
        }' data-slick-responsive='[
        {"breakpoint":992, "settings": {
        "slidesToShow": 1,
        "arrows": false,
        "dots": true
        }}
        ]'>
                <div class="slide-item slide-1 bg-position slide-bg-1 animation-style-01">
                    <div class="slider-content">
                        <h4 class="slider-small-title">Cold processed organic fruit</h4>
                        <h2 class="slider-large-title">Fresh Avocado</h2>
                        <div class="slider-btn">
                            <a class="obrien-button black-btn" href="shop.html">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="slide-item slide-2 bg-position slide-bg-1 animation-style-01">
                    <div class="slider-content">
                        <h4 class="slider-small-title">Healthy life with</h4>
                        <h2 class="slider-large-title">Natural Organic</h2>
                        <div class="slider-btn">
                            <a class="obrien-button black-btn" href="shop.html">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="slide-item slide-3 bg-position slide-bg-1 animation-style-01">
                    <div class="slider-content">
                        <h4 class="slider-small-title">Healthy life with</h4>
                        <h2 class="slider-large-title">Natural Organic</h2>
                        <div class="slider-btn">
                            <a class="obrien-button black-btn" href="shop.html">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Area End Here -->
        <!-- Product Area Start Here -->
        <div class="product-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Các món phổ biến</h2>
                            <div class="desc-content">
                                <p>All best seller product are now available for you and your can buy this product from here any time any where so sop now</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 product-wrapper col-custom">
                        <div class="product-slider" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="https://www.pizzaexpress.vn/wp-content/uploads/2019/12/P10rs1.jpg" alt="" class="product-image-1 w-100">
                                            <!-- <img src="http://pngimg.com/uploads/pizza/small/pizza_PNG7109.png" alt="" class="product-image-2 position-absolute w-100"> -->
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Sản phẩm 1</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.html" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="compare.html" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a href="#exampleModalCenter" data-toggle="modal" title="Quick View">
                                            <i class="ion-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="https://www.pizzaexpress.vn/wp-content/uploads/2019/12/P9rs1.jpg" alt="" class="product-image-1 w-100">
                                            <!-- <img src="https://www.pizzaexpress.vn/wp-content/uploads/2019/12/P10rs1.jpg" alt="" class="product-image-2 position-absolute w-100"> -->
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Sản phẩm 1</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.html" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="compare.html" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a href="#exampleModalCenter" data-toggle="modal" title="Quick View">
                                            <i class="ion-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="https://www.pizzaexpress.vn/wp-content/uploads/2019/12/P9rs1.jpg" alt="" class="product-image-1 w-100">

                                        </a>
                                    </div>
                                    <div class="label-product">
                                        <span class="label-sale position-absolute text-uppercase text-white text-center d-block">Soldout</span>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-size mb-2">
                                            <p>Size :</p>
                                            <input class="" id="prod-size-S" type="radio" name="option1" value="S">
                                            <label for="prod-size-S" class="sd">
                                                <span>S</span>
                                            </label>
                                            <input class="" id="prod-size-M" type="radio" name="option1" value="M">
                                            <label for="prod-size-M" class="sd">
                                                <span>M</span>
                                            </label>
                                            <input class="" id="prod-size-L" type="radio" name="option1" value="L">
                                            <label for="prod-size-L" class="sd">
                                                <span>L</span>
                                            </label>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Sản phẩm 1</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.html" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="compare.html" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a href="#exampleModalCenter" data-toggle="modal" title="Quick View">
                                            <i class="ion-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="https://www.pizzaexpress.vn/wp-content/uploads/2019/12/P9rs1.jpg" alt="" class="product-image-1 w-100">

                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Sản phẩm 1</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.html" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="compare.html" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a href="#exampleModalCenter" data-toggle="modal" title="Quick View">
                                            <i class="ion-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="https://www.pizzaexpress.vn/wp-content/uploads/2019/12/P9rs1.jpg" alt="" class="product-image-1 w-100">

                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Sản phẩm 1</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.html" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="compare.html" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a href="#exampleModalCenter" data-toggle="modal" title="Quick View">
                                            <i class="ion-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->
        <!-- Banner Fullwidth Area Start Here -->
        <div class="banner-fullwidth-area">
            <div class="container custom-wrapper">
                <div class="row">
                    <div class="col-md-5 col-lg-6 text-center col-custom">
                        <div class="banner-thumb h-100 d-flex justify-content-center align-items-center">
                            <img src="https://xpressrow.com/html/frudbaz/assets/img/offer/offer_img.png" alt="Banner Thumb">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6 text-center justify-content-center col-custom">
                        <div class="banner-flash-content d-flex flex-column align-items-center justify-content-center h-100">
                            <h2 class="deal-head text-uppercase">Flash Deals</h2>
                            <h3 class="deal-title text-uppercase">Hurry up and Get 25% Discount</h3>
                            <a href="shop.html" class="obrien-button primary-btn">Shop Now</a>
                            <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2021/11/20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End Here -->
        <!-- Product Area Start Here -->
        <div class="product-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Featured Products</h2>
                            <div class="desc-content">
                                <p>All best seller product are now available for you and your can buy this product from here any time any where so sop now</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row shop_wrapper grid_4">
                    <?php
                    foreach ($data['products'] as $item):
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-custom product-area">
                        <div class="single-product position-relative">
                            <div class="product-image">
                                <a class="d-block" href="<?php echo BASE_URL ?>/productdetail/show/<?=$item['idproduct']?>">
                                    <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?=$item['image']?>" alt="" class="product-image-1 w-100">
                                    <img src="" alt="" class="product-image-2 position-absolute w-100">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-title">
                                    <h4 class="title-2"> <a href="product-details.html"><?=$item['name']?></a></h4>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price "><?=number_format($item['price']);?></span>
                                    <span class="old-price"><del><?=number_format($item['price']+15000);
                                    ?></del></span>
                                </div>
                            </div>
                            <div class="add-action d-flex position-absolute">
                                <a href="cart.html" title="Add To cart">
                                    <i class="ion-bag"></i>
                                </a>
                                <a href="compare.html" title="Compare">
                                    <i class="ion-ios-loop-strong"></i>
                                </a>
                                <a href="wishlist.html" title="Add To Wishlist">
                                    <i class="ion-ios-heart-outline"></i>
                                </a>
                                <a href="#exampleModalCenter" data-toggle="modal" title="Quick View">
                                    <i class="ion-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>

        <!-- Newslatter Area End Here -->
        <!-- Latest Blog Area Start Here -->
        <div class="latest-blog-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Latest Blog</h2>
                            <div class="desc-content">
                                <p>If you want to know about the organic product then keep an eye on our blog.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-custom">
                        <div class="obrien-slider" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 768, "settings": {
                        "slidesToShow": 1
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a href="blog.html">
                                        <img src="https://xpressrow.com/html/frudbaz/assets/img/blog/blog_01.jpg" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="single-blog-content position-relative">
                                    <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                        <span>14</span>
                                        <span>01</span>
                                    </div>
                                    <div class="post-meta">
                                        <span class="author">Nhóm 6 dự án 1</span>
                                    </div>
                                    <h2 class="post-title">
                                        <a href="blog.html">Tiêu đề</a>
                                    </h2>
                                    <p class="desc-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making...</p>
                                </div>
                            </div>
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a href="blog.html">
                                        <img src="https://xpressrow.com/html/frudbaz/assets/img/blog/blog_01.jpg" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="single-blog-content position-relative">
                                    <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                        <span>14</span>
                                        <span>01</span>
                                    </div>
                                    <div class="post-meta">
                                        <span class="author">Nhóm 6 dự án 1</span>
                                    </div>
                                    <h2 class="post-title">
                                        <a href="blog.html">Tiêu đề</a>
                                    </h2>
                                    <p class="desc-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making...</p>
                                </div>
                            </div>
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a href="blog.html">
                                        <img src="https://xpressrow.com/html/frudbaz/assets/img/blog/blog_01.jpg" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="single-blog-content position-relative">
                                    <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                        <span>14</span>
                                        <span>01</span>
                                    </div>
                                    <div class="post-meta">
                                        <span class="author">Nhóm 6 dự án 1</span>
                                    </div>
                                    <h2 class="post-title">
                                        <a href="blog.html">Tiêu đề</a>
                                    </h2>
                                    <p class="desc-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making...</p>
                                </div>
                            </div>
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a href="blog.html">
                                        <img src="<?php echo BASE_URL; ?>/public/assets/images/blog/medium-size/4.jpg" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="single-blog-content position-relative">
                                    <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                        <span>14</span>
                                        <span>01</span>
                                    </div>
                                    <div class="post-meta">
                                        <span class="author">Nhóm 6 dự án 1</span>
                                    </div>
                                    <h2 class="post-title">
                                        <a href="blog.html">Tiêu đề 1</a>
                                    </h2>
                                    <p class="desc-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Area Start Here -->

        <!-- Footer Area End Here -->
    </div>

    <!-- Modal Area Start Here -->
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
    <!-- Modal Area End Here -->
    <!-- HEADER: START -->
    <?php
    require_once './mvc/views/block/footer.php';
    ?>
    <!-- HEADER: END -->
    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="ion-chevron-up"></i>
    </a>
    <!-- Scroll to Top End -->


</body>

</html>