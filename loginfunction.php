<?php session_start();
// Function for login
include_once("resources/functions.php");
$username 	    = escape_string($_POST["username"]);
$password_nu 	= escape_string($_POST["password"]);
$password_b64   = base64_encode($password_nu);
$password_enc   = md5($password_b64);

$sql = query("SELECT * FROM admin_user WHERE user_name = '".trim($username)."' AND user_pass = '".trim($password_enc)."' AND status = 1 ");
confirm($sql);
if (row_count($sql) == 1) {
	$row = mysqli_fetch_array($sql);
	$UserRole = $row['user_role'];
	if (trim($UserRole) == "Admin") { 	
		$_SESSION["admin_user_name"]	   = $row["user_name"];
		$_SESSION["admin_user_id"]		   = $row["user_id"];
		$_SESSION["admin_user_fname"] 	   = $row["user_fname"];
		$_SESSION["admin_user_lname"] 	   = $row["user_lname"];
		$_SESSION["admin_user_guid"]	   = $row["user_guid"];
		$_SESSION["admin_user_email"] 	   = $row["user_email"];
		$_SESSION["admin_contact_no"] 	   = $row["contact_no"];
		$_SESSION["admin_status"] 		   = $row["status"];
	    $_SESSION["admin_user_role"] 	   = $row["user_role"];  
		$_SESSION["admin_user_profile"]    = $row["user_profile"];
		$_SESSION["webpanel"]	    	   = $row["user_guid"];
		$_SESSION["admin_account_created"] = $row["Date"];
		$_SESSION["admin_account_updated"] = $row["date_updated"];	
		echo "admin";
	} elseif (trim($UserRole) == "Client") {			
		$_SESSION["client_user_name"]	 	= $row["user_name"];
		$_SESSION["client_user_id"]		 	= $row["user_id"];
		$_SESSION["client_user_fname"] 	 	= $row["user_fname"];
		$_SESSION["client_user_lname"] 	 	= $row["user_lname"];
		$_SESSION["client_user_guid"]	 	= $row["user_guid"];
		$_SESSION["client_user_email"] 	 	= $row["user_email"];
		$_SESSION["client_contact_no"] 	 	= $row["contact_no"];
		$_SESSION["client_status"] 		 	= $row["status"];
	    $_SESSION["client_user_role"] 	 	= $row["user_role"];  
		$_SESSION["client_user_profile"] 	= $row["user_profile"];
		$_SESSION["clientpanel"] 		 	= $row["user_guid"];
		$_SESSION["client_account_created"] = $row["Date"];
		$_SESSION["client_account_updated"] = $row["date_updated"];	
	    echo "client";
	}  elseif (trim($UserRole) == "Manager") {
		$_SESSION["manager_user_name"]	 	 = $row["user_name"];	
		$_SESSION["manager_user_fname"]   	 = $row["user_fname"];
		$_SESSION["manager_user_lname"]   	 = $row["user_lname"];
		$_SESSION["manager_user_email"]	  	 = $row["user_email"];
		$_SESSION["manager_contact_no"]   	 = $row["contact_no"];
		$_SESSION["manager_status"] 	 	 = $row["status"];
		$_SESSION["manager_user_role"] 	 	 = $row["user_role"]; 
		$_SESSION["manager_user_id"]	 	 = $row["user_id"];
		$_SESSION["manager_user_guid"]	  	 = $row["user_guid"];
		$_SESSION["managerpanel"] 		  	 = $row["user_guid"];
		$_SESSION["manager_user_profile"] 	 = $row["user_profile"];
		$_SESSION["manager_account_created"] = $row["Date"];
		$_SESSION["manager_account_updated"] = $row["date_updated"];

		$store_ids   = '';
		$store_guids = '';
		$query   = query("SELECT store_id, user_guid FROM admin_outlets WHERE manager_guid = '".$_SESSION["manager_user_guid"]."' AND active = 2");
		confirm($query);

		while ($row1 = fetch_array($query )) { 
			$store_ids   .= $row1['store_id'].',';
			$store_guids .= "'".$row1['user_guid']."',";
		}

		$_SESSION["manager_store_id"]   = rtrim($store_ids,',');		
		$_SESSION["manager_store_guid"] = rtrim($store_guids,',');	
		
		echo "manager";
	} else {
		echo $row['user_role'];
	}
} else {
	echo "wrong credential";
}
?>