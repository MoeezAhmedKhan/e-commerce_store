<?php


require_once("connection.php");

session_start();

if (isset($_POST['admin_login_btn'])) {
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $for_email = "SELECT * FROM `user` WHERE `email` = '$email'";
    $run_email = mysqli_query($conn, $for_email);
    $email_row = mysqli_num_rows($run_email);
    if ($email_row > 0) {
        $password = "SELECT * FROM `user` WHERE `email` = '$email' and `password` = '$password'";
        $run_password = mysqli_query($conn, $password);
        $password_row = mysqli_num_rows($run_password);
        if ($password_row > 0) {
            $ar = mysqli_fetch_array($run_password);
            $admin_id = $ar['id'];
            $role = $ar['role_id'];
            $fname = $ar['first_name'];
            $lname = $ar['last_name'];
            if ($role == 0) {
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['role'] = $role;
                $_SESSION['adminName'] = $fname . " " . $lname;
                header("location:../index.php");
            } else {
                $_SESSION['error'] = "You Can't Access";
                header("location:../auth-login.php");
            }
        } else {
            $_SESSION['error'] = "Password Does'nt Match";
            header("location:../auth-login.php");
        }
    } else {
        $_SESSION['error'] = "User Not Found";
        header("location:../auth-login.php");
    }
}


if (isset($_POST['lock_login_btn'])) {
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $check = "SELECT * FROM `user` WHERE `email` = '$email' and `password` = '$password'";
    $run_password = mysqli_query($conn, $check);
    $password_row = mysqli_num_rows($run_password);
    if ($password_row > 0) {
        $ar = mysqli_fetch_array($run_password);
        $admin_id = $ar['id'];
        $role = $ar['role_id'];
        $fname = $ar['first_name'];
        $lname = $ar['last_name'];

        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['role'] = $role;
        $_SESSION['adminName'] = $fname . " " . $lname;
        header("location:../index.php");
    } else {
        $_SESSION['error'] = "Password Does'nt Match";
        header("location:../auth-lock-screen.php");
    }
}



if (isset($_POST['add_cat_btn'])) {
    $cat_name = mysqli_real_escape_string($conn,$_POST['cat_name']);

    $target_dir = "../upload/";
    $catimage = $_FILES['cat_img']['name'];
    $target_file = $target_dir . basename($catimage);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $filwwithnewname = date('Ydmis') . "Category_Image." . $fileType;

    $filetype = $_FILES['cat_img']['type'];
    $filesize = $_FILES['cat_img']['size'];
    $filetemploc = $_FILES['cat_img']['tmp_name'];

    $select = "SELECT * FROM `category` WHERE category_name = '$cat_name'";
    $run_select = mysqli_query($conn, $select);
    $row = mysqli_num_rows($run_select);
    if ($row == 0) 
    {
        if (strtolower($filetype) == "image/jpg" || strtolower($filetype) == "image/png" || strtolower($filetype) == "image/jpeg" || strtolower($filetype) == "image/gif") {
            if ($filesize <= 5000000) /*front 5mb*/ {
                $insert = "INSERT INTO `category`(`category_name`, `category_image`) VALUES ('$cat_name','$filwwithnewname')";
                $excec = mysqli_query($conn, $insert);
                if ($excec) {
                    move_uploaded_file($filetemploc, $target_dir . $filwwithnewname);

                    $_SESSION['success'] = "Category Added Successfully";
                    header("location:../add_category.php");
                } 
                else 
                {
                    $_SESSION['error'] = "Something Went Wrong";
                    header("location:../add_category.php");
                }
            } 
            else 
            {
                $_SESSION['error'] = "Image Should be less then 5 Mb";
                header("location:../add_category.php");
            }
        } 
        else 
        {

            $_SESSION['error'] = "Image extension is wrong || You can insert jpg, png, jpeg and gif";
            header("location:../add_category.php");
        }
    } 
    else 
    {
        $_SESSION['error'] = "Category Already Exist!";
        header("location:../add_category.php");
    }
}



// add product

