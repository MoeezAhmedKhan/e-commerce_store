<?php 

    session_start();
    $pid = $_POST['p_id'];
    
    if(in_array($pid,$_SESSION["mycart"]) == true)
    {
        $_SESSION["errormsg"] = "Product already exist in cart";
        echo 1;
    }
    else
    {
        array_push($_SESSION["mycart"], $pid);
        $_SESSION["success"] = "Product added in cart";
        echo 0;
    }

?>