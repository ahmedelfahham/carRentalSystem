<?php
session_start();
if(isset($_SESSION["reserved"])){
    $alert="<script>alert('car is reserved succefully');</script>";
    echo $alert;
    unset($_SESSION["reserved"]);
}
/*session_start();
if(isset($_SESSION["email"])){
    $alert="<script>alert('email is already exsists');</script>";
    echo $alert;
   // unset($_SESSION["email"]);
}  */
$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");


$sql = 'SELECT * FROM customer';



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
    
<form action="logout.php">
<div class ="button_up" id="xx"><input type="submit" value="Log Out" /></div> </form>
    <div class="container" align = "center">
    <h4 class="center grey-text">Welcome How Can We Help You?</h4>
                <div class="btn-group" aria-label="Button group with nested dropdown">
                    <button onclick="location.href='reserve_by_date.php'" type="button">Reserve</button>
                    <button onclick="location.href='payment.php'" type="button">Pay</button>
                    <button onclick="location.href='pickup.php'">Pick Up </button>
                </div>
               <div> <h2> </h2> </div> <hr>
    </div>


            

            </body>
</html>