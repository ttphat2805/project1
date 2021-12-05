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
<?php var_dump($_SESSION['cart_Item']) ?>
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
                                            <input placeholder="Coupon code" type="text" name='cou'>
                                            <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="<?= BASE_URL ?>/order/create" method="post">
                            <div class="checkbox-form">
                                <h3>Chi Tiết Hóa Đơn</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input placeholder="" name="ho" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
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
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" name="email" type="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                                <div class="different-address">
                                    <div class="ship-different-title">
                                        <div>
                                            <input id="ship-box" type="checkbox">
                                            <label for="ship-box">Ship to a different address?</label>
                                        </div>
                                    </div>
                                    
                                    <div class="order-notes mt-3">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Ghi chú</label>
                                            <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
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
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($_SESSION['cart_Item'] as $item) { $total =0; $total += $item['total'];  ?>
                                            <tr class="cart_item">
                                            <td class="cart-product-name"> <?= $item['name'] ?><strong class="product-quantity">
                                                × <?= $item['quantity'] ?></strong></td>
                                            <td class="cart-product-total text-center"><span class="amount"><?= number_format($item['total']) ?></span></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td class="text-center"><span class="amount">£215.00</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td class="text-center"><strong><span class="amount"><?= number_format($total) ?> VNĐ</span></strong></td>
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
        <!-- Checkout Area End Here -->
        <!-- Support Area Start Here -->
        <div class="support-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-12 col-custom">
                        <div class="support-wrapper d-flex">
                            <div class="support-content">
                                <h1 class="title">Need Help ?</h1>
                                <p class="desc-content">Call our support 24/7 at 01234-567-890</p>
                            </div>
                            <div class="support-button d-flex align-items-center">
                                <a class="obrien-button primary-btn" href="contact-us.html">Contact now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Area End Here -->
        <!-- Footer Area Start Here -->
        <script>
            
       
    
       
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

    
        </script>