<?php

include 'dbcon.php';


session_start();

if (isset($_POST['submit'])) {



    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['pass'];


    $sql = " SELECT * FROM  admins  WHERE email = ? && password = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:login.php');
        $error[] = 'votre mot de passe ou email incorrecte';
    } else {
        mysqli_stmt_bind_param($stmt, "ss",  $email, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);


        $_SESSION['admin_name'] = $row['user_name'];

        $_SESSION['userimg'] = $row['photo'];
        header('location:dashboard.php');
    }
};
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>login</title>
</head>

<body>

    <div class="container">
        <div class="box">
            <div class="left"></div>
            <form class="right" action="" method="post">
                <h2>Log-in</h2>

                <?php
                if (isset($error)) {
                    foreach ($error as $error) {

                        echo '<div class="error" id="acc">
                 <i class="fa-solid fa-circle-exclamation"></i>
                <p>' . $error . '</p>
                 </div>';
                    };
                };
                ?>

                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" class="text" name="email" placeholder="email" id="email">
                </div>
                <div class="pass">
                    <label for="pass">Mot de passe</label>
                    <input type="password" class="text" placeholder="mot de passe" name="pass" id="pss">
                </div>


                <div id="ajou"> <input name="submit" type="submit" class="submit" value="connecter"></div>


            </form>

        </div>
    </div>

</body>

</html>