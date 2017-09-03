<?php
if(strcmp($_GET['fpt'],'')==0 || !isset($_GET['fpt'])){
header("Location: index.php");
}else{
	if(strcmp($_POST['new_pass'],$_POST['cnew_pass'])==0){
	$dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon, 'maithost_acmmait');

    if (mysqli_connect_errno()) {
        echo "connection not establiashed" . mysqli_connect_error();
    }
   $reset_pass_qry = "UPDATE users SET password_hash = '".hash_pass(mysqli_real_escape_string($dbcon,$_POST['new_pass']))."' WHERE fp_hash = '".$_GET['fpt']."' "; 
   	mysqli_query($dbcon,$reset_pass_qry);
   	header("Location: password_reset_done.html");
}else{

	header('Location: reset.php?fpt='.$_GET['fpt']);
}
}
function hash_pass($string){
//   // $options = array('cost' => 11);
    $pass_hash = sha1(md5($string));
    return $pass_hash;
}



?>