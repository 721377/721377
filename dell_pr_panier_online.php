<?php
include 'dbcon.php';
include 'cryptfunction.php';
session_start();

if (isset($_GET['id_pr'])) {

    $id_pr = decryptId($_GET['id_pr']);
    $sql = "DELETE FROM `panier_online` WHERE id_plat=? and id_user =? ; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo ("delete product failed");
    } else {
        mysqli_stmt_bind_param($stmt, "ii",  $id_pr, $_SESSION['user_id']);
        mysqli_stmt_execute($stmt);
        header('location:cart_online.php');
    }
}
