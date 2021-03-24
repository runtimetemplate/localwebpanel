<?php 

$query = $_POST['query'];

include '../../resources/functions.php';

$sql = "INSERT INTO `admin_script_runner`(`script_command`, `active`) VALUES ('$query',1)";
$result = mysqli_query($connection, $sql);

if ($result) {
	echo "Complete";
} else {
	echo "ERROR > $sql";
}
?>
