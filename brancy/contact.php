<?php require_once("header.php") ?>

        <main class="main-content" style="margin-top:100px">

            <!--== Start Contact Area Wrapper ==-->
            <section class="contact-area">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-6 col-lg-6">
                            <div class="section-title position-relative">
                                <h2 class="title">Get in touch</h2>
                                <p class="m-0">Staying in touch is the first step towards achieving your goals</p>
                                <div class="line-left-style mt-4 mb-1"></div>
                            </div>
                            <!--== Start Contact Form ==-->
                            <div class="contact-form">
                                <form action="phpfiles/insertion.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="con_name" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="con_email" placeholder="Email address">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="con_message" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-0">
                                                <button class="btn btn-sm" type="submit" name="contact_submit">SUBMIT</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--== End Contact Form ==-->


                        </div>
                    </div>
                </div>
                <div class="contact-left-img" data-bg-img="assets/images/photos/contact.webp"></div>
            </section>
            <!--== End Contact Area Wrapper ==-->

            <!--== Start Contact Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <img class="icon" src="assets/images/icons/1.webp" width="30" height="30" alt="Icon">
                            <a href="tel://+11020303023">+92 317 0214584</a>
                            <a href="tel://+11020303023">+92 315 4741028</a>
                        </div>
                        <div class="contact-info-item">
                            <img class="icon" src="assets/images/icons/2.webp" width="30" height="30" alt="Icon">
                            <a href="mailto://example@demo.com">barncy@gmail.com</a>
                            <a href="mailto://demo@example.com">shop@gmail.com</a>
                        </div>
                        <div class="contact-info-item mb-0">
                            <img class="icon" src="assets/images/icons/3.webp" width="30" height="30" alt="Icon">
                            <p>Tariq Rd, PECHS, Karachi, Karachi City, Sindh 74200</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Contact Area Wrapper ==-->

            <div class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>
            </div>

        </main>

        <?php require_once("footer.php") ?>