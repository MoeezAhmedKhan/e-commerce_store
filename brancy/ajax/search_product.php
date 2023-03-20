<?php

require_once("../phpfiles/connection.php");
$search_value = $_POST['search_data'];
$cid = $_POST['cid'];
$select = "SELECT `id`, `product_name`, `category_id`, `price`, `image`, `created_at` FROM `product` WHERE product_name LIKE '%{$search_value}%' AND category_id = $cid";
$run = mysqli_query($conn, $select);
$row = mysqli_num_rows($run);
if ($row > 0) {
    while ($Arr = mysqli_fetch_array($run)) {
?>
        <div class="col-6 col-lg-4 col-xl-4 mb-4 mb-sm-8">
            <!--== Start Product Item ==-->
            <div class="product-item product-st3-item">
                <div class="product-thumb" style="height:350px">
                    <a class="d-block" href="product-details.php">
                        <img src="../Admin Panel/upload/<?php echo $Arr['image'] ?>" width="370" height="450" alt="Image-HasTech">
                    </a>
                    <span class="flag-new">new</span>
                    <div class="product-action">
                        <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-rating">
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <div class="reviews">150 reviews</div>
                    </div>
                    <h4 class="title"><a href="product-details.php"><?php echo $Arr['product_name'] ?></a></h4>
                    <div class="prices">
                        <span class="price"><?php echo $Arr['price'] . " PKR" ?></span>
                        <!-- <span class="price-old">300.00</span> -->
                    </div>
                </div>
            </div>
            <!--== End prPduct Item ==-->
        </div>
<?php
    }
}
else
{
    echo "No Product Found";
}

?>