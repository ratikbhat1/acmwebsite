<?php
error_reporting(0);
@ini_set('display_errors', 0);
session_start();
require  __DIR__.'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php' ;
//$_SESSION['email_verify_token'] = md5(uniqid(mt_rand(), true));
function send_mail($email,$val_hash){

    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress($email, "User");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Verify account';
    $mail->Body = 'Hello,<br>Please click on following link to verify your e-mail ID:https://mait.acm.org/acmwebsite/website/verify.php?email='.$email.'&evt='.$val_hash.'<br>Thanks,
<br>WebDev Team, ACM-MAIT Student Chapter
<br>For queries / suggestions, mailto:suggestions@mait.acm.org
' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
/*function send_forgot_password_mail($email,$new_pass){
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Password = 'acms077111';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                     // TCP port to connect to

    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
    $mail->addAddress($email, "ratik");               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'New Password ACM-MAIT Student chapter';
    $mail->Body = 'HI!!!<br><br>Welcome to ACM MAIT student chapter . To verify your account click on the following link : <br><br>https://mait.acm.org/acmwebsite/website/verify.php?email='.$email.'&evt='.$val_hash;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }


}*/
function send_suggestion_mail($email,$body){
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress('suggestions@mait.acm.org', "ACM Team");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Suggestion submitted by user '.$email;
    $mail->Body = 'Hello,<br>Suggestion submitted by user : '.$email.' where as follows:<br>'.$body.'<br>Thanks,
<br>WebDev Team, ACM-MAIT Student Chapter
<br>For queries / suggestions, mailto:suggestions@mait.acm.org
' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
function send_auto_reply($email,$suggestion){
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress($email, "User");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Suggestion submitted';
    $mail->Body = 'Hi,<br>Your query has been received by us. We’ll get back to you shortly.<br>Your Query/Suggestion was: '.$suggestions.' <br>Thanks,
<br>WebDev Team, ACM-MAIT Student Chapter
<br>For queries / suggestions, mailto:suggestions@mait.acm.org
' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
function send_reg_mail($email){
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress($email, "User");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Registered For ID cards';
    $mail->Body = 'Hello,<br>you Have registered for generation of member ID cards, We will get back to you after your request is approved<br>Thanks,
<br>WebDev Team, ACM-MAIT Student Chapter
<br>For queries / suggestions, mailto:suggestions@mait.acm.org
' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

}
function send_abs_mail($email){
 $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress($email, "User");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'TPP - TNM\'16 - form submitted';
    $mail->Body = 'Hi,<br>Your entry for Technical Paper Presentation has been received by us. We&#39;ll get back to you shortly.<br><br>Thanks,<br>
ACM - MAIT Student Chapte' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }


}
function send_res_mail($email){
 $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress($email, "User");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'TPP - TNM \'16 - resume submitted';
    $mail->Body = 'Hi,<br>Your resume for Technical Paper Presentation has been received by us. We&#39;ll get back to you shortly.<br><br>Thanks,<br>ACM - MAIT Student Chapter' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

}
function send_tpp_abs_mail($abs_path,$res_path,$sender,$college,$email,$phone,$en_number){
 $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress('submissions@mait.acm.org', "User");       
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('./'.$abs_path);
if(strcmp('not submitted', $res_path) != 0){
$mail->addAttachment('./'.$res_path);
}         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'TPP - TNM \'16 - Find Abstract submitted by: '.$sender;
    $mail->Body = '<br>PFA Abstract and Resume (if Attached) with the following details submitted in the form : <br> NAME: '.$sender.'<br>College: '.$college.'<br>Email: '.$email.'<br>Phone: '.$phone.'<br>Enrollment Number: '.$en_number.'  .<br><br>Thanks,<br>ACM - MAIT Student Chapter' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

}
/*function send_tpp_res_mail($res_path,$sender){
 $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress('submissions@mait.acm.org', "User");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('./'.$res_path);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'TPP - TNM \'16 - Find resume submitted by: '.$sender;
    $mail->Body = '<br>PFA Resume .<br><br>Thanks,<br>ACM - MAIT Student Chapter' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

}*/
function send_contact_mail($email,$name,$college,$phone,$en_number,$query){
        $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress('suggestions@mait.acm.org', "ACM Team");               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Contact-US form submitted by '.$name;
    $mail->Body = 'Hello,<br>Form submitted by user : '.$name.' was as follows:<br>Name: '.$name.'<br>College: '.$college.'<br>Phone: '.$phone.'<br>Enrollment Number: '.$en_number.'<br>Query: '.$query.'<br>Thanks,
<br>WebDev Team, ACM-MAIT Student Chapter
<br>For queries / suggestions, mailto:suggestions@mait.acm.org
' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

}
function send_reset_password_mail($email,$fp_hash){

    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Host = 'mait.acm.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'acms0771@gmail.com';                 // SMTP username
    $mail->Username = 'no-reply@mait.acm.org';                 // SMTP username
    //$mail->Password = 'acms077111';                           // SMTP password
    $mail->Password = 'eQdyD)wHQuRN';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   //$mail->Port = 587;                                     // TCP port to connect to
    $mail->Port = 465;                                     // TCP port to connect to

//    $mail->setFrom('acms0771@gmail.com', 'ACM-MAIT');
  //  $mail->addAddress($email, "ratik");               // Name is optional
    $mail->setFrom('no-reply@mait.acm.org', 'ACM-MAIT Student Chapter');
    $mail->addAddress($email, "User");               // Name is optional

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Reset Password';
    $mail->Body = 'Hello,<br>Please click on following link to reset you acoount password: https://mait.acm.org/acmwebsite/website/forgot_password/reset.php?fpt='.$fp_hash.'<br>Thanks,
<br>WebDev Team, ACM-MAIT Student Chapter
<br>For queries / suggestions, mailto:suggestions@mait.acm.org
' ;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
