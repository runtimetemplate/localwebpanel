<div class="modal fade" id="modal-add-inventory">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Inventory</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="actions/addinventory.php"  enctype="multipart/form-data">
        <div class="modal-body" id="add-inventory_detail">
          <div class="card-body">
            <div class="row">
              <label>Product Ingredient</label>
                <div class="input-group mb-3">    
                  <input type="text" class="form-control"  name="product_ingredients" required value="">  
                </div>
            </div>
            <div class="row">  
              <label>Critital Limit</label>       
                <div class="input-group mb-3">
                  <input type="text" class="form-control"  name="critical_limit" required value="">  
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
