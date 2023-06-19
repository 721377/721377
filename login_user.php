<?php
require 'dbcon.php';
session_start();
$stmt = $conn->stmt_init();

if (isset($_SESSION['login_id'])) {
    header('Location: index.html');
    exit;
}

require 'google-api/vendor/autoload.php';


$client = new Google_Client();


$client->setClientId('826871412319-6u9qssvrabf22ub6716kuo7cu3n2k1rf.apps.googleusercontent.com');

$client->setClientSecret('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');

$client->setRedirectUri('http://localhost/restau-pfe-main/index.php');


$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token["error"])) {

        $client->setAccessToken($token['access_token']);


        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();


        $id = mysqli_real_escape_string($conn, $google_account_info->id);
        $full_name = mysqli_real_escape_string($conn, trim($google_account_info->name));
        $email = mysqli_real_escape_string($conn, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($conn, $google_account_info->picture);

        // ha 3lach gelt lik khassek dir google_id hit mli kidir login b google 
        // katverifier wache kayn 3andek deja f base de donne ha howa lcode //


        // ila kan kadih la page index w ila maknch had khona wla dkhole b compt jdid ktra insertion
        $get_user = mysqli_query($conn, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {

            $_SESSION['login_id'] = $id;
            header('Location: index.php');
            exit;
        } else {

            // hahia insertion 
            $insert = mysqli_query($conn, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
            //hna ktcho wach trat l inserion mzyan bla ta error dik sa3a kimchi index
            if ($insert) {
                $_SESSION['login_id'] = $id;
                header('Location: index.html');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {
        header('Location: login_user.php');
        exit;
    }
}




//register normale
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];





    $select = "SELECT * FROM `online_users` WHERE `email` = ? ";

    if (!mysqli_stmt_prepare($stmt, $select)) {
        $error = 'select problem !';
        header('location:login_user.php?error=' . $error);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result_select = mysqli_stmt_get_result($stmt);
    }




    if (mysqli_num_rows($result_select) > 0) {
        $error = 'user already exist!';
        header('location:login_user.php?error=' . $error);
    } else {

        if ($pass != $cpass) {
            $error = 'password not matched!';
            header('location:login_user.php?error=' . $error);
        } else {
            $insert = "INSERT INTO `online_users`(`Fullname`, `email`, `addresse`, `phone`, `password`) VALUES (?,?,?,?,?)";

            if (!mysqli_stmt_prepare($stmt, $insert)) {
                $error = 'insert problem !';
                header('location:login_user.php?error=' . $error);
            } else {
                mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $address, $phone, $pass);
                mysqli_stmt_execute($stmt);
                header('location:login_user.php');
            }
        }
    }
}




//login normale

if (isset($_POST['log'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    echo '<script>alert("hamza")</script>';

    $sql = " SELECT * FROM  online_users  WHERE email = ? and password = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $errorlog = 'error';
        header('location:login_user.php?errorlog=' . $errorlog);
    } else {
        mysqli_stmt_bind_param($stmt, "ss",  $email, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user_id'] = $row['id_user'];
            header('location:index.php');
        } else {
            $errorlog = 'mote de passe ou email incorect';
            header('location:login_user.php?errorlog=' . $errorlog);
        }
    }
}


include 'design.php';

//fik m3na wahdchwia hhhhhhh
