        <!-- Single Product Main Area Start -->
        <div class="single-product-main-area">
            <div class="container container-default custom-area">
                <div class="row">

                    <div class="col-lg-5 col-custom">
                        <div class="product-details-img horizontal-tab">
                            <div class="product-slider popup-gallery product-details_slider" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".pd-slider-nav"
                        }'>
                                <div class="single-image border background-zoom" onmousemove="zoom(event)" style="background-image: url('<?php echo BASE_URL ?>/public/assets/images/product/<?= $data['productdetails']['image'] ?>')">
                                    <div class="single-image border">
                                        <a href="">
                                            <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $data['productdetails']['image'] ?>" alt="Product">
                                        </a>
                                    </div>
                                </div>

                                <?php
                                foreach ($data['gallery'] as $img) :
                                ?>
                                    <div class="single-image border background-zoom" onmousemove="zoom(event)" style="background-image: url('<?php echo BASE_URL ?>/public/assets/images/product/<?= $img['gallery'] ?>')">
                                        <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $img['gallery'] ?>" alt="Product">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="pd-slider-nav product-slider" data-slick-options='{
                        "slidesToShow": 3,
                        "asNavFor": ".product-details_slider",
                        "focusOnSelect": true,
                        "arrows" : false,
                        "spaceBetween": 30,
                        "vertical" : false
                        }' data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                            {"breakpoint":1200, "settings": {"slidesToShow": 4}},
                            {"breakpoint":992, "settings": {"slidesToShow": 4}},
                            {"breakpoint":575, "settings": {"slidesToShow": 3}}
                        ]'>

                                <div class="single-thumb border">
                                    <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?php echo $data['productdetails']['image'] ?>" alt="Product thumnail">
                                </div>
                                <?php
                                foreach ($data['gallery'] as $img) :
                                ?>
                                    <div class="single-thumb border">
                                        <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $img['gallery'] ?>" alt="Product thumnail">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-custom">
                        <form action="<?= BASE_URL ?>/cart/addcart/<?= $data['productdetails']['idproduct'] ?>" method="post">
                            <input type="hidden" class="valueid" value="<?= $data['productdetails']['idproduct'] ?>">
                            <form action="<?= BASE_URL ?>/cart/addcart/<?= $data['productdetails']['idproduct'] ?>" method="post" class="parent_productid">
                                <input type="hidden" id="value_idproduct" value="<?= $data['productdetails']['idproduct'] ?>">
                                <input type="hidden" value="<?= $data['productdetails']['name'] ?>">
                                <div class="product-summery position-relative">
                                    <div class="product-head mb-3">
                                        <h2 class="product-title">
                                            <?php echo $data['productdetails']['name'] ?>
                                        </h2>
                                    </div>
                                    <div class="price-box mb-2">
                                        <span class="regular-price"><span class="price-view"><?= number_format($data['productdetails']['price']) ?> </span> VNĐ</span>
                                        <span class="old-price"><del class="oldprice-view"><?= number_format($data['productdetails']['price'] + 12500) ?></del>VNĐ</span>
                                    </div>
                                    <div class="product-rating mb-3">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="sku mb-3">
                                        <span>Lượt xem: <?php echo $data['productdetails']['views'] ?></span>
                                    </div>
                                    <p class="desc-content mb-5">
                                        <?php echo $data['productdetails']['description'] ?>
                                    </p>
                                    <div>Số lượng còn lại là: <span class="quantity_view">
                                            <?php echo $data['productdetails']['quantity'] ?>
                                        </span></div>
                                    <?php
                                    if ($data['product_type']['attribute_id'] !== NULL) {
                                    ?>
                                        <div class="product-meta">
                                            <div class="product-size mb-4">
                                                <p>Size :</p>
                                                <?php
                                                foreach ($data['productdetailattr'] as $size) :
                                                ?>
                                                    <input id="prod-size-<?= $size['value'] ?>" type="radio" name="option1" value="<?= $size['value'] ?>">
                                                    <label for="prod-size-<?= $size['value'] ?>" class="sd btn-value-size" id="<?= $size['value'] ?>">
                                                        <span><?= $size['value'] ?></span>
                                                    </label>
                                                    <!-- Button trigger modal -->

                                                <?php
                                                endforeach;
                                                ?>
                                            </div>
                                            <!-- <button type="button" class="btn mb-2" data-toggle="modal" data-target="#exampleModal">
                                                    Xem tham khảo size
                                        </button> -->

                                        </div>
                                    <?php } ?>
                                    <div class="quantity-with_btn mb-4">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="0" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-to_cart mb-4">
                                        <input type="submit" value="Mua ngay" name="btn_submit" class="btn obrien-button primary-btn" href="">
                                        <a class="btn obrien-button-2 treansparent-color pt-0 pb-0 addwishlistdetail">+ Yêu thích</a>
                                    </div>
                                    <div class="social-share mb-4">
                                        <span>Share :</span>
                                        <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                                        <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                                        <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                <div class="row mt-no-text">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Bình luận</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-text" id="myTabContent">
                            <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                                <div class="desc-content">
                                    <p class="mb-3">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
                                    <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Start Single Content -->
                                <div class="product_tab_content  border p-3 ">
                                    <div class="review_address_inner comment_show_ajax">
                                    </div>
                                    <!-- End CMT-->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-custom">
                                                <form method="post" class="comment-form-area">
                                                    <div class="row comment-input">
                                                    </div>
                                                    <div class="comment-form-comment mb-3">
                                                        <label>Comment</label>
                                                        <textarea class="comment-notes get_comment" name="content" required="required"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit">
                                                        <div class="comment-submit btn obrien-button primary-btn">OK</div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product Main Area End -->
        <!-- Product Area Start Here -->
        <div class="product-area mb-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Sản phẩm liên quan</h2>
                            <div class="desc-content">
                                <p>You can check the related product for your shopping collection.</p>
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
                                            <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/08/3-1.png" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">
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
                                            <h4 class="title-2"> <a href="product-details.html">Product dummy name</a></h4>
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
                                            <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/08/3-1.png" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
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
                                            <h4 class="title-2"> <a href="product-details.html">Product dummy title</a></h4>
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
                                            <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/08/3-1.png" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/6.jpg" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                    </div>
                                    <div class="label-product">
                                        <span class="label-sale position-absolute text-uppercase text-white text-center d-block">Soldout</span>
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
                                            <h4 class="title-2"> <a href="product-details.html">Product dummy title</a></h4>
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
                                            <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/08/3-1.png" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/8.jpg" alt="" class="product-image-2 position-absolute w-100">
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
                                            <h4 class="title-2"> <a href="product-details.html">Product dummy name</a></h4>
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
                                            <img src="https://demo2wpopal.b-cdn.net/poco/wp-content/uploads/2020/08/3-1.png" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/10.jpg" alt="" class="product-image-2 position-absolute top-0 left-0">
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
                                            <h4 class="title-2"> <a href="product-details.html">Product dummy title</a></h4>
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

        </div>

        <!-- Product Area End Here -->
        <script>
            $(document).ready(function() {

                $(".btn-value-size").click(function() {
                    let size = $(this).attr('id');
                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/change_price/${size}`,
                        method: "POST",
                        data: {
                            'size': size,
                        },
                        success: function(data) {
                            $('.price-view').html(data);
                        }
                    });
                })


                $(".btn-value-size").click(function() {
                    let size = $(this).attr('id');
                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/change_oldprice/${size}`,
                        method: "POST",
                        data: {
                            'size': size,
                        },
                        success: function(data) {
                            $('.oldprice-view').html(data);
                        }
                    });
                })


                $(".btn-value-size").click(function() {
                    let size = $(this).attr('id');
                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/change_quantitysize/${size}`,
                        method: "POST",
                        data: {
                            'size': size,
                        },
                        success: function(data) {
                            $('.quantity_view').html(data);
                        }
                    });
                })
                // WISHLIST DETAIL

                $('.addwishlistdetail').click(function() {
                    let id_product = $('.valueid').val();
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
                            }
                        }
                    });
                })

                function fetchcmt() {
                    // alert('hi');

                    let id = $('#value_idproduct').val();
                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/showcmt/${id}`,
                        method: "POST",
                        success: function(data) {
                            $('.comment_show_ajax').html(data);
                        },
                    });
                }
                fetchcmt();

                $(".comment-submit").click(function() {
                    let idproduct = $('#value_idproduct').val();
                    let content = $('.get_comment').val();
                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/insertcmt/`,
                        method: "POST",
                        data: {
                            'action': 'addcmt',
                            'idproduct': idproduct,
                            'content': content
                        },
                        success: function(data) {
                            fetchcmt();
                        }
                    });
                })

                $(document).on('click', '.user_deletecmt', function() {
                    var parent = $(this).parents('.pro_review');
                    var id_cmt = parent.find('.getidcmt').val();
                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/userdeletecmt/`,
                        method: "POST",
                        data: {
                            'action': 'userdeletecmt',
                            'id_cmt': id_cmt,
                        },
                        success: function(data) {
                            if (data == 'ok') {} else {
                                fetchcmt();
                            }
                        }
                    });
                })

                $(document).on('click', '.user_updatecmt', function() {
                    var parent = $(this).parents('.pro_review');
                    var id_cmt = parent.find('.getidcmt').val();
                    var content_cmt = parent.find('.content').html();
                    var textcmt = $('.updatecmt');
                    var spanupdate = $('.spanupdatecmt');
                    textcmt.show();
                    spanupdate.show();
                    textcmt.val(content_cmt);
                    spanupdate.on('click', function() {
                        let content = textcmt.val();
                        $.ajax({
                            url: `<?= BASE_URL ?>/productdetail/userupdatecmt/`,
                            method: "POST",
                            data: {
                                'action': 'userupdatecmt',
                                'id_cmt': id_cmt,
                                'content': content,
                            },
                            success: function(data) {
                                if (data == 'ok') {} else {
                                    textcmt.hide();
                                    spanupdate.hide();
                                    fetchcmt();
                                }
                            }
                        });
                    })
                })
            })

            function zoom(e) {
                var zoom = e.currentTarget;
                e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
                e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
                x = (offsetX / zoom.offsetWidth) * 100
                y = (offsetY / zoom.offsetHeight) * 100
                zoom.style.backgroundPosition = x + "% " + y + "%";
            }
        </script>