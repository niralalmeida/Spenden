<?php

	session_start();
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$logintype = $_POST["optradio"];
	
	mysql_connect("localhost","root") or die(mysql_error());
	
	if($logintype === "donor") {
		$tablename = "donors";
	} else {
		$tablename = "bloodbanks";
	}
	
	mysql_select_db("bloodbank") or die(mysql_error());
	
	$query = "select password from $tablename where email = '$username'";
	$dbpass = mysql_query($query) or die(mysql_error());
	
	if(md5($password) === $dbpass) {
		if($logintype === "donor") {

			$_SESSION["email"] = $username;
			header("location: donorprofile.php");
			exit();
			
		} else if ($logintype == "bank") {
			
			$_SESSION["email"] = $username;
			header("location: bankprofile.php");
			exit();
			
		} else {
			
			header("location: index.html");
			exit();
			
		}
	}
	
?>