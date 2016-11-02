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

        function validatedonorname(name) {
            if(name) {
                var pattern = /^[a-zA-Z ]*$/;
                if(name.match(pattern)) {
                    $('#donorsubmitbutton').attr('disabled', false);
                    $('#namevalid').hide();
                    $('#nameempty').hide();
                    return true;
                } else {
                    $('#donorsubmitbutton').attr('disabled', true);
                    $('#namevalid').show();
                    $('#nameempty').hide();
                    return false;
                }
            } else {
                $('#donorsubmitbutton').attr('disabled', true);
                $('#nameempty').show();
                $('#namevalid').hide();
                return false;
            }
        }
        
        function validatedonorage(age) {
            if(age) {
                if(age >= 18 && age <= 65) {
                    $('#donorsubmitbutton').attr('disabled', false);
                    $('#agevalid').hide();
                    $('#agerequired').hide();
                    return true;
                } else {
                    $('#donorsubmitbutton').attr('disabled', true);
                    $('#agevalid').show();
                    $('#agerequired').hide();
                    return false;
                }
            } else {
                $('#donorsubmitbutton').attr('disabled', true);
                $('#agerequired').show();
                $('#agevalid').hide();
                return false;
            }
        }

        function validatedonorweight(weight) {
            if(weight) {
                if(weight >= 45) {
                    $('#donorsubmitbutton').attr('disabled', false);
                    $('#weightvalid').hide();
                    $('#weightrequired').hide();
                    return true;
                } else {
                    $('#donorsubmitbutton').attr('disabled', true);
                    $('#weightvalid').show();
                    $('#weightrequired').hide();
                    return false;
                }
            } else {
                $('#donorsubmitbutton').attr('disabled', true);
                $('#weightrequired').show();
                $('#weightvalid').hide();
                return false;
            }
        }

        function validatedonormobile(mobile) {
            if(mobile) {
                if(mobile.length == 10) {
                    $('#donorsubmitbutton').attr('disabled', false);
                    $('#mobilevalid').hide();
                    $('#mobilerequired').hide();
                    return true;
                } else {
                    $('#donorsubmitbutton').attr('disabled', true);
                    $('#mobilevalid').show();
                    $('#mobilerequired').hide();
                    return false;
                }
            } else {
                $('#donorsubmitbutton').attr('disabled', true);
                $('#mobilerequired').show();
                $('#mobilevalid').hide();
                return false;
            }
        }

        function validatedonorpassword() {
            var pass1 = document.getElementById("donorpassword").value;
            var pass2 = document.getElementById("donorpassword2").value;
            if(pass1 && pass2) {
                if(pass1 == pass2) {
                    $('#donorsubmitbutton').attr('disabled', false);
                    $('#passwordvalid').hide();
                    $('#passwordrequired').hide();
                    return true;
                } else {
                    $('#donorsubmitbutton').attr('disabled', true);
                    $('#passwordvalid').show();
                    $('#passwordrequired').hide();
                    return false;
                }
            } else {
                $('#donorsubmitbutton').attr('disabled', true);
                $('#passwordrequired').show();
                $('#passwordvalid').hide();
                return false;
            }
        }

        function validatedonoremail(email) {
            if(email) {
                var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(email.match(pattern)) {
                    $('#donorsubmitbutton').attr('disabled', false);
                    $('#emailvalid').hide();
                    $('#emailrequired').hide();
                    return true;
                } else {
                    $('#donorsubmitbutton').attr('disabled', true);
                    $('#emailvalid').show();
                    $('#emailrequired').hide();
                    return false;
                }
            } else {
                $('#emailrequired').show();
                $('#emailvalid').hide();
                $('#donorsubmitbutton').attr('disabled', true);
                return false;
            }
        }

        function donorvalidate() {

            var name = document.getElementById("donorname").value;
            var age = document.getElementById("donorage").value;
            var mobile = document.getElementById("donormobileno").value;
            var weight = document.getElementById("donorweight").value;
            var email = document.getElementById("donoremail").value;

            var emailValid = validatedonoremail(email);
            var nameValid = validatedonorname(name);
            var passwordValid = validatedonorpassword();
            var ageValid = validatedonorage(age);
            var mobileValid = validatedonormobile(mobile);
            var weightValid = validatedonorweight(weight);
            

            if(emailValid && nameValid && passwordValid && ageValid && weightValid && mobileValid) {
                return true;
            } else {
                return false;
            }

        };

        function init() {
            $('#bankRegister').hide();
            $('#donorRegister').show();
            $('#namevalid').hide();
            $('#nameempty').hide();
            $('#agevalid').hide();
            $('#agerequired').hide();
            $('#mobilevalid').hide();
            $('#mobilerequired').hide();
            $('#passwordvalid').hide();
            $('#passwordrequired').hide();
            $('#emailrequired').hide();
            $('#emailvalid').hide();
            $('#weightvalid').hide();
            $('#weightrequired').hide();
            $('#banknamerequired').hide();
            $('#bankemailrequired').hide();
            $('#bankemailinvalid').hide();
            $('#bankmobilerequired').hide();
            $('#bankmobileinvalid').hide();
            $('#bankpasswordrequired').hide();
            $('#bankpasswordinvalid').hide();
        }
    </script>
    
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
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
                    <form name="donorRegister" id="donorRegister" method="post" action="register.php" onsubmit="return donorvalidate();">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="donorname" name="fullname" placeholder="Enter Full Name" onkeyup="validatedonorname(this.value)">
                        </div>
                        <div class="alert alert-danger" id="namevalid">
                            Name cannot contain punctuation or numbers
                        </div>
                        <div class="alert alert-danger" id="nameempty">
                            Name is required
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" name="age" class="form-control" id="donorage" placeholder="Enter Age" onkeyup="validatedonorage(this.value)" onchange="validatedonorage(this.value)">
                        </div>
                        <div class="alert alert-danger" id="agevalid">
                            Age should be between 18 and 65
                        </div>
                        <div class="alert alert-danger" id="agerequired">
                            Age is required
                        </div>
                        <div class="form-group">
                            <label for="mobileno">Mobile Number:</label>
                            <input type="text" name="mobileno" id="donormobileno" class="form-control" placeholder="Enter Mobile Number" onkeyup="validatedonormobile(this.value)">
                        </div>
                        <div class="alert alert-danger" id="mobilevalid">
                            Mobile can be 10 digits only
                        </div>
                        <div class="alert alert-danger" id="mobilerequired">
                            Mobile is required
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="donoremail" class="form-control" placeholder="Enter Email Id" onkeyup="validatedonoremail(this.value)">
                        </div>
                        <div class="alert alert-danger" id="emailvalid">
                            Invalid Email address. Please enter a valid one
                        </div>
                        <div class="alert alert-danger" id="emailrequired">
                            Email is required
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="donorpassword" class="form-control" placeholder="Enter Password" onkeyup="validatedonorpassword()">
                        </div>
                        <div class="form-group">
                            <label for="donorpassword2">Enter Password again:  </label>
                            <input type="password" id="donorpassword2" class="form-control" placeholder="Enter Password Again" onkeyup="validatedonorpassword()">
                        </div>
                        <div class="alert alert-danger" id="passwordvalid">
                            Both Password fields should match
                        </div>
                        <div class="alert alert-danger" id="passwordrequired">
                            Both Password fields are required
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="number" name="weight" id="donorweight" class="form-control" placeholder="Enter Weight in Kgs." onkeyup="validatedonorweight(this.value)" onchange="validatedonorweight(this.value)">
                        </div>
                        <div class="alert alert-danger" id="weightvalid">
                            Weight should be greater than 45 for you to be a donor
                        </div>
                        <div class="alert alert-danger" id="weightrequired">
                            Weight is required
                        </div>
                        <div class="form-group">
                            <label for="genderdiv">Gender: </label>
                            <div id="genderdiv">
                                <label class="radio-inline"><input type="radio" name="gender" value="male" checked="checked">Male</label>
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
                        <div class="alert alert-danger" id="banknamerequired">
                            Bank Name is Required
                        </div>
                        <div class="form-group">
                            <label for="mobileno">Representative Mobile Number:</label>
                            <input type="text" name="mobileno" id="bankmobileno" class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="alert alert-danger" id="bankmobileinvalid">
                            Mobile number should contain only 10 digits
                        </div>
                        <div class="alert alert-danger" id="bankmobilerequired">
                            Mobile number is required
                        </div>
                        <div class="form-group">
                            <label for="email">Representative Email:</label>
                            <input type="email" name="email" id="bankemail" class="form-control" placeholder="Enter Email Id">
                        </div>
                        <div class="alert alert-danger" id="bankemailinvalid">
                            Invalid email address. Please enter a valid one.
                        </div>
                        <div class="alert alert-danger" id="bankemailrequired">
                            Email Address is required
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="bankpassword" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="bankpassword2">Please enter Password again: </label>
                            <input type="password" id="bankpassword2" class="form-control" placeholder="Enter Password Again">
                        </div>
                        <div class="alert alert-danger" id="bankpasswordinvalid">
                            Both Password fields should match
                        </div>
                        <div class="alert alert-danger" id="bankpasswordrequired">
                            Both Password fields are required
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