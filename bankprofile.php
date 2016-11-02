<!DOCTYPE html>
<html>
	<head>
		<?php
        
            $cities = ['Allahabad','Aurangabad','Bangalore','Baroda','Chandigarh','Chennai','Delhi','Guwahati','Hyderabad','Indore','Jaipur','Kolkata','Lucknow','Mumbai','Mysore','Nasik','Pune','Ranchi','Surat','Udaipur','Varanasi','Vishakhapatnam'];
        
            session_start();
            
            if(!isset($_SESSION["loggedas"])) {
                
                $username = $_POST["username"];
                $pass = $_POST["password"];
        
                mysql_connect("localhost","root") or die(mysql_error());
        
                mysql_select_db("bloodbank") or die(mysql_error());
        
                $query = "select * from bloodbanks where email = '$username'";
        
                $result = mysql_query($query) or die(mysql_error());
                $result = mysql_fetch_row($result, MYSQL_ASSOC);
        
                if(md5($pass) == $result["password"]) {
                
                    $_SESSION["loggedas"] = "bank";
                    $_SESSION["username"] = $result["email"];
                    $_SESSION["id"] = $result["bankid"];
                    
                } else {
                    header("Location: index.html");
                    exit();
                }
                
                mysql_close();
                
            }
        
            mysql_connect("localhost","root") or die(mysql_error());
        
            mysql_select_db("bloodbank") or die(mysql_error());
        
            $username = $_SESSION["username"];
        
            $query = "select * from bloodbanks where email = '$username'";
                
            $result = mysql_query($query) or die(mysql_error());
            $result = mysql_fetch_array($result);

            $query = "select * from bloodstocks where bankid = ".$_SESSION['id'];

            $stocks = mysql_query($query) or die(mysql_error());
            $stocks = mysql_fetch_array($stocks);
        
            echo "<title>Spenden - ".$result["name"]."</title>";
        
		?>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device.width, initial-scale=1">

		<script type="text/javascript" src="jquery3.1.1.js"></script>
		<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="Chart.js"></script>

        <script type="text/javascript">
        window.onload = drawchart;
        function drawchart() {
            var ctx = document.getElementById("stockchart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["A+", "A-", "B+", "B-", "O+", "O-","AB+","AB-"],
                    datasets: [{
                        label: 'Blood Stock (in litres)',
                        data: [<?php echo($stocks['aplus'].",".$stocks['aminus'].",".$stocks['bplus'].",".$stocks['bminus'].",".$stocks['oplus'].",".$stocks['ominus'].",".$stocks['abplus'].",".$stocks['abminus']) ?>],
                        backgroundColor: [
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 19, 1)',
                        ],
                        borderColor: [
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
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
                    <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden</h2>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="margin-top: 75px;">
                <div class="col-md-5 well" style="background-color: white;">
                    <div class="media">
                        <div class="media-left">
                            <img src="blood_drop-512.png" class="media-object" style="height: 150px; width: 150px;">
                        </div>
                        <div class="media-body">
                            <h2><?php  echo $result["name"]; ?></h2>
                            <br>
                            <p><strong>Contact Number:</strong> <?php  echo $result["mobileno"]; ?></p>
                            <p><strong>Email Id:</strong> <?php  echo $result["email"]; ?></p>
                            <p><strong>City:</strong> <?php  echo $cities[$result["location"] - 1]; ?></p>
                            <a type="button" class="btn btn-success" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 well" style="background-color: white;">
                    <canvas id="stockchart"></canvas>
                </div>
                
            </div>
        </div>
        <!--Navigation Bar-->
        <?php  include 'loggedbank.php' ?>
	</body>
</html>