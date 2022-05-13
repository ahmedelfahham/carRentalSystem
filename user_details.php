<?php
session_start();
/*if(!isset($_SESSION["activeSearch"])){
    header('Location : index.php');
}*/



if(isset($_SESSION["activeSearch"])){
    $connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
    $db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");
    $sername=$_SESSION["activeSearch"];
    //Select name From customer Where name like ‘x%’
    $loggedUser="SELECT * FROM customer WHERE name like '%$sername%'";
  // $loggedUser = 'SELECT * FROM customer ';
    $result = mysqli_query($connect,$loggedUser);

   $names = mysqli_fetch_all($result,MYSQLI_ASSOC);
   unset($_SESSION["activeSearch"]);

}else{

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");


$sql = 'SELECT * FROM customer ';


$result = mysqli_query($connect,$sql);

$names = mysqli_fetch_all($result,MYSQLI_ASSOC);
}

?>

<html>
    
<link rel="stylesheet" href="style.css">
<div style="padding-right: 20px;">
<div class="container">
<div>
    <form method="post" style="width:500px;" action="adminCusSer.php" >
        <label for="model">Search By Name : </label>
        <input type="text" style="width:200px;" name="search" placeholder="search" />
        <div style="width:400px;"class ="button"><input type="submit" value="Search"/></div>
    </form>
</div>
</div>
    
<form action="admin_screen_main.php">
<div class ="button_up" id="xx"><input type="submit" value="Back" /></div> </form>
    <div class="container" align = "center">
    <div> <h2> </h2> </div> <hr>
    <h4 class="center grey-text">Customers</h4>
    <div> <h2> </h2> </div> <hr>
            <?php foreach($names as $name){ ?>
                <form action="test.php" method="post">
                Name : <input readonly type="text" name="name" style="width:200px;" value ='<?php echo htmlspecialchars($name['name']); ?>'/>
                <div>Email :<input readonly type="text" name="email" style="width:200px;" value ='<?php echo htmlspecialchars($name['email']); ?>'/></div>
                
               <div> <h2> </h2> </div> <hr>
            </form>
                <?php } ?>
    </div>
            </div>


            </body>
</html>