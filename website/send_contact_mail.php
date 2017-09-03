<?php
if(isset($_POST)){
	require_once 'php_mail.php';
	$name = $_POST['name'];
	$college = $_POST['college'];
	$email = $_POST['email']; 
	$phone = $_POST['phone'];
	$en_number = $_POST['en_number'];
	$query = $_POST['query'];
 send_contact_mail($email,$name,$college,$phone,$en_number,$query);
 send_auto_reply($email,$query);
 header("Location: suggestion_sent.html");
}




?>