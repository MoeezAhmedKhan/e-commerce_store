<?php
    
    session_start();
    require_once("connection.php");
    if(isset($_SESSION['user_id']))
    {
        if(isset($_GET["pid"]))
        {
            $pid = $_GET["pid"];
            $delete = "DELETE FROM `product_cart` WHERE p_id = $pid";
            mysqli_query($conn,$delete);
        
            header("location:../showcart.php");
        }
        else
        {
            echo $delete = "DELETE FROM `product_cart` where user_id = {$_SESSION['user_id']}";
            mysqli_query($conn,$delete);
        
            header("location:../showcart.php");
        }
    }
    else
    {
        header("location:../index.php");
    }


?>