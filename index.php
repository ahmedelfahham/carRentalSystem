<?php
session_start();
if(isset($_SESSION["emailex"])){
    $alert="<script>alert('email is already exsists');</script>";
    echo $alert;
    unset($_SESSION["emailex"]);
}
?>

<html>
    <head>
        <title>sign in/up</title>
        <script>
            function registerValidate(){
                let name = document.forms["registerForm"]["name"].value;
                if (name == "") {
                alert("Name must be filled out");
                return false;
                }
                let email = document.forms["registerForm"]["email"].value;
                if (email == "") {
                alert("Email must be filled out");
                return false;
                }
                let password = document.forms["registerForm"]["password"].value;
                if (password == "") {
                alert("enter your password");
                return false;
                }
                let confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
                if (confirmPassword == "") {
                alert("plesae confirm password");
                return false;
                }
                let phoneNumber = document.forms["registerForm"]["phone_no"].value;
                if (phoneNumber == "") {
                alert("Please Enter Your Phone Number");
                return false;
                }
                if(confirmPassword != password){
                    alert("password doesn't match");
                return false;
                }
            }

                function loginValidate(){
                    let email = document.forms["loginForm"]["email"].value;
                if (email == "") {
                alert("Email must be filled out");
                return false;
                }

                let password = document.forms["loginForm"]["password"].value;
                if (password == "") {
                alert("enter your password");
                return false;
                }

                if(!document.getElementById('admin').checked && !document.getElementById('client').checked){
                    alert("Admin or Client ?");
                    return false; 
                }

                }

            
            </script>
            
            <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
<div class = "title"><h1>Login</h1></div>
            <form  method="post" name="loginForm" onsubmit="return loginValidate()" action="login_handler.php">
            <div class = "input_container"><label>Email: </label>
            <input type="text" name="email" placeholder="email"/></div>
            <div class = "input_container"><label>Password: </label>
            <input type="password" name="password" placeholder="password"/></div>
            <input type="radio" id="admin" name="user" value="admin">
            <label for="admin">ADMIN</label>
            <input type="radio" id="client" name="user" value="client">
            <label for="client">CLIENT</label><br>
            <div class ="button"><input type="submit" value="login"/></div>
            <br>
            <h1>Don't have an account yet?</h1>

</form>

<div class = "title"><h1>Register</h1></div>
        <form  method="post" name="registerForm" onsubmit="return registerValidate()" action="register_handler.php">
            <div class = "input_container"><label>Name: </label>
            <input type="text" name="name" placeholder="name"/></div>
            <div class = "input_container"><label>Email: </label>
            <input type="text" name="email" placeholder="email"/></div>
            <div class = "input_container"><label>PhoneNumber: </label>
            <input type="text" name="phone_no" placeholder="phone number"/></div>
            <div class = "input_container"><label>Password: </label>
            <input type="password" name="password" placeholder="password"/></div>
            <div class = "input_container"><label>Confirm_Password: </label>
            <input type="password" name="confirmPassword" placeholder="confirm password"/></div>
            <div class ="button"><input type="submit" value="Register"/></div>
</form>
</div>
</html>