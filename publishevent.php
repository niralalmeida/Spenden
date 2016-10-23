<!DOCTYPE html>
<html>
<head>
    <?php
        session_start();

        if(isset($_POST) && isset($_POST["eventname"])) {

            $name = $_POST["eventname"];
            $day = $_POST["eventday"];
            $month = $_POST["eventmonth"];
            $location = $_POST["eventlocation"];
 
            mysql_connect("localhost", "root") or die(mysql_error());
            mysql_select_db("bloodbank") or die(mysql_error());

            $maxid = mysql_query("select max(eventid) from events") or die(mysql_error());
                $maxid = mysql_fetch_array($maxid);
                $maxid = $maxid[0] + 1;

            $query = "insert into events(eventid,bankid,eventname,eventday,eventmonth,eventlocation) values(".$maxid.",".$_SESSION["id"].",'".$name."',".$day.",".$month.",'".$location."')";

            mysql_query($query) or die(mysql_error());

            mysql_close();
            $flag = 1;

        } else {
            $flag = 0;
        }

    ?>
	<title>Spenden - Publish Event</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="jquery3.1.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    
    <script src="bloodbankscript.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#navbuttons li:nth-child(2)').addClass('active');
            var flag = <?php if(isset($_POST)) { echo $flag; } else { echo 0;} ?>;
            if(flag == 1) {
                $("#success").show();
            } else {
                $("#success").hide();
            }
        });
    </script>
    
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body background="background/az_subtle_@2X.png">
	<div class="jumbotron" style="background-color: #d6351e; margin-bottom: 25px;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <img src="blood_donation-512.png" height="100px" width="100px" class="img-rounded img-responsive">
            </div>
            <div class="col-md-6">
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Publish Event</h2>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container" style="padding-bottom: 55px">
    <div class="row" id="success">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="alert alert-success">
                Event Submitted!
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 well" style="background-color: white">
            <form name="eventform" method="post" action="publishevent.php">
                <div class="form-group">
                    <label for="eventname">Event Name:</label>
                    <input type="text" name="eventname" id="eventname" class="form-control" placeholder="Enter Event Name">
                </div>
                <div class="form-group">
                    <label for="eventday">Enter Event Day:</label>
                    <input type="number" name="eventday" id="eventday" class="form-control" placeholder="Enter Event Day" min="1" max="31">
                </div>
                <div class="form-group">
                    <label for="eventmonth">Enter Event Month:</label>
                    <select class="form-control" id="eventmonth" name="eventmonth">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="eventlocation">Enter Event Location</label>
                    <input type="text" name="eventlocation" class="form-control" id="eventlocation" placeholder="Enter event location here">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Publish" style="float: right;">
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    </div>
    <?php  include("loggedbank.php"); ?>
</body>
</html>