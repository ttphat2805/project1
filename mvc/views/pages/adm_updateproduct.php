<div class="page-header ">
    <h3 class="page-title center_page-header"> Sản phẩm </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Thêm sản phẩm
                </h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $data['product']['id'] ?>">
                        <label for="" class="label__css">Danh mục</label>
                        <select name="categoryid" class="form-control" id="select_category">
                            <option hidden>Chọn danh mục</option>
                            <?php foreach ($data['category'] as $item) : ?>
                                <option value="<?= $item['id'] ?>" <?php
                                                                    if ($item['id'] == $data['product']['categoryid']) {
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
                        <label for="" class="label__css">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" required value="<?php echo $data['product']['name'] ?>">
                    </div>
                    <div class="form-group input_price">
                        <label for="" class="label__css ">Giá</label>
                        <input type="number" min="10" name="price" class="form-control" value="<?php echo $data['product_type']['price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Ảnh</label><br />
                        <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?php echo $data['product']['image'] ?>" alt="Ảnh không tồn tại !" width="300px" height="250px">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Thư viện ảnh</label><br />
                        <?php foreach ($data['gallery'] as $img) {
                        ?>
                            <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?php echo $img['gallery'] ?>" alt="Ảnh không tồn tại !" width="100px" height="100px">
                        <?php
                        } ?>
                    </div>
                    <div class="form-group input_quantity">
                        <label for="" class="label__css">Số lượng</label>
                        <input type="number" min="10" name="quantity" class="form-control" value="<?php echo $data['product_type']['quantity'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Mô tả</label>
                        <textarea name="service" id="" cols="50" rows="2" class="form-control"><?php echo $data['product']['description'] ?></textarea>
                    </div>
                    <div class="form-group flex-input input_size_attr" style="display:none;">
                        <label for="" class="label__css mt-2">Size:</label>
                        <?php

                        foreach ($data['size_all'] as $size_all) {
                        ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="size_value[]" id="<?= $size_all['value'] ?>" class="form-check-input" value="<?= $size_all['id'] ?>" <?php foreach ($data['size'] as $size) {                                                                      if ($size['attribute_id'] ==$size_all['id']) {
                                        echo 'checked';
                                        };
                                    }
                                    ?>><?= $size_all['value'] ?></label>
                            </div>
                        <?php } ?>
                        <input type="button" value="Áp dụng" class="btn btn-secondary btn-rounded" id="btn_apply_attr">
                    </div>
                    <div class="form-group table_attr_hide">
                        <table class="table table-basic">
                            <thead>
                                <tr>
                                    <th>Thuộc tính</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody class="table_tbody_js">
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label for="" class="label__css">Trạng thái</label><br />
                        <div class="wrapper">
                            <input type="radio" name="status" id="option-1" value="1" checked>
                            <input type="radio" name="status" id="option-2" value="2">
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
                    <input type="submit" value="Thêm" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/showproduct" class="btn btn-dark">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var category = $('#select_category').val();
    if (category == 19) {
        $('.input_price').hide();
        $('.input_quantity').hide();
        $('.input_size_attr').show();
    } else {
        $('.input_price').show();
        $('.input_quantity').show();
        $('.input_size_attr').hide();
    }
    $('#select_category').change(function() {
        var category = $('#select_category').val();
        if (category == 19) {
            $('.input_price').hide();
            $('.input_quantity').hide();
            $('.input_size_attr').show();
        } else {
            $('.input_price').show();
            $('.input_quantity').show();
            $('.input_size_attr').hide();
            $('.table_attr_hide').hide();


        }
    })
    // $('.table_attr_hide').show();

    $('#btn_apply_attr').on('click', function() {

        var input_checkbox = $('.form-check-input');
        var arraySize = [];
        var table_tbody_js = $('.table_tbody_js');
        for (var i = 0; i < input_checkbox.length; i++) {
            if (input_checkbox[i].checked === true) {
                var value_checkbox = input_checkbox[i].id;
                console.log(value_checkbox);
                if (!arraySize.includes(value_checkbox)) {
                    arraySize.push(value_checkbox);
                } else if (arraySize.includes(value_checkbox)) {
                    arraySize.splice(arraySize.indexOf(`${value_checkbox}`), 1)
                }
            }
        }

        // console.log(arraySize.length);
        var Size = '';
        for (var i = 0; i < arraySize.length; i++) {
                Size += `<tr>
                    <td>${arraySize[i]}</td>
                    <td><input type="number" name="price_attribute[]" value="<?php 
                    foreach ($data['size'] as $value) {
                    echo $value['price'];}?>" class="form-control id="css_custom-hide"></td>
                    <td><input type="number" value="<?php echo $data['product_type']['quantity']?>" name="quantity_attribute[]" class="form-control id="css_custom-hide"></td>
                    </tr>`
        }
        table_tbody_js.html(Size);
    })
</script>