<!DOCTYPE html>
<html>
	<head>
		<?php
        
            session_start();
            
            if(!isset($_SESSION["logged"])) {
                
                $username = $_POST["username"];
                $pass = $_POST["password"];
        
                mysql_connect("localhost","root") or die(mysql_error());
        
                mysql_select_db("bloodbank") or die(mysql_error());
        
                $query = "select * from donors where email = '$username'";
        
                $result = mysql_query($query) or die(mysql_error());
                $result = mysql_fetch_row($result, MYSQL_ASSOC);
        
                if(md5($pass) == $result["password"]) {
                
                    $_SESSION["logged"] = true;
                    $_SESSION["username"] = $result["email"];
                    $_SESSION["id"] = $result["donorid"];
                    
                }
                
                mysql_close();
                
            }
        
            mysql_connect("localhost","root") or die(mysql_error());
        
            mysql_select_db("bloodbank") or die(mysql_error());
        
            $username = $_SESSION["username"];
        
            $query = "select * from donors where email = '$username'";
                
            $result = mysql_query($query) or die(mysql_error());
            $result = mysql_fetch_array($result);
        
            echo "<title>Spenden - ".$result["name"]."</title>";
        
		?>

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
                    <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden</h2>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="media">
                        <div class="media-left">
                            <img src="default-male.jpg" class="media-object" style="height: 150px; width: 150px">
                        </div>
                        <div class="media-body">
                            <h2><?php  echo $result["name"]; ?></h2>
                            <br>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!--Navigation Bar-->
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
             <div class="container-fluid">
                 <div class="navbar-header">
                     <a class="navbar-brand" href="donorprofile.php">Profile</a>
                 </div>
                 <ul class="nav navbar-nav">
                     <li><a href="#">View Requests</a></li>
                     <li><a href="#">View Events</a></li>
                     <li><a href="#">Edit Profile</a></li>
                     <li><a href="donorlist-logged.php">Donor Directory</a></li>
                     <li><a href="banklist-logged.php">Bank Directory</a></li>
                     <li><a href="bloodtips-logged.html">Blood Tips</a></li>
                     <li><a href="aboutus-logged.html">About Us</a></li>
                 </ul>
             </div>
        </nav>
	</body>
</html>