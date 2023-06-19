<?php
include 'dbcon.php';
session_start();
$stmt = $conn->stmt_init();

if (!isset($_SESSION['user_id'])) {
    header('location:login_user.php');
} else {
    $id_user = $_SESSION['user_id'];
}


$select = "SELECT * FROM `online_users` WHERE id_user = ?";
if (!mysqli_stmt_prepare($stmt, $select)) {
    echo "errer de selection !!!";
} else {
    mysqli_stmt_bind_param($stmt, "i", $id_user);
    mysqli_stmt_execute($stmt);
    $result_select = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result_select);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>commande validation</title>
    <link rel="stylesheet" href="css/validation_online.css">
</head>

<body>
    <div class="background">
        <div class="container">
            <div class="screen">
                <div class="screen-body">
                    <div class="screen-body-item left"></div>

                    <div class="screen-body-item right">
                        <div class="app-title">
                            <span>Commande validation</span>
                        </div>
                        <form class="app-form" method="post" action="validation_online.php">
                            <div class="group">
                                <input required="" name="fullname" type="text" value="<?= $row['Fullname'] ?>" class="input" />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Fullname</label>
                            </div>
                            <div class="group">
                                <input required="" name="email" type="email" value="<?= $row['email'] ?>" class="input" />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                            </div>
                            <div class="group">
                                <input required="" name="addr" type="text" value="<?= $row['addresse'] ?>" class="input" />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Adress</label>
                            </div>
                            <div class="group">
                                <input required="" name="phone" type="text" value="<?= $row['phone'] ?>" class="input" />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Phone number</label>
                            </div>
                            <button class="btn" type="submit">Valid</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>