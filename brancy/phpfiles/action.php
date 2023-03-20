<?php 

require_once("connection.php");
session_start();

if(isset($_POST["update-btn"]))
{
    $uid = $_POST["uid"];
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $zip = mysqli_real_escape_string($conn, $_POST["zip"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    $update = "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`phone`='$phone',`address`='$address',`zipcode`='$zip',`city` = '$city',`password`= '$pass' WHERE `id`= $uid";
    $run = mysqli_query($conn,$update);
    if($run)
    {
        $_SESSION['accUpt'] = "Account updated successfully";
        header("location:../my-account.php");
    }
    else
    {
        $_SESSION['accErr'] = "Something went wrong while updating account";
        header("location:../my-account.php");
    }
}


?>