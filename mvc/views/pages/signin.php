        <!-- Login Area Start Here -->
        <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-3">
                                <h2 class="title-4 mb-2">Đăng nhập</h2>
                                <p class="desc-content">Hãy đăng nhập tài khoản của bạn.</p>
                            </div>
                            <div class="social-container mb-3">
                                <a href="https://www.facebook.com/v12.0/dialog/oauth?client_id=4520117901402470&redirect_uri=<?php echo BASE_URL; ?>/auth/facebooklogin&scope=public_profile" class="social1"><i class="fab fa-facebook-f"></i></a>
                                <a href="<?php echo $data['data']['google_login_url'] ?>" class="social2"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                            <form action="" method="post">
                                <div class="single-input-item mb-3">
                                    <input type="email" name="email" placeholder="Nhập email...">
                                    <span class="text-danger error"><?php echo $data['data']['username_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="pass" placeholder="Nhập mật khẩu...">
                                    <span class="text-danger error"><?php echo $data['data']['pass_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta mb-3">
                                            <div class="forget-password">
                                                <span>Bạn chưa có tài khoản?</span> <a href="<?php echo BASE_URL ?>/auth/register" style="color:#E98C81" class="sign-up">Đăng ký</a>
                                            </div>
                                        </div>
                                        <a href="<?php echo BASE_URL ?>/auth/forgetpass/" class="forget-pwd mb-3">Quên mật khẩu?</a>
                                    </div>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color">Đăng nhập</button><br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>