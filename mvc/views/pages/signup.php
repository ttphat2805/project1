<!-- Login Area Start Here -->
<div class="login-register-area mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Đăng ký</h2>
                        <p class="desc-content"></p>
                    </div>
                    <form action="<?php echo BASE_URL . '/auth/register' ?>" method="post">
                        <div class="single-input-item mb-3 ht_un">
                            <input type="text" name="lastname" placeholder="Nhập tên...">
                            <span class="text-danger error"><?php echo $data['data']['last_name_error'] ?></span>
                        </div>
                        <div class="single-input-item mb-3 ml-3" style="width:50%;display:inline-block">
                            <input type="text" name="firstname" placeholder="Nhập họ...">
                            <span class="text-danger error"><?php echo $data['data']['first_name_error'] ?></span>
                        </div>

                        <div class="single-input-item mb-3">
                            <input type="email" name="email" id="email" placeholder="Nhập email...">
                            <span class="text-danger error error-register-email"><?php echo $data['data']['email_error'] ?></span>

                        </div>
                        <div class="single-input-item mb-3">
                            <input type="password" name="pass" placeholder="Nhập mật khẩu...">
                            <span class="text-danger error"><?php echo $data['data']['pass_error'] ?></span>
                        </div>
                        <div class="single-input-item mb-3">
                            <input type="password" name="repass" placeholder="Xác nhận mật khẩu...">
                            <span class="text-danger error"><?php echo $data['data']['repass_error'] ?></span>
                        </div>
                        <div class="single-input-item mb-3">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                <div class="remember-meta mb-3">
                                    <div class="forget-password">
                                        <span>Bạn đã có tài khoản?</span> <a href="<?php echo BASE_URL . '/auth/login' ?>" style="color:#E98C81" class="sign-up">Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-input-item mb-3">
                            <button class="btn obrien-button-2 primary-color">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#email').keyup(function() {
            let email = $('#email').val();
            var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var text = $('.error-register-email');
            if (email.match(pattern)) {
                $('#email').css('border', '1px solid #28a745');
            } else {
                $('#email').css('border', '1px solid red');
            }
            $.ajax({
                url: "<?= BASE_URL ?>/auth/checkexistemail",
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
    })
</script>