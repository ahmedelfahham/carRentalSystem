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
<div class = "title"><h1>Enter Day</h1></div>

            <form  method="post" name="reserveform" onsubmit="return addValidate()" action="car_sp_day.php">
            
            <div><label><h3>Choose Day</h3>  </label>
            <input type="date" name="day" placeholder="day"/></div>
            <h6></h6>
            <div> <h2> </h2> </div> <hr>
            <div class ="button"><input type="submit" value="Search"/>
        </div>
</form>
</div>
</html>