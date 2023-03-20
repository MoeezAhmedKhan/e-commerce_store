<?php 


require_once("connection.php");

session_start();


$email = $_POST['email'];
$password = $_POST['password'];

$check = "SELECT * FROM `user` WHERE email = '$email' and `password` = '$password'";
$run_check = mysqli_query($conn,$check);
$check_row = mysqli_num_rows($run_email);
if($email_row > 0)
{

}
else
{
     echo 3;
}

?>



<!-- $password = "SELECT * FROM `user` WHERE `email` = '$email' and `password` = '$password'";
    $run_password = mysqli_query($conn,$password);
    $password_row = mysqli_num_rows($run_password);
    if($password_row > 0)
    {
            $ar = mysqli_fetch_array($run_password);
            $role = $ar['role_id'];
            $fname = $ar['first_name'];
            $lname = $ar['last_name'];

        if($role == 0)
        {
            $_SESSION['role'] = $role;
            $_SESSION['adminName'] = $fname." ".$lname;
            header("location:index.php");
        }
        else
        {
            echo 1;
        }
    }
    else
    {
        echo 2;
    } -->