<?php
include '../../resources/conn.php';
include '../../resources/functions.php';
$formula_id = $_POST['id'];
$sql = "DELETE FROM `admin_product_formula_org` WHERE formula_id = ". $formula_id ;
query($sql);
echo 'Deleted Successfully!';
?>