<?php 

    require_once("connection.php");

    $id = $_POST['c_id'];

    $select_pro = "SELECT * FROM `product` WHERE `category_id` = $id";
    $run_pro = mysqli_query($conn,$select_pro);
    $row_pro = mysqli_num_rows($run_pro);
    if($row_pro > 0)
    {
        $select = "select * from `category` where id = $id";
        $select_run = mysqli_query($conn,$select);
        $ar = mysqli_fetch_array($select_run);
        
    
        $delete = "DELETE FROM `category` WHERE id = $id";
        $run = mysqli_query($conn,$delete);
        if($run)
        {
            $delet_pro = "DELETE FROM `product` WHERE `category_id` = $id";
            mysqli_query($conn,$delet_pro);

            unlink("../upload/".$ar['category_image']);
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    else
    {
        $select = "select * from `category` where id = $id";
        $select_run = mysqli_query($conn,$select);
        $ar = mysqli_fetch_array($select_run);
        
    
        $delete = "DELETE FROM `category` WHERE id = $id";
        $run = mysqli_query($conn,$delete);
        if($run)
        {
            unlink("../upload/".$ar['category_image']);
            echo 11;
        }
        else
        {
            echo 00;
        }
    }



?>