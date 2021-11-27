        <!-- Login Area Start Here -->
        <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Change Password</h2>
                                <p class="desc-content">Please type your username to login</p>
                            </div>
                            <form action="" method="post">
                                <div class="single-input-item mb-3">
                                    <input type="email" name="email" placeholder="Email or Username">
                                    <span class="text-danger error"><?php echo $data['data']['username_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="pass" placeholder="Enter your Password">
                                    <span class="text-danger error"><?php echo $data['data']['pass_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="newpass" placeholder="Enter Your New Password">
                                    <span class="text-danger error"><?php echo $data['data']['newpass_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="confirm_pass" placeholder="Confirm Your New Password">
                                    <span class="text-danger error"><?php echo $data['data']['confirmpass_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="<?php echo BASE_URL ?>/auth/forgetpass/" class="forget-pwd mb-3">Forget Password?</a>
                                    </div>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->