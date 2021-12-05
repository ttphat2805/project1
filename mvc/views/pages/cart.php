<!-- cart main wrapper start -->
<div class="cart-main-wrapper mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th>Type</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php //var_dump($data['list']) ?>
                            <?php if($data['list']){
                                    
                                    $cart_total = 0;?>
                            <?php for($i=0; $i< count($data['list']); $i++){ ?>
                                <?php
                                    // Tinh tong tien san pham
                                    $cart_total +=   $data['list'][$i]['price']*$data['list'][$i]['quantity']   
                                ?>
                                <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL.'/public/assets/images/product/'.$data['list'][$i]['image'] ?>" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#"><?= $data['list'][$i]['name'] ?></td>
                                <td class="pro-price"><span><?= $data['list'][$i]['price'] ?></span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus" data-prod="<?= $data['list'][$i]['id_product_type'] ?>">
                                            <input class="cart-plus-minus-box" value="<?= $data['list'][$i]['quantity'] ?>" type="text" data-max="<?= $data['list'][$i]['quantity'] ?>">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                            <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $data['list'][$i]['value'] ?></td>
                                <td class="pro-subtotal"><span><?= $data['list'][$i]['price']*$data['list'][$i]['quantity'] ?></span></td>
                                <td class="pro-remove"><a ><i class="ion-trash-b"></i></a></td>
                            </tr>
                            <?php }?>
                            <?php } else{?>
                                <tr>
                                    <td colspan="7">Giỏ hàng của bạn hiện đang trống</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Cart Update Option -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>$230</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount"><?= $cart_total??0 ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="<?= BASE_URL ?>/order" class="btn obrien-button primary-btn d-block">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->