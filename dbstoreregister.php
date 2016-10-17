<?php

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

        mysql_query("insert into donors(name,age,mobileno,email,password,weight,gender,bloodgroup,city)  values('$name','$age','$mobile','$email','".md5('$password')."','$weight','$gender','$bloodgroup','$city')") or die(mysql_error());

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

        mysql_query("insert into bloodbanks(name, mobileno, email, password, location) values('$name','$mobile','$email','".md5($password)."',$city)") or die(mysql_error());

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

?>