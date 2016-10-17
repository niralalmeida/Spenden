<!DOCTYPE html>
<html>
<head>
	<title>Spenden - Edit Profile</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="jquery3.1.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-switch.min.js"></script>
    
    <script src="bloodbankscript.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#navbuttons li:nth-child(3)').addClass('active');
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
                <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Edit Profile</h2>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container" style="padding-bottom: 55px">
    	<div class="row">
    		<div class="col-md-4"></div>
    		<div class="col-md-4">
    			<form name="editprofile" method="post" action="updatebank.php">
    				<div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter New Name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="mobileno">Mobile Number:</label>
                        <input type="text" name="mobileno" class="form-control" placeholder="Enter New Mobile" id="mobileno">
                    </div>
                    <div class="form-group">
                    	<label for="password">Password: </label>
                        <input type="password" name="password" class="form-control" placeholder="Enter New Password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="donorcity">Select City:</label>
                        <select class="form-control" name="city" id="donorcity">
                        	<option value="0" selected="selected"></option>
                            <option value="1">Allahabad</option>
                            <option value="2">Aurangabad</option>
                            <option value="3">Bangalore</option>
                            <option value="4">Baroda</option>
                            <option value="5">Chandigarh</option>
                            <option value="6">Chennai</option>
                            <option value="7">Delhi</option>
                            <option value="8">Guwahati</option>
                            <option value="9">Hyderabad</option>
                            <option value="10">Indore</option>
                            <option value="11">Jaipur</option>
                            <option value="12">Kolkata</option>
                            <option value="13">Lucknow</option>
                            <option value="14">Mumbai</option>
                            <option value="15">Mysore</option>
                            <option value="16">Nasik</option>
                            <option value="17">Pune</option>
                            <option value="18">Ranchi</option>
                            <option value="19">Surat</option>
                            <option value="20">Udaipur</option>
                            <option value="21">Varanasi</option>
                            <option value="22">Vishakhapatnam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aplusinput">Update A+ Stock</label>
                        <input type="number" name="aplus" id="aplusinput" min="0" class="form-control" placeholder="Enter Stock of A+ type">
                    </div>
                    <div class="form-group">
                        <label for="aminusinput">Update A- Stock</label>
                        <input type="number" name="aminus" id="aminusinput" min="0" class="form-control" placeholder="Enter Stock of A- type">
                    </div>
                    <div class="form-group">
                        <label for="bplusinput">Update B+ Stock</label>
                        <input type="number" name="bplus" id="bplusinput" min="0" class="form-control" placeholder="Enter Stock of B+ type">
                    </div>
                    <div class="form-group">
                        <label for="bminusinput">Update B- Stock</label>
                        <input type="number" name="bminus" id="bminusinput" min="0" class="form-control" placeholder="Enter Stock of B- type">
                    </div>
                    <div class="form-group">
                        <label for="oplusinput">Update O+ Stock</label>
                        <input type="number" name="oplus" id="oplusinput" min="0" class="form-control" placeholder="Enter Stock of O+ type">
                    </div>
                    <div class="form-group">
                        <label for="ominusinput">Update O- Stock</label>
                        <input type="number" name="ominus" id="ominusinput" min="0" class="form-control" placeholder="Enter Stock of O- type">
                    </div>
                    <div class="form-group">
                        <label for="abplusinput">Update AB+ Stock</label>
                        <input type="number" name="abplus" id="abplusinput" min="0" class="form-control" placeholder="Enter Stock of AB+ type">
                    </div>
                    <div class="form-group">
                        <label for="abminusinput">Update AB- Stock</label>
                        <input type="number" name="abminus" id="abminusinput" min="0" class="form-control" placeholder="Enter Stock of AB- type">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger" style="float: left;">
                        <input type="submit" name="update" value="Update" class="btn btn-primary" style="float: right;">
                    </div>
    			</form>
    		</div>
    		<div class="col-md-4"></div>
    	</div>
    </div>
    <?php  include("loggedbank.php") ?>
</body>
</html>