<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Innovention</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" > 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <script src="../dist/js/utils.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include_once('templates/nav.php');?>
<?php include_once('templates/sidenav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of outlets</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of outlets</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Top 10 best selling product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-store-tab" data-toggle="pill" href="#custom-tabs-four-store" role="tab" aria-controls="custom-tabs-four-store" aria-selected="false">Top Stores(based on sales)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-products-tab" data-toggle="pill" href="#custom-tabs-four-products" role="tab" aria-controls="custom-tabs-four-products" aria-selected="false">Product Sales by ID</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-overlay-tab">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Store:</label>
                        <select id="stores" class="custom-select">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="datepicker-pick">
                          <div class="input-group-prepend">
                              <button type="button" id="1" onclick="search(this.id);" class="btn btn-block btn-secondary btn-flat">Search</button>          
                         </div>
                        </div>              
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="chart" id="appendchart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>                      
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-store" role="tabpanel" aria-labelledby="custom-tabs-four-store-tab"> 
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Store:</label>
                        <select id="stores2" class="custom-select">
                          <option value="All">All</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="datepicker-pick2">
                          <div class="input-group-prepend">
                              <button type="button" id="3" onclick="GetStoreSales(this.id);" class="btn btn-block btn-secondary btn-flat">Search</button>          
                         </div>
                        </div>              
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="chart" id="appendchart2">
                        <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-products" role="tabpanel" aria-labelledby="custom-tabs-four-products-tab">   
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Select Store:</label>
                        <select id="stores3" class="custom-select">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Select Product:</label>
                        <select id="productids" class="custom-select">
                        </select>
                      </div>
                    </div>                    
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="datepicker-pick3">
                          <div class="input-group-prepend">
                              <button type="button" id="4" onclick="GetProductSales(this.id);" class="btn btn-block btn-secondary btn-flat">Search</button>          
                         </div>
                        </div>              
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="chart" id="appendchart3">
                        <canvas id="barChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        <script type="text/javascript">
                          var barChartOptions3 = {
                              responsive              : true,
                              maintainAspectRatio     : false,
                              legend: {
                                position: 'bottom',
                                display: true,
                              },
                              scales: {
                                xAxes: [{
                                  stacked: true,
                                }],
                                yAxes: [{
                                  stacked: true
                                }]
                              }
                          } 
                          var ctx3 = document.getElementById('barChart3').getContext('2d');
                          var chart3 = new Chart(ctx3, {
                            type: 'bar',
                            data: {
                              labels: [],
                              datasets: [
                                  {
                                    label               : 'Total Sales',
                                    backgroundColor     : 'rgb(246, 112, 25)',
                                    borderColor         : 'rgb(246, 112, 25)',
                                    pointRadius         : true,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : []
                                  },            
                                  {
                                    label               : 'Total Quantity',
                                    backgroundColor     : 'rgb(245, 55, 148)',
                                    borderColor         : 'rgb(245, 55, 148)',
                                    pointRadius         : true,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : []
                                  },
                                ]
                            },
                            options: barChartOptions3
                          });
                          function GetProductSales(btnid) {
                            if (btnid == 4){
                                $("#custom-tabs-four-tabContent").append("<div id='loading' class='overlay-wrapper'><div class='overlay'><i class='fas fa-3x fa-sync-alt fa-spin'></i></div></div>");
                            }
                            var dateval = $("#datepicker-pick3").val();
                            var storeid = $("#stores3").val();
                            var productid = $("#productids").val();
                            $.ajax({
                              url: 'dtserver/getproductsales.php',
                              type: 'post',
                              data: {dateval:dateval,storeid:storeid,btnid:btnid,productid:productid},
                              dataType: 'json',
                              success:function(response){   
                                DeleteCanvas3();
                                var len = response.length;
                                for(var i = 0; i<len; i++) {      
                                  var ZreadDate = response[i]['Zread'];       
                                  var ProductSales = response[i]['Sales'];  
                                  var ProductQty = response[i]['Qty'];  
                                  addData3(i,ZreadDate,ProductSales,ProductQty);
                                }  
                                $("#loading").remove();   
                              }
                            })
                          }
                          function addData3(position, label, data1, data2) {   
                            chart3.data.labels[position] = label;
                            chart3.data.datasets[0].data[position] = data1
                            chart3.data.datasets[1].data[position] = data2;
                            chart3.update();
                          }
                          function DeleteCanvas3() {
                            $('#barChart3').remove();
                            $('#appendchart3').append('<canvas id="barChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>');
                            ctx3 = document.getElementById('barChart3').getContext('2d');
                            chart3 = new Chart(ctx3, {
                              type: 'bar',
                              data: {
                                labels: [],
                                datasets: [
                                  {
                                    label               : 'Total Sales',
                                    backgroundColor     : 'rgb(246, 112, 25)',
                                    borderColor         : 'rgb(246, 112, 25)',
                                    pointRadius         : true,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : []
                                  },            
                                  {
                                    label               : 'Total Quantity',
                                    backgroundColor     : 'rgb(245, 55, 148)',
                                    borderColor         : 'rgb(245, 55, 148)',
                                    pointRadius         : true,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : []
                                  },
                                  ]
                              },
                              options: barChartOptions3
                            });
                          }  
                        </script>
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content"> 
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Outlets</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-striped table-bordered dt-responsive" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Store Name(City)</th>
                    <th>Current Sales</th>
                    <th>Option (View More)</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once '../resources/functions.php';
                  $query = query("SELECT SUM(ADT.grosssales) as GrossSales, OT.store_name as StoreName, OT.store_id as StoreID, OT.address as Address, OT.Barangay as Brgy, OT.municipality as Municipality, OT.province as Province, OT.postal_code as Postal FROM posrev.admin_daily_transaction ADT LEFT JOIN posrev.admin_outlets OT ON ADT.store_id = OT.store_id WHERE ADT.store_id IN (".$StoreIDS.") AND DATE_FORMAT(ADT.created_at, '%Y-%m-%d') = DATE_FORMAT(curdate(), '%Y-%m-%d') group by OT.store_name order by OT.store_id;");
                  confirm($query);
                  while ($row = fetch_array($query)) { 
                  ?>  
                  <tr>
                    <td><?php echo $row['StoreName']; ?></td>
                    <td><?php echo $row['Address'] , ", " , $row['Brgy'], ", " , selectmunicipality($row['Municipality']), ", " ,selectprovince($row['Province']) , " ", $row['Postal'] ; ?></td>
                    <td><?php echo $row['GrossSales']; ?></td>
                    <td><button style="cursor:pointer; width: 160px;" name="view" onclick="ViewMore(this.id)"  id = "<?php echo $row['StoreID']; ?>" class="btn btn-block btn-info btn-xs">&nbsp;View More&nbsp;</button></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Store Name(City)</th>
                    <th>Current Sales</th>
                    <th>Option (View More)</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<?php include_once('templates/webfooter.php');?>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../dist/js/demo.js"></script>

<script type="text/javascript">
  var barChartOptions = {
    responsive              : true,
    maintainAspectRatio     : false,
    legend: {
      position: 'bottom',
      display: true,
    },
    scales: {
      xAxes: [{
        stacked: true,
      }],
      yAxes: [{
        stacked: true
      }]
    }
  } 

  $(document).ready(function(){
    var table = $('#example1').DataTable({
      "responsive": true,
      "processing": true,
      "pageLength": 50,
      columnDefs: [
        { width: '20%', targets: 3}
      ],    
    }); 

    var ctx = document.getElementById('barChart').getContext('2d');
    var ctx2 = document.getElementById('barChart2').getContext('2d');
    
   function updateConfig() {
      var options = {};
      var options2 = {};

      options.timePicker = true;
      options2.timePicker = true;

      options.ranges = {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      };

      options2.ranges = {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      };
  
      $('#datepicker-pick').daterangepicker(options, function(start, end, label) {});   
      $('#datepicker-pick2').daterangepicker(options2, function(start, end, label) {});   
      $('#datepicker-pick3').daterangepicker(options2, function(start, end, label) {});     
    }


    
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [
            {
              label               : 'Total Sales',
              backgroundColor     : 'rgb(130, 205, 255)',
              borderColor         : 'rgb(130, 205, 255)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : []
            },
            {
              label               : 'Total Quantity',
              backgroundColor     : 'rgb(255, 158, 179)',
              borderColor         : 'rgb(255, 158, 179)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : []
            },
          ]
      },
      options: barChartOptions
    });    
    
    var chart2 = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [
            {
              label               : 'Total Sales',
              backgroundColor     : 'rgb(83, 123, 196)',
              borderColor         : 'rgb(83, 123, 196)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : []
            },
          ]
      },
      options: barChartOptions
    });

 
   function LoadStores() {
    $("#custom-tabs-four-tabContent").append("<div id='loading' class='overlay-wrapper'><div class='overlay'><i class='fas fa-3x fa-sync-alt fa-spin'></i></div></div>");
    var session_var = "<?php echo $_SESSION['manager_user_guid']; ?>";
    $.ajax({
      url: 'dtserver/getstoreids.php',
      type: 'post',
      data: {guid:session_var},
      dataType: 'json',
      success:function(response){     
          var len = response.length;
          $("#stores").empty();
          $("#stores").append("<option value='All'>All</option>")
          for( var i = 0; i<len; i++){
              var id = response[i]['id'];
              var name = response[i]['name'];          
              $("#stores").append("<option value='"+id+"'>"+name+"</option>");
              $("#stores2").append("<option value='"+id+"'>"+name+"</option>");   
              $("#stores3").append("<option value='"+id+"'>"+name+"</option>");     
          }
          search(0);
      }
    });
  }
  





  updateConfig();
  LoadStores();
  GetStoreSales(2);
  LoadProductIDS();

  })
  function addData(position, label, data1, data2) {   
    chart.data.labels[position] = label;
    chart.data.datasets[0].data[position] = data1
    chart.data.datasets[1].data[position] = data2;
    chart.update();
  }

  function DeleteCanvas() {
    $('#barChart').remove();
    $('#appendchart').append('<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>');
    ctx = document.getElementById('barChart').getContext('2d');
    chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [
            {
              label               : 'Total Sales',
              backgroundColor     : 'rgb(130, 205, 255)',
              borderColor         : 'rgb(130, 205, 255)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : []
            },
            {
              label               : 'Total Quantity',
              backgroundColor     : 'rgb(255, 158, 179)',
              borderColor         : 'rgb(255, 158, 179)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : []
            }
          ]
      },
      options: barChartOptions
    });
  }
  function LoadProductIDS() {
    $.ajax({
      url: 'dtserver/getproductids.php',
      type: 'post',
      dataType: 'json',
      success:function(response){     
        var len = response.length;
        for( var i = 0; i<len; i++){
            var id = response[i]['ID'];
            var name = response[i]['Name'];          
            $("#productids").append("<option value='"+id+"'>"+name+"</option>");     
        }
      }
    });
  }

  function ViewMore($storeID) {
    self.location = "?store="+ $storeID;
  }
  function search(btnid) {
    if (btnid == 1){
        $("#custom-tabs-four-tabContent").append("<div id='loading' class='overlay-wrapper'><div class='overlay'><i class='fas fa-3x fa-sync-alt fa-spin'></i></div></div>");
    }
    var dateval = $("#datepicker-pick").val();
    var storeid = $("#stores").val();
    $.ajax({
      url: 'dtserver/gettopselling.php',
      type: 'post',
      data: {dateval:dateval,storeid:storeid,btnid:btnid},
      dataType: 'json',
      success:function(response){   
        DeleteCanvas();
        var len = response.length;
        for(var i = 0; i<len; i++) {      
          var ProductNames = response[i]['BarGraphLabel'];
          var Qty = response[i]['Quantity'];          
          var TotalSales = response[i]['Total'];  
          addData(i,ProductNames,TotalSales,Qty);
        }  
        $("#loading").remove();   
      }
    })
  }
 
