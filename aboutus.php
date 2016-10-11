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
        $document.ready(function() {
            $('#navbuttons li:last-child').addClass('active');
        });
        </script>

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
                    <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - About Us</h2>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 40px">
        	<div class="row">
        		<div class="col-md-4">
        			<h3>Rudolph Almeida</h3>
        			<ul>
        				<li>TECMPN A</li>
        				<li>Roll No: 5</li>
        				<li>Primary Role: Coding, implementation and serial coffee consumer</li>
        			</ul>
        			<blockquote>
        				<p>Suddenly the "&lt;" and "&gt;" keys on my keyboard are all rubbed out.</p>
        				<footer>Rudolph Almeida</footer>
        			</blockquote>
        		</div>
        		<div class="col-md-4">
        			<h3>Niral Almeida</h3>
        			<ul>
        				<li>TECMPN A</li>
        				<li>Roll No: 4</li>
        				<li>Primary Role: Designing and Documentation</li>
        			</ul>
        			<blockquote>
        				<p>The boys did a good job but there is still scope for improvement.</p>
        				<footer><strike>MS Dhoni</strike> Niral Almeida</footer>
        			</blockquote>
        		</div>
        		<div class="col-md-4">
        			<h3>Smit Carvalho</h3>
        			<ul>
        				<li>TECMPN A</li>
        				<li>Roll No: 9</li>
        				<li>Primary Role: Documentation and Coding</li>
        			</ul>
        			<blockquote>
        				<p>I think it's important to have some documentation of the past.</p>
        				<footer><strike>Henry Rollins</strike> Smit Carvalho</footer>
        			</blockquote>
        		</div>
        	</div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <pre style="padding-bottom: 10%;">This site was made using Bootstrap and Jquery. 
Registration switch designed at <a href="https://proto.io/freebies/onoff/">proto.io</a></pre>
            </div>
            <div class="col-md-4"></div>
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