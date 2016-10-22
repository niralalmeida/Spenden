<!DOCTYPE html>
<html>
<head>
	<title>Spenden - View Requests</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="jquery3.1.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    
    <script src="bloodbankscript.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
            $('#navbuttons li:nth-child(1)').addClass('active');
        });
    </script>
    
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="jumbotron" style="background-color: #d6351e; margin-bottom: 25px;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <img src="blood_donation-512.png" height="100px" width="100px" class="img-rounded img-responsive">
            </div>
            <div class="col-md-6">
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - View Requests</h2>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
    	<div class="row" style="padding-bottom: 10px">
    		<div class="col-md-3"></div>
    		<div class="col-md-6">
    			<?php
    				session_start();

    				$bloodgroup = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
            		$cities = ['Allahabad','Aurangabad','Bangalore','Baroda','Chandigarh','Chennai','Delhi','Guwahati','Hyderabad','Indore','Jaipur','Kolkata','Lucknow','Mumbai','Mysore','Nasik','Pune','Ranchi','Surat','Udaipur','Varanasi','Vishakhapatnam'];

            		mysql_connect("localhost","root") or die(mysql_error());
            		mysql_select_db("bloodbank") or die(mysql_error());

            		$query = "select * from donors where donorid = ".$_SESSION["id"];

            		$donor = mysql_query($query) or die(mysql_error());
            		$donor = mysql_fetch_array($donor);

            		$query = "select * from requests where city = ".$donor["city"]." and bloodgroup = ".$donor["bloodgroup"];

            		$requests = mysql_query($query) or die(mysql_error());
            		if(mysql_num_rows($requests) > 0) {
            			while($row = mysql_fetch_array($requests)) {

            				$fullname = $row["name"];
            				$email = $row["email"];
            				$mobileno = $row["mobileno"];

            				echo "<div class='media'>";
    						echo "<div class='media'>";
                        	echo "<div class='media-left'>";
                        	echo "<img src='blood_drop-512.png' class='media-object img-rounded' style='width: 75px; height: 75px'>";
                        	echo "</div>";
                        	echo "<div class='media-body'>";
                        	echo "<h4 class='media-heading'>".$fullname."</h4>";
                        	echo "<p>Email: ".$email."</p>";
                        	echo "<p>Mobile: ".$mobileno."</p>";
                        	echo "</div></div>";

            			}
            		}

    			?>
    		</div>
    		<div class="col-md-3"></div>
    	</div>
    </div>
    <?php include("loggeddonor.php"); ?>
</body>
</html>