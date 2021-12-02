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
<?php var_dump($_SESSION['user_infor']) ?>
        <!-- Checkout Area Start Here -->
        <div class="checkout-area">
            <div class="container container-default-2 custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-accordion">
                            
                            <h3>Bạn đã có mã giảm giá? <span id="showcoupon">Nhấn vào đây để nhập code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
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
                    <!-- <div class="col-lg-6 col-12">
                        
                    </div> -->
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
            
       
    
        var tinh = document.getElementById("tinh");
       var quan = document.getElementById("quan");
       var xa = document.getElementById("phuong");
       var list_tinh = "";
       var list_quan = "";
       var list_phuong = "";
        var requests = new XMLHttpRequest();
        requests.open("GET", "https://provinces.open-api.vn/api/p/");
        requests.send();
        requests.onload = ()=>{
            
            let response = requests.response;
            response = JSON.parse(response);
            for(let i=0; i<Object.keys(response).length; i++){
                list_tinh +="<option value="+response[i].code+">"+response[i].name+"</option>";
            }
            $("#tinh").html(list_tinh)
        }
        function changeTinh(){
            quan.innerHTML = "";           
            let request = new XMLHttpRequest();
            request.open("GET", "https://provinces.open-api.vn/api/p/"+tinh.value+"?depth=2");
            request.send();
            request.onload = ()=>{
                alert(request.response)
                let response = request.response;
                response = JSON.parse(response);

                for(let i=0;i<response.districts.length; i++){
                                
                    let opt = document.createElement('option');
                    opt.value = response.districts[i].code;
                    opt.innerHTML = response.districts[i].name;
                    quan.append(opt);
                }
            }
            
        };

        function changeQuan ()  {
            xa.innerHTML = "";
            let request = new XMLHttpRequest();
            request.open("GET", "https://provinces.open-api.vn/api/d/"+quan.value+"?depth=2")
            request.send();
            request.onload = () => {
                let response = request.response;
                response = JSON.parse(response);
                for( let i=0; i< response.wards.length; i++){
                    
                    let opt = document.createElement('option');
                    opt.value = response.wards[i].code;
                    opt.innerHTML = response.wards[i].name;
                    xa.append(opt);
                }
            }
        }

    
        </script>