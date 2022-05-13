<?php

    $from= $_POST["f"];
    $to= $_POST["t"];

    $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
    $db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");


   /*SELECT  payment_date,SUM(payment_price)
   FROM payment
   WHERE payment_date BETWEEN  '2021-01-15' AND  '2022-01-15'
   GROUP BY payment_date;*/

    $sql = "SELECT  payment_date, SUM(payment_price) FROM payment where  payment_date BETWEEN  '$from' AND '$to' GROUP BY payment_date ";


    $result = mysqli_query($connect,$sql);

    $names2 = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<html>
    
<link rel="stylesheet" href="style.css">
    
<form action="statistics.php">
<div class ="button_up" id="xx"><input type="submit" value="Back" /></div> </form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Daily Payments From <?php echo $from ?> To <?php echo $to ?></h4>
    <div> <h2> </h2> </div> <hr>

                <?php foreach($names2 as $name2){ ?>
                <form action="test.php" method="post">
                Date : <input readonly type="text" name="name" style="width:200px;" value ='<?php echo htmlspecialchars($name2['payment_date']); ?>'/>
                <div> Payment : <input readonly type="text" name="name" style="width:200px;" value ='<?php echo htmlspecialchars($name2['SUM(payment_price)']); ?>'/></div>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
</html>