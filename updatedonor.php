<?php

	session_start();

	if(isset($_POST["delete"])) {

		mysql_connect("localhost","root") or die(mysql_error());
		mysql_select_db("bloodbank") or die(mysql_error());

		$query = "delete from donors where donorid = ".$_SESSION["id"];

		mysql_query($query) or die(mysql_error());

		mysql_close();

		session_unset();
		session_destroy();

		header("Location: index.html");
		exit();

	} else {

		mysql_connect("localhost", "root") or die(mysql_error());
		mysql_select_db("bloodbank") or die(mysql_error());


		if(isset($_POST["fullname"]) and $_POST["fullname"] != "") {

			mysql_query("update donors set name = '".$_POST["fullname"]."' where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["age"]) and $_POST["age"] != "") {

			mysql_query("update donors set age = ".$_POST["age"]." where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["mobileno"]) and $_POST["mobileno"] != "") {

			mysql_query("update donors set mobileno = '".$_POST["mobileno"]."' where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["password"]) and $_POST["password"] != "") {

			mysql_query("update donors set password = '".md5($_POST["password"])."' where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["weight"]) and $_POST["weight"] != "") {

			mysql_query("update donors set weight = ".$_POST["weight"]." where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["gender"]) and $_POST["gender"] != "") {

			mysql_query("update donors set gender = '".$_POST["gender"]."' where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["bloodgroup"]) and $_POST["bloodgroup"] != 0) {

			mysql_query("update donors set bloodgroup = ".$_POST["bloodgroup"]." where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["city"]) and $_POST["city"] != 0) {

			mysql_query("update donors set city = ".$_POST["city"]." where donorid = ".$_SESSION['id']) or die(mysql_error());

		}

		mysql_close();

		header("Location: donorprofile.php");
		exit();

	}

?>