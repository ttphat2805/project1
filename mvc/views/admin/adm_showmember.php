<div class="page-header">
    <h3 class="page-title">Danh sách thành viên G6'Food</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">
                    <a class="btn btn-success create-new-button" href="<?php echo BASE_URL ?>/admin/addcategory"> + Thêm danh mục</a>
                </h4> -->
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($data['member'] as $item) : ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['fullname'] ?></td>
                                    <td><?= $item['email'] ?></td>
                                    <td>
                                    <?php
                                    if($item['role'] == 1){
                                        echo '<label class="btn btn-primary btn-fw">Admin</label>';
                                    }else if($item['role'] == 2){
                                        echo '<label class="btn btn-info btn-fw">SuperAdmin</label>';
                                    }else{
                                        echo '<label class="btn btn-secondary btn-fw">Khách hàng</label>';
                                    }
                                    ?>

                                    </td>
                                    <td><?= $item['status'] == 1 ? '<label class="badge badge-success">Kích hoạt</label>' : '<label class="badge badge-danger">Ẩn</label>' ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo BASE_URL ?>/admin/infomember/<?= $item['id'] ?>">
                                            <i class="fal fa-info-circle"></i>
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