<?php 

    require_once("connection.php");

    $id = $_POST['p_id'];


    $select = "select * from `product` where id = $id";
    $select_run = mysqli_query($conn,$select);
    $ar = mysqli_fetch_array($select_run);
    

    $delete = "DELETE FROM `product` WHERE id = $id;";
    $delete .= "UPDATE `category` SET `no_of_products`= no_of_products - 1 WHERE `id` = {$ar['category_id']}";
    $run = mysqli_multi_query($conn,$delete);
    if($run)
    {
        unlink("../upload/".$ar['image']);
        echo 1;
    }
    else
    {
        echo 0;
    }

?>