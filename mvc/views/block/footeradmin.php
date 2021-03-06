 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/js/vendor.bundle.base.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/chart.js/Chart.min.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/vendors/progressbar.js/progressbar.min.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/off-canvas.js"></script>
 <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/hoverable-collapse.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/misc.js"></script>
 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/morris.min.js"></script>
 <!-- <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/chart.js"></script> -->

 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/raphael.js"></script>

 <script src=" <?php echo BASE_URL; ?>/public/assetsadmin/js/"></script>


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
        $( function() {
        $( "#datepicker" ).datepicker({
            prevText: "Th??ng tr?????c",
            nextText: "Th??ng sau",
            dateFormat : "yy-mm-dd",
            dayNamesMin : ["Th??? 2","Th??? 3","Th??? 4","Th??? 5","Th??? 6","Th??? 7","Ch??? Nh???t"],
            duration : "slow",
        });
        $( "#datepicker2" ).datepicker({
            prevText: "Th??ng tr?????c",
            nextText: "Th??ng sau",
            dateFormat : "yy-mm-dd",
            dayNamesMin : ["Th??? 2","Th??? 3","Th??? 4","Th??? 5","Th??? 6","Th??? 7","Ch??? Nh???t"],
            duration : "slow",
        });
        } );
         $("#table").DataTable({
             lengthMenu: [7, 14, 21],
             language: {
                 processing: "??ang t???i d??? li???u",
                 search: "T??m ki???m: ",
                 lengthMenu: "L?????ng hi???n th???:  " + " _MENU_ ",
                 info: "Hi???n _END_ trong s??? _TOTAL_",
                 infoEmpty: "Kh??ng c?? d??? li???u",
                 infoFiltered: "(Tr??n t???ng _MAX_ m???c)",
                 infoPostFix: "  m???c", // C??i n??y khi th??m v??o n?? s??? ?????ng sau info
                 loadingRecords: "",
                 zeroRecords: "Kh??ng t???n t???i d??? li???u c???n t??m",
                 emptyTable: "Kh??ng c?? d??? li???u",
                 paginate: {
                     first: "Trang ?????u",
                     previous: "<",
                     next: ">",
                     last: "Trang cu???i",
                 },
                 aria: {
                    sortAscending: ": ??ang s???p x???p theo column",
                    sortDescending: ": ??ang s???p x???p theo column",
                },
             },
         });
     });
     $(document).on('click', '.btn__delete', function(e) {
         e.preventDefault();
         const href = $(this).attr('href');
         Swal.fire({
             title: 'B???n c?? ch???c mu???n x??a kh??ng?',
             text: "N???u x??a th?? kh??ng th??? kh??i ph???c l???i...",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'C??',
             cancelButtonText: 'H???y'
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