<?php
	
	session_start();

	$name = $_POST["eventname"];
	$day = $_POST["eventday"];
	$month = $_POST["eventmonth"];
	$location = $_POST["eventlocation"];
 
	mysql_connect("localhost", "root") or die(mysql_error());
	mysql_select_db("bloodbank") or die(mysql_error());

	$query = "insert into events(bankid,eventname,eventday,eventmonth,eventlocation) values(".$_SESSION["id"].",'".$name."',".$day.",".$month.",'".$location."')";

	mysql_query($query) or die(mysql_error());

	mysql_close();

	header("Location: viewevents.php");
	exit();

?>