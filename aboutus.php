<!DOCTYPE HTML>
<html>
	<head>
		<title>Spenden - About Us</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device.width, initial-scale=1">

		<script type="text/javascript" src="jquery3.1.1.js"></script>
		<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="bloodbankscript.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#navbuttons li:nth-child(7)').addClass('active');
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
                    <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - About Us</h2>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 40px">
        	<div class="row">
        		
        	</div>
        </div>
        <?php
            session_start();
        
            if(isset($_SESSION["loggedas"])) {
                if($_SESSION["loggedas"] == "donor") {
                    include 'loggeddonor.php';
                } else {
                    include 'loggedbank.php';
                }
            } else {
                include 'defaultnav.php';
                session_destroy();
            }
        ?>
	</body>
</html>