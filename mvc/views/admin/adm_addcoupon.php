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
                <form class="forms-sample" method="POST">
                    <div class="form-group">
                        <label for="" class="label__css">Tên mã giảm giá</label>
                        <input type="text" name="name" placeholder="Tên mã giảm giá" class="form-control">
                    </div>
                    <label for="" class="label__css">Mã giảm giá</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="coupon" name="code" placeholder="Mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" id="apply_coupon" type="button">
                                Random
                            </button>
                        </div>
                    </div>
                   
                    <div class="form-group value2">
                        <label for="" class="label__css">Số tiền giảm</label>
                        <input type="text" name="" id="discout" class="form-control" placeholder="Số tiền giảm" >
                        <input hidden type="number" id="value2" name="coupon_value" class="acp_value">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Số lượng</label>
                        <input type="text" name="quantity" placeholder="Số lượng" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Số tiền tối thiểu</label>
                        <input type="text" id="min_order" name="min_order" class="form-control" >
                        <input hidden type="number" id="min_order_new" name="min_order_new" class="form-control">
                        <span class="noti-min-order"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Ngày tạo</label>
                        <input type="date" name="date_created" min="<?= date('Y-m-d'); ?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Ngày hết hạn</label>
                        <input type="date" name="date_out" min="<?= date('Y-m-d'); ?>" class="form-control">
                    </div>
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
                    <input type="submit" value="Thêm" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/showcoupon" class="btn btn-dark">Trở về</a>
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

        $("#discout").on('keyup', function() {
            var min_order = $('#min_order_new').val();
            var n = parseInt($(this).val().replace(/\D/g, ''), 10);
            // CHECK MIN ORDER
            if(min_order !== '' && n >= min_order) {
                $('.noti-min-order').html('Đơn hàng tối thiếu phải lớn hơn số tiền giảm giá');
            }else{
                $('.noti-min-order').html('');
            }
            // FORMAT PRICE
            if (n >= 0) {
                $('#discout').val(n.toLocaleString("it-IT"));
                $('.acp_value').val(n);
            }
            if (isNaN(n)) {
                $('#discout').val('');
            }
        });
        $("#min_order").on('keyup', function() {
            var discount = $('.acp_value').val();
            var min_order = parseInt($(this).val().replace(/\D/g, ''), 10);
            // CHECK MIN ORDER
            if(min_order <= discount){
                $('.noti-min-order').html('Đơn hàng tối thiếu phải lớn hơn số tiền giảm giá');
            }else{
                $('.noti-min-order').html('');
            }
            // FORMAT PRICE
            if (min_order >= 0) {
                $('#min_order').val(min_order.toLocaleString("it-IT"));
                $('#min_order_new').val(n);
            }
            if (isNaN(min_order)) {
                $('#min_order').val('');
            }
        });
    });
</script>