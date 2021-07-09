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
            <button type="button" id="4" onclick="ApxChart3(this.id);" class="btn btn-block btn-secondary btn-flat">Search</button>          
       </div>
      </div>              
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
  <div id="ApexChart3" class=""></div>
      <script type="text/javascript">      
     var optionsapex3 = {
        series: [
          {
            name: 'Total Sales',
            data: []
          }, 
          {
            name: 'Total Quantity',
            data: []
          }
        ],
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        xaxis: {
          categories: [],
        },

        fill: {
          opacity: 1
        }
      };

      var chartApex3 = new ApexCharts(document.querySelector("#ApexChart3"), optionsapex3);
      chartApex3.render();    
    </script>        
    <script type="text/javascript">

    function ApxChart3(btnid) {
      if (btnid == 4){
          $("#custom-tabs-four-tabContent").append("<div id='loading' class='overlay-wrapper'><div class='overlay'><i class='fas fa-3x fa-sync-alt fa-spin'></i></div></div>");
      }
      var dateval = $("#datepicker-pick3").val();
      var storeid = $("#stores3").val();
      var productid = $("#productids").val();

        $.getJSON('dtserver/getproductsales.php?btnid='+btnid+'&dateval='+dateval+'&storeid='+storeid+'&productid='+productid+'&productid='+productid, function(response) {

          var len = response.length;
          var ZreadDate = [];
          var ProductSales = [];
          var ProductQty = [];

          for(var i = 0; i<len; i++) {  
              var Dt = response[i]['Zread'];
              var Sl = response[i]['Sales'];          
              var Qty = response[i]['Qty'];  

              ZreadDate.push(Dt);
              ProductSales.push(Sl);
              ProductQty.push(Qty);
          }
          
          $("#loading").remove();  
          chartApex3.updateOptions({
            xaxis: {
              categories: ZreadDate
            },
            series: [{
              name: 'Total Sales',
              data: ProductSales
            }, {
              name: 'Total Quantity',
              data: ProductQty
            }],
          })
      })          
    }
    </script>          
               
  </div>
</div>