
<?php 

error_reporting(E_ERROR | E_PARSE);
session_start();

// if(isset($_SESSION['user_id']))
// {
//     echo $_SESSION['user_id'];
// }
// else
// {
//     echo "nh he";
// }
// die();


if(!isset($_SESSION['userName']))
{
    header("location:index.php");
}

?>
<?php require_once("header.php") ?>

<main class="main-content" style="margin-top:100px">

<!--== Start Page Header Area Wrapper ==-->
<section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="page-header-st3-content text-center text-md-start">
                    <ol class="breadcrumb justify-content-center justify-content-md-start">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">My Account</li>
                    </ol>
                    <h2 class="page-header-title">My Account</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Page Header Area Wrapper ==-->

            <?php 
                if(isset($_SESSION["accUpt"]) && $_SESSION['accUpt'] = "Account updated successfully")
                {
                    ?>
                        <div class="alert alert-success" id="successMesg" role="alert"><?php echo $_SESSION["accUpt"]; ?></div>
                    <?php
                    unset($_SESSION["accUpt"]);
                }
                elseif(isset($_SESSION["accErr"]) && $_SESSION['accErr'] = "Something went wrong while updating account")
                {
                    ?>
                        <div class="alert alert-success" id="successMesg" role="alert"><?php echo $_SESSION["accErr"]; ?></div>
                    <?php
                    unset($_SESSION["accErr"]);
                }
             ?>

<!--== Start My Account Area Wrapper ==-->
<section class="my-account-area section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="my-account-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="dashboad-tab" data-bs-toggle="tab" data-bs-target="#dashboad" type="button" role="tab" aria-controls="dashboad" aria-selected="true">Dashboard</button>
                    <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false"> Orders</button>
                    <button class="nav-link" id="payment-method-tab" data-bs-toggle="tab" data-bs-target="#payment-method" type="button" role="tab" aria-controls="payment-method" aria-selected="false">Payment Method</button>
                    <button class="nav-link" id="address-edit-tab" data-bs-toggle="tab" data-bs-target="#address-edit" type="button" role="tab" aria-controls="address-edit" aria-selected="false">address</button>
                    <button class="nav-link" id="account-info-tab" data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="false">Account Details</button>
                    <button class="nav-link" onclick="window.location.href='logout.php'" type="button">Logout</button>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                        <div class="myaccount-content">
                            <h3>Dashboard</h3>
                            <div class="welcome">
                                <p>Hello, <strong><?php echo $_SESSION['userName'] ?></strong></p>
                            </div>
                            <p>From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="myaccount-content">
                            <h3>Orders</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Aug 22, 2018</td>
                                            <td>Pending</td>
                                            <td>$3000</td>
                                            <td><a href="shop-cart.html" class="check-btn sqr-btn ">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>July 22, 2018</td>
                                            <td>Approved</td>
                                            <td>$200</td>
                                            <td><a href="shop-cart.html" class="check-btn sqr-btn ">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>June 12, 2017</td>
                                            <td>On Hold</td>
                                            <td>$990</td>
                                            <td><a href="shop-cart.html" class="check-btn sqr-btn ">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="payment-method" role="tabpanel" aria-labelledby="payment-method-tab">
                        <div class="myaccount-content">
                            <h3>Payment Method</h3>
                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                        </div>
                    </div>


                    <?php 

                        require_once("phpfiles/connection.php");
                        $getUser2 = "SELECT `id`, `role_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `zipcode`, `city`, `password`, `created_at` FROM `user` WHERE id = {$_SESSION['user_id']}";
                        $runUser2 = mysqli_query($conn,$getUser2);
                        $arrUser2 = mysqli_fetch_array($runUser2); 

                    ?>

                    <div class="tab-pane fade" id="address-edit" role="tabpanel" aria-labelledby="address-edit-tab">
                        <div class="myaccount-content">
                            <h3>Billing Address</h3>
                            <address>
                                <p><strong><?php echo $arrUser2['city'] ?></strong></p>
                                <p><?php echo $arrUser2['address'] ?></p>
                                <p>Mobile: <?php echo $arrUser2['phone'] ?></p>
                            </address>
                        </div>
                    </div>

                    <?php 

                        require_once("phpfiles/connection.php");
                        $getUser = "SELECT `id`, `role_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `zipcode`, `city`, `password`, `created_at` FROM `user` WHERE id = {$_SESSION['user_id']}";
                        $runUser = mysqli_query($conn,$getUser);
                        $arrUser = mysqli_fetch_array($runUser); 


                    ?>

                    <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                        <div class="myaccount-content">
                            <h3>Account Details</h3>
                            <div class="account-details-form">
                                <form action="phpfiles/action.php" method="post">

                                    <input type="hidden" name="uid" value="<?php echo $arrUser['id'] ?>">
    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="first-name" class="required">First Name</label>
                                                <input type="text" name="fname" value="<?php echo $arrUser['first_name'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="last-name" class="required">Last Name</label>
                                                <input type="text" name="lname" value="<?php echo $arrUser['last_name'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="first-name" class="required">Phone</label>
                                                <input type="text" name="phone" value="<?php echo $arrUser['phone'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="last-name" class="required">Email</label>
                                                <input type="email" name="email" value="<?php echo $arrUser['email'] ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="single-input-item">
                                                <label for="first-name" class="required">Address</label>
                                                <input type="text" name="address" value="<?php echo $arrUser['address'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="single-input-item">
                                                <div class="single-input-item">
                                                    <label for="first-name" class="required">City</label>
                                                    <input type="text" name="city" value="<?php echo $arrUser['city'] ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="single-input-item">
                                                <label for="first-name" class="required">Zipcode</label>
                                                <input type="number" name="zip" value="<?php echo $arrUser['zipcode'] ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="single-input-item">
                                                <label for="first-name" class="required">Password</label>
                                                <input type="text" name="pass" value="<?php echo $arrUser['password'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    
                            
                                    <div class="single-input-item">
                                        <button class="check-btn sqr-btn" name="update-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End My Account Area Wrapper ==-->

</main>


<?php require_once("footer.php") ?>