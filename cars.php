<?php
//price query : Select * From car Where price between x and y;    And model =‘’ 


/////////////////////////////////////////////////////////////////////////////////////////////////
session_start();
/*if(!isset($_SESSION["activeSearch"])){
    header('Location : index.php');
}*/



if(isset($_SESSION["model"]) && isset($_SESSION["from"]) ){
    $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
    $db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");
    $sermodel=$_SESSION["model"];
    $serfrom=$_SESSION["from"];
    $serto=$_SESSION["to"];

    $loggedUser="SELECT * FROM car WHERE (price_per_day BETWEEN $serfrom AND $serto) AND model = '$sermodel'";

    $result = mysqli_query($connect,$loggedUser);

   $cars = mysqli_fetch_all($result,MYSQLI_ASSOC);
   unset($_SESSION["model"]);
   unset($_SESSION["from"]);
   unset($_SESSION["to"]);
}else if(isset($_SESSION["model"])){
    $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
    $db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");
    $sermodel=$_SESSION["model"];

    $loggedUser="SELECT * FROM car WHERE model = '$sermodel'";

    $result = mysqli_query($connect,$loggedUser);

   $cars = mysqli_fetch_all($result,MYSQLI_ASSOC);
   unset($_SESSION["model"]);
}else if (isset($_SESSION["from"]) ){
    $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
    $db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");
    $serfrom=$_SESSION["from"];
    $serto=$_SESSION["to"];

    $loggedUser="SELECT * FROM car WHERE (price_per_day BETWEEN $serfrom AND $serto)";

    $result = mysqli_query($connect,$loggedUser);

   $cars = mysqli_fetch_all($result,MYSQLI_ASSOC);
   unset($_SESSION["model"]);
   unset($_SESSION["from"]);
   unset($_SESSION["to"]);
}else{

    $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
    $db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");
    
    
    $sql = 'SELECT * FROM car';
    
    
    $result = mysqli_query($connect,$sql);
    
    $cars = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
/////////////////////////////////////////////////////////////////////////////////////////////////


/*$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");


$sql = 'SELECT * FROM car';


$result = mysqli_query($connect,$sql);

$cars = mysqli_fetch_all($result,MYSQLI_ASSOC);*/





?>

<html>

<header>    
    <script>
        function validate(){
                var checkBox1 = document.getElementById("model_cb");
                var checkBox2 = document.getElementById("cost_cb");
                //var text = document.getElementById("text");
                if (checkBox1.checked == true){
                    let model = document.forms["car_search"]["model"].value;
                    if (model == "") {
                        alert("model must be filled out");
                        return false;
                    } 
               }

               if (checkBox2.checked == true){
                    let from = document.forms["car_search"]["from"].value;
                    let to = document.forms["car_search"]["to"].value;
                    if (from == "") {
                        alert("from must be filled out");
                        return false;
                    } else if (to == "") {
                        alert("to must be filled out");
                        return false;
                    } /*else if(from>=to){ 
                        alert("to filled must be greater than from filled");
                        return false;
                    }*/
               }
        }

    </script>
    <link rel="stylesheet" href="style.css">
</header>


<!-- -->
<div style="padding-right: 20px;">
<div class="container">
    <form method="post" name="car_search" onsubmit="return validate()" action="admincarSer.php">
        <input type="text" style="width:200px;" name="model" placeholder="Model" />
        <input type="checkbox" id="model_cb" name="model_cb" value="model">
        <label for="model"> Model</label><br>
        <input type="number" style="width:98px;" min="0.1" step="0.1" name="from" placeholder="from"/>
        <input type="number" style="width:98px;" min="0.2" step="0.1" name="to" placeholder="to"/>
        <input type="checkbox" id="cost_cb" name="cost_cb" value="cost">
        <label for="cost"> Cost</label><br>
        <div class ="button"><input type="submit" value="Search"/></div>
    </form> </div> 
    
<form action="admin_screen_main.php">
<div class ="button_up" id="xx"><input type="submit" value="Back" /></div> </form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Available CARS</h4>
    <div> <h2> </h2> </div> <hr>
            <?php foreach($cars as $car){ ?>
                <form method="post" action="edit_car.php">
                <h4>Model: <input readonly type="text" name="model" style="width:200px;" value ='<?php echo htmlspecialchars($car['model']); ?>'/></h4>
                <h4>plate id:<input readonly type="text" name="plate_id" style="width:200px;" value ='<?php echo htmlspecialchars($car['plate_id']); ?>'/></h>
                <h4>car Status: <input readonly type="text" name="car_status" style="width:200px;" value ='<?php echo htmlspecialchars($car['car_status']); ?>'/></h4>
                <h4>Price per day: <input readonly type="text" name="price_per_day" style="width:200px;" value ='<?php echo htmlspecialchars($car['price_per_day']); ?>'/></h4>
                <h4>Country: <input readonly type="text" name="country" style="width:200px;" value ='<?php echo htmlspecialchars($car['country']); ?>'/></h4>
                <h4>City: <input readonly type="text" name="city" style="width:200px;" value ='<?php echo htmlspecialchars($car['city']); ?>'/></h4>
                <div class ="button_up"><input type="submit" value="Edit"/></div></form>
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>
            


            </body>
</html>