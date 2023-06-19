<?php
include 'dbcon.php';
include 'cryptfunction.php';


$name = mysqli_real_escape_string($conn, $_POST['name']);
$email =  mysqli_real_escape_string($conn, $_POST['email']);
$password =  mysqli_real_escape_string($conn, $_POST['password']);
$R_password =  mysqli_real_escape_string($conn, $_POST['R_password']);
$Picture_name =  mysqli_real_escape_string($conn, $_FILES['pic']['name']);
$Picture_tmp_name =  $_FILES['pic']['tmp_name'];
move_uploaded_file($Picture_tmp_name, "./images/$Picture_name");


$stmt1 = mysqli_stmt_init($conn);
$stmt2 = mysqli_stmt_init($conn);


$select = "SELECT * FROM `admins` WHERE `user_name` = ?";


if (!mysqli_stmt_prepare($stmt1, $select)) {
  echo ("select is failed");
} else {
  mysqli_stmt_bind_param($stmt1, "s", $name);
  mysqli_stmt_execute($stmt1);
  $result = mysqli_stmt_get_result($stmt1);


  if (mysqli_num_rows($result) > 0) {
    echo ("user alredy exist");
  } else {

    $insert = "INSERT INTO `admins`(`user_name`, `email`, `password`, `photo`) VALUES (?,?,?,?);";
    if (!mysqli_stmt_prepare($stmt2, $insert)) {
      echo ("insert is failed");
    } else {
      mysqli_stmt_bind_param($stmt2, "ssss", $name, $email, encryptId($password), $Picture_name);
      mysqli_stmt_execute($stmt2);
      header('location:settings.php');
    }
  }
}
