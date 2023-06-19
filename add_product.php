<?php
include 'dbcon.php'; 








  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $Discription =  mysqli_real_escape_string($conn, $_POST['Discription']);
  $prix =  mysqli_real_escape_string($conn, $_POST['prix']);
  $category =  mysqli_real_escape_string($conn, $_POST['category']);
  $last_prix =  mysqli_real_escape_string($conn, $_POST['last_prix']);
  $Picture_name =  mysqli_real_escape_string($conn, $_FILES['pic']['name']);
  $Picture_tmp_name =  $_FILES['pic']['tmp_name'];
  move_uploaded_file($Picture_tmp_name, "./product_images/$Picture_name");


  $stmt1 = mysqli_stmt_init($conn);
  $stmt2 = mysqli_stmt_init($conn);


  $select = "SELECT * FROM `produits` WHERE `name` = ?";

  
  if(!mysqli_stmt_prepare($stmt1 , $select)){
    echo("select is failed");
  }else{
    mysqli_stmt_bind_param($stmt1 , "s" , $name);
    mysqli_stmt_execute($stmt1);
    $result= mysqli_stmt_get_result($stmt1);





    if(mysqli_num_rows($result) >0){
      echo("the plat is alredy exist!");
    }else{

      $insert = "INSERT INTO `produits`(`name`, `prix`, `last_prix`, `discription`, `photo_produit`,`category`) VALUES (?,?,?,?,?,?);";
      if(!mysqli_stmt_prepare($stmt2 , $insert)){
          echo("insert is failed");
      }else{
          mysqli_stmt_bind_param($stmt2 , "sddsss" , $name, $prix, $last_prix, $Discription ,$Picture_name,$category);
          mysqli_stmt_execute($stmt2);
          header('location:product.php'); 
      }

      

    }



  }
