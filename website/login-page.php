<?php
//require_once('fbLogin.php');
session_start();
if(isset($_SESSION['user'])){
    header("Location: afterLogin.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);}else{
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Login | ACM MAIT
    </title>
    <script src="js/jquery.min.js"></script>
    <meta name="Login ACM MAIT" description="Login, ACM-Chapter MAIT">
    <meta name="robots" content="index">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/acm.min.css" rel="stylesheet" type="text/css">
    <script src="js/acm.min.js"></script>
    <link href="normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="css/loginpage/login-app.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../assets/logo.jpg">
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
                    <li class="active nav-item text-center"><a href="login-page.php">LOG IN</a></li>
                    <li class="nav-item text-center"><a href="contactus-page.php">CONTACT US</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <div class="container container-fluid main-content">
        <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="component col-md-8 col-xs-10" id="login-form">
                <form action="login.php" method="POST" role="form">
                    <!--Added Action -->
                    <legend class="form-head">LOGIN</legend>

                    <div class="form-group">
                        <label for="username" class="form-label">Username/Email</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="text" class="form-control" id="username" name="login_username" >
                                <!-- added name tag login -->
                            </div>
                            <div class="col-xs-1 col-sm-1">
                                <i class="fa fa-user form-icon"></i>
                            </div>
                        </div>
                        <label for="password" class="form-label">Password</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="password" class="form-control" id="password" name="login_password" >
                                <!-- added name tag password -->
                            </div>
                            <div class="col-xs-1 col-sm-1">
                                <i class="fa fa-lock form-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 forgot-password-div">
                            <a href="https://mait.acm.org/acmwebsite/website/forgot_password" id="forgot-password" class="bold">Forgot Password?</a>
                        </div>
                        <div class="col-sm-3 col-sm-offset-4">
                            <button type="submit" id="sign-in-btn" class="btn btn-primary btn-lg">Sign In</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="col-md-8 col-xs-10" id="facebook-btn">
                <a href="fbLogin.php" class="dec-rem"><p class="btn-style"><i class="fa fa-facebook sign-icon"></i><span class="btn-text">&nbsp;Login/Sign Up with<span class="hidden-xs"> Facebook</span></span></p></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="col-md-8 col-xs-10" id="google-btn">
                <a href="signup-page.php" class="dec-rem"><p class="btn-style"><i class="fa fa-sign-in sign-icon"></i><span class="btn-text">Sign Up</span></p></a>
            </div>
        </div>
    </div>
    <hr id="page-end">
    <div id="footer-div">
        <p class="footer">
            &copy; 2016 MAIT-ACM Student Chapter&nbsp;&nbsp;<a href="https://www.facebook.com/acm.mait"<i class="fa fa-facebook-official"></i></a>
        </p>
    </div>
</div>
</div>
<script>
</script>
</body>
</html>