<div class="page-header ">
    <h3 class="page-title center_page-header"> Bình luận </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chi tiết bình luận</h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" action="<?php echo BASE_URL ?>/admin/updatecomment" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['infocomment']['idcmt'] ?>">
                    <div class="form-group row align-items-center">
                        <label for="" class="col-sm-3 custom-form-label">Họ tên: </label>
                        <div class="col-sm-9">
                            <span> <?= $data['infocomment']['fullname'] ?></span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-sm-3 custom-form-label">Email: </label>
                        <div class="col-sm-9">
                            <span> <?= $data['infocomment']['email'] ?></span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-sm-3 custom-form-label">Nội dung: </label>
                        <div class="col-sm-9">
                            <span class="italic"> <?= $data['infocomment']['content'] ?></span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-sm-3 custom-form-label">Ngày: </label>
                        <div class="col-sm-9">
                            <span> <?= $data['infocomment']['date'] ?></span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-sm-3 custom-form-label">Sản phẩm: </label>
                        <div class="col-sm-9">
                            <span> <?= $data['infocomment']['name'] ?></span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-sm-3 custom-form-label">Ảnh: </label>
                        <div class="col-sm-9">
                            <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $data['infocomment']['image'] ?>" alt="" width="150px" height="120px">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-sm-3 custom-form-label">Trạng thái: </label>
                        <div class="wrapper mt-4 ml-1">
                            <input type="radio" name="status" id="option-1" value="1" <?= $data['infocomment']['status'] == 1 ? 'checked' : '' ?>>
                            <input type="radio" name="status" id="option-2" value="0" <?= $data['infocomment']['status'] == 0 ? 'checked' : '' ?>>
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
                    <a href="<?php echo BASE_URL ?>/admin/showcomment" class="btn btn-dark">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</div>