<?php
$model = $_POST["model"];
$plate_id = $_POST["plate_id"];
$car_status = $_POST["car_status"];
$price_per_day = $_POST["price_per_day"];
$country = $_POST["country"];
$city = $_POST["city"];


?>
<html>
    <head>
        <title>Add New Car</title>
        <script>
                function addValidate(){
                    let pid = document.forms["addForm"]["pid"].value;
                if (pid == "") {
                alert("Status must be filled out");
                return false;
                }

                let model = document.forms["addForm"]["status"].value;
                if (model == "") {
                alert("status must be filled out");
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
<div class = "title"><h1>Edit Car</h1></div>
            <form  method="post" name="addForm" onsubmit="return addValidate()" action="save_edit_car.php">
            <div class = "input_container"><h3>Plate_id:  </h3>
            <input readonly type="text" name="plate_id" value='<?php echo $plate_id?>'/></div>
            <div class = "input_container"><h3>Car_Model:  </h3>
            <input  readonly type="text" name="model" placeholder='<?php echo $model ?>'/></div>
            <div class = "input_container"><h3>Car_Status: </h3>
            <input type="text" name="status" value='<?php echo $car_status?>'/></div>
            <div class = "input_container"><h3>Country:  </h3>
            <input  readonly type="text" name="country" placeholder='<?php echo $country ?>'/></div>
            <div class = "input_container"><h3>City:  </h3>
            <input  readonly type="text" name="city" placeholder='<?php echo $city ?>'/></div>
            <div class = "input_container"><h3>Price_per_day:  </h3>
            <input  readonly type="number" min="0.1" step="0.1" name="ppd" placeholder='<?php echo $price_per_day ?>'/></div>
            <div class ="button"><input type="submit" value="Edit"/></div>
            
</form>
</div>
</html>