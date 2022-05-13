<?php

$email = $_POST["email"];
$password = $_POST["password"];
$password_md5 = md5($password);



$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

//$login = "SELECT email,password FROM customer WHERE password='$password'";
$login = "SELECT email,password FROM customer WHERE email='$email' AND password='$password_md5'";

$result = mysqli_query($connect,$login);
$flag = mysqli_num_rows($result);

if($flag == 1){
    $loggedUser="SELECT * FROM customer WHERE email = '$email'";
    $result2=mysqli_query($connect,$loggedUser);
    if(!$result2){
        echo "falied".mysqli_error($con);
    }else{
    $returned=mysqli_fetch_array($result2);
    $name=$returned["name"];
  //  header('Location: admin_screen_main.php');
   // echo "<h1>welcome $name</h1>";
   // echo "<a href='index.php'>logout</a>";
    ///////////////////////////////////
    switch($_POST['user']) {
        case "admin":
            if($email == 'admin'){
            header('Location: admin_screen_main.php');
            }else{
                echo "<script type='text/javascript'>alert('Not an Admin, PLease Choose Your Correct Role.');</script>";
                echo("<script>window.location = 'index.php';</script>");
                //header('Location: index.php');
               //<html> <script>alert('Not an Admin, PLease Choose Your Correct Role.');</script> </html>
            }
            break;
        case "client":
            session_start();
            $_SESSION["email"] = $email;
            header('Location: customers.php');
            break;
        default:
             echo "<h1>error</h1>";
             header('Location: index.php');  
    }
    //////////////////////////////////
    }
    
}else{
    echo "<script type='text/javascript'>alert('Invalid Email or Password.');</script>";
     echo("<script>window.location = 'index.php';</script>");
                //header('Location: index.php');
}

?>