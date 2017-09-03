<?php
require_once 'php_mail.php';
if ($_GET['csrf'] = '' || $_GET['csrf'] != $_SESSION['csrf_token']) {
        header("Location: afterLogin.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);
    }else{
    	$body = $_POST['suggestion'];
    	$email = $_SESSION["email_user"];
    	send_auto_reply($email,$body);
    	send_suggestion_mail($email,$body);
        echo "<script>alert('Suggestion sent! Our team will get back to you shortly')</script>";
	    header('refresh:0.01;url=login-page.php');

	}




?>