<div class="page-header ">
    <h3 class="page-title center_page-header"> Thuộc tính</h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật thuộc tính</h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" action="<?php echo BASE_URL ?>/admin/updateattribute" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['attribute']['id'] ?>">
                    <div class="form-group">
                    <select name="name_value" id="input_select_attr" class="form-control">
                            <option value="base" <?php if($data['attribute']['name'] == 'base'){
                                echo 'selected';
                            }?>>Đế bánh</option>
                            <option value="size" <?php if($data['attribute']['name'] == 'size'){
                                echo 'selected';
                            }?>>Kích cỡ</option>
                        </select>
                    </div>
                    
                    <div class="form-group value1">
                        <label for="" class="label__css">Loại Đế</label>
                        <input type="text" name="attr_value" class="form-control" id="value1" value="<?php echo $data['attribute']['value'] ?>">
                    </div>
                    <div class="form-group value2" style="display:none;">
                        <label for="" class="label__css">Loại kích cỡ</label>
                        <input type="text" name="" class="form-control" id="value2" value="<?php echo $data['attribute']['value'] ?>">
                    </div>
                    <input type="submit" value="Cập nhật" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/showattr" class="btn btn-dark">Trở về</a>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var input_select = $('#input_select_attr').val();
    if(input_select == 'size'){
        $('.value2').show();
            $('#value2').attr({
                name: 'attr_value',
            });
            $('.value1').hide();
            $('#value1').attr({
                name: '',
            });
    }
    $('#input_select_attr').change(function(e) {
        var input_select = $('#input_select_attr').val();
        if (input_select == 'size') {
            $('.value2').show();
            $('#value2').attr({
                name: 'attr_value',
            });
            $('.value1').hide();
            $('#value1').attr({
                name: '',
            });
        }else{
            $('.value1').show();
            $('#value1').attr({
                name: 'attr_value',
            });
            $('.value2').hide();
            $('#value2').attr({
                name: '',
            });
        }
    })
</script>