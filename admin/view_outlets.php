<?php session_start();
include_once '../resources/conn.php';
$sql = "SELECT * FROM admin_user WHERE user_guid = '".$_GET['id']."'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$firstname = $row['user_fname'];
$lastname = $row['user_lname'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Innovention</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once('templates/nav.php');?>
<?php include_once('templates/sidenav.php');?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client Outlets (<?php echo  $firstname . ' ' . $lastname?>)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?outlets">Outlets</a></li>
              <li class="breadcrumb-item active">View Outlets</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Employee's</span>
                <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Outlet's</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total POS Activated</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      <div class="row">
          <div class="col-md-3">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Actions</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                     <button class="btn btn-sm btn-secondary btn-block mb-3 " data-toggle="modal" data-target="#modal-default" type="button">Add Outlet</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div>  
	    <div class="row">
	      <div class="col-12">
	        <div class="card">
	          <div class="card-header">
	            <h3 class="card-title">Clients</h3>
	          </div>
	          <!-- /.card-header -->
            
	          <div class="card-body">

	            <table id="example1" class="table table-bordered table-striped">
	              <thead>
	                <tr>
                    <th>Store Name</th>
                    <th>Address</th>
                    <th>Location Name</th>
                    <th>Postal Code</th>
                    <th>Status</th>
                    <th>Action</th>
	                </tr>
	              </thead>
	              <tfoot>
	              <tr>
                  <th>Store ID</th>
                  <th>Address</th>
            		  <th>Location Name</th>
                  <th>Postal Code</th>
                  <th>Status</th>
                  <th>Action</th>
	              </tr>
	              </tfoot>
	            </table>
	          </div>
	          <!-- /.card-body -->
	        </div>
	        <!-- /.card -->
	      </div>
	    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once('templates/webfooter.php')?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
function Send($id) {
  var url = "view_outlets.php?id=" + $id;
  window.location.href = url;
};
function viewdata(id) {
var clientid = id;
      $.ajax({  
      url:"view_outlets.php",  
      method:"post",  
      data:{id:id},  
      success:function(data){  
        $('#outletdetail').html(data);  
        $('#modal-default').modal("show");  
      }  
      });  
}
function getUnderCategory(id){
  $("#under_category").empty();
  $.get("get_mun.php",
  {
     id:id
  },
  function(data,status) {
     if (status == "success") {
        try {
           eval(data);
        } catch (e) {
           if (e instanceof SyntaxError) {
              console.log(e.message);
           }
        }
     }
  });
}
function addoutlet() {
  var brand = $('#brands').val();
  alert(brand);
}

$(document).ready(function(){
  LoadDatatable();
});  
function LoadDatatable() {
  var toencode = "<?php echo $_GET['id']?>";
  var table = $('#example1').DataTable({
    "responsive": true,
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "ajax": "dtserver/clientoutlets.php?id=<?php echo $_GET['id'];?>"
  });
};
function Activate($id) {
  $.ajax({
    url: "actoutlet/index.php",
    method: "POST",
    data:{id:$id}, 
    success: function(data){
      alert("Success!");  
      var table = $('#example1').DataTable();
      $('#example1').empty();
      table.destroy();
      LoadDatatable();
    }
  });
};
</script>
<?php include_once('modals/addoutletmodal.php');?>
</body>
</html>
