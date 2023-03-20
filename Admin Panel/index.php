<?php require_once("header.php") ?>
    
    <!-- Start Content-->
     <div class="container-fluid">

<div class="row">

<div class="col-xl-3 col-md-6">

    <?php 
        require_once("./phpfiles/connection.php");
        $sql = "SELECT * FROM `category`";
        $run = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($run);
    ?>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Total Product Category</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2">
                        <h2 class="fw-normal mb-1"> <?php echo $row ?> </h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end col -->

    <div class="col-xl-3 col-md-6">

    <?php 
        require_once("./phpfiles/connection.php");
        $sql = "SELECT * FROM `product`";
        $run = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($run);
    ?>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Total Product</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2">
                        <h2 class="fw-normal mb-1"> <?php echo $row ?> </h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end col -->

    <div class="col-xl-3 col-md-6">

    <?php 
        require_once("./phpfiles/connection.php");
        $sql = "SELECT * FROM `product` WHERE is_slider = 'true'";
        $run = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($run);
    ?>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Product Slider</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2">
                        <h2 class="fw-normal mb-1"> <?php echo $row ?> </h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- end col -->

</div>
<!-- end row -->




</div> <!-- container-fluid -->


<?php require_once("footer.php") ?>