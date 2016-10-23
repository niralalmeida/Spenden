<!DOCTYPE html>
<html>
<head>
    <?php
        session_start();

        if(isset($_POST) && (isset($_POST["update"]) || isset($_POST["delete"]))) {

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
    
    <script src="bloodbankscript.js"></script>
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
                    Edit Profile Successful!
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    	<div class="row">
    		<div class="col-md-4"></div>
    		<div class="col-md-4 well" style="background-color: white">
    			<form name="editprofile" method="post" action="donoreditprofile.php">
    				<div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="donorname" name="fullname" placeholder="Enter New Name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" name="age" class="form-control" id="donorage" placeholder="Enter Age">
                    </div>
                    <div class="form-group">
                        <label for="mobileno">Mobile Number:</label>
                        <input type="text" name="mobileno" id="donormobileno" class="form-control" placeholder="Enter New Mobile">
                    </div>
                    <div class="form-group">
                    	<label for="password">Password: </label>
                        <input type="password" name="password" id="donorpassword" class="form-control" placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight:</label>
                        <input type="number" name="weight" id="donorweight" class="form-control" placeholder="Enter Weight in Kgs.">
                    </div>
                    <div class="form-group">
                        <label for="genderdiv">Gender: </label>
                        <div id="genderdiv">
                            <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="other">Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bloodgroup">Select Blood Group:</label>
                        <select class="form-control" id="donorbloodgroup" name="bloodgroup">
                        	<option value="0" selected="selected"></option>
                            <option value="1">A+</option>
                            <option value="2">A-</option>
                            <option value="3">B+</option>
                            <option value="4">B-</option>
                            <option value="5">O+</option>
                            <option value="6">O-</option>
                            <option value="7">AB+</option>
                            <option value="8">AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="donorcity">Select City:</label>
                        <select class="form-control" id="donorcity" name="city">
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
                    	<input type="submit" name="delete" value="Delete" class="btn btn-danger" style="float: left;">
                    	<input type="submit" name="update" value="Update" class="btn btn-primary" style="float: right;">
                    </div>
    			</form>
    		</div>
    		<div class="col-md-4"></div>
    	</div>
    </div>
    <?php  include("loggeddonor.php"); ?>
</body>
</html>