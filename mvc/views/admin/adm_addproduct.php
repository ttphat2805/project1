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
                        <label for="" class="label__css">Danh mục</label>
                        <select name="categoryid" class="form-control" id="select_category">
                            <option hidden>Chọn danh mục</option>
                            <?php foreach ($data['category'] as $item) : ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br />
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group input_price">
                        <label for="" class="label__css ">Giá</label>
                        <input type="number" min="10" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Ảnh</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Thư viện ảnh</label>
                        <input type="file" name="gallery[]" multiple class="form-control">
                    </div>
                    <div class="form-group input_quantity">
                        <label for="" class="label__css">Số lượng</label>
                        <input type="number" min="10" name="quantity" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Mô tả</label>
                        <textarea name="description" id="" cols="50" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group flex-input input_size_attr" style="display:none;">
                        <label for="" class="label__css mt-2">Size:</label>
                        <?php
                        foreach ($data['size'] as $size) {
                        ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="size_value[]" id="<?= $size['value']?>"class="form-check-input click-input" value="<?= $size['id'] ?>"><?= $size['value'] ?></label>
                            </div>
                        <?php }?>
                    </div>
                    <div class="form-group table_attr_hide" style="display:none;">
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
    $('.click-input').on('click', function() {
        $('.table_attr_hide').show();

        var input_checkbox = $('.form-check-input');
        var arraySize = [];
        var table_tbody_js = $('.table_tbody_js');
        for (var i = 0; i < input_checkbox.length; i++) {
            if (input_checkbox[i].checked === true) {
                var value_checkbox = input_checkbox[i].id;
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
                    <td><input type="number" name="price_attribute[]" class="form-control id="css_custom-hide"></td>
                    <td><input type="number" name="quantity_attribute[]" class="form-control id="css_custom-hide"></td>
                    </tr>`
        }
        table_tbody_js.html(Size);
    })
</script>