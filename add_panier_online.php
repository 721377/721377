<?php

include 'cryptfunction.php';
include 'dbcon.php';
session_start();


$id_plat = decryptId($_GET['id_plat']);

$stmt = $conn->stmt_init();

$id_user = $_SESSION['user_id'];





if (!mysqli_stmt_prepare($stmt, "INSERT INTO panier_online(id_user, id_plat) value(?,?)")) {
    echo "errer de selection !!!";
} else {
    mysqli_stmt_bind_param($stmt, "ii", $id_user, $id_plat);
    mysqli_stmt_execute($stmt);
    header('location:index.php');
}
