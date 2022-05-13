<?php
$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

$loggedUser="SELECT * FROM reservation NATURAL JOIN customer NATURAL JOIN car ";
$result = mysqli_query($connect,$loggedUser);

$names = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<html>
<link rel="stylesheet" href="style.css">

<form action="admin_screen_main.php">
<div class ="button_up" id="xx"><input type="submit" value="Back" /></div> </form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">All Reserved Cars</h4>
    <div> <h2> </h2> </div> <hr>
            <?php $i=1;
            foreach($names as $car){ ?>
                <form>
                <h3 id="aaa"><?php echo htmlspecialchars($i++); ?></h6>
                <div><?php echo "Customer name:  " ,  htmlspecialchars($car['name']); ?></div>
                <div><?php echo "Reservation Date:  " ,  htmlspecialchars($car['reservation_date']); ?></div>
                <div><?php echo "Pickup Date:   " , htmlspecialchars($car['pickup_date']); ?></div>
                <div><?php echo "Return Date:   " , htmlspecialchars($car['return_date']); ?></div>
                <div><?php echo "Country:   " , htmlspecialchars($car['country']); ?></div>
                <div><?php echo "City:  " , htmlspecialchars($car['city']); ?></div>
                <div><?php echo "Reservation Price:     " , htmlspecialchars($car['reservation_price']); ?></div>
                <div><?php echo "Car Plate No.:     " , htmlspecialchars($car['plate_id']); ?></div>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
</html>

</html>