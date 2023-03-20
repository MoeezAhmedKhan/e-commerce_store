<?php require_once("header.php") ?>

        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <nav aria-label="breadcrumb" class="breadcrumb-style1">
                <div class="container">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div>
            </nav>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Wishlist Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="shopping-wishlist-form table-responsive">
                        <form action="#" method="post">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product name</th>
                                        <th class="product-price">Unit price</th>
                                        <th class="product-stock-status">Stock status</th>
                                        <th class="product-add-to-cart">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tbody-item">
                                        <td class="product-remove">
                                            <a class="remove" href="javascript:void(0)">×</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <div class="thumb">
                                                <a href="single-product.php">
                                                    <img src="assets/images/shop/cart1.webp" width="68" height="84" alt="Image-HasTech">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a class="title" href="single-product.php">Condimentum posuere consectetur urna</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="price">$115.00</span>
                                        </td>
                                        <td class="product-stock-status">
                                            <span class="wishlist-in-stock">In Stock</span>
                                        </td>
                                        <td class="product-add-to-cart">
                                            <a class="btn-shop-cart" href="product-cart.php">Add to Cart</a>
                                        </td>
                                    </tr>
                                    <tr class="tbody-item">
                                        <td class="product-remove">
                                            <a class="remove" href="javascript:void(0)">×</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <div class="thumb">
                                                <a href="single-product.php">
                                                    <img src="assets/images/shop/cart2.webp" width="68" height="84" alt="Image-HasTech">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a class="title" href="single-product.php">Kaoreet lobortis sagittis laoreet</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="price">$95.00</span>
                                        </td>
                                        <td class="product-stock-status">
                                            <span class="wishlist-in-stock">In Stock</span>
                                        </td>
                                        <td class="product-add-to-cart">
                                            <a class="btn-shop-cart" href="product-cart.php">Add to Cart</a>
                                        </td>
                                    </tr>
                                    <tr class="tbody-item">
                                        <td class="product-remove">
                                            <a class="remove" href="javascript:void(0)">×</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <div class="thumb">
                                                <a href="single-product.php">
                                                    <img src="assets/images/shop/cart3.webp" width="68" height="84" alt="Image-HasTech">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a class="title" href="single-product.php">Nostrum exercitationem itae ipsum</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="price">$79.00</span>
                                        </td>
                                        <td class="product-stock-status">
                                            <span class="wishlist-in-stock">In Stock</span>
                                        </td>
                                        <td class="product-add-to-cart">
                                            <a class="btn-shop-cart" href="product-cart.php">Add to Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </section>
            <!--== End Wishlist Area Wrapper ==-->

        </main>

        <?php require_once("footer.php") ?>