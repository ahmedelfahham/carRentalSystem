<?php
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone_no = $_POST["phone_no"];
$password_md5 = md5($password);

$connect = mysqli_connect("localhost","root","") or die("cannot connect to the server");
$db = mysqli_select_db($connect,"carrentalsystem") or die("cannot connect to the database");

////////check if the email already exsists or not
$login_auth="SELECT email FROM customer WHERE email='$email'";
$resultt=mysqli_query($connect,$login_auth);
$user=mysqli_num_rows($resultt);
if($user==1){
    session_start();
    $_SESSION["emailex"]=$email;
    header('Location: index.php');
}
//////////////////////////////////////


/*$check = "SELECT * FROM users WHERE email = '$email'";
$checkk = mysqli_query($connect,$check);*/

/*if(mysqli_num_rows($checkk)>0){
    echo "<script type='text/javascript'>alert('email already exist');</script>";
    echo "<a href='index.php'>try another email</a>";
}*/else{
$insertNewUser = "INSERT INTO customer(name,email,password,phone_number) 
values('$name','$email','$password_md5','$phone_no')";
$result = mysqli_query($connect,$insertNewUser);
if($result){
    //echo "<h1> welcome $name</h1>";
    //echo "<a href='index.php'>LOGOUT</a>";
    session_start();
    $_SESSION["email"] = $email;
    header('Location: customers.php');
}else{
    echo "Error:".mysqli_error($connect);
}
}
?>