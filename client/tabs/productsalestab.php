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