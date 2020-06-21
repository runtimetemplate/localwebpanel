<?php 

$category_name = $_POST['catname'];
$brand_name = $_POST['brandname'];
include '../../resources/conn.php';
include '../../resources/functions.php';
$datenow = returncurrentdate24HRFULLDAY();
$sql = "INSERT INTO `admin_category`(`category_name`, `brand_name`, `origin`, `status`, `updated_at`) VALUES ('$category_name','$brand_name','Server',1,'datenow')";
$result = mysqli_query($connection, $sql);
echo '<script>';
echo 'alert("Updated Successfully");';
echo 'self.location = "../index.php?defcat";';
echo '</script>';

?>

