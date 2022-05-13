<?php
 $pid = $_POST["plate_id"];
 $status=$_POST["status"];
 

 ///////////////////////////
 
 

 $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

 
 $sql = "UPDATE car SET car_status='$status' WHERE plate_id='$pid'";
 
 if ($connect->query($sql) === TRUE) {
   echo "Record updated successfully";
   header('Location: cars.php');
 } else {
   echo "Error updating record: " . $connect->error;
 }
 //////////////////////


?>