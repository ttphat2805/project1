<div class="page-header">
    <h3 class="page-title">Mã giảm giá </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a class="btn btn-success create-new-button" href="<?php echo BASE_URL ?>/admin/addcoupon"> + Thêm mã giảm giá</a>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th>Tên</th> -->
                                <th>Mã</th>
                                <th>Giảm giá</th>
                                <th>Tối thiểu</th>
                                <th>Số lượng</th>
                                <th>Đã dùng</th>
                                <th>Ngày tạo</th>
                                <th>Ngày hết hạn</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($data['coupon'] as $item) : ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <!-- <td><?= $item['name'] ?></td> -->
                                    <td><?= $item['code'] ?></td>
                                    <td><?= number_format($item['discout'])?>đ</td>
                                    <td><?= number_format($item['min_order'])?>đ</td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td><?= $item['used'] ?></td>
                                    <td><?= $item['created_at'] ?></td>
                                    <td><?= $item['date_out'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo BASE_URL ?>/admin/infocoupon/<?= $item['id'] ?>">
                                        <i class="fal fa-money-check-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn__delete" href="<?php echo BASE_URL ?>/admin/deletecoupon/<?= $item['id'] ?>">
                                        <i class="fal fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

