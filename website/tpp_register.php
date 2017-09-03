<?php
require_once 'php_mail.php';
if ($_GET['csrf'] = '' || $_GET['csrf'] != $_SESSION['csrf_token']) {
        header("Location: afterLogin.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);
    }else{
    
$dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon,'maithost_acmmait');

if (mysqli_connect_errno())
{
   echo "connection not establiashed".mysqli_connect_error() ;
}
$name = mysqli_real_escape_string($dbcon,$_POST['name']);
$college = mysqli_real_escape_string($dbcon,$_POST['college']);
$email = mysqli_real_escape_string($dbcon,$_POST['email']);
$phone = mysqli_real_escape_string($dbcon,$_POST['phone']);
$en_number = mysqli_real_escape_string($dbcon,$_POST['en_number']);
$notes = mysqli_real_escape_string($dbcon,$_POST['notes']);
$res_path = 'not submitted';
if(isset($_FILES['res_pdf'])){
		$file_name_res = $_FILES['res_pdf']['name'];
		$file_tmp_name_res = $_FILES['res_pdf']['tmp_name'];
		move_uploaded_file($file_tmp_name_res,'./upload/res/'.$file_name_res);
		$res_path = 'upload/res/'.$file_name_res;
		send_res_mail($email);	
		//send_tpp_res_mail($res_path,$name);
}
$file_name_abs = $_FILES['abs_pdf']['name'];
$file_tmp_name_abs = $_FILES['abs_pdf']['tmp_name'];
move_uploaded_file($file_tmp_name_abs,'./upload/abs/'.$file_name_abs);
send_abs_mail($email);
$abs_path =  'upload/abs/'.$file_name_abs;
$sql = "INSERT INTO `tpp_registrations`(`name`, `college`, `email`, `phone`, `en_number`, `abs_path`, `res_path`,`notes`) VALUES ('".$name."','".$college."','".$email."','".$phone."','".$en_number."','".$abs_path."','".$res_path."','".$notes."')";
mysqli_query($dbcon,$sql);
//send_tpp_abs_mail($abs_path,$name);
send_tpp_abs_mail($abs_path,$res_path,$name,$college,$email,$phone,$en_number,$notes);
echo "<script>alert('Form Submitted ! Mail has been sent to you registered ID ')</script>";
header("refresh:0.01;url=home-page.html");
}


?>