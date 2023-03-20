<?php require_once("header.php") ?>

<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Manage Category</h4>

                    <?php 

                                        if(isset($_SESSION['error']) && $_SESSION['error'] == "Image extension is wrong || You can insert jpg, png, jpeg and jfif")
                                        {
                                            ?>
                                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                                            <?php 

                                            unset($_SESSION['error']);

                                        }
                                        elseif(isset($_SESSION['error']) && $_SESSION['error'] == "Image Should be less then 5 Mb")
                                        {
                                            ?>
                                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                                            <?php 

                                            unset($_SESSION['error']);

                                        }
                                        elseif(isset($_SESSION['error']) && $_SESSION['error'] == "Something Went Wrong")
                                        {
                                            ?>
                                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                                            <?php 

                                            unset($_SESSION['error']);

                                        }
                                        elseif(isset($_SESSION['success']) && $_SESSION['success'] == "Product Updated Successfully")
                                        {
                                            ?>
                                            <div class="alert alert-success" role="alert"><?php echo $_SESSION['success'] ?></div>
                                            <?php 

                                            unset($_SESSION['success']);
                                        }
                                        

                                        ?>

                                    <div class="alert alert-danger" role="alert" id="error-mesg" style="display: none;"></div>


                    <table id="example" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Id</th>
                                <th>Product name</th>
                                <th>Product Price</th>
                                <th class="text-center">Product Image</th>
                                <th>Category Name</th>
                                <th>Product Description</th>
                                <th>Created At</th>
                                <th>Action</th>
                                <th>Delete</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                            require_once("phpfiles/connection.php");
                            $select = "SELECT p.id,p.product_name,p.price,p.image,p.product_description,p.created_at,c.category_name FROM product p INNER JOIN category c on c.id = p.category_id WHERE p.is_slider = 'true'";
                            $run = mysqli_query($conn, $select);
                            $row = mysqli_num_rows($run);
                            $index = 0;
                            if ($row > 0) {
                                while ($ar = mysqli_fetch_array($run)) {
                                    $sn = $index +1;
                            ?>
                                    <tr>
                                        <td><?php echo $sn ?></td>
                                        <td name="id"><?php echo $ar['id'] ?></td>
                                        <td name="product_name"><?php echo $ar['product_name'] ?></td>
                                        <td name="price"><?php echo $ar['price'] ?></td>
                                        <td hidden name="image"><?php echo $ar['image'] ?></td>
                                        <td class="text-center"><a href="./upload/<?php echo $ar['image'] ?>"><img src="./upload/<?php echo $ar['image'] ?>" height="30" width="30"></a></td>
                                        <td name="category_name"><?php echo $ar['category_name'] ?></td>
                                        <td name="product_description"><?php echo $ar['product_description'] ?></td>
                                        <td><?php echo $ar['created_at'] ?></td>
                                        <td><Button class="btn btn-primary edit-btn" onclick="openAddMore(<?php echo $ar['id'].','.$index  ?>)">Update</Button></td>
                                        <td><Button class="btn btn-danger delete-btn" data-did="<?php echo $ar['id'] ?>">Delete</Button></td>
                                    </tr>
                            <?php
                            $index ++;
                                }
                            } else {
                                ?>
                                <tr>No Product Found</tr>
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
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault01">Product name</label>
                                    <input type="text" class="form-control" name="pname" id="PRO_NAME" id="validationDefault01">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault01">Product Price</label>
                                    <input type="text" class="form-control" name="pprice" id="PRO_PRICE" id="validationDefault01">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault01">Product Image</label>
                                    <input type="file" class="form-control" name="new_pimage">
                                    <input type="hidden" class="form-control" name="old_pimage" id="PRO_IMAGE" id="validationDefault01">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault01">Select Category</label>
                                    <select class="form-control" name="cat_id">
                                        <?php 
                                                $select_cat = "SELECT `id`, `category_name`, `category_image`, `created_at` FROM `category` ";
                                                $run_cat = mysqli_query($conn,$select_cat);
                                                $cat_row = mysqli_num_rows($run_cat);
                                                if($cat_row > 0)
                                                {
                                                    while($carArr = mysqli_fetch_array($run_cat))
                                                    {
                                                        ?>
                                                            <option value="<?php echo $carArr['id'] ?>"><?php echo $carArr['category_name'] ?></option>
                                                        <?php 
                                                    }
                                                }
                                        ?>
                                        
                                    </select>
                                </div>

                                <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <label for="validationDefault01">Product Description</label>
                                    <input type="text" class="form-control" name="pro_desc" id="PRO_DESC" id="validationDefault01">
                                </div>
                            </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="update_slider_pro_btn">Update</button>
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
        document.getElementById('PRO_NAME').value = document.getElementsByName('product_name')[index].innerText;
        document.getElementById('PRO_PRICE').value = document.getElementsByName('price')[index].innerText;
        document.getElementById('PRO_IMAGE').value = document.getElementsByName('image')[index].innerText;
        document.getElementById('PRO_DESC').value = document.getElementsByName('product_description')[index].innerText;
        document.getElementById('Id').value = document.getElementsByName('id')[index].innerText;
    }
</script>

<script>
    $(document).ready(function(){
        $(document).on("click",".delete-btn",function(){
            var id = $(this).data("did");
            var element = this
            
            if(confirm("Do you really want to delete this Product"))
            {
                $.ajax({
                    url:"ajaxfiles/delete_product.php",
                    type:"POST",
                    data:{p_id:id},
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
