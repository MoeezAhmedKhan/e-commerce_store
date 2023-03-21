<?php require_once("header.php") ?>

<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Manage Category</h4>

                    <?php 

                        if(isset($_SESSION['changeStatus']) && $_SESSION['changeStatus'] == "Status Updated Successfully")
                        {
                            ?>
                            <div class="alert alert-success" role="alert"><?php echo $_SESSION['changeStatus'] ?></div>
                            <?php 

                            unset($_SESSION['changeStatus']);

                        }
                        elseif(isset($_SESSION['NoChange']) && $_SESSION['NoChange'] == "Something Went Wrong")
                        {
                            ?>
                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['NoChange'] ?></div>
                            <?php 

                            unset($_SESSION['NoChange']);

                        }


                        ?>


                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Id</th>
                                <th>User name</th>
                                <th class="text-center">Product name</th>
                                <th class="text-center">Product image</th>
                                <th>Product price</th>
                                <th>Delivery Address</th>
                                <th>Payment Method</th>
                                <th>Order At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                            require_once("phpfiles/connection.php");
                            $select = "SELECT o.id,o.total_amount,o.delivery_address,o.payment_method,o.status,o.order_at,u.first_name,u.last_name,p.product_name,p.image,o.total_amount FROM order_details o INNER JOIN user u on u.id = o.user_id INNER JOIN product p on p.id = o.product_id";
                            $run = mysqli_query($conn, $select);
                            $row = mysqli_num_rows($run);
                            $index = 0;
                            if ($row > 0) {
                                while ($ar = mysqli_fetch_array($run)) {
                                    $sn = $index +1;
                                    $fullname = $ar['first_name']." ".$ar['last_name'];
                            ?>
                                    <tr>
                                        <td><?php echo $sn ?></td>
                                        <td name="id"><?php echo $ar['id'] ?></td>
                                        <td name="category_name"><?php echo $fullname ?></td>
                                        <td><?php echo $ar['product_name'] ?></td>
                                        <td class="text-center"><a href="./upload/<?php echo $ar['image'] ?>"><img src="./upload/<?php echo $ar['image'] ?>" height="30" width="30"></a></td>
                                        <td><?php echo $ar['total_amount'] ?></td>
                                        <td><?php echo $ar['delivery_address'] ?></td>
                                        <td><?php echo $ar['payment_method'] ?></td>
                                        <td><?php echo $ar['order_at'] ?></td>
                                        <td name="ostatus"><?php echo $ar['status'] ?></td>
                                        <td><Button class="btn btn-primary edit-btn" onclick="openAddMore(<?php echo $ar['id'].','.$index  ?>)">Update</Button></td>
                                    </tr>
                            <?php
                            $index ++;
                                }
                            } else {
                                ?>
                                <tr>No Category Found</tr>
                                <?php 
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div> <!-- end row -->

            <div id="modal">
                <div id="modal-form">
                    <h2>Edit</h2>
                    <form method="POST" action="phpfiles/action.php" enctype="multipart/form-data">
                         <div class="form-row">
                         <input type="hidden" name="id" id="Id"> 
                            <div class="col-xl-12 mb-3">
                                <label for="validationDefault01">Order Status</label>
                                <select name="o_status" class="form-control">
                                    <option disabled>Select</option>
                                    <option value="inprogress">Inprogress</option></option>
                                    <option value="shipped">Shipped</option></option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="update_orderstatus_btn">Update</button>
                    </form>
                    <div id="close-btn">X</div>
                </div>
            </div>

</div> <!-- container-fluid -->

<?php require_once("footer.php")  ?>

<script>
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
        document.getElementById('Id').value = document.getElementsByName('id')[index].innerText;
    }
</script>

<script>
    $(document).ready(function(){
        $(document).on("click",".delete-btn",function(){
            var id = $(this).data("did");
            var element = this
            
            if(confirm("Do you really want to delete this category"))
            {
                $.ajax({
                    url:"ajaxfiles/delete_category.php",
                    type:"POST",
                    data:{c_id:id},
                    success: function(data){
                        if(data == 1){
                            $(element).closest("tr").fadeOut();
                        }
                        else
                        {
                            $("#error-mesg").html("Something went wrong while deleting record").slideDown();;
                        }
                    }
                });
            }

        });
    });
</script>