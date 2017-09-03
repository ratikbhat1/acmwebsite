<?php
require_once 'php_mail.php';
session_start();
    if ($_GET['csrf'] = '' || $_GET['csrf'] != $_SESSION['csrf_token']) {
        header("Location: afterLogin.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);
    } else {
         $dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
          mysqli_select_db($dbcon,'maithost_acmmait');

			if (mysqli_connect_errno())
			{
   			echo "connection not establiashed".mysqli_connect_error() ;
			}
			$name = $_POST['name'];
      $en_number = $_POST['en_number'];
      $year = $_POST['year'];
      $branch=$_POST['branch'];
      $phone_number=$_POST['phone_number'];
      $email = $_POST['email'];


                   if(getimagesize($_FILES['member_image']['tmp_name']) == FALSE)
                    {
                    echo "Please select an image.";
                    }
               
               else
                {
                    $image= addslashes($_FILES['member_image']['tmp_name']);
               //     $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                }  
      
      if (!check_for_member($dbcon,$email)) {

      $sql = "INSERT INTO `lifi_registrations`(`name`, `enrollment_number`, `year`, `branch`, `phone_number`, `email`,`member_image`,`approved`) VALUES ('".$name."','".$en_number."','".$year."','".$branch."','".$phone_number."','".$email."','".$image."',0)";
           mysqli_query($dbcon, $sql);
          send_reg_mail($email);
         header("Location: reg_mail_sent.html");
         // echo "done";
       //   saveimage($dbcon,$image);
        //   header('Location: login-page.php');   
        }else{
           echo "<script>alert('Email Already Submitted')</script>";
           header("refresh:0.01;url=registration-page.php");
            
        }

      }

function check_for_member($dbcon,$email){
    $run_query = " SELECT * FROM lifi_registrations WHERE email = '".$email."'    " ;
    if(mysqli_num_rows(mysqli_query($dbcon,$run_query))>0){
        return true;
    }
    else{
        return false;
    }

}
function saveimage($dbcon,$image)
            {
               $qry="insert into lifi_registrations (member_image) values ('$image')";
                $result=mysqli_query($dbcon,$qry);
echo "done_ing";
            }





?>