<?php

$plate_id = $_POST["plate_id"];
$price_per_day = $_POST["price_per_day"];


session_start();
if(isset($_SESSION["email"])){
    /*$alert="<script>alert('email is already exsists');</script>";
    echo $alert;*/
   $email = $_SESSION["email"];
}
$_SESSION["plate_id"] = $plate_id;
$_SESSION["price_per_day"] = $price_per_day;





?>
<html>
    <head>
        <title>reserve car</title>
        <script>
                function addValidate(){
                    let pid = document.forms["reserveform"]["pickup"].value;
                if (pid == "") {
                alert("pickup date must be filled out");
                return false;
                }

                let model = document.forms["reserveform"]["return"].value;
                if (model == "") {
                alert("return date must be filled out");
                return false;
                }

                let sta = document.forms["reserveform"]["country"].value;
                if (sta == "") {
                alert("country must be filled out");
                return false;
                }

                let ppd = document.forms["reserveform"]["city"].value;
                if (ppd == "" || ppd < 0) {
                alert("city must be filled out");
                return false;
                }

                }

            
            </script>
            
            <link rel="stylesheet" href="style.css"> 
</head>
<body>
<form  method="post" name="registerForm" onsubmit="true" action="available_cars.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div>
    </form>
<div class="container">
<div class = "title"><h1>Reserve Car</h1></div>

            <form  method="post" name="reserveform" onsubmit="return addValidate()" action="save_reservation.php">
            <div><label><h3>pickUp Date:</h3>  </label>
            <h6></h6>
            <input type="date" name="pickup" id="pick" placeholder="pick up date"/></div>
            
            <div><label><h3>Return Date:</h3>  </label>
            <input type="date" name="return" placeholder="return date"/></div>
            
           <!-- <div class = "input_container"><label><h3>country:</h3> </label>
            <input type="text" name="country" placeholder="Country"/></div>
            <div class = "input_container"><label><h3>City: </h3> </label>
            <input type="text" name="city" placeholder="City"/></div>-->
            <h6></h6>
            <div> <h2> </h2> </div> <hr>
            <div class ="button"><input type="submit" value="Reserve"/>
        </div>
</form>
</div>
</html>