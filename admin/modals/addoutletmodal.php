<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Outlet Info</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="aoutlet/index.php?id=<?php echo $_GET['id'];?>"  enctype="multipart/form-data">
        <div class="modal-body" id="outletdetail">
        <div class="row">
          <div class="input-group mb-3">
            <div class="col-md-12">
              <select class="form-control input-sm" name="brands" required>
                <option value="">Select Brand</option>
                <?php
                include_once('../resources/conn.php');
                include_once('../resources/functions.php');
                $query = query("SELECT * FROM admin_brand");
                confirm($query);
                while($row = mysqli_fetch_array($query)) {
                $brand_id= $row['brand_id'];
                $brand_name = $row['brand_name'];
                ?>
                <option name="brand" value="<?php echo $brand_name; ?>">
                <?php echo $row['brand_name']; ?>
                </option>
              <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="tin_no" class="form-control" placeholder="TIN" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="tel_no" class="form-control" placeholder="Tel. No." required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="address" class="form-control" placeholder="Address" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="barangay" class="form-control" placeholder="Barangay/District" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <div class="col-md-6">
              <select class="form-control input-sm" name="province" onchange="getUnderCategory($(this).val());" required>
                <option value="">Select Province</option>
                  <?php
                  $query = query("SELECT * FROM admin_province");
                  confirm($query);
                  while($row = mysqli_fetch_array($query)) {
                  $add_id = $row['add_id'];
                  $price = $row['price'];
                  $province =  $row['province'];
                  ?>
                  <option name="cat" value="<?php echo $add_id; ?>">
                  <?php echo $row['province']; ?>
                  </option>
                  <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-control input-sm" name="municipality" id="under_category" required>
                <option value="">Select Municipality</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="location_name" class="form-control" placeholder="Location Name" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="postalcode" class="form-control" placeholder="Postal Code" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="MIN" class="form-control" placeholder="Min" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="MSN" class="form-control" placeholder="MSN" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="PTUN" class="form-control" placeholder="PTUN" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>

    </div>
  </div>
</div>