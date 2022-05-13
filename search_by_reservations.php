<?php
$pickup = $_POST["pickup"];
$return = $_POST["return"];


$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");


$sql = "select *
from reservation natural join car natural join customer
where (pickup_date BETWEEN '$pickup' and '$return')
and (return_date BETWEEN '$pickup' and '$return')";


$result = mysqli_query($connect,$sql);

$cars = mysqli_fetch_all($result,MYSQLI_ASSOC);





?>

<html>
<link rel="stylesheet" href="style.css">
    
<!--<form action="logout.php">
 <div class ="button_up" id="xx"><input type="submit" value="Log Out" /></div> </form> -->
 <form  method="post" name="registerForm" onsubmit="true" action="reservations_admin.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div></form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Reservations</h4>
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
                <h4>customer's Name: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['name']); ?>'/></h4>
                <h4>Customer's Email: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['email']); ?>'/></h4>
                <h4>Customers's ID: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['customer_id']); ?>'/></h4>
                <h4>Customer's Phone No. : <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['phone_number']); ?>'/></h4>
               <div> <h2> </h2> </div> <hr>
                <?php } ?>
                <div class ="button_up"><input type="submit" value="OK"/></div>
            </form>
    </div>


            </body>
</html>