<?php
session_start();


$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server"); 
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

$loggedUser="SELECT SUM(payment_price) FROM payment";
$result1=mysqli_query($connect,$loggedUser);
if(!$result1){
    echo "falied".mysqli_error($connect);
}
$row1=mysqli_fetch_array($result1);
$income=$row1["SUM(payment_price)"];

    $loggedUser="SELECT plate_id , SUM(payment_price)  FROM  (payment NATURAL JOIN reservation) GROUP BY plate_id";
    // $loggedUser = 'SELECT * FROM customer ';
      $result = mysqli_query($connect,$loggedUser);
  
     $names = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>

<html>
<header>
    <link rel="stylesheet" href="style.css"> 
</header>
    
<form action="statistics.php">
<div class ="button_up" id="xx"><input type="submit" value="Back" /></div> </form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Reserved Car Income</h4>
    <div> <h2> </h2> </div> <hr>
    Total Income : <input readonly type="text" name="name" style="width:200px;" value ='<?php echo $income ?> $'/>
    <div> <h2> </h2> </div> <hr>
            <?php foreach($names as $name){ ?>
                
                <form action="test.php" method="post">
                Plate ID : <input readonly type="text" name="name" style="width:200px;" value ='<?php echo htmlspecialchars($name['plate_id']); ?>'/>
                <div>Income :<input readonly type="text" name="email" style="width:200px;" value ='<?php echo htmlspecialchars($name['SUM(payment_price)']); ?>'/></div>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
            
</html>