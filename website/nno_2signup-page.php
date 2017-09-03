<?php
session_start();
$isFb = false ;
if(isset($_SESSION['facebook_access_token'])){
    $isFb = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Signup | ACM MAIT
    </title>
    <script src="js/jquery.min.js"></script>
    <meta name="Signup ACM MAIT" description="Signup, ACM-Chapter MAIT">
    <meta name="robots" content="index">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/acm.min.css" rel="stylesheet" type="text/css">
    <script src="js/acm.min.js"></script>
    <link href="normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="css/loginpage/login-app.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../assets/logo.jpg">
    <script type="text/javascript" src="js/signup/signup-app.js"></script>
</head>
<body>
<div class="body-container" id="acm-body-container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="acm-navbar">
        <div class="container container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home-page.html">
                    <img alt="Brand" src="../assets/logo-01.png" id="logo">
                    <p id="logo-text">ASSOCIATION FOR COMPUTING MACHINERY</p>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item text-center"><a href="aboutus-page.html">ABOUT US</a></li>
                    <li class="nav-item text-center"><a href="team-page.html">TEAM</a></li>
                    <li class="nav-item text-center"><a href="login-page.php">LOG IN</a></li>
                    <li class="nav-item text-center"><a href="contactus-page.php">CONTACT US</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <div class="container container-fluid main-content">
        <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="component col-md-8 col-xs-10" id="login-form">
                <form action="signup.php" method="POST" role="form" name="signup">
                    <!--added name signup -->
                    <legend class="form-head">SIGN UP</legend>
                    <!-- I HAVE ADDED FIRST NAME AND LAST NAME COLUMNN bend -->
                    <div class="form-group">
                        <label for="name" class="form-label">First Name*</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="text" class="form-control" id="name" name="fname" value = "<?php if($isFb){ echo $_SESSION['first_name_fb']; }?>" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Last Name*</label>
                            <div class="row">
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" class="form-control" id="name" name="lname" value = "<?php if($isFb){ echo $_SESSION['last_name_fb']; }?>" required>
                                </div>
                            </div>
                            <label for="username" class="form-label">Email*</label>
                            <div class="row">
                                <div class="col-xs-9 col-sm-10">
                                    <input type="email" class="form-control" id="username" name="email" value = "<?php if($isFb){ echo $_SESSION['email_fb']; }?>" required>
                                </div>
                                <div class="col-xs-1 col-sm-1">
                                    <i class="fa fa-user form-icon"></i>
                                </div>
                            </div>
                            <label for="password" class="form-label">Password*</label>
                            <div class="row">
                                <div class="col-xs-9 col-sm-10">
                                    <input type="password" class="form-control" id="password" name="pass" required>
                                </div>
                                <div class="col-xs-1 col-sm-1">
                                    <i class="fa fa-lock form-icon"></i>
                                </div>
                            </div>
                            <label for="confirm_password" class="form-label">Confirm Password*</label>
                            <div class="row">
                                <div class="col-xs-9 col-sm-10">
                                    <input type="password" class="form-control" id="confirm_password" name="cpass" required>
                                </div>
                            </div>
                            <label for="college_university" class="form-label">College/University</label>
                            <div class="row">
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" class="form-control" id="college_university" name="college_uni">
                                </div>
                            </div>
                            <label for="enrollment" class="form-label">Enrollment No</label>
                            <div class="row">
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" class="form-control" id="enrollment" name="en_number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-9">
                                <button type="submit" id="sign-in-btn" class="btn btn-primary btn-lg">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr id="page-end">
    <div id="footer-div" class="row">
        <p class="footer">
            &copy; 2016 MAIT-ACM Student Chapter&nbsp;&nbsp;<a href="https://www.facebook.com/acm.mait"<i class="fa fa-facebook-official"></i></a>
        </p>
    </div>
    <script>
        validation.init();
    </script>
</body>
</html>