<style>
    .tinh{
        width: 100%;
        height: 40px;
        border: #e1e1e1 solid 1px;
    }
    .tinh option{
        height: 40px;
    }
</style>
<?php 
$total =0;
    foreach ($_SESSION['cart_Item'] as $item) { 
        $total += floatval($item['total']); 
    }
?>
        <!-- Checkout Area Start Here -->
        <div class="checkout-area">
            <div class="container container-default-2 custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-accordion">
                            
                            <h3>Bạn đã có mã giảm giá? <span id="showcoupon">Nhấn vào đây để nhập code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    
                                        <p class="checkout-coupon">
                                            <input id="coupon_code" placeholder="Coupon code" type="text" name='cou'>
                                            <input type="hidden" id="total_bill" value="<?= $total ?>">
                                            <input type="hidden" id="user_id" value="<?= $_SESSION['user_infor']['user_id'] ?>">
                                            <input class="coupon-inner_btn" value="Check Coupon" type="submit">
                                        </p>
                                        <span class="text-warning coupon_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="<?= BASE_URL ?>/order/create" method="post">
                            <input type="hidden" class="total" name="total" value="<?= $total ?>">
                            <input type="hidden" class="coupon_code" name="coupon" id="">
                            <div class="checkbox-form">
                                <h3>Thanh toán</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label> Tên <span class="required">*</span></label>
                                            <input placeholder="" name="ho" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Họ <span class="required">*</span></label>
                                            <input placeholder="" name="ten" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Tỉnh/ Thành <span class="required">*</span></label><br>
                                            <select name="tinh" id="tinh" onchange="changeTinh()" class="tinh" required>
                                                <option value="">Chọn Tỉnh/Thành</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Quận Huyện <span class="required">*</span></label>
                                            <select name="quan" id="quan" onchange="changeQuan()" class="tinh" required>
                                                <option value="">Chọn Quận/ Huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Xã/Phường <span class="required">*</span></label>
                                            <select name="phuong" id="phuong" class="tinh" required>
                                                <option value="a">a</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Phương thức thanh toán <span class="required">*</span></label>
                                            <select name="method" id="order" class="tinh">
                                                <?php foreach($data['method'] as $method) {?>
                                                    <option value="<?= $method['id'] ?>"><?= $method['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email <span class="required">*</span></label>
                                            <input placeholder="" name="email" type="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Số điện thoại <span class="required">*</span></label>
                                            <input type="text" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                                <div class="different-address">
                                    <div class="order-notes mt-3">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Ghi chú</label>
                                            <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Ghi chú vào đây.."></textarea>
                                        </div>
                                    </div>
                                    <button class="col-md-12" style="background-color: #e1e1e1; height:40px" type="submit">
                                        Đặt hàng
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Sản phẩm</th>
                                            <th class="cart-product-total">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($_SESSION['cart_Item'] as $item) { ?>
                                            <tr class="cart_item">
                                            <td class="cart-product-name"> <?= $item['name'] ?><strong class="product-quantity">
                                                × <?= $item['quantity'] ?></strong></td>
                                            <td class="cart-product-total text-center"><span class="amount"><?= number_format($item['total']) ?></span></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot class="tfoot">
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td class="text-center">
                                            <span class="amount subtotal">
                                            <?= number_format($total) ?> 
                                            </span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Tiền Ship</th>
                                            <td class="text-center"><span class="amount tienship">0 VNĐ</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng tiền</th>
                                            <td class="text-center"><strong><span class="amount total"><?= number_format($total) ?> </span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <!-- <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h5 class="panel-title mb-2">
                                                    <a href="#" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Direct Bank Transfer.
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                <div class="card-body mb-2 mt-2">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-2">
                                                <h5 class="panel-title mb-2">
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Cheque Payment
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body mb-2 mt-2">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <h5 class="panel-title mb-2">
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        PayPal
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body mb-2 mt-2">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <script>
            
    // check coupon
         $('.coupon-inner_btn').click(function () {
             let coupon_code = $('#coupon_code').val();
             let total_bill = $('#total_bill').val();
             let user_id = $('#user_id').val();
             $.ajax({
                 url: "<?= BASE_URL ?>/coupon/check",
                 type: "POST",
                 dataType: 'html',
                 data: {
                     coupon_code : coupon_code,
                     total_bill: total_bill,
                     user_id : user_id
                 }
                }).done( function (result){
                    console.log(result);
                    //$(".coupon_error").html(result)
                     result = JSON.parse(result);
                     console.log(result);
                     if(result.alert != 'success') {
                         $(".coupon_error").html(result.alert);
                     }else {
                        $(".coupon_error").html('');
                    }
                    if(result.discount === undefined){
                        $('.subtotal').html(result.old_price+ " VNĐ");
                    }else{
                        $('.subtotal').html(result.old_price+ "  - " +result.discount+" ");
                        $('.total').html(result.new_price);
                        $('.total').val(result.new_price);
                        $('.coupon_code').val(result.coupon);
                    }
                 
                 })
         })                                      
    

    //    select address
        var requests = new XMLHttpRequest();
        requests.open("GET", "https://provinces.open-api.vn/api/p/");
        requests.send();
        requests.onload = ()=>{
            
            let response = requests.response;
            response = JSON.parse(response);
            for(let i=0; i<Object.keys(response).length; i++){
                list_tinh +="<option value='"+response[i].name+"' data-code='"+response[i].code+"'>"+response[i].name+"</option>";
            }
            $("#tinh").html(list_tinh)
        }
        var tinh = document.getElementById("tinh");
       var quan = document.getElementById("quan");
       var xa = document.getElementById("phuong");
       var list_tinh = "";
       var list_quan = "";
       var list_phuong = "";
        function changeTinh(){
            quan.innerHTML = "";           
            let request = new XMLHttpRequest();
            let code_tinh = $("#tinh option:selected").data('code');
            request.open("GET", "https://provinces.open-api.vn/api/p/"+code_tinh+"?depth=2");
            request.send();
            request.onload = ()=>{
                let response = request.response;
                response = JSON.parse(response);
                // tính tiền ship cho đơn hàng
                tienship(code_tinh);
                for(let i=0;i<response.districts.length; i++){
                                
                    let opt = document.createElement('option');
                    opt.value = response.districts[i].name;
                    opt.dataset.code = response.districts[i].code;
                    opt.innerHTML = response.districts[i].name;
                    quan.append(opt);
                }
            }
            
        };

        function changeQuan ()  {
            xa.innerHTML = "";
            let request = new XMLHttpRequest();
            let code_quan = $("#quan option:selected").data('code');
            request.open("GET", "https://provinces.open-api.vn/api/d/"+code_quan+"?depth=2")
            request.send();
            request.onload = () => {
                let response = request.response;
                response = JSON.parse(response);
                for( let i=0; i< response.wards.length; i++){
                    
                    let opt = document.createElement('option');
                    opt.value = response.wards[i].name;
                    opt.dataset.code = response.wards[i].code;
                    opt.innerHTML = response.wards[i].name;
                    xa.append(opt);
                }
            }
        }

        var total_root = $(".total").val();
                total_root = parseFloat(total_root);

        function tienship ($codetinh) {
            if($codetinh == 79) {
                let tien_ship = 30000;
                let new_total = total_root + tien_ship;
                $(".tienship").html(new Intl.NumberFormat().format(tien_ship) + "VNĐ");
                $('.total').val(new_total);

                $('.total').html(new Intl.NumberFormat().format(new_total));
            } else {
                let tien_ship = 40000;
                let new_total = parseFloat(total_root) + tien_ship;
                $(".tienship").html(new Intl.NumberFormat().format(tien_ship) + "VNĐ");
                $('.total').val(new_total);
                $('.total').html(new_total);
            }
        }
        </script>