</script>
<script type="text/javascript">
  function GetStoreSales(btnid) {
    if (btnid == 3){
        $("#custom-tabs-four-tabContent").append("<div id='loading' class='overlay-wrapper'><div class='overlay'><i class='fas fa-3x fa-sync-alt fa-spin'></i></div></div>");
    }
    var dateval = $("#datepicker-pick2").val();
    var storeid = $("#stores2").val();
    $.ajax({
      url: 'dtserver/getsales.php',
      type: 'post',
      data: {dateval:dateval,storeid:storeid,btnid:btnid},
      dataType: 'json',
      success:function(response){   
        DeleteCanvas2();
        var len = response.length;
        for(var i = 0; i<len; i++) {      
          var StoreName = response[i]['Name'];       
          var TotalSales = response[i]['Sales'];  
          addData2(i,StoreName,TotalSales);
        }  
        $("#loading").remove();   
      }
    })

  }

  function addData2(position, label, data1) {   
    chart2.data.labels[position] = label;
    chart2.data.datasets[0].data[position] = data1
    chart2.update();
  }
  function DeleteCanvas2() {
    $('#barChart2').remove();
    $('#appendchart2').append('<canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>');
    ctx2 = document.getElementById('barChart2').getContext('2d');
    chart2 = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [
            {
              label               : 'Total Sales',
              backgroundColor     : 'rgb(83, 123, 196)',
              borderColor         : 'rgb(83, 123, 196)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : []
            },
          ]
      },
      options: barChartOptions
    });
  }
</script>

</body>
</html>
    
