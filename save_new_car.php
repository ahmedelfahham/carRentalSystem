<?php
$pid = $_POST["pid"];
$model = $_POST["model"];
$status = $_POST["status"];
$price = $_POST["ppd"];
$country = $_POST["country"];
$city = $_POST["city"];

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

$login_auth="SELECT plate_id FROM car WHERE plate_id='$pid'";
$resultt=mysqli_query($connect,$login_auth);
$flag=mysqli_num_rows($resultt);
if($flag==1){
    session_start();
    $_SESSION["pid"]=$pid;
    header('Location: add_car.php');
}

$insertNewUser = "INSERT INTO car
values('$pid','$model','$status','$price','$country','$city')";
$result = mysqli_query($connect,$insertNewUser);
if($result){
    session_start();
    $_SESSION["added"]=$model;
    header('Location: add_car.php'); 
}else{
    echo "Error:".mysqli_error($connect);
}
?>