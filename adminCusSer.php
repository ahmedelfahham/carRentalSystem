<?php
$sername = $_POST["search"];

echo "<h1> welcome $sername</h1>";
    session_start();
    $_SESSION["activeSearch"]=$sername;
    header('Location: user_details.php');

?>