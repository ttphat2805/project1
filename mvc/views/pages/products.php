<!-- Shop Main Area Start Here -->
<div class="shop-main-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-9 col-12 col-custom widget-mt">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"><i class="fa fa-th"></i></button>
                    </div>
                    <div class="shop-select">
                        <form class="d-flex flex-column w-100" action="#">
                            <div class="form-group">
                                <!-- <select class="form-control nice-select w-100">
                                  
                                </select> -->
                            </div>
                        </form>
                    </div>
                </div>
                <!--shop toolbar end-->
                <!-- Shop Wrapper Start -->
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
                        return $stmt->fetchAll();
                    }
                }
                $homepage = new homepage();

                ?>
                <div class="row shop_wrapper grid_3">
                    <!-- <?php
                            foreach ($data['products'] as $item) :
                            ?>
                        <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                            <div class="single-product position-relative">
                                <input type="hidden" class="idproduct" value="<?= $item['idproduct'] ?>">
                                <div class="product-image">
                                    <a class="d-block" href="<?php echo BASE_URL ?>/productdetail/show/<?= $item['slug'] ?>">
                                        <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $item['image'] ?>" alt="" class="product-image-1 w-100">
                                    </a>
                                </div>
                                <div class="product-content">

                                    <div class="product-title" style="padding-top:10px">
                                        <h4 class="title-2"> <a href="<?php echo BASE_URL ?>/productdetail/show/<?= $item['slug'] ?>"><?= $item['name'] ?></a>
                                    
                                    </h4>
                                    <?php 
                                    $product_attr = $homepage->getproduct_detail_attr($item['idproduct']);
                                    $attr_id = $homepage->getproduct_type_id($item['idproduct']);
                                    if ($attr_id[0]['attribute_id'] != '') {
                                    ?>
                                        <div class="product-size">
                                            <p>Size :</p>
                                            <?php
                                            foreach ($product_attr as $size) :
                                            ?>
                                                <input id="prod-size-<?= $size['value'] ?>-<?= $item['idproduct'] ?>" type="radio" checked name="option1" data-prod="<?= $size['id'] ?>" value="<?= $size['attribute_id'] ?> ">
                                                <label for="prod-size-<?= $size['value'] ?>-<?= $item['idproduct'] ?>" class="sd btn-value-size" id="<?= $size['value'] ?>">
                                                    <span><?= $size['value'] ?></span>
                                                </label>
                                            <?php
                                            endforeach;
                                            ?>
                                        </div>
                                    <?php
                                    } else {
                                        echo "<div class='non-size' data-prod='".$attr_id[0]['id']."'></div>";
                                    } ?>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price"><span class="price-view"><?= number_format($item['price']) ?> </span> VNĐ</span>
                                        <span class="old-price"><del class="oldprice-view"><?= number_format($item['price'] + 12500) ?></del>VNĐ</span>
                                    </div>
                                </div>

                                <div class="add-action d-flex position-absolute">
                                    <a title="Add To cart" class="add_to_cart">
                                        <i class="ion-bag"></i>
                                    </a>
                                    <a class="addtowishlist" title="Add To Wishlist">
                                        <i class="ion-ios-heart-outline"></i>
                                    </a>
                                </div>
                                <div class="product-content-listview">

                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="<?php echo BASE_URL ?>/productdetail/show/<?= $item['slug'] ?>"><?= $item['name'] ?></a></h4>
                                    </div>

                                    <div class="price-box">
                                        <span class="regular-price"><span class="price-view"><?= number_format($item['price']) ?> </span> VNĐ</span>
                                        <span class="old-price"><del class="oldprice-view"><?= number_format($item['price'] + 12500) ?></del>VNĐ</span>
                                    </div>
                                    <p class="desc-content">
                                        <?= $item['description'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                            endforeach;
                    ?> -->
                </div>
                <!-- Shop Wrapper End -->
                <!-- Bottom Toolbar Start -->
                <!-- <div class="row">
                    <div class="col-sm-12 col-custom">
                        <div class="toolbar-bottom mt-30">
                            <nav class="pagination pagination-wrap mb-10 mb-sm-0">
                                <ul class="pagination">
                                    <li class="disabled prev">
                                        <i class="ion-ios-arrow-thin-left"></i>
                                    </li>
                                    <li class="active"><a>1</a></li>
                                    <li>
                                        <a href="#">2</a>
                                    </li>
                                    <li class="next">
                                        <a href="#" title="Next >>"><i class="ion-ios-arrow-thin-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                            <p class="desc-content text-center text-sm-right">Showing 1 - 12 of 34 result</p>
                        </div>
                    </div>
                </div> -->
                <!-- Bottom Toolbar End -->
            </div>
            <div class="col-lg-3 col-12 col-custom">
                <!-- Sidebar Widget Start -->
                <aside class="sidebar_widget widget-mt">
                    <div class="widget_inner">
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Tìm kiếm</h3>
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="text" id="clearvalue" class="form-control search-products" placeholder="Tìm món ăn của bạn...">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Danh mục</h3>
                            <!-- Widget Menu Start -->
                            <nav>
                                <ul class="mobile-menu p-0 m-0 parent-category">
                                    <?php
                                    foreach ($data['category'] as $category) {
                                    ?>
                                        <li class="menu-item-has-children single-category"><a href="" class="btn-category"><?= $category['name'] ?>
                                            </a>
                                            <input type="hidden" class="get-id-category" value="<?= $category['id'] ?>">
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                            <!-- Widget Menu End -->
                        </div>
                        <div class="widget-list widget-mb-4">
                            <h3 class="widget-title">Món ăn nổi bật</h3>
                            <div class="sidebar-body">
                                <div class="sidebar-product align-items-center">
                                    <a href="product-details.html" class="image">
                                        <img src="assets/images/product/small-product/1.jpg" alt="product">
                                    </a>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Product dummy name</a></h4>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-product align-items-center">
                                    <a href="product-details.html" class="image">
                                        <img src="assets/images/product/small-product/2.jpg" alt="product">
                                    </a>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Product dummy title</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$50.00</span>
                                            <span class="old-price"><del>$60.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-product align-items-center">
                                    <a href="product-details.html" class="image">
                                        <img src="assets/images/product/small-product/3.jpg" alt="product">
                                    </a>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Product title here</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$40.00</span>
                                            <span class="old-price"><del>$50.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Main Area End Here -->
<script>
    $(document).ready(function() {
        function fetchproducts() {
            let page = $('input[name="page"]:checked').val();
            var search = $('.search-products').val();
            let parent = $(this).parents('.single-category');
            let id_category = parent.find('.get-id-category').val();
            $.ajax({
                url: "<?= BASE_URL ?>/products/fetchproducts",
                method: "POST",
                data: {
                    'action': 'load_product',
                    'page': page,
                    'search': search,
                    'id_category': id_category,
                },
                success: function(data) {
                    $(".row.shop_wrapper").html(data);
                },
            });
        }

        fetchproducts();

        // PANIGATION

        $(document).on('click', '.pd_page', function() {
            fetchproducts();
        })

        // SEARCH PRODUCTS
        $('.search-products').keyup(function() {
            var search = $('.search-products').val();
            let parent = $(this).parents('.single-category');
            let id_category = parent.find('.get-id-category').val();
            $.ajax({
                url: "<?= BASE_URL ?>/products/fetchproducts",
                method: "POST",
                data: {
                    'action': 'search',
                    'search': search,
                    'id_category': id_category,
                },
                success: function(data) {
                    $(".row.shop_wrapper").html(data);
                },
            });
        })

        // FILLTER CATEGORY

        $('.btn-category').click(function(e) {
            e.preventDefault();
            var search = $('.search-products').val();

            let parent = $(this).parents('.single-category');
            let id_category = parent.find('.get-id-category').val();
            $.ajax({
                url: "<?= BASE_URL ?>/products/fetchproducts",
                method: "POST",
                data: {
                    'action': 'filletcategory',
                    'id_category': id_category,
                    'search': search,

                },
                success: function(data) {
                    $(".row.shop_wrapper").html(data);
                },
            });
        })

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
                        toastr['info']('Vui lòng đăng nhập');
                    } else {
                        let noti = JSON.parse(data);
                        toastr[noti.code](noti.noti);
                    }
                }
            });
        })

        $(document).on('click', '.btn-search-value', function() {
            var clearvalue = $('#clearvalue').val();
        })
    })
</script>
