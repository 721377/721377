<?php
include 'dbcon.php';
include('cryptfunction.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $code=mysqli_real_escape_string($conn,$_GET['id']);
    
    $id=decryptId($code);

    $sql= "DELETE FROM `produits` WHERE id=? ; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt , $sql)){
        echo("delete product failed");
    }else{
        mysqli_stmt_bind_param($stmt , "i" ,  $id);
        mysqli_stmt_execute($stmt);
        header('location:product.php');
       
    }
}
?>