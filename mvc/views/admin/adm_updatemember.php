<div class="page-header ">
    <h3 class="page-title center_page-header"> Thành viên</h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin thành viên: <b> <?=$data['memberid']['fullname']?></b></h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" action="<?php echo BASE_URL ?>/admin/updatemember" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['memberid']['id'] ?>">

                    <div class="form-group">
                        <label for="" class="label__css">Họ tên:</label>
                        <input type="text" id="" name="fullname" class="form-control" value="<?php echo $data['memberid']['fullname'] ?>"
                        <?php
                        if(isset($_SESSION['checkroleadmin']) && $_SESSION['checkroleadmin'] == $data['memberid']['fullname']){
                            echo '';
                        }else{
                            echo 'disabled';
                        }
                        ?>
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="label__css">Số điện thoại:</label>
                        <input type="text" id="" name="mobile" class="form-control" value="<?php echo $data['memberid']['mobile'] ?>"
                        <?php
                        if(isset($_SESSION['checkroleadmin']) && $_SESSION['checkroleadmin'] == $data['memberid']['fullname']){
                            echo '';
                        }else{
                            echo 'disabled';
                        }
                        ?>
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="label__css">Email:</label>
                        <input type="text" id="" name="email" class="form-control" value="<?php echo $data['memberid']['email'] ?>"
                        <?php
                        if(isset($_SESSION['checkroleadmin']) && $_SESSION['checkroleadmin'] == $data['memberid']['fullname']){
                            echo '';
                        }else{
                            echo 'disabled';
                        }
                        ?>
                        >
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Địa chỉ:</label>
                        <textarea class="form-control" rows="4" name="address" value=""
                        <?php
                        if(isset($_SESSION['checkroleadmin']) && $_SESSION['checkroleadmin'] == $data['memberid']['fullname']){
                            echo '';
                        }else{
                            echo 'disabled';
                        }
                        ?>
                        ><?php echo $data['memberid']['address']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Vai trò:</label><br />
                        <div class="wrapper">
                            <input type="radio" name="role" id="option-3" value="1" <?= $data['memberid']['role'] == 1 ? 'checked' : '' ?>>
                            <input type="radio" name="role" id="option-4" value="0" <?= $data['memberid']['role'] == 0 ? 'checked' : '' ?>>
                            <label for="option-3" class="option option-3">
                                <div class="dot"></div>
                                <span>Admin</span>
                            </label>
                            <label for="option-4" class="option option-4">
                                <div class="dot"></div>
                                <span>Khách hàng</span>
                            </label>
                        </div><br>
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Trạng thái:</label><br />
                        <div class="wrapper">
                            <input type="radio" name="status" id="option-1" value="1" <?= $data['memberid']['status'] == 1 ? 'checked' : '' ?>>
                            <input type="radio" name="status" id="option-2" value="0" <?= $data['memberid']['status'] == 0 ? 'checked' : '' ?>>
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>Active</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>Unactive</span>
                            </label>
                        </div><br>
                    </div>
                    <input type="submit" value="Cập nhật" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/member" class="btn btn-dark">Trở về</a>

                </form>
            </div>
        </div>
    </div>
</div>