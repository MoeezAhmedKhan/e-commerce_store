<?php require_once("header.php") ?>

<style>
  .product-category-item:hover {
    background-color: rgb(255, 234, 204) !important;

  }

  .hero-slide-title {
    float: left;
  }

  .hero-slide-desc {
    text-align: left;
  }

  .hero-slide-item.swiper-slide-active .hero-slide-content .btn {
    float: left;
  }
  .product-category-item {
    width: 180px !important;
    height: 235px;
  }
  .page-item:first-child .page-link {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    border-radius: 50px !important;
}
.page-item:last-child .page-link {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-radius: 50px !important;
}
  .pagination
  {
      background-color: #ff6565 !important;
  }
  .pagination li :hover
  {
      background-color: white !important;
  }
</style>

<main class="main-content">
  <!--== Start Hero Area Wrapper ==-->
  <section class="hero-slider-area position-relative">
    <div class="swiper hero-slider-container">
      <div class="swiper-wrapper">
        <!--  -->

        <?php 

            require_once("phpfiles/connection.php");
            $sql_for_slider = "SELECT `id`, `product_name`, `category_id`, `price`, `image`, `product_description`, `is_slider`, `created_at` FROM `product` WHERE is_slider = 'true'";
            $run_slider = mysqli_query($conn,$sql_for_slider);
            $slider_row = mysqli_num_rows($run_slider);
            if($slider_row > 0)
            {
              while($slider_Ar = mysqli_fetch_array($run_slider))
              {
                ?>

                  <div class="swiper-slide hero-slide-item">
                    <div class="container">
                      <div class="row align-items-center position-relative">
                        <div class="col-12 col-md-6">
                          <div class="hero-slide-content">
                            <!-- <div class="hero-slide-text-img"><img src="../Admin Panel/upload/<php echo $slider_Ar['image'] ?>" width="427" height="232" alt="Image"></div> -->
                            <h2 class="hero-slide-title"><?php echo $slider_Ar['product_name'] ?></h2>
                            <p class="hero-slide-desc"><?php echo $slider_Ar['product_description'] ?></p>
                            <a class="btn btn-border-dark" href="product-details.php?pid=<?php echo $slider_Ar['id'] ?>">BUY NOW</a>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="hero-slide-thumb">
                            <img src="../Admin Panel/upload/<?php echo $slider_Ar['image'] ?>" width="841" height="832" alt="Image">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="hero-slide-text-shape"><img src="assets/images/slider/text1.webp" width="70" height="955" alt="Image"></div>
                    <div class="hero-slide-social-shape"></div>
                  </div>

                <?php 
              }
            }
            else
            {
              
            }

        ?>

        
        <!--  -->
      </div>
      <!--== Add Pagination ==-->
      <div class="hero-slider-pagination"></div>
    </div>
    <div class="hero-slide-social-media">
      <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest"></i></a>
      <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
      <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
    </div>
  </section>
  <!--== End Hero Area Wrapper ==-->

      <div class="swiper mySwiper my-5  section-space container" style="padding: 60px 0px;">
        <div class="swiper-wrapper container">

          <?php

          require_once("phpfiles/connection.php");

          $select_cat = "SELECT `id`, `category_name`, `category_image`, `created_at` FROM `category`";
          $cat_run = mysqli_query($conn, $select_cat);
          $cat_row = mysqli_num_rows($cat_run);
          if ($cat_row > 0) {
            while ($cat_ar = mysqli_fetch_array($cat_run)) {
          ?>
              <div class="swiper-slide col-6 col-lg-4 col-lg-2 col-xl-2">
                <!--== Start Product Category Item ==-->
                <a href="products.php?id=<?php echo $cat_ar['id'] ?>" class="product-category-item">
                  <img class="icon mx-auto" src="./../Admin Panel/upload/<?php echo $cat_ar['category_image'] ?>" width="70" height="80" alt="Image-HasTech" />
                  <h3 class="title"><?php echo $cat_ar['category_name'] ?></h3>
                  <span class="flag-new">new</span>
                </a>
                <!--== End Product Category Item ==-->
              </div>
          <?php
            }
          }


          ?>

          <!-- assets/images/shop/category/1.webp -->

        </div>

        <div class="swiper-pagination"></div>
      </div>



  <!--== End Product Category Area Wrapper ==-->

  <!--== Start Product Area Wrapper ==-->
  <section class="section-space">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title text-center">
            <h2 class="title">More To Love</h2>
            <p>
              An exciting place for the whole family to shop.
            </p>
            <p>Inspiring store to buy more.</p>
          </div>
        </div>
      </div>
      <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">

      <?php

          require_once("phpfiles/connection.php");

          $limit = 12;
          if(isset($_GET['page']))
          {
              $page = $_GET['page'];
          }
          else
          {
              $page = 1;
          }
          $offset = ($page - 1) * $limit;

          $select = "SELECT `id`, `product_name`, `category_id`, `price`, `image`, `created_at` FROM `product` LIMIT $offset,$limit";
          $run = mysqli_query($conn,$select);
          $row = mysqli_num_rows($run);
          if($row > 0)
          {
              while($Arr = mysqli_fetch_array($run))
              {
                  ?>

                  <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                            <!--== Start Product Item ==-->
                            <div class="product-item">
                              <div class="product-thumb">
                                <a class="d-block" href="product-details.php?pid=<?php echo $Arr['id'] ?>">
                                  <img src="../Admin Panel/upload/<?php echo $Arr['image'] ?>" width="370" height="450" alt="Image-HasTech" />
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
                                <h4 class="title">
                                  <a href="product-details.php?pid=<?php echo $Arr['id'] ?>"><?php echo $Arr['product_name'] ?></a>
                                </h4>
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



              ?>



              <div class="col-12">
                                                                  
                  <?php 
                  require_once("phpfiles/connection.php");
                  $sql_pro = "SELECT `id`, `product_name`, `category_id`, `price`, `image`, `created_at` FROM `product`";
                  $pro_result = mysqli_query($conn,$sql_pro);
                  $pro_row = mysqli_num_rows($pro_result);
                  if($pro_row > 0)
                  {
                      $totalRecord = $pro_row; 
                      $totalPage = ceil($totalRecord/$limit);
                      
                      ?>
                      <ul class="pagination justify-content-center me-auto ms-auto mt-5 mb-10">
                      <?php 
                      
                                                                                      
                      
                      for($i = 1; $i <= $totalPage; $i++)
                      {
                          if($i == $page)
                          {
                              $active = "active";
                          }
                          else
                          {
                              $active = "";
                          }
                          ?>
                          <li class="page-item <?php echo $active ?>"><a href="shop.php?page=<?php echo $i ?>" class="page-link" href="product.php"><?php echo $i ?></a></li>
                          <?php 
                      }
                      

                          ?>
                          </ul>
                          <?php
                      
                          }
                      
                      ?>
                      
                                                              
                                                                   
              </div>
              
              
              
              <?php 



          }
          else
          {
              echo "No Product Found";
          }
          

      ?>


        
      </div>
    </div>
  </section>
  <!--== End Product Area Wrapper ==-->

</main>


<?php require_once("footer.php"); ?>