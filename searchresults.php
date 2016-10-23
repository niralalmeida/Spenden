<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">

	<script type="text/javascript" src="jquery3.1.1.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bloodbankscript.js"></script>

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
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Search Results</h2>
            </div>
    	    <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
    <div class="row" style="padding-bottom: 50px">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <?php

    	$bloodgroups = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
        $cities = ['Allahabad','Aurangabad','Bangalore','Baroda','Chandigarh','Chennai','Delhi','Guwahati','Hyderabad','Indore','Jaipur','Kolkata','Lucknow','Mumbai','Mysore','Nasik','Pune','Ranchi','Surat','Udaipur','Varanasi','Vishakhapatnam'];

        $bloodgroup = $_POST["bloodgroup"];
        $city = $_POST["city"];

        mysql_connect("localhost","root") or die(mysql_error());
        mysql_select_db("bloodbank") or die(mysql_error());

        switch ($bloodgroup) {
            case 1:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where aplus > 0 or aminus > 0 or oplus > 0 or ominus > 0) order by name";
                break;
            case 2:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where aminus > 0 or ominus > 0) order by name";
                break;
            case 3:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where bplus > 0 or bminus > 0 or oplus > 0 or ominus > 0) order by name";
                break;
            case 4:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where bminus > 0 or ominus > 0) order by name";
                break;
            case 5:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where oplus > 0 or ominus > 0) order by name";
                break;
            case 6:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where ominus > 0) order by name";
                break;
            case 7:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where oplus > 0 or ominus > 0 or aplus > 0 or aminus > 0 or bplus > 0 or bminus > 0 or abplus > 0 or abminus > 0) order by name";
                break;
            case 8:
                $query = "select * from bloodbanks where location = ".$city." and bankid in (select bankid from bloodstocks where ominus > 0 or aminus > 0 or bminus > 0 or abminus > 0) order by name";
                break;
        }

        $result = mysql_query($query) or die(mysql_error());
        if(mysql_num_rows($result) > 0) {
        	echo "<h3>Blood Banks</h3>";
        	while ($row = mysql_fetch_array($result)) {
        		$name = $row["name"];
        		$mobile = $row["mobileno"];
        		$email = $row["email"];
        		$location = $cities[$row["location"] - 1];
        		echo "<div class='media well' style='background-color: white'>";
                echo "<div class='media-left'>";
                echo "<img src='blood_drop-512.png' class='media-object img-rounded' style='width: 75px; height: 75px'>";
                echo "</div>";
                echo "<div class='media-body'>";
                echo "<h4 class='media-heading'>".$name."</h4>";
                echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-phone'></span> ".$mobile."<br></div>";
                echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-envelope'></span> ".$email."<br></div>";
                echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-map-marker'></span> ".$location."<br></div>";
                echo "</div>";
                echo "</div>";
        	}
        }

        switch($bloodgroup) {
            case 1:
                $query = "select * from donors where city = ".$city." and bloodgroup in (1,2,5,6) order by name";
                break;
            case 2:
                $query = "select * from donors where city = ".$city." and bloodgroup in (2,6) order by name";
                break;
            case 3:
                $query = "select * from donors where city = ".$city." and bloodgroup in (3,4,5,6) order by name";
                break;
            case 4:
                $query = "select * from donors where city = ".$city." and bloodgroup in (4,6) order by name";
                break;
            case 5:
                $query = "select * from donors where city = ".$city." and bloodgroup in (5,6) order by name";
                break;
            case 6:
                $query = "select * from donors where city = ".$city." and bloodgroup in (6) order by name";
                break;
            case 7:
                $query = "select * from donors where city = ".$city." and bloodgroup in (1,2,3,4,5,6,7,8) order by name";
                break;
            case 8:
                $query = "select * from donors where city = ".$city." and bloodgroup in (2,4,6,8) order by name";
                break;

        }

        $result = mysql_query($query) or die(mysql_error());

        if (mysql_num_rows($result) > 0) {
        	echo "<h3>Donors</h3>";
        	while ($row = mysql_fetch_array($result)) {
				$name = $row["name"];
				$mobile = $row["mobileno"];
				$email = $row["email"];
				$blood = $bloodgroups[$row["bloodgroup"] - 1];
				$city = $cities[$row["city"] - 1];
				echo "<div class='media well' style='background-color: white'>";
				echo "<div class='media-left'>";
				echo "<img src='default-".$row['gender'].".png' class='media-object' style='width: 75px; height: 75px'>";
				echo "</div>";
				echo "<div class='media-body'>";
				echo "<h4 class='media-heading'>$name</h4>";
				echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-phone'></span> ".$mobile."<br></div>";
                echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-envelope'></span> ".$email."<br></div>";
                echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-heart'></span> ".$blood."<br></div>";
                echo "<div style='padding-bottom: 5px'><span class='glyphicon glyphicon-map-marker'></span> ".$city."<br></div>";
				echo "</div>";
				echo "</div>";
			}
        }

        echo "<div class='alert alert-info fade in out'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>You can also choose to request blood <a href='requestblood.php'><strong>here</strong></a></div>";

        mysql_close();

    ?>
    </div>
    <div class="col-md-3"></div>
    </div>
    <!--Navigation Bar-->
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Spenden</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.html">Search Blood</a></li>
                <li><a href="requestblood.php">Request Blood</a></li>
                <li><a href="register.php">Registration</a></li>
                <li><a href="donorlist.php">Donor Directory</a></li>
                <li><a href="banklist.php">Bank Directory</a></li>
                <li><a href="bloodtips.php">Blood Tips</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>