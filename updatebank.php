<?php

	session_start();

	if(isset($_POST["delete"])) {

		mysql_connect("localhost","root") or die(mysql_error());
		mysql_select_db("bloodbank") or die(mysql_error());

		$query = "delete from bloodbanks where bankid = ".$_SESSION["id"];

		mysql_query($query) or die(mysql_error());

		mysql_close();

		session_unset();
		session_destroy();

		header("Location: index.html");
		exit();

	} else if(isset($_POST["update"])) {

		mysql_connect("localhost", "root") or die(mysql_error());
		mysql_select_db("bloodbank") or die(mysql_error());


		if(isset($_POST["fullname"]) and $_POST["fullname"] != "") {

			mysql_query("update bloodbanks set name = '".$_POST["fullname"]."' where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["mobileno"]) and $_POST["mobileno"] != "") {

			mysql_query("update bloodbanks set mobileno = '".$_POST["mobileno"]."' where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["password"]) and $_POST["password"] != "") {

			mysql_query("update bloodbanks set password = '".md5($_POST["password"])."' where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["city"]) and $_POST["city"] != 0) {

			mysql_query("update bloodbanks set location = ".$_POST["city"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["aplus"]) and $_POST["aplus"] != "") {

			mysql_query("update bloodstocks set aplus = ".$_POST["aplus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["aminus"]) and $_POST["aminus"] != "") {

			mysql_query("update bloodstocks set aminus = ".$_POST["aminus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["bplus"]) and $_POST["bplus"] != "") {

			mysql_query("update bloodstocks set bplus = ".$_POST["bplus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["bminus"]) and $_POST["bminus"] != "") {

			mysql_query("update bloodstocks set bminus = ".$_POST["bminus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["oplus"]) and $_POST["oplus"] != "") {

			mysql_query("update bloodstocks set oplus = ".$_POST["oplus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["ominus"]) and $_POST["ominus"] != "") {

			mysql_query("update bloodstocks set ominus = ".$_POST["ominus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["abplus"]) and $_POST["abplus"] != "") {

			mysql_query("update bloodstocks set abplus = ".$_POST["abplus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		if(isset($_POST["abminus"]) and $_POST["abminus"] != "") {

			mysql_query("update bloodstocks set abminus = ".$_POST["abminus"]." where bankid = ".$_SESSION['id']) or die(mysql_error());

		}

		mysql_close();

		header("Location: bankprofile.php");
		exit();

	}

?>