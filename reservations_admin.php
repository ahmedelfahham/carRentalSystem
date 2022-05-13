<html>
    <head>
        <title>reserve car</title>
        <script>
                function addValidate(){
                    let pid = document.forms["reserveform"]["pickup"].value;
                if (pid == "") {
                alert("pickup date must be filled out");
                return false;
                }

                let model = document.forms["reserveform"]["return"].value;
                if (model == "") {
                alert("return date must be filled out");
                return false;
                }

                }

            
            </script>
            
            <link rel="stylesheet" href="style.css"> 
</head>
<body>
<form  method="post" name="registerForm" onsubmit="true" action="statistics.php">
        <div class ="button_up" id="xx"><input type="submit" value="Back"/></div>
    </form>
<div class="container">
<div class = "title"><h1>Enter Reservation period (pick-return)</h1></div>

            <form  method="post" name="reserveform" onsubmit="return addValidate()" action="search_by_reservations.php">
            <div><label><h3>pickUp Date:</h3>  </label>
            <h6></h6>
            <input type="date" name="pickup" id="pick" placeholder="pick up date"/></div>
            
            <div><label><h3>Return Date:</h3>  </label>
            <input type="date" name="return" placeholder="return date"/></div>
            <h6></h6>
            <div> <h2> </h2> </div> <hr>
            <div class ="button"><input type="submit" value="Search"/>
        </div>
</form>
</div>
</html>