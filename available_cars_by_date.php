<?php
session_start();
if(isset($_SESSION["reserved"])){
    $alert="<script>alert('car is reserved succefully');</script>";
    echo $alert;
    unset($_SESSION["reserved"]);
}
$pickup = $_POST["pickup"];
$return = $_POST["return"];
$_SESSION["pickup"] = $pickup;
$_SESSION["return"] = $return;

//echo $pickup;
//echo $return;


/*
if(isset($_SESSION["email"])){
    $alert="<script>alert('email is already exsists');</script>";
    echo $alert;
   // unset($_SESSION["email"]);
}*/

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");


$sql = "SELECT* from car where car.plate_id not IN (select plate_id
from reservation NATURAL JOIN car
where not ( reservation.pickup_date > '$return'
                      or reservation.return_date < '$pickup'));";


$result = mysqli_query($connect,$sql);

$cars = mysqli_fetch_all($result,MYSQLI_ASSOC);



/*$flag = mysqli_num_rows($result);*/

/*if($flag == 1){
    $loggedUser="SELECT * FROM users WHERE email = '$email'";
    $result2=mysqli_query($connect,$loggedUser);
    if(!$result2){
        echo "falied".mysqli_error($con);
    }else{
    $returned=mysqli_fetch_array($result2);
    $name=$returned["name"];
    echo "<h1>welcome $name</h1>";
    echo "<a href='index.php'>logout</a>";
    }
    
}else{
    echo "<h1>invalid email or password</h1>";
    echo "<a href='index.php'>retry</a>";
}  */

?>

<html>
<link rel="stylesheet" href="style.css">
    
<!--<form action="logout.php">
 <div class ="button_up" id="xx"><input type="submit" value="Log Out" /></div> </form> -->
 <form  method="post" name="registerForm" onsubmit="true" action="reserve_by_date.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div></form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Available CARS</h4>
    <div> <h2> </h2> </div> <hr>
            <?php foreach($cars as $car){ ?>
                <form method="post" action = save_reservation_by_date.php>
                <h4>plate id:<input readonly type="text" name="plate_id" style="width:200px;" value ='<?php echo htmlspecialchars($car['plate_id']); ?>'/></h>
                <h4>Model: <input readonly type="text" name="model" style="width:200px;" value ='<?php echo htmlspecialchars($car['model']); ?>'/></h4>
                <h4>car Status: <input readonly type="text" name="car_status" style="width:200px;" value ='<?php echo htmlspecialchars($car['car_status']); ?>'/></h4>
                <h4>Price per day: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['price_per_day']); ?>'/></h4>
                <form action="reserve.php">
                <div class ="button_up"><input type="submit" value="Reserve"/></div></form>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
</html>