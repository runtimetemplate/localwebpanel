<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once('templates/nav.php');?>
<?php include_once('templates/sidenav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">General Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Serial Key Generator</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">This page container will generate a serial key</h6>
                <p class="card-text">Don't forget to click save button after clicking Generate Serial Key button.</p>
                <div class="form-group">
                  <input type="" class="form-control" name="" id="serialkey">
                </div>
                 <button class="btn btn-primary" id="gen" onclick="generatekey(this.id)">Genarate Serial Key</button>
                 <button class="btn btn-info float-right" id="save" onclick="saveserialkey(this.id)">Save</button> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<?php include_once('templates/webfooter.php');?>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  function generatekey(id) {
  $.ajax({  
  url:"actions/generatekey.php",  
  method:"POST",  
  data:{id:id},  
  success:function(data){  
    $("#serialkey").val(data);
  }  
  }); 
  }
  function saveserialkey(id) {
    $serialkey =  $("#serialkey").val();
    if ($serialkey == '') {
      alert('Generate first');
    } else {
      $.ajax({  
      url:"actions/savekey.php",  
      method:"POST",  
      data:{id:id , serial:$serialkey},  
      success:function(data){  
        alert('Saved!');
        $("#serialkey").val('');
      }  
      }); 
      
    }

  }
</script>
</body>
</html>
