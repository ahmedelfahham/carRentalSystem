<?php
$pickup = $_POST["pickup"];
$return = $_POST["return"];
$country = $_POST["country"];
$city = $_POST["city"];

session_start();
if(isset($_SESSION["email"])){
   /* $alert="<script>alert('email is already exsists');</script>";
    echo $alert; */
    $email = $_SESSION["email"];
    unset($_SESSION["email"]);
}
$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"test") or die("cannot connect to the database");

//$sql="SELECT customer_id FROM customer WHERE email='$email'";
//$customer_id=mysqli_query($connect,$sql);

$insertNewReservation = "INSERT INTO users
values('$email','$country')";
$result = mysqli_query($connect,$insertNewReservation);
if($result){
    session_start();
    $_SESSION["added"]=$model;
    header('Location: available_cars.php'); 
}else{
    echo "Error:".mysqli_error($connect);
}

/*$flag=mysqli_num_rows($result);
if($flag==1){
    session_start();
    $_SESSION["pid"]=$pid;
    header('Location: add_car.php');
}

$insertNewUser = "INSERT INTO car
values('$pid','$model','$status','$price')";
$result = mysqli_query($connect,$insertNewUser);
if($result){
    session_start();
    $_SESSION["added"]=$model;
    header('Location: add_car.php'); 
}else{
    echo "Error:".mysqli_error($connect);
} */
?>