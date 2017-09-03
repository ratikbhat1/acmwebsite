<?php
$dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon, 'maithost_acmmait');

    if (mysqli_connect_errno()) {
        echo "connection not establiashed" . mysqli_connect_error();
    }
    require_once 'php_mail.php';   

   $fp_email = mysqli_real_escape_string($dbcon, $_POST['fp_email']);
   
	
	if(check_email_format($fp_email)){
			if(check_for_user($dbcon,$fp_email)){
                $fp_hash = md5(uniqid(mt_rand(), true));
                $set_fp_hash_sql = "UPDATE users SET fp_hash = '".$fp_hash."' WHERE email = '".$_POST['fp_email']."'";
                mysqli_query($dbcon,$set_fp_hash_sql);
               send_reset_password_mail($fp_email,$fp_hash);
				//echo 'done hash: '.$fp_hash;			
			    header("Location: mail_sent.html");
            }else{
                echo "<script>alert('Not A Registered Email ID ');</script>";
                 header( "refresh:0.01;url=index.php" );
                    }	
	}else{
 	//	header("Content-type: text/javascript");
        echo "<script>alert('invalid Email');</script>";
    header( "refresh:0.01;url=index.php" );
}	

function check_email_format($email){
return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function check_email_exist($email){
    $SMTP_Validator = new SMTP_validateEmail();
    $results = $SMTP_Validator->validate(array($email));
    return (string)($results[$email] ? 'valid' : 'invalid');
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







?>