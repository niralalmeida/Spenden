<!DOCTYPE html>
<html>
	<head>
		<?php
        
            $bloodgroup = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
            $cities = ['Allahabad','Aurangabad','Bangalore','Baroda','Chandigarh','Chennai','Delhi','Guwahati','Hyderabad','Indore','Jaipur','Kolkata','Lucknow','Mumbai','Mysore','Nasik','Pune','Ranchi','Surat','Udaipur','Varanasi','Vishakhapatnam'];
        
            session_start();
            
            if(!isset($_SESSION["loggedas"])) {
                
                $username = $_POST["username"];
                $pass = $_POST["password"];
        
                mysql_connect("localhost","root") or die(mysql_error());
        
                mysql_select_db("bloodbank") or die(mysql_error());
        
                $query = "select * from donors where email = '$username'";
        
                $result = mysql_query($query) or die(mysql_error());
                $result = mysql_fetch_row($result, MYSQL_ASSOC);
        
                if(md5($pass) == $result["password"]) {
                
                    $_SESSION["loggedas"] = "donor";
                    $_SESSION["username"] = $result["email"];
                    $_SESSION["id"] = $result["donorid"];
                    
                } else {
                    header("Location: index.html");
                    exit();
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
                            <img src="default-<?php echo($result['gender']);  ?>.png" class="media-object" style="height: 150px; width: 150px;">
                        </div>
                        <div class="media-body">
                            <h2><?php  echo $result["name"]; ?></h2>
                            <br>
                            <p><strong>Contact Number:</strong> <?php  echo $result["mobileno"]; ?></p>
                            <p><strong>Email Id:</strong> <?php  echo $result["email"]; ?></p>
                            <p><strong>Blood Group:</strong> <?php  echo $bloodgroup[$result["bloodgroup"] - 1]; ?></p>
                            <p><strong>City:</strong> <?php  echo $cities[$result["city"] - 1]; ?></p>
                            <p><strong>Age:</strong> <?php  echo $result["age"]; ?></p>
                            <p><strong>Weight:</strong> <?php  echo $result["weight"]; ?> kg</p>
                            <p><strong>Age:</strong> <?php  echo $result["age"]; ?></p>
                            <p><strong>Sex:</strong> <?php  echo ucfirst($result["gender"]); ?></p>
                            <a type="button" class="btn btn-success" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!--Navigation Bar-->
        <?php  include 'loggeddonor.php' ?>
	</body>
</html>