<?php require_once("header.php"); require_once("phpfiles/connection.php") ?>
<style>
    .btn1
    {
        width: 100%;
        border-radius: 10px;
        background-color: gray;
        font-size: 12px;
        border-color: white;
        font-weight: bolder; 
    }
    .btn2
    {
        width: 100%;
        border-radius: 10px;
        background-color: gray;
        border-color: white;
        font-size: 12px;
        font-weight: bolder;  
    }
</style>


<main class="main-content" style="margin-top:100px">

<!--== Start Contact Area Wrapper ==-->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <h2>Cart</h2>
        </div>
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        if(isset($_SESSION['user_id']))
                        { 
                            $total = 0;
                            $index = 1;
                            $ids = array();

                            $select = "SELECT * FROM `product_cart` WHERE user_id = {$_SESSION['user_id']}";
                            $run = mysqli_query($conn,$select);
                            $row = mysqli_num_rows($run);
                            if($row > 0)
                            {
                                while($ar = mysqli_fetch_array($run))
                                {
                                    array_push($ids,$ar['p_id']);

                                    $total +=$ar['p_price']*$ar['quantity'];
                                    $fetch = "SELECT * FROM `product` WHERE id = {$ar['p_id']}";
                                    $runfetch = mysqli_query($conn,$fetch);
                                    while($arr = mysqli_fetch_array($runfetch))
                                    {
                                         $sn = $index +1;
                                         ?>
                                         <tr>
                                             <td scope="row"><?php echo $index ?></td>
                                             <td scope="row"><?php echo $arr['product_name'] ?></td>
                                             <td scope="row"><img src="../Admin Panel/upload/<?php echo $arr['image'] ?>" width="50" alt=""></td>
                                             <td scope="row"><?php echo $ar['quantity'] ?></td>
                                             <td scope="row"><?php echo $arr['price'] ?></td>
                                             <td scope="row"><center><a href="phpfiles/deleteCart.php?pid=<?php echo $ar['p_id'] ?>"><i class="fa fa-remove"></i></a></center></td>
                                         </tr>
                                         <?php 
                                          $index ++;
                                    }
                                }
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <th scope="row" class="text-danger">No Product in Cart :(</th>
                                </tr>
                                <?php 
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <th scope="row" class="text-danger">Please do login first :(</th>
                            </tr>
                            <?php 
                        }


                    ?>

                </tbody>

            </table>
            <?php 

                if(isset($_SESSION['user_id']) && $row > 0)
                { 
                    ?>
                    <div class="row">
                        <div class="col-11" style="font-weight: bolder;">Total</div>
                        <div class="col-1" style="font-weight: bolder;"><?php echo "Rs ".$total ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="phpfiles/deleteCart.php">
                            <button type="button" class="btn btn-primary btn1">Clear</button>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary btn2 edit-btn">Check Out</button>
                        </div>
                    </div>
                    <?php
                }


            ?>
        </div>
    </div>
</section>
<!--== End Contact Area Wrapper ==-->


<?php 

    if(isset($_SESSION['user_id']))
    {
        require_once("phpfiles/connection.php");
        $sql_for_address = "SELECT * FROM `user` WHERE id = {$_SESSION['user_id']}";
        $run_address = mysqli_query($conn,$sql_for_address);
        $addressArr = mysqli_fetch_array($run_address);

    }

?>

            <div id="modal">
                <div id="modal-form">
                    <h2>Check Out</h2>
                    <form method="POST" action="phpfiles/insertion.php">
                         <div class="form-row">
                         <input type="text" name="userId" value="<?php echo $addressArr['id'] ?>"> 
                         <input type="text" name="productIds[]" value="<?php print_r($ids)  ?>"> 
                         <input type="text" name="totalPrice" value="<?php echo $total ?>"> 
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <label for="validationDefault01">Please Confirm Your Deivery Address</label>
                                    <textarea class="form-control" name="deliveryAddress" cols="30" rows="8"><?php echo $addressArr['address'] ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <label for="validationDefault01">Payment Method</label>
                                    <br>
                                    <input type="radio" name="method" value="cash on delivery" checked> Cash On Delivery
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="orderPlace-btn">Place Order</button>
                    </form>
                    <div id="close-btn">X</div>
                </div>
            </div>



</main>



<?php require_once("footer.php"); ?>


<script>
    $(document).ready(function(){
        $(".itemQuant").on("change",function(){

            var item = $(this).val();
           
        })
    });


     // show modal
     $(document).on("click",".edit-btn",function(){
        $("#modal").show(); 
    });
    // hide modal
    $("#close-btn").on("click",function(){
        $("#modal").hide();
    });
    
    function openAddMore(id,index)
    {   
        document.getElementById('CAT_NAME').value = document.getElementsByName('category_name')[index].innerText;
        document.getElementById('CATE_IMG').value = document.getElementsByName('category_image')[index].innerText;
        document.getElementById('Id').value = document.getElementsByName('id')[index].innerText;
    }
</script>