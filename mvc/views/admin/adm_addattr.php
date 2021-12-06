<div class="page-header ">
    <h3 class="page-title center_page-header"> Thuộc tính </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Thêm thuộc tính
                </h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" method="POST">
                    <div class="form-group">
                        <select name="name_value" id="input_select_attr" class="form-control">
                            <option value="base">Đế bánh</option>
                            <option value="size">Kích cỡ</option>
                        </select>
                    </div>
                    <div class="form-group value1">
                        <label for="" class="label__css">Loại Đế</label>
                        <input type="text" name="attr_value" class="form-control" id="value1" >
                    </div>
                    <div class="form-group value2" style="display:none;">
                        <label for="" class="label__css">Loại kích cỡ</label>
                        <input type="text" name="" class="form-control" id="value2">
                    </div>

                    <input type="submit" value="Thêm" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/showattr" class="btn btn-dark">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
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