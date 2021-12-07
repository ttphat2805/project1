 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/js/vendor.bundle.base.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/chart.js/Chart.min.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/progressbar.js/progressbar.min.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/off-canvas.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/hoverable-collapse.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/misc.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/settings.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/todolist.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/dashboard.js"></script>
 <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assets/toastr/toastr.min.css">


 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
 <!-- SWEET ALERT - TOASTR -->
 <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assets/sweetalert/sweetalert2.min.css">
 <link rel="stylesheet" href=" <?php echo BASE_URL; ?>/public/assets/toastr/toastr.min.css">
 <script src="<?php echo BASE_URL; ?>/public/assets/sweetalert/sweetalert2.all.min.js"></script>
 <script src="<?php echo BASE_URL; ?>/public/assets/toastr/toastr.min.js"></script>
 <footer class="footer">
     <div class="footer__block block no-margin-bottom">
         <div class="container-fluid text-center">
             <p class="no-margin-bottom">2021 &copy; G6Grain. Design by <a href="">Group 6 - Project 1</a>.</p>
         </div>
     </div>
 </footer>
 <script>
     $(document).ready(function() {
         $("#table").DataTable({
             lengthMenu: [7, 14, 21],
             language: {
                 processing: "Đang tải dữ liệu",
                 search: "Tìm kiếm: ",
                 lengthMenu: "Lượng hiển thị:  " + " _MENU_ ",
                 info: "Hiện _END_ trong số _TOTAL_",
                 infoEmpty: "Không có dữ liệu",
                 infoFiltered: "(Trên tổng _MAX_ mục)",
                 infoPostFix: "  mục", // Cái này khi thêm vào nó sẽ đứng sau info
                 loadingRecords: "",
                 zeroRecords: "Không tồn tại dữ liệu cần tìm",
                 emptyTable: "Không có dữ liệu",
                 paginate: {
                     first: "Trang đầu",
                     previous: "<",
                     next: ">",
                     last: "Trang cuối",
                 },
                 aria: {
                    sortAscending: ": Đang sắp xếp theo column",
                    sortDescending: ": Đang sắp xếp theo column",
                },
             },
         });
     });
     $(document).on('click', '.btn__delete', function(e) {
         e.preventDefault();
         const href = $(this).attr('href');
         Swal.fire({
             title: 'Bạn có chắc muốn xóa không?',
             text: "Nếu xóa thì không thể khôi phục lại...",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Có',
             cancelButtonText: 'Hủy'
         }).then((result) => {
             if (result.isConfirmed) {
                 document.location.href = href;
             }
         })
     })
     <?php
        if (isset($_SESSION['toastr-code']) && $_SESSION['toastr-noti'] != '') {
        ?>
         window.addEventListener('load', function() {
             $(document).ready(function() {
                 toastr.options = {
                     "closeButton": true,
                     "debug": false,
                     "newestOnTop": false,
                     "progressBar": true,
                     "positionClass": "toast-top-right",
                     "preventDuplicates": false,
                     "onclick": null,
                     "showDuration": "300",
                     "hideDuration": "1000",
                     "timeOut": "5000",
                     "extendedTimeOut": "1000",
                     "showEasing": "swing",
                     "hideEasing": "linear",
                     "showMethod": "fadeIn",
                     "hideMethod": "fadeOut"
                 }
                 toastr["<?php echo $_SESSION['toastr-code'] ?>"]("<?php echo $_SESSION['toastr-noti'] ?>")
             })
         })
     <?php } ?>
 </script>
 <?php
    unset($_SESSION['toastr-code']);
    unset($_SESSION['toastr-noti']);
    ?>