<?php session_start();

include_once '../../resources/functions.php';

$fname 	  = $_POST['fname'];
$lname 	  = $_POST['lname'];
$email 	  = $_POST['email'];
$contact  = $_POST['contact'];
$datenow  = FullDateFormat24HR();
$guid     = $_SESSION['admin_user_guid'];

$sql = "UPDATE `admin_user` SET 
`user_fname`  = '$fname',
`user_lname`  = '$lname',
`user_email`  = '$email',
`contact_no`  = '$contact',
`date_updated`= '$datenow' 
WHERE user_guid = '".$guid."'";

$result = query($sql);

$log_desc  = "PROFILE UPDATE";
$log_date = $datenow;

$_SESSION["admin_user_fname"] 	 	= $fname;
$_SESSION["admin_user_lname"] 	 	= $lname;
$_SESSION["admin_user_email"] 	 	= $email;
$_SESSION["admin_contact_no"] 	 	= $contact;
$_SESSION["admin_account_updated"]  = $datenow;	

userlogs($guid,$log_desc);

echo '<script>';
echo 'alert("Updated Successfully");';
echo 'self.location = "../?profile";';
echo '</script>';
?>


