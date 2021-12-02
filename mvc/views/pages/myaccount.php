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
                                <a href="#cartdetail" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Đơn hàng</a>
                                <a href="#wishlist" data-toggle="tab"><i class="fa fa-cloud-download"></i>
                                    Món ăn yêu thích</a>
                                <a href="#detailaccount" data-toggle="tab"><i class="fas fa-user-plus"></i>
                                    Tài khoản chi tiết</a>
                                <?php
                                if (isset($_SESSION['user_infor']['user_role']) && $_SESSION['user_infor']['user_role'] >= 1) {
                                ?>
                                    <a href="<?= BASE_URL ?>/admin"><i class="fas fa-users-cog"></i>

                                        Vào trang admin
                                    </a>
                                <?php } ?>
                                <a href="<?= BASE_URL ?>/auth/logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8 col-custom">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="cartdetail" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Đơn hàng</h3>
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

                                <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Món ăn yêu thích</h3>
                                        <div class="myaccount-table table-responsive text-center" id="js_wishlist_get">
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="detailaccount" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Chi tiết tài khoản</h3>
                                        <div class="account-details-form">
                                            <form method="POST" class="mb-4 parents-form-update">
                                                <div class="row">
                                                    <div class="col-lg-6 col-custom">
                                                        <div class="single-input-item mb-3">
                                                            <label for="first-name" class="required mb-1">Họ tên</label>
                                                            <input type="text" id="fullname" value="<?= $data['getmember']['fullname'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-custom">
                                                        <div class="single-input-item mb-3">
                                                            <label for="last-name" class="required mb-1">Số điện thoại</label>
                                                            <input type="number" id="mobile" value="<?= $data['getmember']['mobile'] ?>" />
                                                            <span class="error-update-mobile"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <label for="email" class="required mb-1">Địa chỉ Email</label>
                                                    <input type="email" id="email" value="<?= $data['getmember']['email'] ?>" />
                                                    <span class="error-update-email"></span>
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <label for="" class="required mb-1">Địa chỉ</label>
                                                    <input type="text" id="address" value="<?= $data['getmember']['address'] ?>" />
                                                </div>
                                                <span class="error-update-all"></span>

                                                <div class="single-input-item single-item-button mt-3">
                                                    <div class="btn obrien-button primary-btn btn-center btn-update-account">Cập nhật</div>
                                                </div>
                                            </form>
                                            <h3>Đổi mật khẩu</h3>

                                            <form action="">
                                                <div class="row">
                                                    <div class="single-input-item mb-3">
                                                        <label for="" class="required mb-1">Mật khẩu hiện tại</label>
                                                        <input type="password" id="password" />
                                                    </div>
                                                    <div class="col-lg-6 col-custom">
                                                        <div class="single-input-item mb-3">
                                                            <label for="" class="required mb-1">Mật khẩu mới</label>
                                                            <input type="password" id="newpassword" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-custom">
                                                        <div class="single-input-item mb-3">
                                                            <label for="" class="required mb-1">Xác nhận mật khẩu mới</label>
                                                            <input type="password" id="re-newpassword" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="noti-change-password"></span>
                                                <div class="single-input-item single-item-button mt-2">
                                                    <div class="btn obrien-button primary-btn btn-center btn-change-password">Đổi mật khẩu</div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Payment Method</h3>
                                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                    </div>
                                </div>

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
        // VALIDATE EXIST EMAIL

        $('#email').keyup(function() {
            let email = $('#email').val();
            var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var text = $('.error-update-email');
            if (email.match(pattern)) {
                $('#email').css('border', '1px solid #28a745');
            } else {
                $('#email').css('border', '1px solid red');
            }
            $.ajax({
                url: "<?= BASE_URL ?>/myaccount/checkexistemail",
                method: "POST",
                data: {
                    'action': 'checkexist',
                    'email': email,
                },
                success: function(data) {
                    text.html(data);
                    text.css('color', 'red');
                },
            });
        })

        // UPDATE ACCOUNT

        $(document).on('click', '.btn-update-account', function() {
            let parent = $(this).parents('.parents-form-update');
            let full_name = parent.find('#fullname').val();
            let mobile = parent.find('#mobile').val();
            let email = parent.find('#email').val();
            let address = parent.find('#address').val();
            var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (email.match(pattern)) {
                email = email;
            } else {
                $('.error-update-email').html('Email không đúng định dạng');
                $('.error-update-email').css('color', 'red');
                return;
            }
            if (full_name == "" || mobile == "" || email == "" || address == "") {
                $('.error-update-all').html('Bạn cần nhập đầy đủ thông tin');
                $('.error-update-all').css('color', 'red');
                return;
            } else {
                $('.error-update-all').html('');
            }
            if (mobile.length <= 9 || mobile.length > 11) {
                $('.error-update-mobile').html('Số điện thoại không đúng');
                $('.error-update-mobile').css('color', 'red');
            } else {
                $('.error-update-mobile').html('');
            }

            $.ajax({
                url: "<?= BASE_URL ?>/myaccount/updateaccount",
                type: "POST",
                data: {
                    action: 'update',
                    email: email,
                    mobile: mobile,
                    address: address,
                    full_name: full_name
                },
                success: function(data) {
                    if (data == 'ok') {
                        alert('ok');
                    } else {
                        $('.error-update-all').html('Cập nhật thành công');
                        $('.error-update-all').css('color', '#28a745');

                    }
                }
            })

        })


        // CHANGE PASSWORD
        $(document).on('click', '.btn-change-password', function() {
            let password = $('#password').val();
            let newpassword = $('#newpassword').val();
            let re_newpassword = $('#re-newpassword').val();
            $.ajax({
                url: "<?= BASE_URL ?>/myaccount/changepassword",
                method: "POST",
                data: {
                    action: 'update',
                    password: password,
                    newpassword: newpassword,
                    re_newpassword: re_newpassword,
                },
                success: function(data) {
                    $('.noti-change-password').html(data);
                    $('.noti-change-password').css('color', 'red');

                },
            });
        })





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