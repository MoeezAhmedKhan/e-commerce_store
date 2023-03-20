<?php require_once("header.php") ?>


        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <section class="page-header-area pt-10 pb-9" style="margin-top:100px" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Products</li>
                                </ol>
                                <h2 class="page-header-title">All Products</h2>
                            </div>
                        </div>
                        <?php 
                        
                            require_once("phpfiles/connection.php");
                            $cat_id = $_GET['id'];
                            $select_count = "SELECT `id`, `product_name`, `category_id`, `price`, `image`, `created_at` FROM `product` WHERE category_id = $cat_id";
                            $run_count = mysqli_query($conn,$select_count);
                            $row_count = mysqli_num_rows($run_count);
                        
                        ?>
                        <div class="col-md-7">
                            <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Showing <?php echo $row_count ?> Results</h5>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Product Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="row justify-content-between flex-xl-row-reverse">
                        <div class="col-xl-9">
                            <div class="row g-3 g-sm-6" id="product_data">

                                <?php 
                                    require_once("phpfiles/connection.php");
                                    $cat_id = $_GET['id'];
                                    
                                    $select = "SELECT `id`, `product_name`, `category_id`, `price`, `image`, `created_at` FROM `product` WHERE category_id = $cat_id";
                                    $run = mysqli_query($conn,$select);
                                    $row = mysqli_num_rows($run);
                                    if($row > 0)
                                    {
                                        while($Arr = mysqli_fetch_array($run))
                                        {
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
                                                                <!-- <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                                    <i class="fa fa-heart-o"></i>
                                                                </button> -->
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
                                                                <span class="price"><?php echo $Arr['price']." PKR" ?></span>
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

                            </div>
                        </div>

                        <?php
                        if($row > 0)
                        {
                            ?>
                               <div class="col-xl-3">
                            <div class="product-sidebar-widget">
                                <div class="product-widget-search">
                                        <input type="search" placeholder="Search Here" id="search">
                                        <input type="hidden" id="c_id" value="<?php echo $cat_id ?>">
                                </div>
                             
                                <div class="product-widget price-filter">
                                <h2 class="product-widget-title">Price Range</h2>
                                <div class="product-widget-range-slider price-range">
                                    <label for="price-min" style="font-size: 12px;">Min Price:</label>
                                    <input type="number" id="pmin" name="price-min" placeholder="0">
                                    <label for="price-max" style="font-size: 12px;">Max Price:</label>
                                    <input type="number" id="pmax" name="price-max" placeholder="1000">
                                </div>
                                <p style="color: red;font-size: 14px;" id="filter-required"></p>
                                <button type="button" id="filter-btn" class="btn-filter mt-3">Filter</button>
                                <button type="button" class="btn-filter" style="background-color: #ffbf80;" onclick="refresh();">Reset</button>
                                </div>


                                <div class="product-widget">
                                    <h4 class="product-widget-title">Categoris</h4>
                                    <ul class="product-widget-category" id="fecthCategory">
                                        <?php

                                            require_once("phpfiles/connection.php");
                                            $fetch_cat = "SELECT `id`, `category_name`, `category_image`, `no_of_products`, `created_at` FROM `category`";
                                            $run_cat = mysqli_query($conn,$fetch_cat);
                                            $cat_num = mysqli_num_rows($run_cat);
                                            if($cat_num > 0)
                                            {
                                                while($cat_Arr = mysqli_fetch_array($run_cat))
                                                {
                                                    ?>
                                                        <li><a href="products.php?id=<?php echo $cat_Arr['id']  ?>"><?php echo $cat_Arr['category_name']  ?> <span><?php echo $cat_Arr['no_of_products']  ?></span></a></li>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <li><a href="">No Category Found</a></li>
                                                <?php
                                            }

                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            <?php 
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!--== End Product Area Wrapper ==-->

            <!--== Start Product Banner Area Wrapper ==-->
            <section>
                <div class="container">
                    <!--== Start Product Category Item ==-->
                    <a href="product.php" class="product-banner-item">
                        <img src="assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
                    </a>
                    <!--== End Product Category Item ==-->
                </div>
            </section>
            <!--== End Product Banner Area Wrapper ==-->

            <!--== Start Product Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2 class="title">Related Products</h2>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-n10">
                        <div class="col-12">
                            <div class="swiper related-product-slide-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide mb-8">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="assets/images/shop/4.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
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
                                                <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                                <div class="prices">
                                                    <span class="price">$210.00</span>
                                                    <span class="price-old">300.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                    <div class="swiper-slide mb-8">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="assets/images/shop/5.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
                                                <form action="./footer.php" method="post">
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-quick-view" name="expand" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </div>
                                                </form>
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
                                                <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                                <div class="prices">
                                                    <span class="price">$210.00</span>
                                                    <span class="price-old">300.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                    <div class="swiper-slide mb-8">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="assets/images/shop/6.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
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
                                                <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                                <div class="prices">
                                                    <span class="price">$210.00</span>
                                                    <span class="price-old">300.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Product Area Wrapper ==-->

        </main>
        
        <?php require_once("footer.php") ?>
        
        <script>
        $(document).ready(function(){
            
            // search
            $("#search").on("keyup",function(){
                var search_term = $(this).val();
                var cat_id = $("#c_id").val();
                
                $.ajax({
                    url:"ajax/search_product.php",
                    type:"POST",
                    data:{search_data:search_term,cid:cat_id},
                    success:function(data){
                        $("#product_data").html(data);
                    }
                });
            })

            // filter price
            $("#filter-btn").on("click",function(){
                var min = $("#pmin").val();
                var max = $("#pmax").val();
                var cat_id = $("#c_id").val();
                
                if(min == "" || max == "")
                {
                    $("#filter-required").html("Min and Max Amount is required").slideDown();
                    setTimeout(() => {
                        $("#filter-required").fadeOut("slow");
                    }, 1000);
                }
                else
                {
                    $.ajax({
                        url:"ajax/filter_price.php",
                        type:"POST",
                        data:{minprice:min,maxprice:max,cid:cat_id},
                        success:function(data){
                            $("#product_data").html(data);
                        }
                    });
                }
            });
            
        });

        function refresh(){
            location.reload();
        }
</script>