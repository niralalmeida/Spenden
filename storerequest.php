<?php

	$fullname = $_POST["fullname"];
	$mobileno = $_POST["mobileno"];
	$email = $_POST["email"];
	$bloodgroup = $_POST["bloodgroup"];
	$city = $_POST["city"];

	mysql_connect("localhost", "root") or die(mysql_error());
	mysql_select_db("bloodbank") or die(mysql_error());

	$maxid = mysql_query("select max(requestid) from requests") or die(mysql_error());
	$maxid = mysql_fetch_array($maxid);
	$maxid = $maxid[0] + 1;

	$query = "insert into requests(requestid,name,email,mobileno,bloodgroup,city) values(".$maxid.",'".$fullname."','".$email."','".$mobileno."',".$bloodgroup.",".$city.")";

	mysql_query($query) or die(mysql_error());

	mysql_close();

	header("Location: requestsubmitted.html");
	exit();

?>