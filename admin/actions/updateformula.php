<?php
include '../../resources/conn.php';
include '../../resources/functions.php';
$product_ingredients = $_POST['product_ingredients'];
$primary_unit = $_POST['primary_unit'];
$primary_value = $_POST['primary_value'];
$secondary_unit = $_POST['secondary_unit'];
$secondary_value = $_POST['secondary_value'];
$serving_unit = $_POST['serving_unit'];
$serving_value = $_POST['serving_value'];
$no_servings = $_POST['no_servings'];
$unit_cost = $_POST['unit_cost'];
$formula_id = $_POST['formula_id'];
$datenow = returncurrentdate24HRFULLDAY();

$sql = "UPDATE `admin_product_formula_org` SET `date_modified`= '$datenow', `product_ingredients`= '$product_ingredients',`primary_unit`='$primary_unit',`primary_value`='$primary_value',`secondary_unit`='$secondary_unit',`secondary_value`='$secondary_value',`serving_unit`='$serving_unit',`serving_value`='$serving_value',`no_servings`='$no_servings',`status`=1,`unit_cost`= $unit_cost WHERE formula_id = $formula_id
";
$result = query($sql);
echo '<script>';
echo 'alert("Updated Successfully");';
echo 'self.location = "../index.php?defform";';
echo '</script>';
?>
