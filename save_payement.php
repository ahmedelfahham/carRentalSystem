<?php
$reservation_no = $_POST["reservation_no"];
$payment_price = $_POST["payment_price"];
$ccv = $_POST["ccv"];
$card_no = $_POST["card_no"];



$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

$loggedUser="SELECT customer_id FROM reservation where reservation_no = '$reservation_no'";;
$result=mysqli_query($connect,$loggedUser);
$row=mysqli_fetch_array($result);
$customer_id = $row["customer_id"];


$insertNewPayment = "INSERT INTO payment (reservation_no, payment_price, customer_id, card_no, c_c_v)
values('$reservation_no','$payment_price','$customer_id','$card_no','$ccv')";
$result = mysqli_query($connect,$insertNewPayment);
if($result){
    session_start();
    $_SESSION["payed"]=$card_no;
    header('Location: payment.php'); 
}else{
    echo "Error:".mysqli_error($connect); }
?>