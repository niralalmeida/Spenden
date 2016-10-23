<!DOCTYPE HTML>
<html>
<head>
    <?php
        if(isset($_POST) && isset($_POST["register_form"])) {
            if($_POST["register_form"] == "donor") {
        
                $name = $_POST["fullname"];
                $age = $_POST["age"];
                $mobile = $_POST["mobileno"];
                $email = $_POST["email"];
                $age = $_POST["age"];
                $weight = $_POST["weight"];
                $gender = $_POST["gender"];
                $city = $_POST["city"];
                $bloodgroup = $_POST["bloodgroup"];
                $password = $_POST["password"];
        
                mysql_connect("localhost", "root") or die(mysql_error());
                mysql_select_db("bloodbank") or die(mysql_error());

                $maxid = mysql_query("select max(donorid) from donors") or die(mysql_error());
                $maxid = mysql_fetch_array($maxid);
                $maxid = $maxid[0] + 1;

                mysql_query("insert into donors(donorid,name,age,mobileno,email,password,weight,gender,bloodgroup,city)  values(".$maxid.",'$name','$age','$mobile','$email','".md5($password)."','$weight','$gender','$bloodgroup','$city')") or die(mysql_error());

                $result = mysql_query("select * from donors where email = '$email'") or die(mysql_error());
                $result = mysql_fetch_array($result, MYSQL_ASSOC);

                session_start();

                $_SESSION["loggedas"] = "donor";
                $_SESSION["username"] = $email;
                $_SESSION["id"] = $result["donorid"];

                header("Location: donorprofile.php");
                exit();

                mysql_close();
        
            } else {
        
                $name = $_POST["bname"];
                $email = $_POST["email"];
                $mobile = $_POST["mobileno"];
                $password = $_POST["password"];
                $city = $_POST["location"];
                
                mysql_connect("localhost", "root") or die(mysql_error());
                mysql_select_db("bloodbank") or die(mysql_error());

                $maxid = mysql_query("select max(bankid) from bloodbanks") or die(mysql_error());
                $maxid = mysql_fetch_array($maxid);
                $maxid = $maxid[0] + 1;

                mysql_query("insert into bloodbanks(bankid,name, mobileno, email, password, location) values(".$maxid.",'$name','$mobile','$email','".md5($password)."',$city)") or die(mysql_error());

                $result = mysql_query("select * from bloodbanks where email = '$email'") or die(mysql_error());
                $result = mysql_fetch_array($result, MYSQL_ASSOC);

                session_start();

                $_SESSION["loggedas"] = "bank";
                $_SESSION["username"] = $email;
                $_SESSION["id"] = $result["bankid"];
                
                mysql_query("insert into bloodstocks values(".$_SESSION["id"].",0,0,0,0,0,0,0,0)") or die(mysql_error());

                header("Location: bankprofile.php");
                exit();

                mysql_close();
        
            }
        }
    ?>
	<title>Spenden - Registration</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="jquery3.1.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-switch.min.js"></script>
    
    <script type="text/javascript">
        function formSelect() {
            if ($('#myonoffswitch').is(":checked")) {
                $('#bankRegister').hide();
                $('#donorRegister').show();
            } else {
                $('#bankRegister').show();
                $('#donorRegister').hide();
            }
        }

        function init() {
            $('#bankRegister').hide();
            $('#donorRegister').show();
        }
    </script>
    
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="switch.css">
</head>
    <body style="background-color: white" onload="init()" background="background/az_subtle_@2X.png">
        <div class="jumbotron" style="background-color: #d6351e; margin-bottom: 25px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <img src="blood_donation-512.png" height="100px" width="100px" class="img-rounded img-responsive">
                </div>
                <div class="col-md-6">
                    <h2 id="header-name" style="font-size: 46px; font-family: Algerian">Spenden - Registration</h2>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 55px;">
        <div class="well" style="background-color: white">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <p style="font: arial; font-size: 24px;">Blood Bank</p>
                </div>
                <div class="col-md-2">
                    <form>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" onchange="formSelect()" checked>
                            <label class="onoffswitch-label" for="myonoffswitch"></label>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <p style="font: arial; font-size: 24px;">Donor</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="mainform">
                    <form name="donorRegister" id="donorRegister" method="post" action="register.php">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="donorname" name="fullname" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" name="age" class="form-control" id="donorage" placeholder="Enter Age">
                        </div>
                        <div class="form-group">
                            <label for="mobileno">Mobile Number:</label>
                            <input type="text" name="mobileno" id="donormobileno" class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="donoremail" class="form-control" placeholder="Enter Email Id">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="donorpassword" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="number" name="weight" id="donorweight" class="form-control" placeholder="Enter Weight in Kgs.">
                        </div>
                        <div class="form-group">
                            <label for="genderdiv">Gender: </label>
                            <div id="genderdiv">
                                <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="other">Other</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bloodgroup">Select Blood Group:</label>
                            <select class="form-control" id="donorbloodgroup" name="bloodgroup">
                                <option value="1">A+</option>
                                <option value="2">A-</option>
                                <option value="3">B+</option>
                                <option value="4">B-</option>
                                <option value="5">O+</option>
                                <option value="6">O-</option>
                                <option value="7">AB+</option>
                                <option value="8">AB-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donorcity">Select City:</label>
                            <select class="form-control" id="donorcity" name="city">
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
                            <input type="hidden" name="register_form" value="donor">
                        	<input type="submit" value="Register" class="btn btn-primary" id="donorsubmitbutton">
                        </div>
                    </form>
                    <form name="bankRegister" id="bankRegister" method="post" action="register.php">
                        <div class="form-group">
                            <label for="bankname">Name:</label>
                            <input type="text" class="form-control" name="bname" id="bankname" placeholder="Enter Bank Name here">
                        </div>
                        <div class="form-group">
                            <label for="mobileno">Representative Mobile Number:</label>
                            <input type="text" name="mobileno" id="bankmobileno" class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="email">Representative Email:</label>
                            <input type="email" name="email" id="bankemail" class="form-control" placeholder="Enter Email Id">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="bankpassword" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="donorcity">Select City:</label>
                            <select class="form-control" id="bankcity" name="location">
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
                            <input type="hidden" name="register_form" value="bank">
                        	<input type="submit" value="Register" class="btn btn-primary" id="banksubmitbutton">
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
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
                     <li class="active"><a href="register.php">Registration</a></li>
                     <li><a href="donorlist.php">Donor Directory</a></li>
                     <li><a href="banklist.php">Bank Directory</a></li>
                     <li><a href="bloodtips.php">Blood Tips</a></li>
                     <li><a href="aboutus.php">About Us</a></li>
                 </ul>
             </div>
        </nav>
    </body>
</html>