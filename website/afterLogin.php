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
$isFb = false ;
if(isset($_SESSION['facebook_access_token'])){
    $isFb = true;
}
$isLifi = false;
if(mysqli_num_rows(mysqli_query($dbcon,"SELECT * FROM lifi_registrations WHERE email = '".$_SESSION['email_user']."'"))==1){
    $isLifi = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery.min.js"></script>
    <meta name="Welcome ACM MAIT" description="Welcome, ACM-Chapter MAIT">
    <meta name="robots" content="index">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/acm.min.css" rel="stylesheet" type="text/css">
    <script src="js/acm.min.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
    <link href="css/after_login/after_login-app.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../assets/logo.jpg">
    <script src="js/afterLogin/afterLogin-app.js"></script>
    <title>
        Welcome |  <?php echo $_SESSION["name"];?>
    </title>
</head>
<body class="body-container">
<nav id="nav-menu">
    <a href="home-page.html"><img alt="Brand" src="../assets/logo-01.png" id="logo" class="img-responsive" alt="ACM-MAIT"></a>
    <p id="acm-mait-title">Association For Computing Machinery</p>
    <a href="<?php echo 'https://mait.acm.org/acmwebsite/website/signout.php?name='.$_SESSION['uid_name'].'&csrf='.$_SESSION['csrf_token'] ?>"><button  id="signout_button">
            Sign out
        </button></a>
</nav>
<div class="container-fluid profile-container" id="profile-container-id">
    <div class="row inner-div">
        <div class="col-md-3 col-xs-12" id="left-profile-div">
            <div class="container-fluid left-profile-div-class">
                <div class="col-md-12 col-xs-12 .col-sm-12 make-column">
                    <img src="<?php if($_SESSION['pic_url']) {echo $_SESSION['pic_url'];}else{ if($_SESSION['user_dp_url']){echo $_SESSION['user_dp_url'];}else{echo "../assets/logo-01.png";} } ?>" id="user-pic" class="img-responsive img-circle">
                    <p id="user-name" class="heading">
                        <?php echo $_SESSION["name"];  ?>
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
        <div class="col-md-offset-3 col-md-9 col-xs-12" id="right-profile-div">
            <div class="right-items" id="whatsnew">
                <div class="item-header" id="fix-header">
                    <div class="item-header-info" id="item-header-info-fix">
                        WHAT'S NEW?
                    </div>
                </div>
                <div class="news-banner">
                    <div class="news-items" id="fix-item">
                        <div class="acm-event">
                            <p class="register_or_not" id="register">
                                Applications open for Technical Paper Presentation 2016 in Association with TNM'16
                            </p>
                            <a href="<?php echo 'tpp-page.php?name='.$_SESSION["uid_name"].'&csrf='.$_SESSION['csrf_token'] ?>">
                                <button type="submit" class="btn btn-default button" id="register_for_tpp" data-status="register">
                                    Submit your Abstract
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="news-items top-margin">
                        <div class="acm-event">
                            <a onclick="<?php if(!isLifi) : echo "return false"; ?><?php endif ;?> " href="<?php echo 'https://mait.acm.org/acmwebsite/website/registration-page.php?name='.$_SESSION['uid_name'].'&csrf='.$_SESSION['csrf_token'] ?>">
                                <button type="submit" class="btn btn-default button" id="register_for_id_card" data-status="register">
                                    Registration for Membership &#10; ID Card
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="news-items top-margin">
                        <div class="acm-event">
                            <a href="#">
                                <button type="submit" class="btn btn-default button" id="submit_online_treasure_hunt" data-status="register">
                                    Submit Questions for Online Treasure Hunt
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="right-items" id="left">
                <div class="item-header">
                    <div class="item-header-info">
                        EVENT LOG
                    </div>
                </div>
                <div class="table-banner">
                    <div class="table-banner1">Event Name</div>
                    <div class="table-banner1">Status</div>
                </div>
                <div class="table-banner">
                    <div class="table-banner1"><a href="https://www.facebook.com/events/676352585841179/" class="event-name">Lifi</a></div>
                    <div class="table-banner1">Tuesday ,16th Feb, 2:30-5:00 PM</div>
                </div>
            </div>
            <div class="right-items" id="right">
                <div class="item-header">
                    <div class="item-header-info">
                        SUGGESTIONs/QUERY
                    </div>
                </div>
                <div class="news-banner">
                    <div class="news-items">
                        <form id="suggestion_form" name="suggestion_form" method="POST" action="<?php echo 'suggestion_mail.php?name='.$_SESSION['uid_name'].'&csrf='.$_SESSION['csrf_token']; ?>">
                            <div class="form-group">
                                <label for="suggestion">Suggestions</label>
                                <textarea class="form-control" id="suggestion" placeholder="Your suggestions" action="?" required name="suggestion" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-default" id="submit_suggestion">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        afterLogin.init();
    });
</script>
</body>
</html>