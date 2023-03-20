<?php 

    require_once("connection.php");
    session_start();


    if(isset($_POST["Addcart-btn"]))
    {
        $uid = $_POST["u_id"];
        $proid = $_POST["proid"];
        $pprice = $_POST["pprice"];
        $proquantity = $_POST["proquantity"];

        $select = "SELECT * FROM `product_cart` WHERE p_id = $proid";
        $select_run = mysqli_query($conn,$select);
        $select_Row = mysqli_num_rows($select_run);
        if($select_Row == 0)
        {
            $insert = "INSERT INTO `product_cart`(`user_id`, `p_id`, `p_price`, `quantity`) VALUES
            ($uid,$proid,$pprice,$proquantity)";
            $run = mysqli_query($conn,$insert);
            if($run)
            {
                $_SESSION["cart"] =  "Product Added in cart";
            }
            else
            {
                $_SESSION["cartError"] =  "Something went wrong";
            }
        }
        else
        {
            $_SESSION["already"] = "Product already exist in cart";
        }
        
        

    }

    // die();

    // session_start();
    // $_pid = $_GET["pid"];
    
    // if(in_array($_pid,$_SESSION["mycart"]) == true)
    // {
    //     $_SESSION["mesg"] = "Product already exist in cart";
    // }
    // else
    // {
    //     array_push($_SESSION["mycart"],$_pid);
    //     $_SESSION["mesg"] =  "Product Added in cart";
    // }

    header("location:../shop.php");

?>