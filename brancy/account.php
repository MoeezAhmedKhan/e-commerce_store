<?php require_once("header.php"); ?>

        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <section class="page-header-area pt-10 pb-9" style="margin-top:100px" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Account</li>
                                </ol>
                                <h2 class="page-header-title">Account</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <?php

                if(isset($_SESSION['error']) && $_SESSION['error'] == "Email is already register") 
                {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
                    <?php

                    unset($_SESSION['error']);
                } 
                elseif(isset($_SESSION['creatingerror']) && $_SESSION['creatingerror'] = "Something went wrong while creating your account") 
                {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['creatingerror'] ?></div>
                    <?php
                
                    unset($_SESSION['creatingerror']);
                } 
                elseif(isset($_SESSION['regacount']) && $_SESSION['regacount'] = "Account register successfully") 
                {
                    ?>
                        <div class="alert alert-success" role="alert"><?php echo $_SESSION['regacount'] ?></div>
                    <?php
                    unset($_SESSION['regacount']);
                } 
                // login
                elseif(isset($_SESSION['notfound']) && $_SESSION['notfound'] = "User Not Found") 
                {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['notfound'] ?></div>
                    <?php
                    unset($_SESSION['notfound']);
                } 
                elseif(isset($_SESSION['passerror']) && $_SESSION['passerror'] = "Password Does'nt Match") 
                {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['passerror'] ?></div>
                    <?php
                
                    unset($_SESSION['passerror']);
                } 
                elseif(isset($_SESSION['accesserror']) && $_SESSION['accesserror'] = "You Can't Access") 
                {
                    ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_SESSION['accesserror'] ?></div>
                    <?php
                
                    unset($_SESSION['accesserror']);
                } 


                ?>

            <!--== Start Account Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="row mb-n8">
                        <div class="col-lg-6 mb-8">
                            <!--== Start Login Area Wrapper ==-->
                            <div class="my-account-item-wrap">
                                <h3 class="title">Login</h3>
                                <div class="my-account-form">
                                    <form action="phpfiles/insertion.php" method="post">
                                        <div class="form-group mb-6">
                                            <label for="login_username">Email Address <sup>*</sup></label>
                                            <input type="email" name="emailAddress">
                                        </div>

                                        <div class="form-group mb-6">
                                            <label for="login_pwsd">Password <sup>*</sup></label>
                                            <input type="password" name="userPassword">
                                        </div>

                                        <div class="form-group d-flex align-items-center mb-14">
                                        <button type="submit" class="btn" name="login-btn">Login</button>

                                            <div class="form-check ms-3">
                                                <input type="checkbox" class="form-check-input" id="remember_pwsd">
                                                <label class="form-check-label" for="remember_pwsd">Remember Me</label>
                                            </div>
                                        </div>
                                        <a class="lost-password" href="my-account.php">Lost your Password?</a>
                                    </form>
                                </div>
                            </div>
                            <!--== End Login Area Wrapper ==-->
                        </div>
                        <div class="col-lg-6 mb-8">
                            <!--== Start Register Area Wrapper ==-->
                            <div class="my-account-item-wrap">
                                <h3 class="title">Register</h3>
                                <div class="my-account-form">
                                    <form action="phpfiles/insertion.php" method="post">
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="inputEmail4" class="form-label">First name <sup>*</sup></label>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputEmail4" class="form-label">Last name <sup>*</sup></label>
                                            <input type="text" name="lname" placeholder="Last name" required>
                                        </div>
                                    </div>

                                        <div class="form-group mb-6">
                                            <label for="register_username">Username or Email Address <sup>*</sup></label>
                                            <input type="email" name="email">
                                        </div>

                                        <div class="form-group mb-6">
                                            <label for="register_pwsd">Password <sup>*</sup></label>
                                            <input type="password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <p class="desc mb-4">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                                            <button type="submit" class="btn" name="reg-btn">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--== End Register Area Wrapper ==-->
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Account Area Wrapper ==-->

        </main>

        <?php require_once("footer.php") ?>