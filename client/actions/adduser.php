<?php session_start();
include '../../resources/functions.php';


$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$store = $_POST['store'];
$role = $_POST['role'];
$contactnumber = $_POST['contactnumber'];
$gender = $_POST['gender'];
$guid = $_SESSION['client_user_guid'];

$datenow = FullDateFormat24HR();

$password_base64 = base64_encode($password);
$password_crypt  = md5($password_base64);

$fourdigitrandom = rand(1000,9999); 

$store_name = getstorename($store);
$uniq_id = $store_name.'-'.$fourdigitrandom; 

$sql = "INSERT INTO `loc_users`
(`user_level`,`full_name`,`username`,`password`,`contact_number`,`email`,`position`,`gender`,`active`,`guid`,`store_id`,`uniq_id`,`pwd`,`synced`,`created_at`,`updated_at`) VALUES (
'$role','$fullname','$username','$password_crypt','$contactnumber','$email','$role','$gender',1,'$guid','$store','$uniq_id','$password','Unsynced','$datenow','$datenow')";
$result = mysqli_query($connection, $sql);
echo '<script>';
echo 'alert("Registered Successfully");';
echo 'self.location = "../index.php?users";';
echo '</script>';
?>

