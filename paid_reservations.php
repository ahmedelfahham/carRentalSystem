<?php
$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

//$loggedUser="SELECT * FROM reservation NATURAL JOIN customer ";
//$loggedUser="SELECT * FROM payment NATURAL JOIN customer NATURAL JOIN reservation";
$loggedUser="SELECT * FROM (payment NATURAL JOIN reservation ) NATURAL JOIN customer";
$result = mysqli_query($connect,$loggedUser);

$names = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<html>
<link rel="stylesheet" href="style.css">

<form action="admin_screen_main.php">
<div class ="button_up" id="xx"><input type="submit" value="Back" /></div> </form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">**Paid Reservations**</h4>
    <div> <h2> </h2> </div> <hr>
            <?php 
            foreach($names as $name){ ?>
                <form>
                Payment Number :<input readonly type="text" name="name" style="width:200px;" value ='<?php echo htmlspecialchars($name['payment_no']); ?>'/>
                <div>Reservation Number:<input readonly type="text" name="email" style="width:200px;" value ='<?php echo htmlspecialchars($name['reservation_no']); ?>'/></div>
                <div>Payment Price :<input readonly type="text" name="email" style="width:200px;" value ='<?php echo htmlspecialchars($name['payment_price']); ?>'/></div>
                <div>payment Date :<input readonly type="text" name="email" style="width:200px;" value ='<?php echo htmlspecialchars($name['payment_date']); ?>'/></div>
                <div>Customer Name :<input readonly type="text" name="email" style="width:200px;" value ='<?php echo htmlspecialchars($name['name']); ?>'/></div>
                <div>Car Plate ID :<input readonly type="text" name="email" style="width:200px;" value ='<?php echo htmlspecialchars($name['plate_id']); ?>'/></div>
                <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
</html>

</html>