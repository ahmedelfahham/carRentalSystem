<?php
session_start();
if(isset($_SESSION["email"])){
    $email=$_SESSION["email"];
}
if(isset($_SESSION["returned"])){
    $alert="<script>alert('car is returned succefully');</script>";
    echo $alert;
    unset($_SESSION["returned"]);
}
?>

<?php
$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");
$loggedUser="SELECT * FROM reservation natural join customer natural join car WHERE email = '$email'";
$result = mysqli_query($connect,$loggedUser);

$names = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<html>
<link rel="stylesheet" href="style.css">

<form  method="post" name="registerForm" onsubmit="true" action="customers.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div></form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Your Reserved Cars</h4>
    <div> <h2> </h2> </div> <hr>
            <?php $i=1;
            foreach($names as $car){ ?>
                <form method = "post" action = "return.php">
                <h3 id="aaa"><?php echo htmlspecialchars($i++); ?></h3>
                <h4>Reservation No.: <input type="text" name="reservation_no" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_no']); ?>'/></h4>
                <h4>Reservation Date: <input readonly type="text" name="reservation_date" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_date']); ?>'/></h4>
                <h4>Pickup Date: <input readonly type="text" name="pickup_date" style="width:200px;" value ='<?php echo htmlspecialchars($car['pickup_date']); ?>'/></h4>
                <h4>Return Date: <input readonly type="text" name="return_date" style="width:200px;" value ='<?php echo htmlspecialchars($car['return_date']); ?>'/></h4>
                <h4>Country: <input readonly type="text" name="country" style="width:200px;" value ='<?php echo htmlspecialchars($car['country']); ?>'/></h4>
                <h4>city: <input readonly type="text" name="city" style="width:200px;" value ='<?php echo htmlspecialchars($car['city']); ?>'/></h4>
                <h4>Reservation price: <input readonly type="text" name="reservation_price" style="width:200px;" value ='<?php echo htmlspecialchars($car['reservation_price']); ?>'/></h4>
                <h4>Car Plate No: <input readonly type="text" name="plate_id" style="width:200px;" value ='<?php echo htmlspecialchars($car['plate_id']); ?>'/></h4>
                
                <div class ="button_up"><input type="submit" value="Return"/></div>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
</html>

</html>
