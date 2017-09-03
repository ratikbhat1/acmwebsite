<?php
error_reporting(0);
@ini_set('display_errors', 0);
session_start();
require_once('php_mail.php');
require_once('smtp_validateEmail.class.php');
$dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon,'maithost_acmmait');

if (mysqli_connect_errno())
{
   echo "connection not establiashed".mysqli_connect_error() ;
}

global $cpass;
global $fname;
global $lname;
global $email;
global $pass;
global $pass_hash;
global $cpass ;
global $pass;
global $en_number ;
global $options;
global $college_uni;
$isFB = 1;
if(isset($_SESSION['profile_pic_url_fb'] )){
  $isFB = 0;
}
  if(strcmp($_POST['pass'],$_POST['cpass']) == 0)
  { 
    $fname = mysqli_real_escape_string($dbcon, $_POST['fname']);
    $lname = mysqli_real_escape_string($dbcon, $_POST['lname']);
    $email = mysqli_real_escape_string($dbcon, $_POST['email']);
    $pass = $_POST['pass'];
    $pass_hash = hash_pass($pass);
    $college_uni =mysqli_real_escape_string($dbcon, $_POST['college_uni']) ;
    //$en_number = mysqli_real_escape_string($dbcon, $_POST['en_number']);
    $val_hash = md5(uniqid(mt_rand(), true));
    $en_number = mysqli_real_escape_string($dbcon,$_POST['en_number']);
      //if(isFB==1){
        $val = 0 ;
      //}
      //else{
        //$val = 1;
      //}
    
    if(!check_for_user($dbcon,$email)) {
       if( check_email_format($email) ){#&& strcmp(check_email_exist($email),'valid') == 0
           if($isFB==1){
           $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password_hash`, `college`, `enrollment_number`,`val_hash`,`val`) VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $pass_hash . "' ,'" . $college_uni . "' ,'".$_POST['en_number']."','".$val_hash."','".$val."')";
           //print_r(mysqli_query($dbcon, $sql));
            mysqli_query($dbcon, $sql);
           }else{
          $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password_hash`, `college`, `enrollment_number`,`val_hash`,`val`,`dp`) VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $pass_hash . "' ,'" . $college_uni . "' ,'".$_POST['en_number']."','".$val_hash."','".$val."','".$_SESSION['profile_pic_url_fb']."')";
           //print_r(mysqli_query($dbcon, $sql));
            mysqli_query($dbcon, $sql);
           

           }
           //if(isFB==1){
            send_mail($email,$val_hash);
            echo "<script>alert('Verification mail has been sent to your registered id')</script>";
            header("refresh:0.01;url=login-page.php");
            //header("Location: mail_sent.html");   
           // print_r($_POST);
            //}else{
             // header("Location: account_created.html");
           // print_r($_POST);
            
           // }
          }
        else{
          echo "<script>alert('You have entered an invalid Email ID')</script>";
            header("refresh:0.01;url=signup-page.php");
            
       // header("Location: invalid_email.html");
        }
    }
    else{
     echo "<script>alert('User Already Exists In database')</script>";
     header("refresh:0.01;url=signup-page.php");
           
    //header("Location: user_already_exists.html");
    }
}
else {
    echo "<script>alert('Password Didn\'t match ')</script>";
    header("refresh:0.01;url=signup-page.php");
}
function hash_pass($string){
//   // $options = array('cost' => 11);
    $pass_hash = sha1(md5($string));
    return $pass_hash;
}
function check_for_user($dbcon,$email){
    $run_query = " SELECT * FROM users WHERE email = '".$email."'    " ;
    if(mysqli_num_rows(mysqli_query($dbcon,$run_query))>0){
        return true;
    }
    else{
        return false;
    }

}

function check_email_format($email){
return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function check_email_exist($email){
    $SMTP_Validator = new SMTP_validateEmail();
    $results = $SMTP_Validator->validate(array($email));
    return (string)($results[$email] ? 'valid' : 'invalid');

}



?>