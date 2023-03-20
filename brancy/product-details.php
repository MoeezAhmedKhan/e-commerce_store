<?php require_once("header.php") ?>

<style>
    .product-details-cart-wishlist .btn {
    letter-spacing: 2px;
    font-weight: 500;
    position: relative;
    left: -50px;
}
</style>


    <?php 

        require_once("phpfiles/connection.php");
        $pid = $_GET['pid'];
        $sql = "SELECT `id`, `product_name`, `category_id`, `price`, `image`, `product_description`, `is_slider`, `created_at` FROM `product` WHERE id = $pid";
        $run = mysqli_query($conn,$sql);
        $ar = mysqli_fetch_array($run)

    ?>



        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <section class="page-header-area pt-10 pb-9" style="margin-top:100px" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Product Detail</li>
                                </ol>
                                <h2 class="page-header-title">Product Detail</h2>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Showing Single Product</h5>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Product Details Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="row product-details">
                        <div class="col-lg-6">
                            <div class="product-details-thumb">
                                <img src="../Admin Panel/upload/<?php echo $ar['image'] ?>" width="570" height="693" alt="Image">
                                <span class="flag-new">new</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-content">
                            <input type="hidden" title="Quantity" id="pid" value="<?php echo $ar['id'] ?>">
                                <h3 class="product-details-title"><?php echo $ar['product_name'] ?></h3>
                                <div class="product-details-review">
                                    <div class="product-review-icon">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <button type="button" class="product-review-show">150 reviews</button>
                                </div>
                                <br><br>
                                <div class="product-details-pro-qty">
                                    <div class="pro-qty">
                                        <input type="text" title="Quantity" id="quantity" value="01">
                                    </div>
                                </div>
                                <div class="product-details-action">
                                    <h4 class="price"><?php echo "Rs"." : ".$ar['price'] ?></h4>
                                </div>
                                <div class="product-details-action">
                                    <div class="product-details-cart-wishlist" >
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">By Now</button> &nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn cart-btn" data-bs-toggle="modal">Add to cart</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Product Details Area Wrapper ==-->

            <!--== Start Product Banner Area Wrapper ==-->
         
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
                                    <div class="swiper-slide mb-10">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item product-st2-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="assets/images/shop/8.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
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
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                    <div class="swiper-slide mb-10">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item product-st2-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="assets/images/shop/7.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
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
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                    <div class="swiper-slide mb-10">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item product-st2-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="assets/images/shop/5.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
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
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
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
                $(".cart-btn").on("click",function(){
                    var pid = $("#pid").val();
                    var quantity = $("#quantity").val();
                    
                });
            });
        </script>