<?php
session_start();
$reservation_no =  $_POST["reservation_no"];
$payment_price = $_POST["reservation_price"];

/*$reservation_no = $_POST["reservation_no"];
$pickup_date = $_POST["pickup_date"];
$reservation_date = $_POST["reservation_date"];
$return_date = $_POST["return_date"];
$payment_price = $_POST["reservation_price"]; */





?>
<html>
    <head>
        <title>reserve car</title>
        <script>
                function addValidate(){
                    let pid = document.forms["reserveform"]["card_no"].value;
                if (pid == "") {
                alert("card number must be filled out");
                return false;
                }

                let model = document.forms["reserveform"]["ccv"].value;
                if (model == "") {
                alert("CCV must be filled out");
                return false;
                }

                }

            
            </script>
            
            <link rel="stylesheet" href="style.css"> 
</head>
<body>
<form  method="post" name="registerForm" onsubmit="true" action="available_cars.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div>
    </form>
<div class="container">
<div class = "title"><h1>Payment</h1></div>

            <form  method="post" name="reserveform" onsubmit="return addValidate()" action="save_payement.php">
            <h4><input type="hidden" name="reservation_no" style="width:200px;" value ='<?php echo $reservation_no; ?>'/></h4>
            <div><label><h3>Card Number :</h3>  </label>
            <h6></h6>
            <input type="number" name="card_no" style="width:200px" placeholder="CARD NUMBER"/></div>
            
            <div><label><h3>CCV :</h3>  </label>
            <input type="text" name="ccv" style="width:200px" placeholder="CCV"/></div>
            <h6></h6>

            <div><label><h3>Payement Price: </h3>  </label>
            <h4><input readonly type="text" name="payment_price" style="width:200px;" value ='<?php echo htmlspecialchars($payment_price); ?>'/></h4>
            <h6></h6>


            <div> <h2> </h2> </div> <hr>
            <div class ="button"><input type="submit" value="PAY"/>
        </div>
</form>
</div>
</html>