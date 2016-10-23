<!DOCTYPE html>
<html>
<head>
	<?php

		session_start();

		if(isset($_POST) && (isset($_POST["update"]) || isset($_POST["delete"]))) {

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

				$flag = 1;

			}

		} else {

		  $flag = 0;

        }

	?>
	<title>Spenden - Edit Profile</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="jquery3.1.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-switch.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#navbuttons li:nth-child(3)').addClass('active');
            var flag = <?php if(isset($_POST)) { echo $flag; } else { echo 0;} ?>;
            if(flag == 1) {
                $("#success").show();
            } else {
                $("#success").hide();
            }
        });
    </script>
    
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="background/az_subtle_@2X.png">
	<div class="jumbotron" style="background-color: #d6351e; margin-bottom: 25px;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <img src="blood_donation-512.png" height="100px" width="100px" class="img-rounded img-responsive">
            </div>
            <div class="col-md-6">
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Edit Profile</h2>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container" style="padding-bottom: 55px">
    	<div class="row" id="success">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="alert alert-success">
                    Profile Edit Successful!
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    	<div class="row">
    		<div class="col-md-4"></div>
    		<div class="col-md-4 well" style="background-color: white">
    			<form name="editprofile" method="post" action="bankeditprofile.php">
    				<div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter New Name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="mobileno">Mobile Number:</label>
                        <input type="text" name="mobileno" class="form-control" placeholder="Enter New Mobile" id="mobileno">
                    </div>
                    <div class="form-group">
                    	<label for="password">Password: </label>
                        <input type="password" name="password" class="form-control" placeholder="Enter New Password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="donorcity">Select City:</label>
                        <select class="form-control" name="city" id="donorcity">
                        	<option value="0" selected="selected"></option>
                            <option value="1">Allahabad</option>
                            <option value="2">Aurangabad</option>
                            <option value="3">Bangalore</option>
                            <option value="4">Baroda</option>
                            <option value="5">Chandigarh</option>
                            <option value="6">Chennai</option>
                            <option value="7">Delhi</option>
                            <option value="8">Guwahati</option>
                            <option value="9">Hyderabad</option>
                            <option value="10">Indore</option>
                            <option value="11">Jaipur</option>
                            <option value="12">Kolkata</option>
                            <option value="13">Lucknow</option>
                            <option value="14">Mumbai</option>
                            <option value="15">Mysore</option>
                            <option value="16">Nasik</option>
                            <option value="17">Pune</option>
                            <option value="18">Ranchi</option>
                            <option value="19">Surat</option>
                            <option value="20">Udaipur</option>
                            <option value="21">Varanasi</option>
                            <option value="22">Vishakhapatnam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aplusinput">Update A+ Stock</label>
                        <input type="number" name="aplus" id="aplusinput" min="0" class="form-control" placeholder="Enter Stock of A+ type">
                    </div>
                    <div class="form-group">
                        <label for="aminusinput">Update A- Stock</label>
                        <input type="number" name="aminus" id="aminusinput" min="0" class="form-control" placeholder="Enter Stock of A- type">
                    </div>
                    <div class="form-group">
                        <label for="bplusinput">Update B+ Stock</label>
                        <input type="number" name="bplus" id="bplusinput" min="0" class="form-control" placeholder="Enter Stock of B+ type">
                    </div>
                    <div class="form-group">
                        <label for="bminusinput">Update B- Stock</label>
                        <input type="number" name="bminus" id="bminusinput" min="0" class="form-control" placeholder="Enter Stock of B- type">
                    </div>
                    <div class="form-group">
                        <label for="oplusinput">Update O+ Stock</label>
                        <input type="number" name="oplus" id="oplusinput" min="0" class="form-control" placeholder="Enter Stock of O+ type">
                    </div>
                    <div class="form-group">
                        <label for="ominusinput">Update O- Stock</label>
                        <input type="number" name="ominus" id="ominusinput" min="0" class="form-control" placeholder="Enter Stock of O- type">
                    </div>
                    <div class="form-group">
                        <label for="abplusinput">Update AB+ Stock</label>
                        <input type="number" name="abplus" id="abplusinput" min="0" class="form-control" placeholder="Enter Stock of AB+ type">
                    </div>
                    <div class="form-group">
                        <label for="abminusinput">Update AB- Stock</label>
                        <input type="number" name="abminus" id="abminusinput" min="0" class="form-control" placeholder="Enter Stock of AB- type">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger" style="float: left;">
                        <input type="submit" name="update" value="Update" class="btn btn-primary" style="float: right;">
                    </div>
    			</form>
    		</div>
    		<div class="col-md-4"></div>
    	</div>
    </div>
    <?php  include("loggedbank.php") ?>
</body>
</html>