<div class="page-header ">
    <h3 class="page-title center_page-header"> Mã giảm giá </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Thêm mã giảm giá
                </h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" method="POST">
                    <div class="form-group">
                        <label for="" class="label__css">Tên mã giảm giá</label>
                        <input type="text" name="namecoupon" placeholder="Tên mã giảm giá" class="form-control">
                    </div>
                    <label for="" class="label__css">Mã giảm giá</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="coupon" name="codecoupon" placeholder="Mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" id="apply_coupon" type="button">
                                Random
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Tính năng mã</label>
                        <select name="type" id="input_select_coupon" class="form-control">
                            <option hidden>-----Chọn tính năng mã-----</option>
                            <option value="0">Giảm theo tiền</option>
                            <option value="1">Giảm theo phần trăm (%)</option>
                        </select>
                    </div>
                    <div class="form-group value1">
                        <label for="" class="label__css">Số (%) giảm</label>
                        <input type="number" name="coupon_value" placeholder="Số (%) giảm" class="form-control" id="value1">
                    </div>
                    <div class="form-group value2" style="display:none;">
                        <label for="" class="label__css">Số tiền giảm</label>
                        <input type="text" name="" id="price" class="form-control" placeholder="Số tiền giảm" id="value2">
                        <input hidden type="number" id="price_new" name="price_new">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Số lượng</label>
                        <input type="text" name="quantity" placeholder="Số lượng" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Số tiền tối thiểu</label>
                        <input type="text" name="price_coupon" class="form-control" id="value2">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Ngày hết hạn</label>
                        <input type="date" name="date_out" min="<?= date('Y-m-d'); ?>" class="form-control" id="value2">
                    </div>
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
                    <a href="<?php echo BASE_URL ?>/admin/showcategory" class="btn btn-dark">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#apply_coupon').on('click', function() {
            $.get("<?= BASE_URL ?>/admin/getcoupon", function(data) {
                $('#coupon').val(data);
            });
        });


        $('#input_select_coupon').change(function(e) {
            var input_select = $('#input_select_coupon').val();
            if (input_select == '0') {
                $('.value2').show();
                $('#value2').attr({
                    name: 'coupon_value',
                });
                $('.value1').hide();
                $('#value1').attr({
                    name: '',
                });
            } else {
                $('.value1').show();
                $('#value1').attr({
                    name: 'coupon_value',
                });
                $('.value2').hide();
                $('#value2').attr({
                    name: '',
                });
            }
        })

        $("#price").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            if(n>=0){
                $('#price').val(n.toLocaleString("de-DE"));
                $('#price_new').val(n);
            }
            if(isNaN(n)){
                $('#price').val('');
            }
        });
    });
</script>