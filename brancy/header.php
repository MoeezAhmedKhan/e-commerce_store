<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Brancy - Cosmetic & Beauty Salon Website Template</title>
  <meta name="robots" content="noindex, follow" />
  <meta name="description" content="Brancy - Cosmetic & Beauty Salon Website Template" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="bootstrap, ecommerce, ecommerce html, beauty, cosmetic shop, beauty products, cosmetic, beauty shop, cosmetic store, shop, beauty store, spa, cosmetic, cosmetics, beauty salon" />
  <meta name="author" content="codecarnival" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.webp" />

  <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

  <!-- Font CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

  <!-- Vendor CSS (Bootstrap & Icon Font) -->
  <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css" />

  <!-- Plugins CSS (All Plugins Files) -->
  <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
  <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/css/plugins/fancybox.min.css" />
  <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Style CSS -->
  <link rel="stylesheet" href="./assets/css/style.min.css" />
</head>
<style>
  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    /* background: #fff; */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    object-fit: cover;
  }

  .price-filter {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 20px;
}

.price-range {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.price-range label {
  margin-right: 10px;
}

.price-range input {
  width: 70px;
  margin-right: 10px;
  padding: 5px;
  border: 1px solid #ccc;
}

.btn-filter {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-filter:hover {
  background-color: #3e8e41;
}


#modal
        {
            background:rgba(0,0,0,0.7);
            position:fixed;
            left:0;
            top:0;
            height:100%;
            width:100%;
            z-index:100;
            display:none;
                
        }
        #modal-form
        {
            background:#fff;
            width:65%;
            position:relative;
            top:10%;
            left:18%;
            padding:30px;
            border-radius:8px;
        }
        #modal-form h2
        {
            margin:0,0,15px;
            padding-bottom:10px;
        }
        #close-btn
        {
            background:red;
            color:white;
            width:30px;
            height:30px;
            line-height:30px;
            text-align:center;
            position:absolute;
            top:-15px;
            right:-15px;
            cursor:pointer;
            border-radius:7px;
        }




</style>

<body>
  
  <!--== Wrapper Start ==-->
  <div class="wrapper">

    <!--== Start Header Wrapper ==-->
    <header class="header-area sticky-header header-transparent">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-5 col-lg-2 col-xl-1">
            <div class="header-logo">
              <a href="index.php">
                <img class="logo-main" src="assets/images/logo.webp" width="95" height="68" alt="Logo" />
              </a>
            </div>
          </div>
          <div class="col-lg-7 col-xl-7 d-none d-lg-block">
            <div class="header-navigation ps-7">
              <ul class="main-nav justify-content-start">
                <li class="has-submenu"><a href="index.php">home</a>
                </li>
                <li><a href="about-us.php">about</a></li>
                <li class="has-submenu position-static"><a href="shop.php">shop</a>
                </li>
                <li><a href="contact.php">Contact</a></li>
                <?php

                    if(isset($_SESSION['userName']))
                    {
                      ?>
                        <li><a href="my-account.php"><?php echo $_SESSION['userName'] ?></a></li>
                      <?php 
                    }

                ?>
              </ul>
            </div>
          </div>
          <div class="col-7 col-lg-3 col-xl-4">
            <div class="header-action justify-content-end">
              <button class="header-action-btn ms-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
                <span class="icon">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect class="icon-rect" width="30" height="30" fill="url(#pattern1)" />
                    <defs>
                      <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_504:11" transform="scale(0.0333333)" />
                      </pattern>
                      <image id="image0_504:11" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABiUlEQVRIie2Wu04CQRSGP0G2EUtIbHwA8B3EQisLIcorEInx8hbEZ9DKy6toDI1oAgalNFpDoYWuxZzJjoTbmSXERP7kZDbZ859vdmb27MJcf0gBUAaugRbQk2gBV3IvmDa0BLwA4Zh4BorTACaAU6fwPXAI5IAliTxwBDScvJp4vWWhH0BlTLEEsC+5Fu6lkgNdV/gKDnxHCw2I9rSiNQNV8baBlMZYJtpTn71KAg9SY3dUYn9xezLPgG8P8BdwLteq5X7CzDbnAbXKS42WxtQVUzoGeFlqdEclxXrnhmhhkqR+8KuMqzHA1vumAddl3IwB3pLxVmOyr1NjwKQmURJ4lBp7GmOAafghpg1qdSDeDrCoNReJWmZB4dsAPsW7rYVa1Rx4FbOEw5TEPKmFvgMZX3DCgYeYNniMaQ5piTXghGhPLdTmZ33hYNpem98f/UHRwSxvhqhXx4anMA3/EmhiOlJPJnSBOb3uQcpOE65VhujPpAms/Bu4u+x3swRbeB24mTV4LgB+AFuLedkPkcmmAAAAAElFTkSuQmCC" />
                    </defs>
                  </svg>
                </span>
              </button>

              <a href="showcart.php">
              <button class="header-action-btn" type="button" data-bs-toggle="offcanvas" aria-controls="AsideOffcanvasCart">
                <span class="icon">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect class="icon-rect" width="30" height="30" fill="url(#pattern2)" />
                    <defs>
                      <pattern id="pattern2" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_504:9" transform="scale(0.0333333)" />
                      </pattern>
                      <image id="image0_504:9" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABFUlEQVRIie2VMU7DMBSGvwAqawaYuAmKxCW4A1I5Qg4AA93KBbp1ZUVUlQJSVVbCDVhgzcTQdLEVx7WDQ2xLRfzSvzzb+d6zn2MYrkugBBYevuWsHKiFn2JBMwH8Bq6Aw1jgBwHOYwGlPgT4LDZ4I8BJDNiEppl034UEJ8DMAJ0DByHBACPgUYEugePQUKkUWAmnsaB/Ry/YO9aXCwlT72AdrqaWEohwBWxSwc8ReIVtYIr5bM5pXqO+Men7rozGlkVSv4lJj1WQfsbvXVkNVNk1eEK4ik9/yuwzAPhLh5iuU4jtftMDR4ZJJXChxTJ2H3zXGDgWc43/X2Wro8G81a8u2fXU2nXiLVAxvNIKuPGW/r/2SltF+a3Rkw4pmwAAAABJRU5ErkJggg==" />
                    </defs>
                  </svg>
                </span>
              </button>
              </a>

              <?php 

              if(isset($_SESSION['user_id']))
              {
                require_once("phpfiles/connection.php");

                $selectCount = "SELECT * FROM `product_cart` WHERE user_id = {$_SESSION['user_id']}";
                $runCount = mysqli_query($conn,$selectCount);
                $row = mysqli_num_rows($runCount); 

                  ?>
                    <span class="mb-1" class="badge"><?php echo $row ?></span>
                  <?php 
              }


              ?>
              

              <?php 

                if(!isset($_SESSION['userName']))
                {
                  ?>
                    <a class="header-action-btn dropdown notification-list topbar-dropdown" href="account.php">
                      <span class="icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <rect class="icon-rect" width="30" height="30" fill="url(#pattern3)" />
                          <defs>
                            <pattern id="pattern3" patternContentUnits="objectBoundingBox" width="1" height="1">
                              <use xlink:href="#image0_504:10" transform="scale(0.0333333)" />
                            </pattern>
                            <image id="image0_504:10" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABEUlEQVRIie3UMUoDYRDF8Z8psqUpLBRrBS+gx7ATD6E5iSjeQQ/gJUzEwmChnZZaKZiQ0ljsLkhQM5/5Agr74DX7DfOfgZ1Hoz+qAl30Marcx2H1thCtY4DJN76parKqmAH9DM+6eTcArX2QE3yVAO7lBA8TwMNIw6UgeJI46My+rWCjUQL0LVIUBd8lgEO1UfBZAvg8oXamCuWNRu64nRNMmUo/wReSXLXayoDoKc9miMvqW/ZNG2VRNLla2MYudrCFTvX2intlnl/gGu/zDraGYzyLZ/UTjrD6G2AHpxgnAKc9xgmWo9BNPM4BnPYDNiLg24zQ2oNpyFdZvRKZLlGhnvvKPzXXti/Yy7hEo3+iD9EHtgdqxQnwAAAAAElFTkSuQmCC" />
                          </defs>
                        </svg>
                      </span>
                    </a>
                  <?php 
                }
                else
                {
                      ?>
                       <ul><li><a href="logout.php" style="padding: 25px;">Logout</a></li></ul>
                      <?php 
                }

                ?>

              <button class="header-menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--== End Header Wrapper ==-->