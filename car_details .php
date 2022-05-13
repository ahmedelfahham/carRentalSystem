<?php

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"registration") or die("cannot connect to the database");


$sql = 'SELECT * FROM users';


$result = mysqli_query($connect,$sql);

$names = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

<html> 
    <header>
            <link rel="stylesheet" href="style.css"> 
            <div class = "title"><h1>Cars</h1></div>
</header>
<body>

<form  method="post" name="registerForm" onsubmit="true" action="index.php">
    <div class ="button" id="xx"><input type="submit" value="logout"/></div>
</form>
<form>
    <div class="container" align = "center">
    <h4 class="center grey-text">USERS NAMES</h4>
        <div class= "row">
            <?php foreach($names as $name){ ?>
                <div class = "col s6 md3">
                <div class = "card z-depth-0">
                    <div class = "card-content center">
                <h6><?php echo htmlspecialchars($name['name']); ?></h6>
                <div><?php echo htmlspecialchars($name['email']); ?></div>
                <div class ="button"><input type="submit" value="Register"/></div>
                </div>
                </div>
                </div>
            <?php } ?>
        </div>
    </div>
            </form>
            </body>
</html>