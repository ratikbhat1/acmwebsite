<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
$dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon,'maithost_acmmait');

if (mysqli_connect_errno())
{
   echo "connection not establiashed".mysqli_connect_error() ;
}


$fb = new Facebook\Facebook([
  'app_id' => '1717935975105663',
  'app_secret' => '8418a7f71d5d2437c95b41fb077e7119',
  'default_graph_version' => 'v2.5',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }

if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
try {
		$requestPicture = $fb->get('/me/picture?redirect=false&height=300');
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
		$picture = $requestPicture->getGraphUser();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// printing $profile array on the screen which holds the basic info about user
	//print_r($profile);
	$_SESSION['name_fb'] = $profile['name'];
	$_SESSION['first_name_fb'] = $profile['first_name'];
	$_SESSION['last_name_fb'] = $profile['last_name'];
	$_SESSION['email_fb'] = $profile['email'];
	//adding dp change code here
	$_SESSION['profile_pic_url_fb'] = $picture['url'];
	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
	    if(check_for_user($dbcon,$_SESSION['email_fb'])){
		$_SESSION["csrf_token"] = md5(uniqid(mt_rand(), true));
        $_SESSION['user'] = true;
        $uid_name_arr = explode('@', $_SESSION['email_fb']);
        $uid_name = $uid_name_arr[0];
        $get_id_sql = "SELECT id FROM users WHERE email = '" . $_SESSION['email_fb'] . "' ";
        $id_row = mysqli_fetch_row(mysqli_query($dbcon, $get_id_sql));
        $id = $id_row[0];
        $get_user_data_sql = "SELECT first_name , last_name , college , enrollment_number FROM users WHERE id = '" . $id . "'";
        $all_user_data = mysqli_fetch_row(mysqli_query($dbcon, $get_user_data_sql));
        $name = $all_user_data[0] . " " . $all_user_data[1];
        $college = $all_user_data[2];
        $en_number = $all_user_data[3];
        $_SESSION["name"] = $name;
        $_SESSION["college"] = $college;
        $_SESSION["en_number"] = $en_number;
        $_SESSION['uid_name'] = $uid_name;
        $_SESSION['email_user']  = $_SESSION['email_fb'];
        $_SESSION['pic_url']  = $picture['url'];    
        
        header('Location: afterLogin.php?name=' .$_SESSION['uid_name'].'&csrf='.$_SESSION["csrf_token"]); //."&en=".$en_number."&uni=".$college);
		//print_r($_SESSION);
		}else{
		header('Location: signup-page.php');
		}
	
	}

	// getting basic info about user
	
	
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('https://mait.acm.org/acmwebsite/website/fbLogin.php', $permissions);
	//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
    header("Location: ".$loginUrl);
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

	