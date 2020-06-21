<?php session_start();
// Function for login
include_once("resources/conn.php");
include_once("resources/functions.php");
$username 	= escape_string($_POST["username"]);
$password_nu 	= escape_string($_POST["password"]);
$password_b64 = base64_encode($password_nu);
$password_enc = md5($password_b64);

$sql = "SELECT * FROM admin_user WHERE user_name = '".$username."' AND user_pass = '".$password_enc."' ";
$result = mysqli_query($connection,$sql);
if (row_count($result) > 0) { 
	$row = mysqli_fetch_assoc($result);
	if ($row['user_role'] =='Admin') { 	
		$_SESSION["admin_user_name"]	= $row["user_name"];
		$_SESSION["admin_user_id"]		= $row["user_id"];
		$_SESSION["admin_user_fname"] 	= $row["user_fname"];
		$_SESSION["admin_user_lname"] 	= $row["user_lname"];
		$_SESSION["admin_user_guid"]	= $row["user_guid"];
		$_SESSION["admin_user_email"] 	= $row["user_email"];
		$_SESSION["admin_contact_no"] 	= $row["contact_no"];
		$_SESSION["admin_status"] 		= $row["status"];
	    $_SESSION["admin_user_role"] 	= $row["user_role"];  
		$_SESSION["admin_user_profile"] = $row["user_profile"];
		$_SESSION["webpanel"]	    	= $row["user_guid"];
		echo "admin";
	} elseif ($row['user_role'] == 'Client') {			
		$_SESSION["client_user_name"]	 = $row["user_name"];
		$_SESSION["client_user_id"]		 = $row["user_id"];
		$_SESSION["client_user_fname"] 	 = $row["user_fname"];
		$_SESSION["client_user_lname"] 	 = $row["user_lname"];
		$_SESSION["client_user_guid"]	 = $row["user_guid"];
		$_SESSION["client_user_email"] 	 = $row["user_email"];
		$_SESSION["client_contact_no"] 	 = $row["contact_no"];
		$_SESSION["client_status"] 		 = $row["status"];
	    $_SESSION["client_user_role"] 	 = $row["user_role"];  
		$_SESSION["client_user_profile"] = $row["user_profile"];
		$_SESSION["clientpanel"] 		 = $row["user_guid"];
	    echo "client";
	}  elseif ($row['user_role'] == 'Manager') {
		$_SESSION["manager_user_name"]	  = $row["user_name"];	
		$_SESSION["manager_user_fname"]   = $row["user_fname"];
		$_SESSION["manager_user_lname"]   = $row["user_lname"];
		$_SESSION["manager_user_email"]	  = $row["user_email"];
		$_SESSION["manager_contact_no"]   = $row["contact_no"];
		$_SESSION["manager_status"] 	  = $row["status"];
		$_SESSION["manager_user_role"] 	  = $row["user_role"]; 
		$_SESSION["manager_user_id"]	  = $row["user_id"];
		$_SESSION["manager_user_guid"]	  = $row["user_guid"];
		$_SESSION["managerpanel"] 		  = $row["user_guid"];
		$_SESSION["manager_user_profile"] = $row["user_profile"];
		echo "manager";
	}
} else {
	echo "wrong credential";
}

?>