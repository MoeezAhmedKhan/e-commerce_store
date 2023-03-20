<?php 

    session_start();
    if(isset($_SESSION['role']))
    {
        header("location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
<title>Log In | Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- App css -->
<link href="assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
<link href="assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

<link href="assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
<link href="assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />

<!-- icons -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages my-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">   
                            <a href="index.html">
                                <img src="assets/images/logo-dark.png" class="mb-4" alt="" height="22" class="mx-auto">
                            </a>
                            <!-- <p class="text-muted mt-2 mb-4">Admin Dashboard</p> -->

                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Sign In</h4>
                                </div>

                                <form action="phpfiles/insertion.php" method="post">
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" name="email" required placeholder="Enter your email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" required name="password" placeholder="Enter your password">
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary" type="submit" name="admin_login_btn"> Log In </button>
                                    </div>
                                </form>

                                <div class="container-fluide">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            if (isset($_SESSION['error']) && $_SESSION['error'] == "User Not Found") 
                                            {

                                                ?>
                                                <div class="alert alert-danger" role="alert" id="error-mesg"><?php echo $_SESSION['error'] ?></div>
                                                <?php

                                                unset($_SESSION['error']);

                                            }
                                            elseif (isset($_SESSION['error']) && $_SESSION['error'] == "Password Does'nt Match") 
                                            {

                                                ?>
                                                <div class="alert alert-danger" role="alert" id="error-mesg"><?php echo $_SESSION['error'] ?></div>
                                                <?php

                                                unset($_SESSION['error']);

                                            }
                                            elseif (isset($_SESSION['error']) && $_SESSION['error'] == "You Can't Access") 
                                            {

                                                ?>
                                                <div class="alert alert-danger" role="alert" id="error-mesg"><?php echo $_SESSION['error'] ?></div>
                                                <?php

                                                unset($_SESSION['error']);

                                            }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <!-- <div class="alert alert-danger" role="alert" id="success-mesg"  style="display: none;"></div> -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
    </body>
</html>