<div class="page-header ">
    <h3 class="page-title center_page-header"> Sản phẩm </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật sản phẩm</h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" action="<?php echo BASE_URL ?>/Admin/updateproduct" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['product']['id'] ?>">
                    <div class="form-group">
                        <label for="" class="label__css">Hãng</label>
                        <select name=brandid class="form-control">
                            <option hidden>Chọn hãng</option>
                            <?php foreach ($data['category'] as $item) : ?>
                                <option value="<?= $item['id'] ?>" <?php
                                                                    if ($item['id'] == $data['product']['brandid']) {
                                                                        echo ' selected';
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>><?= $item['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br />
                    </div>

                    <div class="form-group">
                        <label for="" class="label__css">Tên</label>
                        <input type="text" name="name" class="form-control" required value="<?php echo $data['product']['name'] ?>">
                    </div>
                    <div class="form-group"> <label for="" class="label__css">Giá</label>
                        <input type="number" min="1000" name="price" class="form-control" value="<?php echo $data['product']['price'] ?>">
                    </div>
                    <div class="form-group"> <label for="" class="label__css">Ảnh</label><br />
                        <img src="<?php echo BASE_URL ?>/public/assets/image/<?php echo $data['product']['image'] ?>" alt="Ảnh không tồn tại !" width="300px" height="250px">
                    </div>
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name="image1" class="form-control" value="<?php echo $data['product']['image'] ?>">
                    <div class="form-group"> <label for="" class="label__css">Mô tả</label>
                        <textarea name="description" id="" cols="50" rows="5" class="form-control"><?php echo $data['product']['description'] ?></textarea>
                    </div>
                    <div class="form-group"> <label for="" class="label__css">Dịch vụ</label>
                        <textarea name="service" id="" cols="50" rows="5" class="form-control"><?php echo $data['product']['service'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="" class="label__css">Trạng thái </label><br />
                        <div class="wrapper">
                            <input type="radio" name="status" id="option-1" value="1" <?php echo $data['product']['status'] == 1 ? 'checked' : '' ?>>
                            <input type="radio" name="status" id="option-2" value="0" <?php echo $data['product']['status'] == 0 ? 'checked' : '' ?>>
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
        <a href="<?php echo BASE_URL?>/Admin/showProduct" class="btn btn-dark">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</div>