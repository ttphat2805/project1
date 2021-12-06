<div class="page-header">
    <h3 class="page-title"> Chi tiết đơn hàng (Mã đơn hàng: <?= $data['codeorder'] ?>)</h3>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin người đặt hàng</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Họ tên:</td>
                                <td><?= $data['inforder']['fullnamemember'] ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td><?= $data['inforder']['mobilemember'] ?></td>

                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?= $data['inforder']['addressmember'] ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $data['inforder']['emailmember'] ?></td>

                            </tr>
                            <tr>
                                <td>PTTT:</td>
                                <td><?= $data['inforder']['nameordermethod'] ?></td>
                            </tr>
                            <tr>
                                <td>Ghi chú:</td>
                                <td><?= $data['inforder']['note'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin người nhận hàng</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Họ tên:</td>
                                <td><?= $data['inforder']['fullname'] ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td><?= $data['inforder']['mobile'] ?></td>

                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?= $data['inforder']['address'] ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $data['inforder']['email'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-header">
    <h3 class="page-title">Sản phẩm đặt mua</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            $total = 0;
                            ?>
                            <?php foreach ($data['orderpd'] as $item) : ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td width="20%"> <img src="<?= BASE_URL ?>/public/assets/images/product/<?= $item['image'] ?>" alt="Order product"> </td>
                                    <td><?= number_format($item['price']) ?> VNĐ</td>
                                    <td><?= $item['quantity'] ?></td>
                                    <?php $total += $item['price'] * $item['quantity'] ?>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            <tr class="text-left">
                                <td colspan="3"></td>
                                <td>Tổng cộng:</td>
                                <td> <?= number_format($total) ?> VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="<?=BASE_URL?>/admin/update_orderdetail" method="post">
<input type="hidden" name="id" value="<?=$data['inforder']['id']?>">
<h3 class="products__bought">Trạng thái đơn hàng</h3>
    <div class="wrapper" id="text-align">
        <input type="radio" name="status" id="option-5" value="1" 
        <?php
         if($data['inforder']['status']== 1){
             echo 'checked';
         }elseif($data['inforder']['status']== 2 || $data['inforder']['status']== 3){
             echo 'disabled';
         }else{
             echo '';
         }
        ?>>

        <input type="radio" name="status" id="option-6" value="2"
        <?php
         if($data['inforder']['status']== 2){
             echo 'checked';
         }elseif($data['inforder']['status']== 3){
             echo 'disabled';
         }else{
             echo '';
         }
        ?>>

        <input type="radio" name="status" id="option-7" value="3" 
        <?php
         if($data['inforder']['status']== 3){
             echo 'checked';
         }else{
             echo '';
         }
        ?>>

        <input type="radio" name="status" id="option-8" value="4"
        <?php
         if($data['inforder']['status']== 4){
             echo 'checked';
         }else{
            echo '';
         }
        ?>>
        <label for="option-5" class="option option-5">
            <div class="dot"></div>
            <span>Chưa xử lý</span>
        </label>
        <label for="option-6" class="option option-6">
            <div class="dot"></div>
            <span>Đang xử lý</span>
        </label>
        <label for="option-7" class="option option-7">
            <div class="dot"></div>
            <span>Đang giao hàng</span>
        </label>
        <label for="option-8" class="option option-8">
            <div class="dot"></div>
            <span>Đã giao hàng</span>
        </label>
    </div><br>
    <input type="submit" class="btn btn-primary" name="btn__submit"value="Cập nhật đơn hàng" <?php echo $data['inforder']['status'] == 4 ? 'disabled' : '' ?>>
    <a href="<?php echo BASE_URL?>/admin/order/<?=$_SESSION['status_back_order']?>" class="btn__Back">Trở về</a>
</form>