<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Thống kê biểu đồ</h3>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thống kê đơn hàng</h4>
                        <form class="form-inline">
                            <div class="form-group ml-3">
                                <label for="" class="label__css">Từ ngày: </label>
                                <input type="text" name="name" autocomplete="off" class="form-control" id="datepicker">
                            </div>
                            <div class="form-group ml-3">
                                <label for="" class="label__css">Đến ngày: </label>
                                <input type="text" name="name" autocomplete="off" class="form-control" id="datepicker2">
                            </div>
                            <input type="button" value="Lọc" class="btn btn-primary ml-3" id="clickchartdate">
                        </form>
                        <div id="chart" style="height: 250px;"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
       
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sản phẩm trong danh mục</h4>
                        <canvas id="doughnutChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Số lượng bình luận</h4>
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        function getorder() {
            $.ajax({
                url: "<?= BASE_URL ?>/admin/getorderdays",
                method: "POST",
                dataType: "JSON",
                data: {},
                success: function(data) {
                    chart.setData(data);
                },
            });
        }
        getorder();
        $('#clickchartdate').click(function() {
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            $.ajax({
                url: "<?= BASE_URL ?>/admin/chartdate",
                method: "POST",
                dataType: "JSON",
                data: {
                    'action': 'filterbydate',
                    'fromdate': from_date,
                    'todate': to_date,
                },
                success: function(data) {
                    chart.setData(data);
                },
            });
        })

        var chart = new Morris.Area({
            element: 'chart',
            lineColors: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
            pointColors: ['rgba(255, 206, 86, 1)'],
            pointStrokeColors: ['#fff'],
            fillOpacity: 0.1,
            hideHover: 'auto',
            parseTime: false,

            xkey: 'date',
            ykeys: ['quantity', 'total'],
            labels: ['Số lượng', 'Tổng cộng']
        });
        // CHART - ADMIN 
        // LINE
        var data = {
            labels: [
                <?php
                foreach ($data['countcomment'] as $row) :
                ?> '<?= $row['name'] ?>',
                <?php endforeach; ?>

            ],
            datasets: [{
                label: 'Bình luận',
                data: [
                    <?php
                    foreach ($data['countcomment'] as $row) :
                    ?> '<?= $row['count'] ?>',
                    <?php endforeach; ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: false
            }]
        };
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    gridLines: {
                        color: "rgba(204, 204, 204,0.1)"
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: "rgba(204, 204, 204,0.1)"
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        };

        // DONUT
        var doughnutPieData = {
            datasets: [{
                data: [
                    <?php
                    foreach ($data['countproduct'] as $row) :
                    ?> '<?= $row['soluong'] ?>',
                    <?php endforeach; ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }],

            labels: [
                <?php
                foreach ($data['countproduct'] as $row) :
                ?> '<?= $row['name'] ?>',
                <?php endforeach; ?>
            ]
        };
        var doughnutPieOptions = {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        // Get context with jQuery - using jQuery's .get() method.
        if ($("#barChart").length) {
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: data,
                options: options
            });
        }

        if ($("#doughnutChart").length) {
            var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
            var doughnutChart = new Chart(doughnutChartCanvas, {
                type: 'doughnut',
                data: doughnutPieData,
                options: doughnutPieOptions
            });
        }
    })
</script>