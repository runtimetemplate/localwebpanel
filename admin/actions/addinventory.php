<?php
include '../../resources/conn.php';
include '../../resources/functions.php';
$product_ingredients = $_POST['product_ingredients'];
$critical_limit = $_POST['critical_limit'];
$datenow = returncurrentdate24HRFULLDAY();

$sql = 'SELECT MAX(formula_id) AS FormulaID FROM admin_pos_inventory_org';
$result = query($sql);
$row = mysqli_fetch_array($result);
$formula_id = $row['FormulaID'] + 1 ;


$sql2 = "INSERT INTO `admin_pos_inventory_org`(`formula_id`, `product_ingredients`, `stock_quantity`, `stock_total`, `stock_status`, `critical_limit`, `date_modified`) VALUES ($formula_id, '$product_ingredients',0,0,1,'$critical_limit','$datenow')";

query($sql2);
echo '<script>';
echo 'alert("Added Successfully");';
echo 'self.location = "../index.php?definv";';
echo '</script>';

?>

