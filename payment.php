<?php
session_start();
if(isset($_SESSION["payed"])){
    $alert="<script>alert('car is Payed succefully');</script>";
    echo $alert;
    unset($_SESSION["payed"]);
}
if(isset($_SESSION["email"])){
    /*$alert="<script>alert('email is already exsists');</script>";
    echo $alert;*/
   $email = $_SESSION["email"];
}
/*
if(isset($_SESSION["email"])){
    $alert="<script>alert('email is already exsists');</script>";
    echo $alert;
   // unset($_SESSION["email"]);
}*/

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

$sql = " SELECT * FROM reservation natural join customer natural join car WHERE email = '$email' and not EXISTS (Select * From payment where payment.reservation_no = reservation.reservation_no) " ;


$result = mysqli_query($connect,$sql);

$cars = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>

<html>
<link rel="stylesheet" href="style.css">
    
<form  method="post" name="registerForm" onsubmit="true" action="customers.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div></form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Not Paid Reservations</h4>
    <div> <h2> </h2> </div> <hr>
            <?php foreach($cars as $car){ ?>
                <form method="post" action = pay.php>
                <h4>Reservation No.: <input type="text" name="reservation_no" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_no']); ?>'/></h4>
                <h4>Reservation Date:  <input readonly type="text" name="reservation_date" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_date']); ?>'/></h4>
                <h4>Pickup Date:   <input readonly type="text" name="pickup_date" style="width:200px;" value ='<?php echo htmlspecialchars($car['pickup_date']); ?>'/></h4>
                <h4>Return Date:   <input readonly type="text" name="return_date" style="width:200px;" value ='<?php echo htmlspecialchars($car['return_date']); ?>'/></h4>
                <h4>Country:   <input readonly type="text" name="country" style="width:200px;" value ='<?php echo htmlspecialchars($car['country']); ?>'/></h4>
                <h4>City:  <input readonly type="text" name="city" style="width:200px;" value ='<?php echo htmlspecialchars($car['city']); ?>'/></h4>
                <h4>Reservation Price:     <input readonly type="text" name="reservation_price" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_price']); ?>'/></h4>
                <h4>Car Plate No.:     <input readonly type="text" name="plate_id" style="width:200px;" value ='<?php echo htmlspecialchars($car['plate_id']); ?>'/></h4>
                <form action="pay.php">
                <div class ="button_up"><input type="submit" value="Pay"/></div></form>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
</html>