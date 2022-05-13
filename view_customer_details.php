<?php
$email = $_POST["email"];
$name =  $_POST["name"];


$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");


$sql = "select *
from customer natural join reservation natural join car
where email = '$email'";

$result = mysqli_query($connect,$sql);

$cars = mysqli_fetch_all($result,MYSQLI_ASSOC);


$loggedUser = "SELECT * FROM customer WHERE email = '$email'";
    $result2=mysqli_query($connect,$loggedUser);
    $returned=mysqli_fetch_array($result2);
    $c_id=$returned["customer_id"];
    $phone = $returned["phone_number"];



?>

<html>
<link rel="stylesheet" href="style.css">
    
<!--<form action="logout.php">
 <div class ="button_up" id="xx"><input type="submit" value="Log Out" /></div> </form> -->
 <form  method="post" name="registerForm" onsubmit="true" action="statistics.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div></form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h3 class="center grey-text">Customer Name : <?php echo $name?><?php?></h3>
    <h3 class="center grey-text">Customer Email : <?php echo $name?><?php?></h3>
    <h3 class="center grey-text">Customer id : <?php echo $c_id ?><?php?></h3>
    <h3 class="center grey-text">Phone Number : <?php echo $phone ?><?php?></h3>
    <div> <h2> </h2> </div> <hr>

            <form action = "admin_screen_main.php">
            <?php foreach($cars as $car){ ?>
                <h4>Reservation No. :<input readonly type="text" name="plate_id" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_no']); ?>'/></h>
                <h4>Pickup Date: <input readonly type="text" name="model" style="width:200px;" value ='<?php echo htmlspecialchars($car['pickup_date']); ?>'/></h4>
                <h4>Return Date: <input readonly type="text" name="car_status" style="width:200px;" value ='<?php echo htmlspecialchars($car['return_date']); ?>'/></h4>
                <h4>Payment Price: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_price']); ?>'/></h4>
                <h4>Car Plate ID: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['plate_id']); ?>'/></h4>
                <h4>Car Model: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['model']); ?>'/></h4>
                <h4>Car Status: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['car_status']); ?>'/></h4>
                <h4>Country: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['country']); ?>'/></h4>
                <h4>City: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['city']); ?>'/></h4>
               <div> <h2> </h2> </div> <hr>
                <?php } ?>
                <div class ="button_up"><input type="submit" value="OK"/></div>
            </form>
    </div>


            </body>
</html>