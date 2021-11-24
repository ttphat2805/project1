        <!-- Login Area Start Here -->
        <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Create Account</h2>
                                <p class="desc-content">Please Register using account detail bellow.</p>
                            </div>
                            <form action="<?php echo BASE_URL.'/auth/register' ?>" method="post">
                                <div class="single-input-item mb-3">
                                    <input type="text" name="firstname" placeholder="First Name">
                                    <span class="text-danger error"><?php echo $data['data']['first_name_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="text" name="lastname" placeholder="Last Name">
                                    <span class="text-danger error"><?php echo $data['data']['last_name_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="email" name="email" placeholder="Email or Username">
                                    <span class="text-danger error"><?php echo $data['data']['email_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="pass" placeholder="Enter your Password">
                                    <span class="text-danger error"><?php echo $data['data']['pass_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="repass" placeholder="Confirm Password">
                                    <span class="text-danger error"><?php echo $data['data']['repass_error'] ?></span>
                                </div>
                                <div class="single-input-item mb-3">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Subscribe Our Newsletter</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->