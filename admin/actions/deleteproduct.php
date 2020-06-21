<?php
include '../../resources/conn.php';
include '../../resources/functions.php';
$product_id = $_POST['id'];
$sql = "DELETE FROM `admin_products_org` WHERE product_id = ". $product_id ;
query($sql);
echo 'Deleted Successfully!';
?>