<!DOCTYPE html>
<html lang="en">
<head>
      <?php
      include "config/config.php";
      include "components/head.php";
      ?>
      <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!--Navbar -->
      <?php
        include "components/navbar.php";
      ?>
    <!-- Sidebar -->
    <?php
      include "components/sidenavbar.php"
    ?>
  <!--Changing Page Here -->
  <div class="content-wrapper">
  <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Store</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              <?php
                      include "./config/config.php";
                      $id = $_GET['id'];
                      $syx = "SELECT * FROM Store WHERE StoreID='$id'";

                      $query = sqlsrv_query($conn,$syx) or die(sqlsrv_errors());
                      while($data=sqlsrv_fetch_array($query)){
               ?>
              <form method="POST" action="components/do/store/do-update-store.php">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <input type="hidden" value="<?php echo $data['StoreID']; ?>" class="form-control" name="id" placeholder="Enter ...">

                      <div class="form-group">
                        <label>Store Address</label>
                        <textarea class="form-control" rows="3" name="store_address" placeholder="Enter ..."><?php echo $data['StoreAddress'] ?></textarea>
                      </div>
                    </div>
                    </div>
                      <div class="form-group">
                        <label>Store Phone Number</label>
                        <input type="text" class="form-control" value="<?php echo $data['StorePhoneNumber'] ?>" name="store_phone_number" placeholder="Enter ...">
                      </div>
                  </div>
                  <button type="submit"  class="btn btn-block bg-gradient-success">TAMBAH</button>
                </form>
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
</div>

  <!--Changin Page -->
<!-- Content Wrapper. Contains page content -->

  <!-- Main Footer -->
  <?php
    include "components/footer.php";
  ?>
</div>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
$(function () {
    $("#example1").DataTable(
    "responsive": true, "lengthChange": false, "autoWidth": false, "autoFill":true,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    });
});
</script>
</body>

</html>
