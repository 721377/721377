<?php
include 'dbcon.php';
include('cryptfunction.php');

$code=mysqli_real_escape_string($conn , $_GET['id']);

$id = decryptId($code);

$sql= "DELETE FROM `qr_code` WHERE id_table = ?";

$stmt=mysqli_stmt_init($conn) ; 

if(!mysqli_stmt_prepare($stmt , $sql)){
    echo("error");
}
else{
    mysqli_stmt_bind_param($stmt , "i" , $id);
    mysqli_stmt_execute($stmt);
    header('location:settings.php');
}





?>