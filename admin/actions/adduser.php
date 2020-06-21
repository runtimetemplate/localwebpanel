<?php
include '../../resources/conn.php';
include '../../resources/functions.php';

if(isset($_FILES["image"])){
    $FileData = file_get_contents($_FILES["image"]["tmp_name"]);
}
$user_name            = $_POST['username'];
$user_fname           = $_POST['fname'];
$user_lname           = $_POST['lname'];
$user_email           = $_POST['email'];
$user_pass            = $_POST['password'];
$image_base64         = base64_encode($FileData);
$contact_no           = $_POST['contactno'];
$getgui = getGUID(); 
$password = base64_encode($user_pass);
// $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$'; 
// $password_crypt = crypt($salt, $password);
$password_crypt = md5($password);
$table  = "admin_user";
$fields = "user_name, user_profile ,user_fname, user_lname ,user_email, user_pass, user_role, contact_no,user_guid ,status";
$values = "'{$user_name}','{$image_base64}', '{$user_fname}','{$user_lname}', '{$user_email}', '{$password_crypt}', 'Client', '{$contact_no}','{$getgui}','1'";
save($table, $fields, $values);
echo '<script>window.location = "../index.php?users"; </script>'
?>
