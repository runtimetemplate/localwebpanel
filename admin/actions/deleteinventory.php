<?php
include '../../resources/conn.php';
include '../../resources/functions.php';
$inventory_id = $_POST['id'];
$sql = "DELETE FROM `admin_pos_inventory_org` WHERE inventory_id = ". $inventory_id ;
query($sql);
echo 'Deleted Successfully!';
?>