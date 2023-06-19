<?php
include 'dbcon.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:login_user.php');
} else {
    $id_user = $_SESSION['user_id'];
}

$stmt = $conn->stmt_init();

$update = "UPDATE `online_users` SET `Fullname`=?,`email`=?,`addresse`=?,`phone`=? WHERE id_user =?";

if (!mysqli_stmt_prepare($stmt, $update)) {
    echo "update error !!!";
} else {
    /*update user info */
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $phone = $_POST['phone'];

    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $addr, $phone, $id_user);
    mysqli_stmt_execute($stmt);

    /*select for product */
    $select = "SELECT `id_plat` , `qty` FROM `panier_online` WHERE id_user = ?";

    if (!mysqli_stmt_prepare($stmt, $select)) {
        echo "errer de selection !!!";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id_user);
        mysqli_stmt_execute($stmt);
        $result_select = mysqli_stmt_get_result($stmt);
    }

    while ($row = mysqli_fetch_row($result_select)) {


        /*insert  for product in to the commade table */
        $insert = "INSERT INTO `commande_online`(`id_user`, `id_plat` , `qty`) VALUES (?,?,?)";

        if (!mysqli_stmt_prepare($stmt, $insert)) {
            echo "errer de insertion !!!";
        } else {
            mysqli_stmt_bind_param($stmt, "iii", $id_user, $row[0], $row[1]);
            mysqli_stmt_execute($stmt);

            $delete = "DELETE FROM `panier_online` WHERE id_user = ?";

            if (!mysqli_stmt_prepare($stmt, $delete)) {
                echo "errer de suppretion !!!";
            } else {
                mysqli_stmt_bind_param($stmt, "i", $id_user);
                mysqli_stmt_execute($stmt);
                header('location:index.php');
            }
        }
    }
}
