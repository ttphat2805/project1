<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>G6Grain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/public/assets/images/logoweb.png">

    <!-- CSS ============================================ -->
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

</head>

<body>
    <button onclick="autoTop();" class="btnScrollTop">
        <i class="far fa-arrow-up"></i>
    </button>
    <div class="app">
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
                            <h4 class="slider-small-title">Ăn sạch sống lành</h4>
                            <h2 class="slider-large-title">100% Tự nhiên - hữu cơ</h2>
                            <div class="slider-btn">
                                <a class="obrien-button black-btn" href="<?= BASE_URL ?>/products">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item slide-2 bg-position slide-bg-1 animation-style-01">
                        <div class="slider-content">
                            <h4 class="slider-small-title">Đảm bảo sức khỏe</h4>
                            <h2 class="slider-large-title">Ngon - nguyên chất</h2>
                            <div class="slider-btn">
                                <a class="obrien-button black-btn" href="<?= BASE_URL ?>/products">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item slide-3 bg-position slide-bg-1 animation-style-01">
                        <div class="slider-content">
                            <h4 class="slider-small-title">Tự nhiên an toàn</h4>
                            <h2 class="slider-large-title">Thuần khiết - bổ dưỡng</h2>
                            <div class="slider-btn">
                                <a class="obrien-button black-btn" href="<?= BASE_URL ?>/products">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            class homepage extends db
            {
                function checkwishlist($idmember,$idproduct){
                    $query = "SELECT id from product_wishlist where member_id = ? and product_id = ?";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute([$idmember,$idproduct]);
                    return $stmt->rowCount();
                }
                function getproduct_detail_attr($id)
                {
                    $query = "SELECT a.*,b.id as 'idattr',b.value,b.name from attribute b inner join product_type a on b.id = a.attribute_id where a.product_id = $id";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute();
                    return $stmt->fetchAll();
                }
                function getproduct_type_id($id)
                {
                    $query = "SELECT * FROM product_type where product_id = $id";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute();
                    return $stmt->fetch();
                }
            }
            $homepage = new homepage();

            ?>
            <!-- Feature Area End Here -->
            <!-- Product Area Start Here -->
            <div class="product-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-5 m-auto text-center col-custom">
                            <div class="section-content">
                                <h2 class="title-1 text-uppercase">Các món phổ biến</h2>
                                <div class="desc-content">
                                    <p>Tất cả sản phẩm bán chạy nhất hiện đều có sẵn cho bạn và bạn có thể mua sản phẩm này từ đây bất cứ lúc nào bất kỳ nơi nào mua sắm ngay bây giờ</p>
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
                                <?php
                                foreach ($data['product_trends'] as $trend) :
                                ?>
                                    <div class="single-item">
                                        <div class="single-product position-relative">
                                            <input type="hidden" class="idproduct" value="<?= $trend['idproduct'] ?>">
                                            <div class="product-image">
                                                <a class="d-block" href="<?php echo BASE_URL ?>/productdetail/show/<?= $trend['slug'] ?>">
                                                    <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $trend['image'] ?>" alt="" class="product-image-1 w-100">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <?php
                                                $product_attr = $homepage->getproduct_detail_attr($trend['idproduct']);

                                                $attr_id = $homepage->getproduct_type_id($trend['idproduct']);
                                                // check wishlish
                                                if(isset($_SESSION['user_infor'])){
                                                    $check_wishlish = $homepage->checkwishlist($_SESSION['user_infor']['user_id'],$trend['idproduct']);
                                                } else {
                                                    $check_wishlish =0;
                                                }
                                                if ($attr_id['attribute_id'] !== NULL) {
                                                ?>
                                                    <div class="product-size animate-size mb-2">
                                                        <p>Size :</p>
                                                        <?php
                                                        foreach ($product_attr as $size) :
                                                        ?>
                                                            <input id="prod-size-<?= $size['value'] ?>-<?= $trend['idproduct'] ?> " type="radio" checked data-prod="<?= $size['id'] ?> " name="option1" value="' . $size['attribute_id'] . '">
                                                            <label for="prod-size-<?= $size['value'] ?>-<?= $trend['idproduct'] ?>" class="sd btn-value-size" id="<?= $size['value'] ?>">
                                                                <span><?= $size['value'] ?></span>
                                                            </label>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                <?php

                                                } else {
                                                    echo "<div class='non-size' data-prod='" . $attr_id['id'] . "'></div> ";
                                                } ?>
                                                <div class="product-title">
                                                    <h4 class="title-2"> <a href="<?php echo BASE_URL ?>/productdetail/show/<?= $trend['slug'] ?>"><?= $trend['name'] ?></a></h4>
                                                </div>
                                                <div class="product-price">
                                                    <span class="regular-price "><?= number_format($trend['price']); ?>đ</span>
                                                    <span class="old-price"><del><?= number_format($trend['price'] + 12500);
                                                                                    ?>đ</del></span>
                                                </div>
                                                <div class="product-action d-flex">
                                                    <a title="+ Giỏ hàng" class="add_to_cart">
                                                        <i class="ion-bag"></i>
                                                    </a>
                                                    <?php if($check_wishlish >0 ) {?>
                                                        <a class="addtowishlist fetchwishlist" title="+ Yêu thích">
                                                        <i class="fal fa-heart" style="color: #E98C81;"></i>
                                                    </a>
                                                    <?php } else { ?>
                                                        <a class="addtowishlist fetchwishlist" title="+ Yêu thích">
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <?php } ?>
                                                    <!-- <a class="addtowishlist fetchwishlist" title="+ Yêu thích">
                                                        <i class="fal fa-heart"></i>
                                                    </a> -->
                                                    <!-- <a class="addtowishlist fetchwishlist" title="+ Yêu thích">
                                                        <i class="fas fa-heart"></i>
                                                    </a> -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                <?php
                                endforeach;
                                ?>

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
                                <img src="https://onlyorganic.com.vn/photos/7/Only_Organic_Banana_Blueberry___quinoa_120g.png" alt="Banner Thumb">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-6 text-center justify-content-center col-custom">
                            <div class="banner-flash-content d-flex flex-column align-items-center justify-content-center h-100">
                                <h2 class="deal-head text-uppercase">Black Friday</h2>
                                <h3 class="deal-title text-uppercase">Giảm giá lên đến 20%</h3>
                                <a href="<?= BASE_URL ?>/products" class="obrien-button primary-btn">Mua ngay</a>
                                <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2021/12/15"></div>
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
                                <h2 class="title-1 text-uppercase">Các món ăn</h2>
                                <div class="desc-content">
                                    <p>Tất cả sản phẩm bán chạy nhất hiện đều có sẵn cho bạn và bạn có thể mua sản phẩm này từ đây bất cứ lúc nào bất kỳ nơi nào mua sắm ngay bây giờ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_wrapper grid_4">
                        <?php
                        foreach ($data['products'] as $item) :
                        ?>
                            <div class="col-lg-3 col-md-6 col-sm-12 col-custom product-area">
                                <div class="single-product position-relative">
                                    <input type="hidden" class="idproduct" value="<?= $item['idproduct'] ?>">
                                    <div class="product-image">
                                        <a class="d-block" href="<?php echo BASE_URL ?>/productdetail/show/<?= $item['slug'] ?>">
                                            <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $item['image'] ?>" alt="" class="product-image-1 w-100">
                                            <img src="" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="<?php echo BASE_URL ?>/productdetail/show/<?= $item['slug'] ?>"><?= $item['name'] ?></a></h4>
                                        </div>
                                        <div class="product-price">
                                            <span class="regular-price"><span class="price-view"><?= number_format($item['price']) ?></span>đ</span>
                                            <span class="old-price"><del class="oldprice-view"><?= number_format($item['price'] + 12500) ?></del>đ</span>
                                        </div>
                                        <?php
                                        $product_attr = $homepage->getproduct_detail_attr($item['idproduct']);
                                        $attr_id = $homepage->getproduct_type_id($item['idproduct']);
                                        if ($attr_id['attribute_id'] !== NULL) {
                                        ?>
                                            <div class="product-size animate-size mb-2">
                                                <p>Size :</p>
                                                <?php
                                                foreach ($product_attr as $size) :
                                                ?>
                                                    <input id="prod-size-<?= $size['value'] ?>-<?= $item['idproduct'] ?>" type="radio" checked data-prod="<?= $size['id'] ?> " name="option1" value="<?= $size['value'] ?>">
                                                    <label for="prod-size-<?= $size['value'] ?>-<?= $item['idproduct'] ?>" class="sd btn-value-size" id="<?= $size['value'] ?>">
                                                        <span><?= $size['value'] ?></span>
                                                    </label>
                                                <?php
                                                endforeach;
                                                ?>
                                            </div>
                                        <?php
                                        } else {
                                            echo "<div class='non-size' data-prod='" . $attr_id['id'] . "'></div> ";
                                        } ?>

                                        <div class="product-action d-flex">
                                            <a title="+ Giỏ hàng" class="add_to_cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                            <a class="addtowishlist" title="+ Yêu thích">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <div class="btn_all_prod">
                        <a href="<?= BASE_URL ?>/products" class="obrien-button primary-btn">
                            Xem tất cả
                        </a>
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
                                <h2 class="title-1 text-uppercase">Tin tức</h2>
                                <div class="desc-content">
                                    <p>Nếu bạn muốn biết về sản phẩm thì hãy theo dõi blog của chúng tôi..</p>
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
                                <?php foreach ($data['blog'] as $blog) :
                                    $date = new DateTime($blog['date']);
                                    $month = $date->format('m');
                                    $day = $date->format('d');
                                ?>

                                    <div class="single-blog">
                                        <div class="single-blog-thumb">
                                            <a href="<?= BASE_URL ?>/blogdetail/show/<?= $blog['slug'] ?>">
                                                <img src="<?= BASE_URL ?>/public/assets/images/blog/<?= $blog['image'] ?>" alt="Blog Image" class="fix-height-blog">
                                            </a>
                                        </div>
                                        <div class="single-blog-content position-relative">
                                            <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                                <span><?= $day ?></span>
                                                <span><?= $month ?></span>
                                            </div>
                                            <div class="post-meta">
                                                <span class="author">Tác giả: G6Grain</span>
                                            </div>
                                            <h2 class="post-title ">
                                                <a href="<?= BASE_URL ?>/blogdetail/show/<?= $blog['slug'] ?>"><?= $blog['title'] ?></a>
                                            </h2>
                                            <p class="desc-content hidden-text"><?= $blog['description'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once './mvc/views/block/footer.php';
    ?>

    <script>
        $(document).ready(function() {

            $('.addtowishlist').click(function() {
                let parent = $(this).parents('.single-product');
                let id_product = parent.find('.idproduct').val();
                let heart = parent.find('.addtowishlist i');
            

                $.ajax({
                    url: "<?= BASE_URL ?>/myaccount/insertwishlist",
                    method: "POST",
                    data: {
                        'action': 'addWishList',
                        'product_id': id_product
                    },
                    success: function(data) {
                        if (data.length > 1000) {
                            toastr['info']('Vui lòng đăng nhập');
                        } else {
                            let noti = JSON.parse(data);
                            toastr[noti.code](noti.noti);
                            if(noti.code == "success") {
                                heart.css('color','#E98C81');
                            }
                        }
                    }
                });
            })

            // $('.addtowishlist').click(function() {
            //     let parent = $(this).parents('.single-product');
            //     let id_product = parent.find('.idproduct');
            //     console.log(id_product);

            // })

        })
    </script>
</body>

</html>