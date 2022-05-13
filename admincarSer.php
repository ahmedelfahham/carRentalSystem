<?php
    $model = $_POST["model"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    if(isset($_POST['cost_cb']) && isset($_POST['model_cb'])){
        session_start();
        $_SESSION["model"]=$model;
        $_SESSION["from"]=$from;
        $_SESSION["to"]=$to;
        header('Location: cars.php');
    }else if(isset($_POST['model_cb'])){
        session_start();
        $_SESSION["model"]=$model;
        header('Location: cars.php');
    } else if(isset($_POST['cost_cb'])){
        session_start();
        $_SESSION["from"]=$from;
        $_SESSION["to"]=$to;
        header('Location: cars.php');
    }else{
        header('Location: cars.php');
    }

?>