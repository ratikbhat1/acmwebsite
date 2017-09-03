<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Registration | TPP 2016 | ACM MAIT
    </title>
    <script src="js/jquery.min.js"></script>
    <meta name="Registration TPP 2016  ACM MAIT" description="Registration, Technical Paper Presentation 2016 ACM-Chapter MAIT">
    <meta name="robots" content="index">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/acm.min.css" rel="stylesheet" type="text/css">
    <script src="js/acm.min.js"></script>
    <link href="normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="css/tpp/tpp-app.css" rel="stylesheet" type="text/css">
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
                <form action="<?php echo 'tpp_register.php?name='.$_GET["name"].'&csrf='.$_GET['csrf'] ?>" method="POST" role="form" enctype="multipart/form-data">
                    <!--Added Action -->
                    <legend class="form-head">Registration TPP 2016</legend>

                    <div class="form-group">
                        <label for="name" class="form-label">Name*</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['name'];  ?>" required>
                            </div>
                        </div>
                        <label for="college" class="form-label">College*</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="text" class="form-control" id="college" name="college" value="<?php echo $_SESSION['college'];  ?>" required>
                            </div>
                        </div>
                        <label for="email" class="form-label">Email*</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email_user'];  ?>" required>
                            </div>
                        </div>
                        <label for="phone" class="form-label">Phone*</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <label for="enrollment-number" class="form-label">Enrollment Number</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="number" class="form-control" id="enrollment-number" name="en_number" value="<?php echo $_SESSION['en_number'];  ?>" >
                            </div>
                        </div>
                        <label for="abstract-pdf" class="form-label"> Abstract (PDF)*</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input required type="file" class="form-control" id="abstract-pdf" name="abs_pdf" >
                            </div>
                        </div>
                        <label for="resume-pdf" class="form-label">Resume (PDF)</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <input type="file" class="form-control" id="resume-pdf" name="res_pdf" >
                            </div>
                        </div>
                        <label for="notes" class="form-label">Additional Notes</label>
                        <div class="row">
                            <div class="col-xs-9 col-sm-10">
                                <textarea class="form-control" id="notes" name="notes" ></textarea>
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