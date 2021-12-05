<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center justify-content-center align-self-start">
                            <h3 class="mb-0 text-center"><?= str_pad($data['countproduct'], 3, '.0', STR_PAD_RIGHT); ?></h3>
                            <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-food"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Tổng số lượng sản phẩm</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center justify-content-center align-self-start">
                            <h3 class="mb-0"><?= str_pad($data['countcomments'], 3, '.0', STR_PAD_RIGHT); ?></h3>
                            <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-warning">
                            <span class="mdi mdi-comment-check-outline"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Tổng số bình luận</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center justify-content-center align-self-start">
                            <h3 class="mb-0"><?= str_pad($data['countmember'], 3, '.0', STR_PAD_RIGHT); ?></h3>
                            <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-info">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Tổng số thành viên</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?= str_pad($data['countcart'], 3, '.0', STR_PAD_RIGHT); ?></h3>
                            <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-primary ">
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Tổng số đơn hàng</h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Top 5 món ăn bán chạy nhất</h4>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Hình</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>Tên</td>
                                <td>Hình</td>
                                <td>Giá</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Transaction History</h4>
                <canvas id="transaction-history" class="transaction-chart"></canvas>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Transfer to Paypal</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$236</h6>
                    </div>
                </div>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Tranfer to Stripe</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$593</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>