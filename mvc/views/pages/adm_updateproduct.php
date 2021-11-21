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
                <form class="forms-sample" novalidate action="<?php echo BASE_URL?>/admin/updateproduct" method="POST" enctype="multipart/form-data">
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
                        <input type="number" min="10" name="price" value="<?php echo $data['product_type']['price'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Ảnh</label><br />
                        <img src="<?php echo BASE_URL ?>/public/assets/images/product/<?php echo $data['product']['image'] ?>" alt="Ảnh không tồn tại !" width="250" height="200px">
                        <input type="file" name="image" class="form-control">

                    </div>
                    <div class="form-group">
                                                                    
                        <label for="" class="label__css">Thư viện ảnh</label><br />
                        <div class="gallery_img">
                        </div>
                        <input type="file" name="gallery[]" multiple class="form-control">
                        
                    </div>
                    <div class="form-group input_quantity">
                        <label for="" class="label__css">Số lượng</label>
                        <input type="number" min="10" name="quantity" class="form-control" value="<?php echo $data['product_type']['quantity'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Mô tả</label>
                        <textarea name="description" id="" cols="50" rows="2" class="form-control"><?php echo $data['product']['description'] ?></textarea>
                    </div>
                    <div class="form-group flex-input input_size_attr">
                        <label for="" class="label__css mt-2">Size:</label>
                        <?php
                        foreach ($data['size_all'] as $size_all) {
                        ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" name="checkkkk" value="1">
                                    <input type="checkbox" name="size_value[]" id="<?= $size_all['value'] ?>" class="form-check-input" value="<?= $size_all['id'] ?>" <?php foreach ($data['size'] as $size) {                                                                   if ($size['attribute_id'] == $size_all['id']) {                                                                   echo 'checked';
                                    };}
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
                            <input type="radio" name="status" id="option-2" value="0">
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
        $('.table_attr_hide').hide();

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

    $('#btn_apply_attr').on('click', function() {
        $('.table_attr_hide').show();

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
   <?php     foreach ($data['size'] as $value) {?>

        var Size = '';


        for (var i = 0; i < arraySize.length; i++) {
            Size += `<tr>
                    <td>${arraySize[i]}</td>
                    <td><input type="number" name="price_attribute[]"  value="<?=$size['price']?>" class="form-control id="css_custom-hide"></td>
                    <td><input type="number"  name="quantity_attribute[]" value="<?=$size['quantity']?>"  class="form-control id="css_custom-hide"></td>
                    </tr>`
        }
        table_tbody_js.html(Size);
        <?php }?>
    })

    function load_gallery(){
            var id = $('input[name="id"]').val();
            $.ajax({
            url: `<?= BASE_URL ?>/admin/load_gallery/${id}`,
            method: "POST",
            data: {
                'id': id,
            },
            success: function(data) {
                console.log(data);
                $('.gallery_img').html(data);
            }
            });
    }
    load_gallery();
    function getIdimg(){
            let idimg= $('input[name="closegallery"]:checked').val();
            alert(idimg);
            $.ajax({
                url:`<?=BASE_URL?>/admin/delimg/${idimg}`,
                method:"POST",
                data:{
                    'idimg':idimg
                },
                success:function(data){
                    load_gallery();
                }
            });
        }
</script>