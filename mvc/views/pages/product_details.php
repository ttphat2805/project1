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
                        <div class="single-image border">
                            <a href="">
                                <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?php echo $data['productdetails']['image'] ?>" alt="Product">
                            </a>
                        </div>

                        <?php
                        foreach ($data['productdetailall'] as $img) :
                        ?>
                            <div class="single-image border">
                                <a href="">
                                    <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $img['gallery'] ?>" alt="Product">
                                </a>
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
                        foreach ($data['productdetailall'] as $img) :
                        ?>
                            <div class="single-thumb border">
                                <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $img['gallery'] ?>" alt="Product thumnail">
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-custom">
                <div class="product-summery position-relative">
                    <div class="product-head mb-3">
                        <h2 class="product-title">
                            <?php echo $data['productdetails']['name'] ?>
                        </h2>
                    </div>
                    <div class="price-box mb-2">
                        <span class="regular-price"> <?= number_format($data['productdetails']['price']) ?> VNĐ</span>
                        <span class="old-price"><del><?= number_format($data['productdetails']['price'] + 15000) ?> VNĐ</del></span>
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
                    <?php
                    if ($data['product_type']['attribute_id'] !== NULL) {
                    ?>
                        <div class="product-meta">
                            <div class="product-size mb-4">
                                <p>Size :</p>
                                <?php
                                foreach ($data['productdetailattr'] as $size) :
                                ?>
                                    <input class="" id="prod-size-<?= $size['value'] ?>" type="radio" name="option1" value="<?= $size['value'] ?>">
                                    <label for="prod-size-<?= $size['value'] ?>" class="sd">
                                        <span><?= $size['value'] ?></span>
                                    </label>
                                <?php
                                endforeach;
                                ?>
                            </div>
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
                        <a class="btn obrien-button primary-btn" href="cart.html">Mua ngay</a>
                        <a class="btn obrien-button-2 treansparent-color pt-0 pb-0" href="wishlist.html">+ Yêu thích</a>
                    </div>
                    <div class="social-share mb-4">
                        <span>Share :</span>
                        <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                        <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                        <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                        <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-no-text">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Mô tả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" id="review-tab" data-toggle="tab" href="#connect-4" role="tab" aria-selected="false">ABC</a>
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
                        <div class="product_tab_content  border p-3">
                            <div class="review_address_inner">
                                <!-- Start Single Review -->
                                <div class="pro_review mb-5">
                                    <div class="review_thumb">
                                        <img alt="review images" src="assets/images/review/1.jpg">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info mb-2">
                                            <div class="product-rating mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h5>Admin - <span> December 19, 2020</span></h5>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                            </div>
                            <!-- Start RAting Area -->
                            <div class="rating_wrap">
                                <h5 class="rating-title-1 mb-2">Add a review </h5>
                                <p class="mb-2">Your email address will not be published. Required fields are marked *</p>
                                <h6 class="rating-title-2 mb-2">Your Rating</h6>
                                <div class="rating_list mb-4">
                                    <div class="review_info">
                                        <div class="product-rating mb-3">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End RAting Area -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12 col-custom">
                                        <form action="#" class="comment-form-area">
                                            <div class="row comment-input">
                                                <div class="col-md-6 col-custom comment-form-author mb-3">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text" required="required" name="Name">
                                                </div>
                                                <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="text" required="required" name="email">
                                                </div>
                                            </div>
                                            <div class="comment-form-comment mb-3">
                                                <label>Comment</label>
                                                <textarea class="comment-notes" required="required"></textarea>
                                            </div>
                                            <div class="comment-form-submit">
                                                <input type="submit" value="Submit" class="comment-submit btn obrien-button primary-btn">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                    <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="shipping-policy">
                            <h4 class="title-3 mb-4">Shipping policy for our store</h4>
                            <p class="desc-content mb-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate</p>
                            <ul class="policy-list mb-2">
                                <li>1-2 business days (Typically by end of day)</li>
                                <li><a href="#">30 days money back guaranty</a></li>
                                <li>24/7 live support</li>
                                <li>odio dignissim qui blandit praesent</li>
                                <li>luptatum zzril delenit augue duis dolore</li>
                                <li>te feugait nulla facilisi.</li>
                            </ul>
                            <p class="desc-content mb-2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
                            <p class="desc-content mb-2">claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per</p>
                            <p class="desc-content mb-2">seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                        <div class="size-tab table-responsive-lg">
                            <h4 class="title-3 mb-4">Size Chart</h4>
                            <table class="table border">
                                <tbody>
                                    <tr>
                                        <td class="cun-name"><span>UK</span></td>
                                        <td>18</td>
                                        <td>20</td>
                                        <td>22</td>
                                        <td>24</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>European</span></td>
                                        <td>46</td>
                                        <td>48</td>
                                        <td>50</td>
                                        <td>52</td>
                                        <td>54</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>usa</span></td>
                                        <td>14</td>
                                        <td>16</td>
                                        <td>18</td>
                                        <td>20</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Australia</span></td>
                                        <td>28</td>
                                        <td>10</td>
                                        <td>12</td>
                                        <td>14</td>
                                        <td>16</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Canada</span></td>
                                        <td>24</td>
                                        <td>18</td>
                                        <td>14</td>
                                        <td>42</td>
                                        <td>36</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
<!-- Product Area End Here -->