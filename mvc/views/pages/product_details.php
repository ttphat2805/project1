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
                                <div class="single-image border background-zoom">
                                    <div class="single-image border">
                                        <a href="">
                                            <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $data['productdetails']['image'] ?>" alt="Product" class="fix-height-1">
                                        </a>
                                    </div>
                                </div>

                                <?php
                                foreach ($data['gallery'] as $img) :
                                ?>
                                    <div class="single-image border background-zoom">
                                        <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $img['gallery'] ?>" alt="Product" class="fix-height-1">
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
                                    <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?php echo $data['productdetails']['image'] ?>" class="fix-height" alt="Product thumnail">
                                </div>
                                <?php
                                foreach ($data['gallery'] as $img) :
                                ?>
                                    <div class="single-thumb border">
                                        <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $img['gallery'] ?>" alt="Product thumnail" class="fix-height">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-custom">
                        <?php //var_dump($data['product_type']); 
                        ?>
                        <form action="<?= BASE_URL ?>/cart/addcart/<?= $data['productdetails']['idproduct'] ?>" method="post">
                            <input type="hidden" class="valueid" value="<?= $data['productdetails']['idproduct'] ?>">
                            <input type="hidden" class="valueid" value="<?= $data['productdetails']['idproduct'] ?>">
                            <form action="<?= BASE_URL ?>/cart/addcart/<?= $data['productdetails']['idproduct'] ?>" method="post" class="parent_productid">
                                <input type="hidden" id="value_idproduct" value="<?= $data['productdetails']['idproduct'] ?>">
                                <div class="product-summery position-relative">
                                    <div class="product-head mb-3">
                                        <h2 class="product-title">
                                            <?php echo $data['productdetails']['name'] ?>
                                        </h2>
                                    </div>
                                    <div class="price-box mb-2">
                                        <span class="regular-price"><span class="price-view"><?= number_format($data['productdetails']['price']) ?></span>??</span>
                                        <span class="old-price"><del class="oldprice-view"><?= number_format($data['productdetails']['price'] + 12500) ?></del>??</span>
                                    </div>
                                    <div class="product-rating mb-3">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="sku mb-3">
                                        <span>L?????t xem: <?php echo $data['productdetails']['views'] ?></span>
                                    </div>
                                    <p class="desc-content mb-5">
                                        <?php echo $data['productdetails']['description'] ?>
                                    </p>
                                    <div class="quantity_remaining">S??? l?????ng c??n l???i l??: <span class="quantity_view">
                                            <?php echo $data['productdetails']['quantity'] ?>
                                        </span></div>
                                    <?php
                                    if ($data['product_type'][0]['attribute_id']) :

                                    ?>
                                        <div class="product-meta">

                                            <div class="product-size mb-4">

                                                <p>Tr???ng l?????ng: </p>
                                                <?php
                                                foreach ($data['productdetailattr'] as $size) :

                                                ?>
                                                    <input id="prod-size-<?= $size['value'] ?>" type="radio" checked data-prod="<?= $size['id'] ?> " name="option1" value="<?= $size['id'] ?>" placeholder="aax">
                                                    <label for="prod-size-<?= $size['value'] ?>" class="sd btn-value-size" id="<?= $size['value'] ?>">
                                                        <span><?= $size['value'] ?></span>
                                                    </label>
                                                <?php
                                                endforeach;
                                                ?>
                                            </div>

                                        </div>
                                    <?php
                                    else :
                                        echo "<input type='hidden' name='option1' value='" . $data['product_type'][0]['id'] . "'>";
                                    // $output .= "<div class='non-size' data-prod='".$attr_id['id']."'></div>";
                                    endif; ?>
                                    <div class="box-promotion">
                                        <p class="box_promotion_header">
                                            Voucher ?????c bi???t t??? 'G6Grain' (SL c?? h???n)
                                        </p>
                                        <div class="box_promotion_main">
                                            <ul>
                                                <li>
                                                    <p>Nh???p m?? <strong>G6GRAIN10K&nbsp;</strong>
                                                        - Gi???m 10k cho ????n t??? 95k
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>Nh???p m?? <strong>G6GRAIN20K&nbsp;</strong>
                                                        - Gi???m 20K cho ????n t??? 180K
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>Nh???p m?? <strong>G6GRAIN40K&nbsp;</strong>
                                                        - Gi???m 40K cho ????n t??? 360K
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="quantity-with_btn mb-4">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" name="quantity" value="1" type="text" data-max="<?= $data['productdetails']['quantity'] ?>">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-to_cart mb-4 mt-3">
                                        <input type="submit" value="Mua ngay" name="btn_submit" class="btn obrien-button primary-btn" href="">
                                        <a class="btn obrien-button-2 treansparent-color pt-0 pb-0 addwishlistdetail">+ Y??u th??ch</a>
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
                                <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#connect-1" role="tab" aria-selected="true">M?? t???</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#connect-2" role="tab" aria-selected="false">B??nh lu???n</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-text" id="myTabContent">
                            <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                                <div class="desc-content">
                                    <p class="">* Mua Pizza size M ho???c L k??m n?????c u???ng nguy??n gi?? ???????c gi???m 70% cho b??nh Pizza th??? 2 c??ng size c?? gi?? b???ng ho???c th???p h??n Pizza th??? nh???t.
                                        * ??p d???ng cho Mua Mang V??? & Giao H??ng T???n N??i t???t c??? c??c ng??y trong tu???n.</p>
                                    <p>* Gi??: 89K/pizza d??ng Favorite (size M). Th??m 20K/pizza v?? 50K/pizza ????? n??ng l??n d??ng Premium v?? Signature.

                                        * Gi??: 139K/pizza d??ng Favorite (size L). Th??m 30K/pizza v?? 70K/pizza ????? n??ng l??n d??ng Premium v?? Signature.

                                        * ??p d???ng khi mua 02 pizza ?????ng th???i.</p>
                                    <p>* Combo 209K cho 2 ng?????i g???m 1 pizza size M d??ng Premium + 1 ph???n m??n ph??? + 1 chai n?????c (390ml)

                                        * Combo 289K cho 3-4 ng?????i g???m 1 pizza size L d??ng Favorite + 2 ph???n m??n ph??? + 2 chai n?????c (390ml)

                                        * Combo 319K cho 3-4 ng?????i g???m 1 pizza size L d??ng Premium + 2 ph???n m??n ph??? + 1 chai n?????c (1.5L)</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="product_tab_content  border p-3 ">
                                    <!-- START CMT -->
                                    <div class="review_address_inner comment_show_ajax">
                                    </div>
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <?php if (isset($_SESSION['user_infor'])) : ?>
                                                <div class="col-lg-12 col-custom">
                                                    <form method="post" class="comment-form-area">
                                                        <div class="row comment-input">
                                                        </div>
                                                        <div class="comment-form-comment mb-3">
                                                            <label>????nh gi?? (<i class="fal fa-star"></i>)</label>
                                                            <textarea class="comment-notes get_comment" name="content" required="required"></textarea>
                                                        </div>
                                                        <div class="comment-form-submit">
                                                            <div class="comment-submit btn obrien-button primary-btn">G???i ngay</div>
                                                        </div>
                                                        <div class="comment-form-submit">
                                                            <div class="comment-update btn obrien-button primary-btn" style="display: none">C???p nh???t</div>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php else : ?>
                                                <div class="comment-constraint mt-4">
                                                    <p class="">Ch??? nh???ng kh??ch h??ng ???? ????ng nh???p m???i c?? th??? ????a ra ????nh gi?? (*)</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product Main Area End -->
        <?php
        class homepage extends db
        {
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
        <!-- Product Area Start Here -->
        <div class="product-area mb-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">S???n ph???m li??n quan</h2>
                            <div class="desc-content">
                                <p>
                                    B???n c?? th??? ki???m tra s???n ph???m li??n quan cho b??? s??u t???p mua s???m c???a b???n.</p>
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
                            foreach ($data['product_related'] as $trend) :
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
                                            if ($attr_id['attribute_id'] !== NULL) {
                                            ?>
                                                <div class="product-size animate-size mb-2">
                                                    <p>Tr???ng l?????ng: </p>
                                                    <?php
                                                    foreach ($product_attr as $size) :
                                                    ?>
                                                        <input id="prod-size-<?= $size['value'] ?>-<?= $trend['idproduct'] ?>" type="radio" name="option1" value="<?= $size['value'] ?>">
                                                        <label for="prod-size-<?= $size['value'] ?>-<?= $trend['idproduct'] ?>" class="sd btn-value-size" id="<?= $size['value'] ?>">
                                                            <span><?= $size['value'] ?></span>
                                                        </label>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </div>
                                            <?php

                                            } ?>
                                            <div class="product-title">
                                                <h4 class="title-2"> <a href="<?php echo BASE_URL ?>/productdetail/show/<?= $trend['slug'] ?>"><?= $trend['name'] ?></a></h4>
                                            </div>
                                            <div class="product-price">
                                                <span class="regular-price "><?= number_format($trend['price']); ?>??</span>
                                                <span class="old-price"><del><?= number_format($trend['price'] + 12500);
                                                                                ?>??</del></span>
                                            </div>
                                            <div class="product-action d-flex">
                                                <a title="+ Gi??? h??ng" class="add_to_cart">
                                                    <i class="ion-bag"></i>
                                                </a>
                                                <a class="addtowishlist" title="+ Y??u th??ch">
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
                    let id = $('.valueid').val();

                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/change_price/`,
                        method: "POST",
                        data: {
                            'size': size,
                            'id': id,
                        },
                        success: function(data) {
                            $('.price-view').html(data);
                        }
                    });
                })


                $(".btn-value-size").click(function() {
                    let size = $(this).attr('id');
                    let id = $('.valueid').val();
                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/change_oldprice/`,
                        method: "POST",
                        data: {
                            'size': size,
                            'id': id,

                        },
                        success: function(data) {
                            $('.oldprice-view').html(data);
                        }
                    });
                })


                $(".btn-value-size").click(function() {
                    let size = $(this).attr('id');
                    let id = $('.valueid').val();

                    $.ajax({
                        url: `<?= BASE_URL ?>/productdetail/change_quantitysize/`,
                        method: "POST",
                        data: {
                            'size': size,
                            'id': id,
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
                                toastr['info']('Vui l??ng ????ng nh???p');
                            } else {
                                let noti = JSON.parse(data);
                                toastr[noti.code](noti.noti);
                            }
                        }
                    });
                })
                // FETCH COMMENT
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


                // INSERT COMMENT
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
                            $('.get_comment').val('');
                        }
                    });
                })
                // USER - DELETE COMMENT
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
                            if (data == 'ok') {

                            } else {
                                fetchcmt();
                            }
                        }
                    });
                })

                // WISHLIST
                // WISHLIST
                $(document).on('click', '.addtowishlist', function() {
                    let parent = $(this).parents('.single-product');
                    let id_product = parent.find('.idproduct').val();
                    // alert(parent);
                    $.ajax({
                        url: "<?= BASE_URL ?>/myaccount/insertwishlist",
                        method: "POST",
                        data: {
                            'action': 'addWishList',
                            'product_id': id_product
                        },
                        success: function(data) {
                            if (data.length > 1000) {
                                toastr['info']('Vui l??ng ????ng nh???p');
                            } else {
                                let noti = JSON.parse(data);
                                toastr[noti.code](noti.noti);
                            }
                        }
                    });
                })
                // USER - UPDATE COMMENT

                $(document).on('click', '.user_updatecmt', function() {
                    let content = $('.get_comment');
                    var parent = $(this).parents('.pro_review');
                    var id_cmt = parent.find('.getidcmt').val();
                    var content_cmt = parent.find('.content').html();
                    var comment_update = $('.comment-update');
                    comment_update.show();
                    $('.comment-submit').hide()
                    content.val(content_cmt);
                    comment_update.on('click', function() {
                        let contentupdatecmt = content.val();
                        $.ajax({
                            url: `<?= BASE_URL ?>/productdetail/userupdatecmt`,
                            method: "POST",
                            data: {
                                'action': 'userupdatecmt',
                                'id_cmt': id_cmt,
                                'content': contentupdatecmt,
                            },
                            success: function(data) {
                                if (data == 'ok') {

                                } else {
                                    fetchcmt();
                                    $('.comment-submit').show()
                                    comment_update.hide();
                                    content.val('');
                                }
                            }
                        });
                    })
                })
            })
            // ZOOM IMAGE
            function zoom(e) {
                var zoom = e.currentTarget;
                e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
                e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
                x = (offsetX / zoom.offsetWidth) * 100
                y = (offsetY / zoom.offsetHeight) * 100
                zoom.style.backgroundPosition = x + "% " + y + "%";
            }
        </script>