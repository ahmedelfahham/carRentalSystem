<?php
session_start();
//$pickup = $_POST["pickup"];
//$return = $_POST["return"];
$pickup = $_SESSION["pickup"];
$return = $_SESSION["return"];
$plate_id = $_POST["plate_id"];
$price = $_POST["price_per_day"];
$diff = strtotime($return) - strtotime($pickup);
$days = abs(round($diff / 86400));
echo $days;

/*$pickup = date('Y-m-d', strtotime($pick));
$return = date('Y-m-d', strtotime($retutn_date));*/
//echo $pickup;


if(isset($_SESSION["email"])){
    /*$alert="<script>alert('email is already exsists');</script>";
    echo $alert; */
    $email = $_SESSION["email"];
}
if(isset($_SESSION["plate_id"])){
    /*$alert="<script>alert('plate is already exsists');</script>";
    echo $alert;*/
    $plate_id = $_SESSION["plate_id"];
}
if(isset($_SESSION["price_per_day"])){
   /* $alert="<script>alert('price_per_day is already exsists');</script>";
    echo $alert; */
    $price = $_SESSION["price_per_day"];
}

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

$loggedUser="SELECT customer_id FROM customer WHERE email='$email'";
$result=mysqli_query($connect,$loggedUser);
$row=mysqli_fetch_array($result);
$customer_id = $row["customer_id"];

/*$xxx = $customer_id->fetch_assoc();
echo "my result $xxx"; */
$reservation_price = $price*$days+$price;

$insertNewReservation = "INSERT INTO reservation (pickup_date, return_date, customer_id, reservation_price, plate_id)
values('$pickup','$return','$customer_id','$reservation_price','$plate_id')";
$result = mysqli_query($connect,$insertNewReservation);
if($result){
    session_start();
    $_SESSION["reserved"]=$plate_id;
    header('Location: customers.php'); 
}else{
    echo "Error:".mysqli_error($connect); }

?>