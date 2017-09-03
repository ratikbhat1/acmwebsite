<?php
session_start();
    if ($_GET['csrf'] = '' || $_GET['csrf'] != $_SESSION['csrf_token']) {
        header("Location: afterLogin.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);
    } else {
        session_destroy();
        header("Location: login-page.php");
    }
?>