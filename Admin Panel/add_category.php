<?php require_once("header.php") ?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add Category</h4>
                                        <?php 

                                        if(isset($_SESSION['error']) && $_SESSION['error'] == "Category Already Exist!")
                                        {
                                            ?>
                                            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                                            <?php 

                                            unset($_SESSION['error']);

                                        }
                                        elseif(isset($_SESSION['error']) && $_SESSION['error'] == "Image extension is wrong || You can insert jpg, png, jpeg and gif")
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
                                        elseif(isset($_SESSION['success']) && $_SESSION['success'] == "Category Added Successfully")
                                        {
                                            ?>
                                            <div class="alert alert-success" role="alert"><?php echo $_SESSION['success'] ?></div>
                                            <?php 

                                            unset($_SESSION['success']);
                                        }
                                        

                                        ?>

                                        <div class="row mt-4">
                                            <div class="col-lg-12">
                                                <form action="phpfiles/insertion.php" method="post" enctype="multipart/form-data">

                                                    <div class="mb-3">
                                                        <label for="simpleinput" class="form-label">Category name</label>
                                                        <input type="text" name="cat_name" class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-fileinput" class="form-label">Category Image</label>
                                                        <input type="file" name="cat_img" class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input type="submit" name="add_cat_btn" class="btn btn-primary">
                                                    </div>
        
                                                </form>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->
<?php require_once("footer.php") ?>