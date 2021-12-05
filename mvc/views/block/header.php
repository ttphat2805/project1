<header class="main-header-area">
    <!-- Header Top Area End Here -->
    <!-- Main Header Area Start -->
    <div class="main-header">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                            <div class="header-logo d-flex align-items-center">
                                <a href="<?php echo BASE_URL; ?>">
                                    <img class="img-full" src="<?php echo BASE_URL; ?>/public/assets/images/logo/logo.png" alt="Logo" height="100px">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-7 position-static d-none d-lg-block col-custom">
                            <nav class="main-nav d-flex justify-content-center">
                                <ul class="nav">
                                    <li>
                                        <a class="ahrefactive" href="<?= BASE_URL ?>/">
                                            <span class="menu-text">Trang chủ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ahrefactive" href="<?= BASE_URL ?>/about">
                                            <span class="menu-text"> Giới thiệu</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ahrefactive" href="<?php echo BASE_URL; ?>/products">
                                            <span class="menu-text">Cửa hàng</span>
                                        </a>

                                    </li>
                                    <li>
                                        <a class="ahrefactive" href="<?= BASE_URL ?>/blog">
                                            <span class="menu-text"> Tin tức</span>
                                        </a>

                                    </li>


                                    <li>
                                        <a class="ahrefactive" href="<?php echo BASE_URL; ?>/contact">
                                            <span class="menu-text">Liên hệ</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                            <div class="header-right-area main-nav">
                                <ul class="nav">
                                    <li class="login-register-wrap d-xl-flex">
                                        <?php
                                        if (isset($_SESSION['user_infor']['user_name'])) {
                                        ?>
                                            <a class="hello_account" href="<?= BASE_URL ?>/myaccount"> Chào: <?= $_SESSION['user_infor']['user_name'] ?></a>
                                        <?php
                                        } ?>
                                        <a href="<?= BASE_URL ?>/myaccount" class="login-register-btn">
                                            <i class="ion-person"></i>
                                        </a>
                                        <?php
                                        if (!isset($_SESSION['user_infor']['user_name'])) {
                                        ?>
                                            <div class="login-register-wrapper dropdown-sidemenu dropdown-hover-2">
                                                <ul class="ahrefactive">
                                                    <li> <a href="<?php echo BASE_URL . '/auth/login' ?>">Đăng nhập</a> </li>
                                                    <li> <a href="<?php echo BASE_URL . '/auth/register' ?>">Đăng ký</a> </li>
                                                </ul>
                                            </div>
                                    </li>
                                <?php
                                        }
                                ?>
                                <li class="minicart-wrap">
                                    <a href="#" class="minicart-btn toolbar-btn">
                                        <i class="ion-bag"></i>
                                        <span class="cart-item_count"><?php echo $_SESSION['cart_number'] ??'0' ?></span>
                                    </a>
                                    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                        
                                        <?php if(isset($_SESSION['cart_Item'])){
                                            $total = 0;
                                                foreach( $_SESSION['cart_Item'] as $item) {
                                                    $total += $item['total'];
                                                ?>  
                                                    <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="<?= BASE_URL.'/public/assets/images/product/'.$item['image'] ?>" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html"><?= $item['name'] ?></a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span><?= $item['quantity'] ?>×</span>
                                                        <span class="cart-price"><?= number_format($item['total']) ?>VNĐ</span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                }}
                                            ?>
                                        <div class="cart-price-total d-flex justify-content-between">
                                            <h5>Total :</h5>
                                            <h5><?= number_format($total) ?>VNĐ</h5>
                                        </div>
                                        <div class="cart-links d-flex justify-content-center">
                                            <a class="obrien-button white-btn" href="<?= BASE_URL ?>/cart">giỏ hàng</a>
                                            <a class="obrien-button white-btn" href="<?= BASE_URL ?>/order">Thanh toán</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mobile-menu-btn d-lg-none">
                                    <a class="off-canvas-btn" href="#">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area End -->
    <!-- Sticky Header Start Here-->
    <div class="main-header header-sticky">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                            <div class="header-logo">
                                <a href="<?= BASE_URL ?>">
                                    <img class="img-full" src="<?php echo BASE_URL; ?>/public/assets/images/logo/logo.png" alt="Logo" height="100px">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-7 position-static d-none d-lg-block col-custom">
                            <nav class="main-nav d-flex justify-content-center">
                                <ul class="nav">
                                    <li>
                                        <a class="ahrefactive" href="<?php echo BASE_URL; ?>/">
                                            <span class="menu-text"> Trang chủ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ahrefactive" href="<?= BASE_URL ?>/about">
                                            <span class="menu-text"> Giới thiệu</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ahrefactive" href="<?php echo BASE_URL; ?>/products">
                                            <span class="menu-text">Cửa hàng</span>
                                        </a>

                                    </li>
                                    <li>
                                        <a class="ahrefactive" href="<?= BASE_URL ?>/blog">
                                            <span class="menu-text"> Tin tức</span>
                                        </a>

                                    </li>


                                    <li>
                                        <a class="ahrefactive" href="<?php echo BASE_URL; ?>/contact">
                                            <span class="menu-text">Liên hệ</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                            <div class="header-right-area main-nav">
                                <ul class="nav">
                                    <li class="login-register-wrap d-xl-flex">
                                        <?php
                                        if (isset($_SESSION['user_infor']['user_name'])) {
                                        ?>
                                            <a class="hello_account" href="<?= BASE_URL ?>/myaccount"> Chào: <?= $_SESSION['user_infor']['user_name'] ?>
                                            </a>
                                        <?php
                                        } ?>
                                        <a href="<?= BASE_URL ?>/myaccount" class="login-register-btn">
                                            <i class="ion-person"></i>
                                        </a>
                                        <?php
                                        if (!isset($_SESSION['user_infor']['user_name'])) {
                                        ?>
                                            <div class="login-register-wrapper dropdown-sidemenu dropdown-hover-2">
                                                <ul class="">
                                                    <li> <a href="<?php echo BASE_URL . '/auth/login' ?>">Đăng nhập</a> </li>
                                                    <li> <a href="<?php echo BASE_URL . '/auth/register' ?>">Đăng ký</a> </li>
                                                </ul>
                                            </div>
                                    </li>
                                <?php
                                        }
                                ?>
                                <li class="minicart-wrap">
                                    <a href="#" class="minicart-btn toolbar-btn">
                                        <i class="far fa-shopping-cart"></i>
                                        <span class="cart-item_count"><?php echo $_SESSION['cart_number'] ?? '0' ?></span>
                                    </a>
                                    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                        
                                        <?php if(isset($_SESSION['cart_Item'])){
                                            $total = 0;
                                                foreach( $_SESSION['cart_Item'] as $item) {
                                                    $total += $item['total'];
                                                ?>  
                                                    <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="<?= BASE_URL.'/public/assets/images/product/'.$item['image'] ?>" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html"><?= $item['name'] ?></a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span><?= $item['quantity'] ?>×</span>
                                                        <span class="cart-price"><?= number_format($item['total']) ?>VNĐ</span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                }}
                                            ?>
                                        <div class="cart-price-total d-flex justify-content-between">
                                            <h5>Total :</h5>
                                            <h5><?= number_format($total) ?>VNĐ</h5>
                                        </div>
                                        <div class="cart-links d-flex justify-content-center">
                                            <a class="obrien-button white-btn" href="<?= BASE_URL ?>/cart">giỏ hàng</a>
                                            <a class="obrien-button white-btn" href="<?= BASE_URL ?>/order">Thanh toán</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mobile-menu-btn d-lg-none">
                                    <a class="off-canvas-btn" href="#mobileMenu">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sticky Header End Here -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper" id="mobileMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="fa fa-times"></i>
            </div>
            <div class="off-canvas-inner">
                <!-- 
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search product...">
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div> -->
                <div class="header-top-settings offcanvas-curreny-lang-support">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <?php if (isset($_SESSION['user_infor']['user_name'])) : ?>
                                <a href="<?= BASE_URL ?>/myaccount">

                                    <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Clipart.png" alt="" width="30px" height="25px" style="margin-right:5px">
                                    Chào: <?= $_SESSION['user_infor']['user_name'] ?>
                                </a>
                            <?php else : ?>

                                <li class="menu-item-has-children"><a href="#">Tài khoản</a><br>

                                    <ul class="dropdown">
                                        <li><a href="<?php echo BASE_URL . '/auth/login' ?>">Đăng nhập</a></li>
                                        <li><a href="<?php echo BASE_URL . '/auth/login' ?>">Đăng ký</a></li>
                                    </ul>
                                <?php endif; ?>
                                </li>

                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobiel-menu">
                            <li>
                                <a class="ahrefactive" href="<?php echo BASE_URL; ?>/">
                                    <span class="menu-text"> Trang chủ</span>
                                </a>
                            </li>
                            <li>
                                <a class="ahrefactive" href="<?= BASE_URL ?>/about">
                                    <span class="menu-text"> Giới thiệu</span>
                                </a>
                            </li>
                            <li>
                                <a class="ahrefactive" href="<?php echo BASE_URL; ?>/products">
                                    <span class="menu-text">Cửa hàng</span>
                                </a>

                            </li>
                            <li>
                                <a class="ahrefactive" href="<?= BASE_URL ?>/blog">
                                    <span class="menu-text"> Tin tức</span>
                                </a>

                            </li>


                            <li>
                                <a class="ahrefactive" href="<?php echo BASE_URL; ?>/contact">
                                    <span class="menu-text">Liên hệ</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="top-info-wrap text-left text-black">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="info@yourdomain.com">+84 364 303 994</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="info@yourdomain.com">G6Food@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
</header>

<!-- SMS BOX -->

<button class="box-sms">
    <i class="fal fa-comment-dots"></i>
</button>