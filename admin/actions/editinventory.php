<?php
include '../../resources/conn.php';
include '../../resources/functions.php';
$inventory_id = $_POST['id'];
$sql = "SELECT  product_ingredients , critical_limit  FROM admin_pos_inventory_org WHERE inventory_id = " . $inventory_id;
$result = query($sql);
$row = mysqli_fetch_array($result);
$product_ingredients = $row['product_ingredients'];
$critical_limit 	 = $row['critical_limit'];
echo '
<div class="card-body">
<input type="hidden" class="form-control"  name="inventory_id" value="'.$inventory_id.'"> 
	<div class="row">
		<label>Product Ingredient</label>
	  	<div class="input-group mb-3">	  
	    	<input type="text" class="form-control"  name="product_ingredients" required value="'.$product_ingredients.'">  
	  	</div>
	</div>
	<div class="row">  
		<label>Critital Limit</label>       
	  	<div class="input-group mb-3">
	    	<input type="text" class="form-control"  name="critical_limit"  required value="'.$critical_limit.'">  
	  	</div>
	</div>
</div>';
?>

