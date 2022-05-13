<?php

    $day= $_POST["day"];

    $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
    $db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");
    //Select name From customer Where name like ‘x%’
    //select plate_id from car natural join reservation where '2022-01-15' between pickup_date and return_date;
    $loggedUser1="SELECT DISTINCT plate_id FROM car natural join reservation WHERE '$day' between pickup_date and return_date";
  // $loggedUser = 'SELECT * FROM customer ';
    $result1 = mysqli_query($connect,$loggedUser1);

   $names = mysqli_fetch_all($result1,MYSQLI_ASSOC);


//SELECT c.plate_id
//FROM car as c
//where  NOT EXISTS (
                //   select plate_id
                    //from car natural join reservation
/////////////where ('2022-01-15' between pickup_date and return_date) and c.plate_id = reservation.plate_id
   /// );


$sql = "SELECT c.plate_id FROM car as c  where  NOT EXISTS (
                            select plate_id from car natural join reservation 
                            where ('$day' BETWEEN pickup_date and return_date) and c.plate_id = reservation.plate_id)";


$result = mysqli_query($connect,$sql);

$names2 = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>

<html>
    
<link rel="stylesheet" href="style.css">
    
<form action="statistics.php">
<div class ="button_up" id="xx"><input type="submit" value="Back" /></div> </form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Car Status In <?php echo $day ?></h4>
    <div> <h2> </h2> </div> <hr>
            <?php foreach($names as $name){ ?>
                <form action="test.php" method="post">
                pid : <input readonly type="text" name="name" style="width:200px;" value ='<?php echo htmlspecialchars($name['plate_id']); ?>'/>
                <h3>Reserved</h3>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>

                <?php foreach($names2 as $name2){ ?>
                <form action="test.php" method="post">
                pid : <input readonly type="text" name="name" style="width:200px;" value ='<?php echo htmlspecialchars($name2['plate_id']); ?>'/>
                <h3>Not Reserved</h3>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>


            </body>
</html>