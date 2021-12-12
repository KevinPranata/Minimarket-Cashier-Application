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
  <!-- Date Picker -->
  
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
                <h3 class="card-title">Item</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="components/do/transaction/do-input-transaction.php" id="form-dynamic">
                  <div class="row">
                  <div class="col-sm-6">
                  <label>Customer </label>
                  <select class="form-control" name="customer_id">
                    <?php
                      $subSyx = "SELECT * FROM Customer";

                      $subQuery = sqlsrv_query($conn,$subSyx) or die(sqlsrv_errors());
                      while($subData=sqlsrv_fetch_array($subQuery)){
                        $dats=$subData['ID'];
                    ?>    
                          <option value="<?php echo (string)$dats;?>"><?php echo "CA00".$dats." -- ".$subData['CustomerName']; ?></option>
                          
                      <?php } ?>
                      </select>
                      
                  </div>
                  <div class="col-sm-6">
                <!-- Date and time -->
                <div class="form-group">
                  <label>Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" name="transaction_date">
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                      </div>
                      <br>
                      <label>Item </label>
                      <table class="table table-bordered table-hover" id="dynamic_field">
                        <tr>
                <td>
                    <select class="form-control name_email" name="item_list[]" >
                              <?php
                                $subSyx = "SELECT * FROM Item";
    
                                $subQuery = sqlsrv_query($conn,$subSyx) or die(sqlsrv_errors());
                                while($subData=sqlsrv_fetch_array($subQuery)){
                                  $dats=$subData['ID'];
                              ?>    
                                    <option value="<?php echo (string)$dats;?>"><?php echo "IT00".$dats." -- ".$subData['ItemName']."--  Rp.". $subData['Price']; }?></option>
                                </select>
                </td>
                
                <td><input type="text" name="qty[]" placeholder="Quantity" class="form-control name_email"/></td>
                <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>  
              </tr>
            </table>
            <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit">
                </div>
            </div>
                </form>
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

<script type="text/javascript">
  $(document).ready(function(){

    var i = 1;

    $("#add").click(function(){
        i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control name_email" name="item_list[]" ><?php $subSyx = "SELECT * FROM Item"; $subQuery = sqlsrv_query($conn,$subSyx) or die(sqlsrv_errors()); while($subData=sqlsrv_fetch_array($subQuery)){ $dats=$subData['ID'];?> <option value="<?php echo (string)$dats;?>"><?php echo "IT00".$dats." -- ".$subData['ItemName']."--  Rp.". $subData['Price']; }?></select></td><td><input type="text" name="qty[]" placeholder="Quantity" class="form-control name_email"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    });

    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove();  
    });

    $("#submit").on('click',function(){
      var formdata = $("#form-dynamic").serialize();
      $.ajax({
        url   :"action.php",
        type  :"POST",
        data  :formdata,
        cache :false,
        success:function(result){
          alert(result);
          $("#form-dynamic")[0].reset();
        }
      });
    });
  });
</script>
</body>

</html>