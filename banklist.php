<!DOCTYPE html>
<html>
	<head>
		<title>Spenden - Bank List</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device.width, initial-scale=1">

		<script type="text/javascript" src="jquery3.1.1.js"></script>
		<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="bloodbankscript.js"></script>

		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	</head>
	<body>
		<div class="jumbotron" style="background-color: #d6351e; margin-bottom: 25px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <img src="blood_donation-512.png" height="100px" width="100px" class="img-rounded img-responsive">
                </div>
                <div class="col-md-6">
                    <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Bank List</h2>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="container">
        	<?php
                $cities = ['Allahabad','Aurangabad','Bangalore','Baroda','Chandigarh','Chennai','Delhi','Guwahati','Hyderabad','Indore','Jaipur','Kolkata','Lucknow','Mumbai','Mysore','Nasik','Pune','Ranchi','Surat','Udaipur','Varanasi','Vishakhapatnam'];
        		mysql_connect("localhost","root") or die(mysql_error());
				mysql_select_db("bloodbank") or die(mysql_error());
				$query = "select * from bloodbanks order by name";
				$result = mysql_query($query) or die(mysql_error());
				if(mysql_num_rows($result) > 0 ) {
					while ($row = mysql_fetch_array($result)) {
						$name = $row["name"];
						$mobile = $row["mobileno"];
						$email = $row["email"];
						$city = $cities[$row["location"] - 1];
						echo "<div class='row'>";
						echo "<div class='col-md-2'></div>";
						echo "<div class='col-md-8'>";
						echo "<pre>";
						echo "<h3>$name</h3>";
                        echo "<strong>Contact Number:</strong> $mobile    <strong>Email:</strong> $email";
                        echo "    <strong>City:</strong> $city";
						echo "</pre>";
						echo "</div>";
						echo "<div class='col-md-2'></div>";
						echo "</div>";
					}
				} else {
					echo "No Registered Donors";
				}
				mysql_close();
        	?>
        </div>
        <!--Navigation Bar-->
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
             <div class="container-fluid">
                 <div class="navbar-header">
                     <a class="navbar-brand" href="index.html">Spenden</a>
                 </div>
                 <ul class="nav navbar-nav">
                     <li><a href="index.html">Search Blood</a></li>
                     <li><a href="requestblood.html">Request Blood</a></li>
                     <li><a href="register.html">Registration</a></li>
                     <li><a href="donorlist.php">Donor Directory</a></li>
                     <li class="active"><a href="banklist.php">Bank Directory</a></li>
                     <li><a href="bloodtips.html">Blood Tips</a></li>
                     <li><a href="aboutus.html">About Us</a></li>
                 </ul>
             </div>
        </nav>
	</body>
</html>