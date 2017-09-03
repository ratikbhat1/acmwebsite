<?php
if(strcmp($_GET['fpt'],'')==0 || !isset($_GET['fpt'])){
header("Location: index.php");
}
?>
<!--
<form action="<?php echo "reset_password_script.php?fpt=".$_GET['fpt']?>" method="POST" >
	NEW PASS:<input type="password" name = "new_pass"><br>
	confirm pass :<input type = "password" name = "cnew_pass"><br>
	<button type = "submit">SUBMIT</button>-->
	<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
        Forgot Password | ACM MAIT
        </title>
        <script src="../js/jquery.min.js"></script>
        <meta name="Forgot Password ACM MAIT" description="Forgot Password, ACM-Chapter MAIT">
        <meta name="robots" content="index">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/acm.min.css" rel="stylesheet" type="text/css">
        <script src="../js/acm.min.js"></script>
        <link href="../normalize.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
        <link href="../css/forgot_password/forgot_password-app.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="logo-01.png">
    </head>
    <body>
        <div class="body-container" id="acm-body-container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="acm-navbar">
                <div class="container container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="home-page.html">
                            <img alt="Brand" src="logo-01.png" id="logo">
                            <p id="logo-text">ASSOCIATION FOR COMPUTING MACHINERY</p>
                        </a>
                    </div>
                    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
            <div class="container container-fluid main-content">
                <div class="row">
                    <div class="col-md-2 col-xs-1"></div>
                    <div class="component col-md-8 col-xs-10" id="login-form">
                        <form action="<?php echo "reset_password_script.php?fpt=".$_GET['fpt']?>" method="POST" role="form">
                            <!--Added Action -->
                            <legend class="form-head">Reset Password</legend>
                            
                            <div class="form-group">
                                <label for="username" class="form-label">New Password</label>
                                <div class="row">
                                    <div class="col-xs-9 col-sm-10">
                                        <input type="password" class="form-control" id="username" name="new_pass" >
                                        <!-- added name tag login -->
                                    </div>
                                    <div class="col-xs-1 col-sm-1">
                                        <i class="fa fa-user form-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Confirm Password</label>
                                <div class="row">
                                    <div class="col-xs-9 col-sm-10">
                                        <input type="password" class="form-control" id="username" name="cnew_pass" >
                                        <!-- added name tag login -->
                                    </div>
                                    <div class="col-xs-1 col-sm-1">
                                        <i class="fa fa-user form-icon"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="submit" id="sign-in-btn" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
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