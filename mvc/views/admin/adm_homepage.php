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
    <?php
    class getsttorder extends db
    {
        function getorder($id)
        {
            $query = "SELECT count(status) as 'count' FROM orders WHERE status = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch()['count'];
        }
    }
    $homepage = new getsttorder();
    ?>
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
                            <h3 class="mb-0"><?= number_format($data['sale']['total']) ?> VNĐ</h3>
                            <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-primary ">
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Doanh thu bán hàng</h6>
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
                            <?php
                            $count = 1;
                            foreach ($data['toporder'] as $item) : ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td width="20%"> <img src="<?= BASE_URL ?>/public/assets/images/product/<?= $item['image'] ?>" alt="Order product"> </td>
                                    <td><?= number_format($item['price']) ?> VNĐ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thống kê đơn hàng</h4>
                <canvas id="transaction-history" class="transaction-chart"></canvas>

            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            if ($("#transaction-history").length) {
                var areaData = {
                    labels: ["Chưa xử lý", "Đang xử lý", "Đang giao hàng", "Đã giao hàng"],
                    datasets: [{
                        data: [<?= $homepage->getorder('1'); ?>, <?= $homepage->getorder('2'); ?>, <?= $homepage->getorder('3'); ?>, <?= $homepage->getorder('4'); ?>],
                        backgroundColor: [
                            "#dc3545", "#28a745", "#0984e3","#ffc107"
                        ]
                    }]
                };
                var areaOptions = {
                    responsive: true,
                    maintainAspectRatio: true,
                    segmentShowStroke: false,
                    cutoutPercentage: 70,
                    elements: {
                        arc: {
                            borderWidth: 0.5
                        }
                    },
                    legend: {
                        display: true
                    },
                    tooltips: {
                        enabled: true
                    }
                }
                var transactionhistoryChartPlugins = {
                    beforeDraw: function(chart) {
                        var width = chart.chart.width,
                            height = chart.chart.height,
                            ctx = chart.chart.ctx;

                        ctx.restore();
                        var fontSize = 1;
                        ctx.font = fontSize + "rem sans-serif";
                        ctx.textAlign = 'left';
                        ctx.textBaseline = "middle";
                        ctx.fillStyle = "#ffffff";

                        var text = "",
                            textX = Math.round((width - ctx.measureText(text).width) / 2),
                            textY = height / 2.4;

                        ctx.fillText(text, textX, textY);

                        ctx.restore();
                        var fontSize = 0.75;
                        ctx.font = fontSize + "rem sans-serif";
                        ctx.textAlign = 'left';
                        ctx.textBaseline = "middle";
                        ctx.fillStyle = "#6c7293";

                        var texts = "",
                            textsX = Math.round((width - ctx.measureText(text).width) / 1.93),
                            textsY = height / 1.7;

                        ctx.fillText(texts, textsX, textsY);
                        ctx.save();
                    }
                }
                var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
                var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
                    type: 'doughnut',
                    data: areaData,
                    options: areaOptions,
                    plugins: transactionhistoryChartPlugins
                });
            }
        })
    </script>