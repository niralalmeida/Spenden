<!DOCTYPE html>
<html>
<head>
	<title>Spenden - Publish Event</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="jquery3.1.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    
    <script src="bloodbankscript.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#navbuttons li:nth-child(2)').addClass('active');
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
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Publish Event</h2>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container" style="padding-bottom: 55px">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form name="eventform" method="post" action="storeevent.php">
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