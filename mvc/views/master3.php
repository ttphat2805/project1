<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/public/assets/images/logoweb.png">
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assetsadmin/css/style.css">
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assetsadmin/css/custom.css">
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assetsadmin/css/table.css">

    
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  

    <!-- End layout styles -->

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="<?php echo BASE_URL; ?>/admin"><img src=" <?php echo BASE_URL; ?>/public/assetsadmin/image/logo-white.png" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="index.html"><img src=" <?php echo BASE_URL; ?>/public/assetsadmin/image/logo-white.png" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="http://windows79.com/wp-content/uploads/2021/02/Thay-the-hinh-dai-dien-tai-khoan-nguoi-dung-mac.png" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">Hi <b><?= $_SESSION['user_infor']['user_name']
                                                                            ?></b>
                                </h5>
                                <span>
                                    <?php
                                    if ($_SESSION['user_infor']['user_role'] == 1) {
                                        echo 'admin';
                                    } else {
                                        echo 'Superadmin';
                                    }

                                    ?>

                                </span>
                            </div>
                        </div>
                        <?php
                        class orderstt extends db
                        {
                            function sttorder($id)
                            {
                                $query = "SELECT COUNT(*) as 'count' FROM orders WHERE status = ?";
                                $stmt = $this->conn->prepare($query);
                                $stmt->execute([$id]);
                                return $stmt->fetch()['count'];
                            }
                        }
                        $orderstt = new orderstt();
                        ?>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link"></span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/homepage">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Tổng quan</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/member">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                        <span class="menu-title">Thành viên</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/showcategory">
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Danh mục</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/showproduct">
                        <span class="menu-icon">
                            <i class="mdi mdi-food"></i>
                        </span>
                        <span class="menu-title">Sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/showattr">
                        <span class="menu-icon">
                            <i class="mdi mdi-format-size"></i>
                        </span>
                        <span class="menu-title">Thuộc tính</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/showcoupon">
                        <span class="menu-icon">
                            <i class="mdi mdi-format-size"></i>
                        </span>
                        <span class="menu-title">Mã giảm giá</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-cart"></i>
                        </span>
                        <span class="menu-title">Đơn hàng</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL ?>/admin/order/unprogress">Chưa xử lý (<?= $orderstt->sttorder('1') ?>)</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL ?>/admin/order/processing"> Đang xử lý (<?= $orderstt->sttorder('2') ?>)</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL ?>/admin/order/progress">Đang giao hàng (<?= $orderstt->sttorder('3') ?>)</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL ?>/admin/order/progressed">Đã giao hàng (<?= $orderstt->sttorder('4') ?>)</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/showcomment">
                        <span class="menu-icon">
                            <i class="mdi mdi-comment-check-outline"></i>
                        </span>
                        <span class="menu-title">Bình luận</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/showblog">
                        <span class="menu-icon">
                            <i class="mdi mdi-comment-check-outline"></i>
                        </span>
                        <span class="menu-title">Bài viết</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/admin/showchat">
                        <span class="menu-icon">
                            <i class="mdi mdi-comment-check-outline"></i>
                        </span>
                        <span class="menu-title">Chat</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-line"></i>
                        </span>
                        <span class="menu-title">Thống kê</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>">
                        <span class="menu-icon">
                            <i class="mdi mdi-web"></i>
                        </span>
                        <span class="menu-title">Về Website</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src=" <?php echo BASE_URL; ?>/public/assetsadmin/image/logomb.png" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="#">
                                <i class="mdi mdi-view-grid"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email"></i>
                                <span class="count bg-success"></span>
                            </a>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="count bg-danger"></span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="http://windows79.com/wp-content/uploads/2021/02/Thay-the-hinh-dai-dien-tai-khoan-nguoi-dung-mac.png" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">admin</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Thông tin</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="<?php echo BASE_URL; ?>/auth/logout">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Đăng xuất</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <?php
                    require_once './mvc/views/admin/' . $data['pages'] . '.php';
                    ?>

                </div>
                <?php
                require_once './mvc/views/block/footeradmin.php';
                ?>
            </div>
        </div>
    </div>

</body>

</html>