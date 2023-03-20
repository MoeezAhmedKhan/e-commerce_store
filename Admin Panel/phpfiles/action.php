<?php

session_start();
require_once("connection.php");


// for update category
if (isset($_POST['update_cat_btn'])) {
    $cid = $_POST['id'];
    $catname = $_POST['cname'];

    if (empty($_FILES['new_cimage']["name"])) {
        $filwwithnewname = $_POST['old_cimage'];
    } elseif (isset($_FILES['new_cimage']["name"])) {
        $target_dir = "../upload/";
        $catimage = $_FILES['new_cimage']['name'];
        $target_file = $target_dir . basename($catimage);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $filwwithnewname = date('Ydmis') . "Category_Image." . $fileType;

        $filetype = $_FILES['new_cimage']['type'];
        $filesize = $_FILES['new_cimage']['size'];
        $filetemploc = $_FILES['new_cimage']['tmp_name'];

        if (strtolower($filetype) == "image/jpg" || strtolower($filetype) == "image/png" || strtolower($filetype) == "image/jpeg" || strtolower($filetype) == "image/gif") {
            if ($filesize <= 5000000) /*front 5mb*/ {
                move_uploaded_file($filetemploc, $target_dir . $filwwithnewname);
                unlink($target_dir.$_POST['old_cimage']);
            } else {
                $_SESSION['error'] = "Image Should be less then 5 Mb";
                header("location:../manage_category.php");
                die();
            }
        } else {

            $_SESSION['error'] = "Image extension is wrong || You can insert jpg, png, jpeg and gif";
            header("location:../manage_category.php");
            die();
        }
    }


    $insert = "UPDATE `category` SET `category_name`='$catname',`category_image`='$filwwithnewname' WHERE `id`= $cid";
    $excec = mysqli_query($conn, $insert);
    if ($excec) {
        $_SESSION['success'] = "Category Updated Successfully";
        header("location:../manage_category.php");
    } else {
        $_SESSION['error'] = "Something Went Wrong";
        header("location:../manage_category.php");
    }
}


// for update product
if (isset($_POST['update_pro_btn'])) {
    $pid = $_POST['id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $cat_id = $_POST['cat_id'];

    if (empty($_FILES['new_pimage']["name"])) {
        $filwwithnewname = $_POST['old_pimage'];
    } elseif (isset($_FILES['new_pimage']["name"])) {
        $target_dir = "../upload/";
        $patimage = $_FILES['new_pimage']['name'];
        $target_file = $target_dir . basename($patimage);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $filwwithnewname = date('Ydmis') . "Product_Image." . $fileType;

        $filetype = $_FILES['new_pimage']['type'];
        $filesize = $_FILES['new_pimage']['size'];
        $filetemploc = $_FILES['new_pimage']['tmp_name'];

        if (strtolower($filetype) == "image/jpg" || strtolower($filetype) == "image/png" || strtolower($filetype) == "image/jpeg" || strtolower($filetype) == "image/jfif") {
            if ($filesize <= 5000000) /*front 5mb*/ {
                move_uploaded_file($filetemploc, $target_dir . $filwwithnewname);
                unlink($target_dir.$_POST['old_pimage']);
            } else {
                $_SESSION['error'] = "Image Should be less then 5 Mb";
                header("location:../manage_products.php");
                die();
            }
        } else {

            $_SESSION['error'] = "Image extension is wrong || You can insert jpg, png, jpeg and jfif";
            header("location:../manage_products.php");
            die();
        }
    }


    $update = "UPDATE `product` SET `product_name`='$pname',`category_id`=$cat_id,`price`=$pprice,`image`= '$filwwithnewname' WHERE `id`= $pid";
    $excec = mysqli_query($conn, $update);
    if ($excec) {
        $_SESSION['success'] = "Product Updated Successfully";
        header("location:../manage_products.php");
    } else {
        $_SESSION['error'] = "Something Went Wrong";
        header("location:../manage_products.php");
    }
}


// for update slider product
if (isset($_POST['update_slider_pro_btn'])) {
    $pid = $_POST['id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $cat_id = $_POST['cat_id'];
    $pro_desc = $_POST['pro_desc'];

    if (empty($_FILES['new_pimage']["name"])) {
        $filwwithnewname = $_POST['old_pimage'];
    } elseif (isset($_FILES['new_pimage']["name"])) {
        $target_dir = "../upload/";
        $patimage = $_FILES['new_pimage']['name'];
        $target_file = $target_dir . basename($patimage);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $filwwithnewname = date('Ydmis') . "Slider_Product_Image." . $fileType;

        $filetype = $_FILES['new_pimage']['type'];
        $filesize = $_FILES['new_pimage']['size'];
        $filetemploc = $_FILES['new_pimage']['tmp_name'];

        if (strtolower($filetype) == "image/jpg" || strtolower($filetype) == "image/png" || strtolower($filetype) == "image/jpeg" || strtolower($filetype) == "image/jfif") {
            if ($filesize <= 5000000) /*front 5mb*/ {
                move_uploaded_file($filetemploc, $target_dir . $filwwithnewname);
                unlink($target_dir.$_POST['old_pimage']);
            } else {
                $_SESSION['error'] = "Image Should be less then 5 Mb";
                header("location:../manage_slider_products.php");
                die();
            }
        } else {

            $_SESSION['error'] = "Image extension is wrong || You can insert jpg, png, jpeg and jfif";
            header("location:../manage_slider_products.php");
            die();
        }
    }


    $update = "UPDATE `product` SET `product_name`='$pname',`category_id`=$cat_id,`price`=$pprice,`image`= '$filwwithnewname',`product_description`='$pro_desc' WHERE `id`= $pid";
    $excec = mysqli_query($conn, $update);
    if ($excec) {
        $_SESSION['success'] = "Product Updated Successfully";
        header("location:../manage_slider_products.php");
    } else {
        $_SESSION['error'] = "Something Went Wrong";
        header("location:../manage_slider_products.php");
    }
}
