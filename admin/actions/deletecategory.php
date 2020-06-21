<?php
include '../../resources/conn.php';
include '../../resources/functions.php';
$category_id = $_POST['id'];
$sql = "DELETE FROM `admin_category` WHERE category_id = ". $category_id ;
query($sql);
echo 'Deleted Successfully!';
?>