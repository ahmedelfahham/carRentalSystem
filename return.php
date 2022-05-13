<?php
$reservation_no = $_POST["reservation_no"];
echo $reservation_no;

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

$delete="DELETE FROM reservation WHERE reservation.reservation_no ='$reservation_no'";
$result=mysqli_query($connect,$delete);

if($result){
    session_start();
    $_SESSION["returned"]=$reservation_no;
    header('Location: pickup.php'); 
}else{
    echo "Error:".mysqli_error($connect); }

?>