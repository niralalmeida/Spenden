<!DOCTYPE html>
<html>
<head>
	<title>Spenden - View Events</title>

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
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - View Events</h2>
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

    				$months = ["Januray","February","March","April","May","June","July","August","Spetember","October","November","December"];

    				mysql_connect("localhost", "root") or die(mysql_error());
    				mysql_select_db("bloodbank") or die(mysql_error());

    				$query = "select * from events where bankid = ".$_SESSION["id"];

    				$result = mysql_query($query) or die(mysql_error());

    				if(mysql_num_rows($result) > 0) {
    					while ($row = mysql_fetch_array($result)) {

    						$bank = mysql_query("select * from bloodbanks where bankid = ".$row["bankid"]) or die(mysql_error());
    						$bank = mysql_fetch_array($bank);
    						
    						$eventname = $row["eventname"];
    						$eventday = $row["eventday"];
    						$eventmonth = $months[$row["eventmonth"] - 1];
    						$eventlocation = $row["eventlocation"];

    						echo "<div class='media'>";
    						echo "<div class='media'>";
                        	echo "<div class='media-left'>";
                        	echo "<img src='blood_drop-512.png' class='media-object img-rounded' style='width: 75px; height: 75px'>";
                        	echo "</div>";
                        	echo "<div class='media-body'>";
                        	echo "<h4 class='media-heading'>".$eventname."</h4>";
                        	echo "<p><strong>By:</strong> ".$bank["name"];
                            echo "     |    ";
                        	echo "<strong>On:</strong> ".$eventday." of ".$eventmonth."</p>";
                        	echo "<p><strong>At:</strong> ".$eventlocation."</p>";
                        	echo "</div></div>";
    					}
    				}

    				mysql_close();

    			?>
    		</div>
    		<div class="col-md-3"></div>
    	</div>
    </div>
    <?php include("loggedbank.php"); ?>
</body>
</html>