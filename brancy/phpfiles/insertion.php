<?php 

require_once("connection.php");
session_start();

if(isset($_POST['contact_submit']))
{
    $fname = $_POST['con_name'];
    $lname = $_POST['lname'];
    $fullname = $fname." ".$lname;
    $email = $_POST['con_email'];
    $message = $_POST['Message'];
    
    $to = "moeezahmedkhan1@gmail.com";
    $subject = "$fullname Wants To Get In Touch";
    $headers = "Name: ". $fullname .
    "\r\n Email: ". $email.
    "\r\n Message: ". $message;

                        
    if(mail($to,$subject,$headers))
    {
        ?>
            <script>
                alert("Thanks for contacting us, we will be in touch soon.");
                window.location.href = "../contact.php";
            </script>
        <?php 
    }
    else
    {
        ?>
            <script>
                alert("something went wrong");
                window.location.href = "../contact.php";
            </script>
        <?php 
    }

}


if(isset($_POST["reg-btn"]))
{
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $for_email = "SELECT * FROM `user` WHERE email = '$email'";
    $run_email = mysqli_query($conn, $for_email);
    $email_row = mysqli_num_rows($run_email);
    if($email_row == 0) 
    {   
        $insert = "INSERT INTO `user`(`role_id`,`first_name`, `last_name`,`email`, `password`) VALUES (1,'$fname','$lname','$email','$password')";
        $run = mysqli_query($conn,$insert);
        if($run)
        {
            $_SESSION['regacount'] = "Account register successfully";
            header("location:../account.php");
        }
        else
        {
            $_SESSION['creatingerror'] = "Something went wrong while creating your account";
            header("location:../account.php");
        }
    } 
    else 
    {
        $_SESSION['error'] = "Email is already register";
        header("location:../account.php");
    }
}


if(isset($_POST['login-btn'])) {
    $email =  mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $password = mysqli_real_escape_string($conn, $_POST['userPassword']);


    $for_email = "SELECT * FROM `user` WHERE `email` = '$email'";
    $run_email = mysqli_query($conn, $for_email);
    $email_row = mysqli_num_rows($run_email);
    if ($email_row > 0) {
        $password = "SELECT * FROM `user` WHERE `email` = '$email' and `password` = '$password'";
        $run_password = mysqli_query($conn, $password);
        $password_row = mysqli_num_rows($run_password);
        if ($password_row > 0) {
            $ar = mysqli_fetch_array($run_password);
            $user_id = $ar['id'];
            $role = $ar['role_id'];
            $fname = $ar['first_name'];
            $lname = $ar['last_name'];
            if ($role == 1) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['role'] = $role;
                $_SESSION['userName'] = $fname . " " . $lname;
                header("location:../index.php");
            } else {
                $_SESSION['accesserror'] = "You Can't Access";
                header("location:../account.php");
            }
        } else {
            $_SESSION['passerror'] = "Password Does'nt Match";
            header("location:../account.php");
        }
    } else {
        $_SESSION['notfound'] = "User Not Found";
        header("location:../account.php");
    }
}



// order place

if(isset($_POST["orderPlace-btn"]))
{
    $userId = $_POST["userId"];
    // $productIds = $_POST["productIds"];
    // print_r($productIds);die();
    $totalPrice = $_POST["totalPrice"];
    $deliveryAddress = $_POST["deliveryAddress"];
    $method = $_POST["method"];

    // foreach($productIds as $pid)
    // {
        $insert = "INSERT INTO `order_details`(`user_id`, `total_amount`, `delivery_address`, `payment_method`) VALUES 
        ($userId,$totalPrice,'$deliveryAddress','$method')";
        $run = mysqli_query($conn,$insert);
        if($run)
        {
            $status = "DELETE FROM `product_cart`";
            mysqli_query($conn,$status);
            $_SESSION["placced"] = "Order has been Placed Thanks for shopping";
            header("location:../showcart.php");
        }
        else
        {
            $_SESSION["notPlaced"] = "Something went wrong while Placing order";
            header("location:../showcart.php");
        }

    // }
    
   

}





?>