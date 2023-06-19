<?php


include 'dbcon.php';
include 'cryptfunction.php';


if (isset($_GET['id'])) {

  //partie selection et affichage dans les zonne de texte
  $code = mysqli_real_escape_string($conn, $_GET['id']);
  $code = decryptId($code);


  $sql = "SELECT * FROM `produits` WHERE id=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "error";
  } else {
    mysqli_stmt_bind_param($stmt, "i", $code);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
  }
}


//partie modification
if (isset($_POST['submit'])) {



  if (empty($_POST['category'])) {
    $error[] = 'Selectioner une category !';
  } else {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $Discription =  mysqli_real_escape_string($conn, $_POST['Discription']);
    $category =  mysqli_real_escape_string($conn, $_POST['category']);
    $prix =  mysqli_real_escape_string($conn, $_POST['prix']);
    $last_prix =  mysqli_real_escape_string($conn, $_POST['last_prix']);
    $Picture_name =  mysqli_real_escape_string($conn, $_FILES['pic']['name']);
    $Picture_tmp_name =  $_FILES['pic']['tmp_name'];
    move_uploaded_file($Picture_tmp_name, "./images/$Picture_name");


    if (empty($_FILES['pic']['name'])) {
      $sql = "UPDATE produits SET name = ?, prix=?, last_prix=?, discription=?,category=? where id=?";

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "error";
      } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $prix, $last_prix, $Discription, $category, $code);
        mysqli_stmt_execute($stmt);
        header('location:product.php');
      }
    } else {

      $sql = "UPDATE produits SET name = ?, prix=?, last_prix=?, discription=?, photo_produit=?,category=? where id=?";

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "error";
      } else {
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $prix, $last_prix, $Discription, $Picture_name, $category, $code);
        mysqli_stmt_execute($stmt);
        header('location:product.php');
      }
    }
  }
}



?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/ajouter.css" />
  <title>Document</title>
</head>

<body>
  <div class="product_form" id="product_form">
    <div class="title">
      <h3>Ajouter nouveau Produit</h3>
      <img src="images/restaurant.png" alt="" />
    </div>


    <?php
    if (isset($error)) {
      foreach ($error as $error) {
        echo '<span class="error-msg">' . $error . '</span>';
      };
    };
    ?>

    <div class="line"></div>

    <form method="post" enctype="multipart/form-data">
      <div class="inputs_text">
        <div class="inputGroup">
          <input type="text" required="" autocomplete="off" class="text_inpute" name="name" value="<?= $row['name'] ?>" />
          <label for="name">Nom</label>
        </div>

        <div class="inputGroup">
          <textarea name="Discription" id="" style="resize: vertical" class="text_inpute" placeholder="Discription"><?= $row['discription'] ?></textarea>

        </div>

        <div class="prix">
          <div class="inputGroup">
            <input type="text" required="" autocomplete="off" class="text_inpute" name="prix" value="<?= $row['prix'] ?>" />
            <label for="name">prix</label>
          </div>

          <div class="inputGroup">
            <input type="text" required="" autocomplete="off" class="text_inpute" name="last_prix" value="<?= $row['last_prix'] ?>" />
            <label for="name">Dernier prix</label>
          </div>
        </div>

        <div class="inputGroup">
          <select name="category" id="" class="select">
            <option value="" disabled selected hidden>Categorys</option>
            <option value="burger">Burger</option>
            <option value="pizza">Pizza</option>
            <option value="salade">Salade</option>
            <option value="sushi">Sushi</option>
            <option value="desserts">Desserts</option>
          </select>
        </div>

        <label for="file_uplo" class="file_lab">
          <input id="file_uplo" type="file" name="pic" />
          <i class="fa fa-upload" aria-hidden="true"></i>
          Uplod the Picture
        </label>
      </div>

      <div class="buttons">
        <a href="product.php">Quitter</a>

        <button type="submit" name="submit">Modifier</button>
      </div>
    </form>
  </div>
</body>

</html>