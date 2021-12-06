<div class="page-header">
    <h3 class="page-title">Blog</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a class="btn btn-success create-new-button" href="<?php echo BASE_URL ?>/admin/addblog"> + Thêm Blog</a>
                </h4>
                </p>
                <div class="table-responsive">
                <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($data['blog'] as $item) : ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['title'] ?></td>
                                    <td><?= $item['status'] == 1 ? '<label class="badge badge-success">Kích hoạt</label>' : '<label class="badge badge-danger">Chưa kích hoạt</label>' ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo BASE_URL ?>/admin/infoblog/<?= $item['id'] ?>">

                                            <i class="fal fa-money-check-edit"></i>

                                        </a>
                                        <a class="btn btn-danger btn__delete" href="<?php echo BASE_URL ?>/admin/deleteblog/<?= $item['id'] ?>"> <i class="fal fa-trash-alt"></i>
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