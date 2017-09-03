 <?php
error_reporting(0);
@ini_set('display_errors', 0);
    $dbcon = mysqli_connect('localhost','maithost_master','acmmait1234','maithost_acmmait') or die('connection failed');
mysqli_select_db($dbcon, 'maithost_acmmait');

    if (mysqli_connect_errno()) {
        echo "connection not establiashed" . mysqli_connect_error();
    }


    $user_name = mysqli_real_escape_string($dbcon,$_POST['login_username']);
    $user_pass = mysqli_real_escape_string($dbcon,$_POST['login_password']);
    $user_hash = hash_pass($user_pass);
    $sql = "SELECT * FROM users WHERE email = '" . $user_name . "' AND password_hash = '" . $user_hash . "' AND val = 1";
    $result = mysqli_query($dbcon, $sql);
    if (mysqli_num_rows($result) == 1) {
        session_start();
        //csrf
        $_SESSION["csrf_token"] = md5(uniqid(mt_rand(), true));
        $_SESSION['user'] = true;
        $uid_name_arr = explode('@', $user_name);
        $uid_name = $uid_name_arr[0];
        $get_id_sql = "SELECT id FROM users WHERE email = '" . $user_name . "' ";
        $id_row = mysqli_fetch_row(mysqli_query($dbcon, $get_id_sql));
        $id = $id_row[0];
        $get_user_data_sql = "SELECT first_name , last_name , college , enrollment_number , dp FROM users WHERE id = '" . $id . "'";
        $all_user_data = mysqli_fetch_row(mysqli_query($dbcon, $get_user_data_sql));
        $name = $all_user_data[0] . " " . $all_user_data[1];
        $college = $all_user_data[2];
        $en_number = $all_user_data[3];
        $user_dp_url = $all_user_data[4];
        $_SESSION["name"] = $name;
        $_SESSION["college"] = $college;
        $_SESSION["en_number"] = $en_number;
        $_SESSION['uid_name'] = $uid_name;
        $_SESSION['email_user'] =  $user_name;
        $_SESSION['user_dp_url'] = $user_dp_url;
        header("Location: afterLogin.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);
       // header("Location: test.php?name=" .$_SESSION['uid_name']."&csrf=".$_SESSION["csrf_token"]);

    } else {
echo "<script>alert('Invalid Username/Password Combination ')</script>";
    header("refresh:0.01;url=login-page.php");}

function hash_pass($string){
//    $options = array('cost' => 11);
    $pass_hash = sha1(md5($string));
    return $pass_hash;
}




?>