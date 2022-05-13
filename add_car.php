<?php
session_start();
if(isset($_SESSION["added"])){
    $alert="<script>alert('car is added successfully');</script>";
    echo $alert;
    unset($_SESSION["added"]);
}
if(isset($_SESSION["pid"])){
    $alert2="<script>alert('oops Error , there is a car with the same plate id');</script>";
    echo $alert2;
    unset($_SESSION["pid"]);
}
?>
<html>
    <head>
        <title>Add New Car</title>
        <script>
                function addValidate(){
                    let pid = document.forms["addForm"]["pid"].value;
                if (pid == "") {
                alert("Plat_id must be filled out");
                return false;
                }

                let model = document.forms["addForm"]["model"].value;
                if (model == "") {
                alert("Car Model must be filled out");
                return false;
                }

                let sta = document.forms["addForm"]["status"].value;
                if (sta == "") {
                alert("Car_Status must be filled out");
                return false;
                }

                let country = document.forms["addForm"]["country"].value;
                if (country == "" ) {
                alert("Country must be filled out");
                return false;
                }

                let city = document.forms["addForm"]["city"].value;
                if (city == "" ) {
                alert("City must be filled out");
                return false;
                }

                let ppd = document.forms["addForm"]["ppd"].value;
                if (ppd == "" || ppd < 0) {
                alert("Price_per_day must be filled out and be postive number");
                return false;
                }

                }

            
            </script>
            
            <link rel="stylesheet" href="style.css"> 
</head>
<body>
<form  method="post" name="registerForm" onsubmit="true" action="admin_screen_main.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div>
    </form>
<div class="container">
<div class = "title"><h1>New Car</h1></div>
            <form  method="post" name="addForm" onsubmit="return addValidate()" action="save_new_car.php">
            <div class = "input_container"><label>Plate_id:  </label>
            <input type="text" name="pid" placeholder="plate id"/></div>
            <div class = "input_container"><label>Car_Model:  </label>
            <input type="text" name="model" placeholder="car model"/></div>
            <div class = "input_container"><label>Car_Status: </label>
            <input type="text" name="status" placeholder="car status"/></div>
            <div class = "input_container"><label>Country:  </label>
            <input type="text" name="country" placeholder="country"/></div>
            <div class = "input_container"><label>City:  </label>
            <input type="text" name="city" placeholder="city"/></div>

            <div class = "input_container"><label>Price_per_day:  </label>
            <input type="number" min="0.1" step="0.1" name="ppd" placeholder="price per day"/></div>
            <div class ="button"><input type="submit" value="Add"/></div>
            
</form>
</div>
</html>