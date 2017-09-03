<?php
//error_reporting(0);
//@ini_set('display_errors', 0);
require_once('php_mail.php');
$dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon, 'maithost_acmmait');
if (mysqli_connect_errno()) {
        echo "connection not establiashed" . mysqli_connect_error();
    }
if(isset($_GET['email']) && isset($_GET['evt'])){
$get_user_data_sql = "SELECT val_hash FROM users WHERE email = '" . $_GET['email'] . "'";
$all_user_data = mysqli_fetch_row(mysqli_query($dbcon, $get_user_data_sql));
$db_val_hash = $all_user_data[0];
$v_email = $_GET['email'] ; 
$evt = $_GET['evt'] ;
$set_val_sql = "UPDATE `users` SET `val`=1 WHERE email = '".$v_email."'";
	if(strcmp($db_val_hash, $evt)==0){
	mysqli_query($dbcon, $set_val_sql);
    	$_SESSION["csrf_token"] = md5(uniqid(mt_rand(), true));
        $_SESSION['user'] = true;
        $uid_name_arr = explode('@', $v_email);
        $uid_name = $uid_name_arr[0];
        $get_id_sql = "SELECT id FROM users WHERE email = '" . $v_email . "' ";
        $id_row = mysqli_fetch_row(mysqli_query($dbcon, $get_id_sql));
        $id = $id_row[0];
        $get_user_data_sql = "SELECT first_name , last_name , college , enrollment_number , dp FROM users WHERE id = '" . $id . "'";
        $all_user_data = mysqli_fetch_row(mysqli_query($dbcon, $get_user_data_sql));
        $name = $all_user_data[0] . " " . $all_user_data[1];
        $college = $all_user_data[2];
        $en_number = $all_user_data[3];
        $user_dp_url = $all_user_data[4];
        $_SESSION['user_dp_url'] = $user_dp_url;
        $_SESSION["name"] = $name;
        $_SESSION["college"] = $college;
        $_SESSION["en_number"] = $en_number;
        $_SESSION['uid_name'] = $uid_name;
        header("Location: afterLogin.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);
 	}
}else{
header("Location: login-page.php");
}


?>