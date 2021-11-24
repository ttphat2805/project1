        <!-- Login Area Start Here -->
        <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Forget password</h2>
                                <p class="desc-content">Please type your username</p>
                            </div>
                            <form action="#" method="post">
                                <div class="single-input-item mb-3">
                                    <input type="email" name="email" placeholder="Email or Username">
                                    <span class="text-danger error"><?php echo $data['data']['email_error'] ?></span>
                                </div>
                               
                               
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color">Gửi mật khẩu mới</button>
                                </div>
                                <div class="single-input-item">
                                    <a href="<?php echo BASE_URL ?>/auth/register">Creat Account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->