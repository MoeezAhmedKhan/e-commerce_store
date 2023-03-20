<?php require_once("header.php") ?>

<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Product</h4>
                    <?php

                    if (isset($_SESSION['error']) && $_SESSION['error'] == "Product Already Exist!") {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                    <?php

                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['error']) && $_SESSION['error'] == "Image extension is wrong || You can insert jpg, png, jpeg and jfif") {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                    <?php

                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['error']) && $_SESSION['error'] == "Image Should be less then 5 Mb") {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                    <?php

                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['error']) && $_SESSION['error'] == "Something Went Wrong") {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                    <?php

                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['success']) && $_SESSION['success'] == "Product Added Successfully") {
                    ?>
                        <div class="alert alert-success" role="alert"><?php echo $_SESSION['success'] ?></div>
                    <?php

                        unset($_SESSION['success']);
                    }


                    ?>

                    <div class="row mt-4">
                        <form action="phpfiles/insertion.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputEmail4" class="form-label">Product name</label>
                                    <input type="text" class="form-control" name="p_name" placeholder="Product name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputPassword4" class="form-label">Category</label>
                                    <select id="inputState" name="cat_id" class="form-select" required>
                                    <option disabled>Choose</option>
                                        <?php
                                            require_once("phpfiles/connection.php");
                                            $select = "SELECT `id`, `category_name`, `category_image`, `created_at` FROM `category`";
                                            $run = mysqli_query($conn,$select);
                                            $row = mysqli_num_rows($run);
                                            if($row > 0)
                                            {
                                               while($ar = mysqli_fetch_array($run))
                                               {
                                                    ?>
                                                    <option value="<?php echo $ar['id'] ?>"><?php echo $ar['category_name'] ?></option>
                                                    <?php 
                                               }
                                            }
                                            else
                                            {
                                                ?>
                                                <option>No Category Found</option>
                                                <?php 
                                            }

                                         ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputEmail4" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" name="p_price" placeholder="Product Price" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputPassword4" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" name="p_image" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="inputEmail4" class="form-label">Short Description for Product</label>
                                    <input type="text" class="form-control" name="p_desc" placeholder="Product Description" required>
                                </div>
                            </div>

                            <button type="submit" name="add_slider_product_btn" class="btn btn-primary waves-effect waves-light">Add Product</button>
                        </form>
                    </div> <!-- end col -->
                    <!-- end row-->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
<?php require_once("footer.php") ?>