if (isset($_POST['add_product_btn'])) {
    $p_name = mysqli_real_escape_string($conn,$_POST['p_name']);
    $cat_id = $_POST['cat_id'];
    $p_price = mysqli_real_escape_string($conn,$_POST['p_price']);

    $target_dir = "../upload/";
    $proimage = $_FILES['p_image']['name'];
    $target_file = $target_dir . basename($proimage);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $filwwithnewname = date('Ydmis') . "Product_Image." . $fileType;

    $filetype = $_FILES['p_image']['type'];
    $filesize = $_FILES['p_image']['size'];
    $filetemploc = $_FILES['p_image']['tmp_name'];

    $select = "SELECT * FROM `product` WHERE product_name = '$p_name'";
    $run_select = mysqli_query($conn, $select);
    $row = mysqli_num_rows($run_select);
    if ($row == 0) 
    {
        if (strtolower($filetype) == "image/jpg" || strtolower($filetype) == "image/png" || strtolower($filetype) == "image/jpeg" || strtolower($filetype) == "image/jfif") {
            if ($filesize <= 5000000) /*front 5mb*/ {
                $insert = "INSERT INTO `product`(`product_name`, `category_id`, `price`, `image`) VALUES ('$p_name','$cat_id','$p_price','$filwwithnewname');";
                $insert .= "UPDATE `category` SET `no_of_products`= no_of_products + 1  WHERE `id`= $cat_id";
                $excec = mysqli_multi_query($conn, $insert);
                if ($excec) {
                    move_uploaded_file($filetemploc, $target_dir . $filwwithnewname);

                    $_SESSION['success'] = "Product Added Successfully";
                    header("location:../add_product.php");
                } 
                else 
                {
                    $_SESSION['error'] = "Something Went Wrong";
                    header("location:../add_product.php");
                }
            } 
            else 
            {
                $_SESSION['error'] = "Image Should be less then 5 Mb";
                header("location:../add_product.php");
            }
        } 
        else 
        {

            $_SESSION['error'] = "Image extension is wrong || You can insert jpg, png, jpeg and jfif";
            header("location:../add_product.php");
        }
    } 
    else 
    {
        $_SESSION['error'] = "Product Already Exist!";
        header("location:../add_product.php");
    }
}



// add slider product

if (isset($_POST['add_slider_product_btn'])) {
    $p_name = mysqli_real_escape_string($conn,$_POST['p_name']);
    $cat_id = $_POST['cat_id'];
    $p_price = mysqli_real_escape_string($conn,$_POST['p_price']);
    $p_desc = mysqli_real_escape_string($conn,$_POST['p_desc']);

    $target_dir = "../upload/";
    $proimage = $_FILES['p_image']['name'];
    $target_file = $target_dir . basename($proimage);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $filwwithnewname = date('Ydmis') . "Slider_Product_Image." . $fileType;

    $filetype = $_FILES['p_image']['type'];
    $filesize = $_FILES['p_image']['size'];
    $filetemploc = $_FILES['p_image']['tmp_name'];

    $select = "SELECT * FROM `product` WHERE product_name = '$p_name'";
    $run_select = mysqli_query($conn, $select);
    $row = mysqli_num_rows($run_select);
    if ($row == 0) 
    {
        if (strtolower($filetype) == "image/jpg" || strtolower($filetype) == "image/png" || strtolower($filetype) == "image/jpeg" || strtolower($filetype) == "image/jfif") {
            if ($filesize <= 5000000) /*front 5mb*/ {
                $insert = "INSERT INTO `product`(`product_name`, `category_id`, `price`, `image`,`product_description`,`is_slider`) VALUES ('$p_name','$cat_id','$p_price','$filwwithnewname','$p_desc','true');";
                $insert .= "UPDATE `category` SET `no_of_products`= no_of_products + 1  WHERE `id`= $cat_id";
                $excec = mysqli_multi_query($conn, $insert);
                if ($excec) {
                    move_uploaded_file($filetemploc, $target_dir . $filwwithnewname);

                    $_SESSION['success'] = "Product Added Successfully";
                    header("location:../add_slider_product.php");
                } 
                else 
                {
                    $_SESSION['error'] = "Something Went Wrong";
                    header("location:../add_slider_product.php");
                }
            } 
            else 
            {
                $_SESSION['error'] = "Image Should be less then 5 Mb";
                header("location:../add_slider_product.php");
            }
        } 
        else 
        {

            $_SESSION['error'] = "Image extension is wrong || You can insert jpg, png, jpeg and jfif";
            header("location:../add_slider_product.php");
        }
    } 
    else 
    {
        $_SESSION['error'] = "Product Already Exist!";
        header("location:../add_slider_product.php");
    }
}



?>