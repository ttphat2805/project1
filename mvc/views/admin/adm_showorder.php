<div class="page-header">
    <h3 class="page-title">Danh sách đơn hàng của G6'Food</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?= $data['title'] ?>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Người đặt</th>
                                <th>Ngày</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($data['order'] as $item) : ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['fullname'] ?></td>
                                    <td><?= $item['orderdate'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo BASE_URL ?>/admin/orderdetail/<?= $item['id'] ?>">
                                            <i class="fal fa-info-circle"></i>
                                        </a>
                                        <?php
                                        if ($item['status'] == 4) { ?>
                                            <a class="btn btn-danger btn__delete" href="<?php echo BASE_URL ?>/admin/deleteorder/<?= $item['id'] ?>">
                                                <i class="fal fa-trash-alt"></i>
                                            </a>
                                        <?php } ?>
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