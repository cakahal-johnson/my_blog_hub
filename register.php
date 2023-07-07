<?php include("path.php"); ?>
<?php include(IN_DIR . "../app/controllers/users.php"); ?>

<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/plugin/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugin/slick.css">
    <link rel="stylesheet" href="assets/css/arafat-font.css">
    <link rel="stylesheet" href="assets/css/plugin/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/msg.css">
</head>

<body>
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header class="header-section register">
        <div class="overlay">
            <div class="container">
                <div class="row d-flex header-area">
                    <nav class="navbar d-flex justify-content-between navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="index.php">
                            <img src="logo2.png" width="150" class="logo" alt="logo">
                        </a>
                        <div class="d-flex align-items-center justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    Already have account
                                </li>
                            </ul>
                            <div class="right-area header-action d-flex align-items-center">
                                <a href="<?php echo BASE_URL . '../login.php'; ?>" class="cmn-btn">Login Now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->

    <!-- Register In start -->
    <section class="sign-in-up register">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-content">
                            <div class="section-header">
                                <h5 class="sub-title">The Power of Financial Freedom</h5>
                                <h2 class="title">Let’s Get Started!</h2>
                                <p>Please Enter your Email Address to Start your Online Application</p>

                            </div>

                            <!-- message display -->
                            <?php include(IN_DIR . "/app/helpers/formErrors.php"); ?>

                     

                            <form action="register.php" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="username" value="<?php echo $username; ?>" id="name" placeholder="Jone">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="lname">Last Name</label>
                                            <input disabled type="text" name="lastname"  id="lname" placeholder="Fisher (Optional)">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" value="<?php echo $password; ?>" id="password">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="confirmPass">Confirm password</label>
                                            <input type="password" name="confirmPass" value="<?php echo $confirmPass; ?>" id="confirmPass">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="email">Enter Your Email ID</label>
                                            <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Your email ID here">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="referral">Someone invited you over?</label>
                                            <input disabled type="text" id="referral" placeholder="Enter the referral code">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input">
                                            <p>By clicking submit, you agree to <span>Cakahal's Terms of Use, Privacy Policy, E-sign</span> & <span>communication Authorization.</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-area">
                                    <button class="cmn-btn" name="register-btn">Register Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register In end -->

    <!--==================================================================-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/plugin/slick.js"></script>
    <script src="assets/js/plugin/waypoint.min.js"></script>
    <script src="assets/js/plugin/counter.js"></script>
    <script src="assets/js/plugin/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugin/wow.min.js"></script>
    <script src="assets/js/plugin/plugin.js"></script>
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from pixner.net/bankio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Sep 2022 05:46:44 GMT -->
</html>