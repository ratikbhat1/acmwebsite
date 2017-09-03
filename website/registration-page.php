<?php
session_start();
$dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon,'maithost_acmmait');

if (mysqli_connect_errno())
{
    echo "connection not establiashed".mysqli_connect_error() ;
}

$csrf_token = $_GET["csrf"];
$name = $_GET["name"];
if($csrf_token=''||$name=''||$csrf_token!=$_SESSION['csrf_token']){
    if($_SESSION["user"]){
        header("Location: afterlogin.php?name=".$_SESSION["uid_name"]."&csrf=".$_SESSION['csrf_token']);
    }
    else{
        header("Location: login-page.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery.min.js"></script>
    <meta name="Registration ACM MAIT" description="Registration, ACM-Chapter MAIT">
    <meta name="robots" content="index">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/acm.min.css" rel="stylesheet" type="text/css">
    <script src="js/acm.min.js"></script>
    <link href="normalize.css" rel="stylesheet" type="text/css">
    <link href="css/registration/registration-app.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../assets/logo-01.png">
    <title>
        Registration | <?php echo $_SESSION["name"];?>
    </title>
</head>
<body class="body-container">
<nav id="nav-menu">
    <a href="home-page.html"><img alt="Brand" src="../assets/logo-01.png" id="logo" class="img-responsive" alt="ACM-MAIT"></a>
    <p id="acm-mait-title">Association For Computing Machinery</p>
</nav>
<div class="container-fluid profile-container" id="profile-container-id">
    <div class="row inner-div">
        <div class="col-md-3 col-xs-12 .col-sm-6" id="left-profile-div">
            <div class="container-fluid left-profile-div-class">
                <div class="col-md-12 col-xs-12 .col-sm-12 make-column">
                    <img src="<?php if($_SESSION['pic_url']) {echo $_SESSION['pic_url'];}else{ if($_SESSION['user_dp_url']){echo $_SESSION['user_dp_url'];}else{echo "../assets/logo-01.png";} } ?>" id="user-pic" class="img-responsive img-circle">
                    <p id="user-name" class="heading">
                        <?php echo $_SESSION["name"]; ?>
                    </p>
                </div>
                <div class="col-md-12 col-xs-12 .col-sm-12 make-column">
                    <div class="heading" id="enrollment-no">
                        Enrollment No.
                    </div>
                    <div class="heading-value" id="enrollment-no-value">
                        <?php echo $_SESSION["en_number"];  ?>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 .col-sm-12 make-column" id="last-info">
                    <div class="heading" id="university">
                        University/College
                    </div>
                    <div class="heading-value" id="university-value">
                        <?php echo $_SESSION["college"];  ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-offset-3 col-md-9 col-xs-12 col-sm-6" id="right-profile-div">
            <div class="container right-container">
                <div class="row">
                    <div class="col-md-8 col-sm-10 col-xs-10 col-centered" id="form-container">
                        <form action="<?php echo 'https://mait.acm.org/acmwebsite/website/register_lifi.php?name='.$_SESSION["uid_name"].'&csrf='.$_SESSION['csrf_token'] ?>" method="POST" enctype="multipart/form-data">
                            <legend class="form-head">REGISTER</legend>
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" required autocomplete="off" class="form-control" name="name" id="username" value="<?php echo $_SESSION['name'];  ?>">
                            </div>
                            <div class="form-group">
                                <label for="enrollment" class="form-label">Enrollment No</label>
                                <input type="number" required class="form-control" id="enrollment" name="en_number" value="<?php echo $_SESSION['en_number'];  ?>">
                            </div>
                            <div class="form-group">
                                <label for="year" class="form-label">Year</label>
                                <input type="number" required class="form-control" id="year" name="year" min="1" max="4">
                            </div>
                            <div class="form-group">
                                <label for="branch" class="form-label">Branch</label>
                                <input type="text" required class="form-control" id="branch" name="branch">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="tel" required class="form-control" id="phone_number" name="phone_number" pattern="((\+*)((0[ -]+)*|(91 )*)(\d{12}+|\d{10}+))|\d{5}([- ]*)\d{6}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required name="email" value="<?php echo $_SESSION['email_user'];  ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="file_image" required name="member_image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg" id="register_button">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script>
</script>
</body>
</html>