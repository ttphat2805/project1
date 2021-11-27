<div class="my-account-wrapper mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-custom">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                    Orders</a>
                                <a href="#wishlist" data-toggle="tab"><i class="fa fa-cloud-download"></i>
                                    Món ăn yêu thích</a>
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                                    Payment
                                    Method</a>
                                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                    address</a>
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i>
                                    Đổi mật khẩu
                                </a>
                                <a href="<?= BASE_URL ?>/auth/logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8 col-custom">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong>Alex Aya</strong> (If Not <strong>Aya !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                        </div>
                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Pending</td>
                                                        <td>$3000</td>
                                                        <td><a href="cart.html" class="btn obrien-button-2 primary-color rounded-0">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>July 22, 2018</td>
                                                        <td>Approved</td>
                                                        <td>$200</td>
                                                        <td><a href="cart.html" class="btn obrien-button-2 primary-color rounded-0">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>June 12, 2019</td>
                                                        <td>On Hold</td>
                                                        <td>$990</td>
                                                        <td><a href="cart.html" class="btn obrien-button-2 primary-color rounded-0">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Món ăn yêu thích</h3>
                                        <div class="myaccount-table table-responsive text-center" id="js_wishlist_get">
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Payment Method</h3>
                                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Billing Address</h3>
                                        <address>
                                            <p><strong>Alex Aya</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                        <a href="#" class="btn obrien-button-2 primary-color rounded-0"><i class="fa fa-edit mr-2"></i>Edit Address</a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Đổi mật khẩu</h3>
                                        <div class="account-details-form">
                                            <form enctype="" method="post" role="">
                                                <div class="row">
                                                    <div class="single-input-item mb-3">
                                                        <label for="display-name" class="required mb-1">Địa chỉ Email</label>
                                                        <input type="email" name="email" id="display-name" placeholder="Nhập email..." />
                                                        <span class="text-danger error"><?php echo $data['data']['username_error'] ?></span>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="password" class="required mb-1">Mật khẩu cũ</label>
                                                        <input type="password" name="pass" placeholder="Nhập mật khẩu...">
                                                        <span class="text-danger error"><?php echo $data['data']['pass_error'] ?></span>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="display-name" class="required mb-1">Mật khẩu mới</label>
                                                        <input type="password" name="newpass" placeholder="Nhập mật khẩu mới...">
                                                        <span class="text-danger error"><?php echo $data['data']['newpass_error'] ?></span>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="display-name" class="required mb-1">Xác nhận mật khẩu</label>
                                                        <input type="password" name="confirm_pass" placeholder="Xác nhận mật khẩu...">
                                                        <span class="text-danger error"><?php echo $data['data']['confirmpass_error'] ?></span>
                                                    </div>

                                            </form>
                                            <div class="single-input-item single-item-button">
                                                <button id="btn_changepw" class="btn obrien-button primary-btn">Đổi mật khẩu</button>
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
</div>

<script>
    $(document).ready(function() {
        function fetch_wishlist() {
            // show product in wishlist
            $.ajax({
                url: "<?= BASE_URL ?>/myaccount/getwishlist",
                method: "POST",
                success: function(data) {
                    $("#js_wishlist_get").html(data);
                },
            });
        }
        fetch_wishlist();
        $(document).on("click", ".btn_del_wishlist", function(e) {
            let id_product = $(this).attr("id");
            $.ajax({
                url: "<?= BASE_URL ?>/myaccount/deletewishlist",
                method: "POST",
                data: {
                    'id_product': id_product
                },
                success: function(data) {
                    fetch_wishlist();
                }
            })
        })
    })
</script>