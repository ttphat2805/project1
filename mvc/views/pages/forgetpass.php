        <!-- Login Area Start Here -->
        <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Quên mật khẩu</h2>
                                <p class="desc-content">Hãy điền vào email của bạn...</p>
                            </div>
                            <form action="" method="post">
                                <div class="single-input-item mb-3">
                                    <input type="email" name="email" placeholder="Nhập email...">
                                    <span class="text-danger error"><?php echo $data['data']['email_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color">Lấy lại mật khẩu</button>
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta mb-3">
                                            <div class="forget-password">
                                                <span>Bạn chưa có tài khoản?</span> <a href="<?php echo BASE_URL ?>/auth/register" style="color:#E98C81" class="sign-up">Đăng ký</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->