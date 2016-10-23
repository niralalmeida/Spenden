<!DOCTYPE html>
<html>
<head>
	<title>Spenden - Event List</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">

	<script type="text/javascript" src="jquery3.1.1.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="bloodbankscript.js"></script>
    <script type="text/javascript">
       	$(document).ready(function() {
       	    $('#navbuttons li:nth-child(2)').addClass('active');
       	});
    </script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body background="background/az_subtle_@2X.png">
	<div class="jumbotron" style="background-color: #d6351e; margin-bottom: 25px;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <img src="blood_donation-512.png" height="100px" width="100px" class="img-rounded img-responsive">
            </div>
            <div class="col-md-6">
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Event List</h2>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
    		<div class="row" style="padding-bottom: 50px">
    			<div class="col-md-3"></div>
    			<div class="col-md-6">
    				<?php

    					session_start();

    					$cities = ['Allahabad','Aurangabad','Bangalore','Baroda','Chandigarh','Chennai','Delhi','Guwahati','Hyderabad','Indore','Jaipur','Kolkata','Lucknow','Mumbai','Mysore','Nasik','Pune','Ranchi','Surat','Udaipur','Varanasi','Vishakhapatnam'];

    					$months = ['January', 'February','March','April','May','June','July','August','September','October','November','December'];

    					mysql_connect("localhost", "root") or die(mysql_error());
    					mysql_select_db("bloodbank") or die(mysql_error());

    					$query = "select * from donors where donorid = ".$_SESSION["id"];
    					$donor = mysql_query($query) or die(mysql_error());
    					$donor = mysql_fetch_array($donor);

    					$query = "select * from bloodbanks where location = ".$donor["city"];
    					$banks = mysql_query($query) or die(mysql_error());
    					if(mysql_num_rows($banks) > 0) {
    						while ($bank = mysql_fetch_array($banks)) {
    							
    							$query = "select * from events where bankid = ".$bank["bankid"];
    							$events = mysql_query($query) or die(mysql_error());

    							if(mysql_num_rows($events) > 0) {
    								while ($event = mysql_fetch_array($events)) {
    									$eventname = $event["eventname"];
    									$eventday = $event["eventday"];
    									$eventmonth = $months[$event["eventmonth"] - 1];
    									$eventlocation = $event["eventlocation"];
    									$bankname = $bank["name"];
    									$mobile = $bank["mobileno"];
    									$email = $bank["email"];
                                        echo "<div class='well' style='background-color: white'>";
    									echo "<div class='media'>";
										echo "<div class='media-left'>";
										echo "<img src='blood_drop-512.png' class='media-object' style='width: 75px; height: 75px'>";
										echo "</div>";
										echo "<div class='media-body'>";
										echo "<h4 class='media-heading'>$eventname</h4>";
                                        echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-calendar'></span> ".$eventday." of ".$eventmonth."<br></div>";
										echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-map-marker'></span> ".$eventlocation."<br></div>";
                                        echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-phone'></span> ".$mobile."<br></div>";
                                        echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-envelope'></span> ".$email."<br></div>";
										echo "</div>";
										echo "</div>";
                                        echo "</div>";
    								}
    							}
    						}
    					}

    					mysql_close();
    				?>
    			</div>
    			<div class="col-md-3"></div>
    		</div>
    </div>
    <?php  include("loggeddonor.php"); ?>
</body>
</html>