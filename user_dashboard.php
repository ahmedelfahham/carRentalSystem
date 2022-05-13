<?php

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"registration") or die("cannot connect to the database");


$sql = 'SELECT * FROM users';


$result = mysqli_query($connect,$sql);

$names = mysqli_fetch_all($result,MYSQLI_ASSOC);



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
    
<form>
<div class ="button" id="xx"><input type="submit" value="Add new car" /></div>
    <div class="container" align = "center">
    <h4 class="center grey-text">USERS NAMES</h4>
        <div class= "row">
            <?php foreach($names as $name){ ?>
                <div class="container_item" id="asd">
                <h6 id="aaa"><?php echo htmlspecialchars($name['name']); ?></h6>
                <div><?php echo htmlspecialchars($name['email']); ?></div>
                <div class ="button"><input type="submit" value="Register"/></div>
            </div>
            <?php } ?>
        </div>
    </div>


            </form>
            </body>
</html>