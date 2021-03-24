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
    var ctx = document.getElementById('barChart').getContext('2d');
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
</script>