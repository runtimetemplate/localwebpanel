<?php
    date_default_timezone_set('Asia/Manila');
    include_once("conn.php");
    function query($sql){	
		global $connection;
        return mysqli_query($connection, $sql);
    }
    function confirm($results){
        global $connection;
        if (!$results) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
    function escape_string($string){
        global $connection;
        return mysqli_real_escape_string($connection, $string);
    }
    function row_count($result) {
    	include_once("conn.php");
    	$result = mysqli_num_rows($result);
    	return $result;
	}

    function fetch_array($result) {
        global $connection;
        return mysqli_fetch_array($result);
    }
	function selectmunicipality($municipalityID){
    	$query = query("SELECT mn_name FROM admin_municipality WHERE mn_id = $municipalityID");
    	confirm($query);
   		$row = mysqli_fetch_array($query);
   		$municipality = $row['mn_name'];
    	return $municipality;
	}
	function selectprovince($provinceID){
    	$query = query("SELECT province FROM admin_province WHERE add_id = $provinceID");
    	confirm($query);
	    $row = mysqli_fetch_array($query);
	    $province = $row['province'];
	    return $province;
	}
    function outletcheck($outletid){
        $query = query("SELECT active FROM admin_outlets WHERE store_id = $outletid");
        confirm($query);
        $row = mysqli_fetch_array($query);
        $outlet = $row['active'];
        return $outlet;
    }
    function getacronym($Brandname) {
        $query = query("SELECT * FROM admin_brand WHERE brand_name = '$Brandname'" );
        confirm($query);
        $row = mysqli_fetch_array($query);
        $acronym = $row['acronym'];  
        return $acronym;
    }
    function last_id() {
        global $connection;
        return mysqli_insert_id($connection);
    }
    function save($table , $fields, $values) {
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $result = query($sql);
        if($result) {
            return last_id();
        } else {
            return "Error $results -> $sql";
        }

    }
    function edit($table,$fldnval,$id) {
        $sql    = "UPDATE $table SET $fldnval WHERE id = '$id'";
        $result = mysqli_query($sql);
        if ($result) {
            return "";
        } else {
            return "Error $result";
        }

    }
    function delete($table,$id) {
        $sql    = "DELETE FROM $table WHERE id = '$id'";
        $result = mysqli_query($sql);
        if ($result) {
            return "";
        } else {
            return "Error $result";
        }
    }
    function select_each($table,$where) {
        $sql = "SELECT * FROM $table $where";
        $rs = mysqli_query($sql);
        if ($rs) {
            if (mysqli_num_rows($rs) > 0) {
                return $rs;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtolower(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = 
                 substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
            return $uuid;
        }
    }
    function getrows($userguid){
        $query = query("SELECT user_fname, user_lname FROM admin_user WHERE user_guid = '$userguid'");
        confirm($query);
        $firstname = '';
        while ($row = fetch_array($query)) {
             $firstname = $row['user_fname'];
        } 
        return $firstname  ;
    }
    function FullDateFormat24HR() {
      return  date("Y-m-d H:m:i");
    }
    function ReturnDateFormat() {
      return  date("Y-m-d");
    }
?>