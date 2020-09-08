<?php


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$contactnumber = $_POST['contactnumber'];
$password = $_POST['password'];
$retypepassword = $_POST['retypepassword'];
$checked = $_POST['checked'];
$Profile = '';
$password_b64 = base64_encode($password);
$password_enc = md5($password_b64);

if ($firstname == '' || $lastname == ''|| $username == ''|| $email == ''|| $contactnumber == ''|| $password == ''|| $retypepassword == '' ) {
	# code...
	echo "Please fill up all fields";
} else {
	include 'avatar.php';
	if ($password == $retypepassword) {
		if ($checked == 'female') {
			# code...
			$Profile = ReturnAvatar('female');
		} elseif ($checked == 'male') {
			# code...
			$Profile = ReturnAvatar('male');
		}	
		include 'resources/functions.php';
		$userguid = getGUID();
		$fields = '`user_name`, `user_profile`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_role`, `contact_no`, `user_guid`, `status`';
		$values = "'$username' , '$Profile', '$firstname', '$lastname', '$email', '$password_enc', 'Client', '$contactnumber', '$userguid', 0";
		save('admin_user', $fields ,$values);
		echo "Registered Successfully";
	# code...
	} else {
		echo 'Password not match';
	}
}

?>
