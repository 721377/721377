<?php
include 'dbcon.php';
include 'cryptfunction.php';
$stmt = $conn->stmt_init();

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:login_user.php');
} else {
    $id_user = $_SESSION['user_id'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cart.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>cart</title>
</head>

<body>

    <div class="container-body">
        <div id="cart-home" class="cart-home">
            <div class="head">
                <?php


                $select = "SELECT * FROM `online_users` WHERE id_user =?";
                if (!mysqli_stmt_prepare($stmt, $select)) {
                    echo ("error de selection");
                } else {
                    mysqli_stmt_bind_param($stmt, "i", $id_user);
                    mysqli_stmt_execute($stmt);
                    $result_select = mysqli_stmt_get_result($stmt);
                    $row_select = mysqli_fetch_assoc($result_select);
                }


                ?>
                <a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i></a>
                <p>votre panier</p>
                <div class="cart-item" style="border-radius: 20px; width:200px;">
                    <?=
                    $row_select['Fullname'];
                    ?>
                </div>
            </div>
            <div class="cart-body">





                <div id="count" class="product-cart-contain">

                    <?php


                    $select = "SELECT P.id, P.name , P.prix , P.photo_produit , PA.qty FROM produits P , panier_online PA WHERE P.id = PA.id_plat and PA.id_user =?";

                    if (!mysqli_stmt_prepare($stmt, $select)) {
                        echo "errer de selection !!!";
                    } else {
                        mysqli_stmt_bind_param($stmt, "i", $id_user);
                        mysqli_stmt_execute($stmt);
                        $result_select = mysqli_stmt_get_result($stmt);
                    }

                    $sub_total = 0;
                    $prix_total = 0;

                    while ($row = mysqli_fetch_assoc($result_select)) {

                    ?>
                        <div class="product-cart">
                            <div class="detai">
                                <a href="dell_pr_panier_online.php?id_pr=<?= encryptId($row['id']) ?>" class="trash">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </a>
                                <img src="product_images/<?= $row['photo_produit'] ?>" alt="" srcset="" class="cart-img">
                                <div class="plat-info">
                                    <p class="plat-nom"> <?= $row['name'] ?></p>
                                    <input type="text" class="plat-prix" value=" <?= $row['prix'] ?>">
                                    <?php
                                    $sub_total += $row['prix'];
                                    ?>
                                </div>
                            </div>
                            <div class="controls">
                                <div class="quantity">
                                    <i class="fa-solid fa-minus decr"></i>

                                    <input type="text" class="quantity-num" value="<?= $row['qty'] ?>">

                                    <i class="fa-solid fa-plus incr"></i>


                                </div>


                            </div>


                        </div>
                    <?php

                        $ids = [$row['id']];
                        $prix_total += $row['prix'] * $row['qty'];
                    } ?>



                </div>
                <div class="bottom">

                    <div class="topay">
                        <p>Sub Totale : </p>
                        <input type="text" name="" id="" value="<?php echo ($sub_total) ?>dh" class="total">
                    </div>
                    <div class="valide-total">
                        <p>Totale : <?php echo ($prix_total) ?> Dhs</p>
                        <a href="form_online_validation.php" class="valider-panier">valider mon panier</a>

                    </div>

                </div>


            </div>
        </div>

        <script>
            var inc = document.getElementsByClassName('incr');
            var dec = document.getElementsByClassName('decr');


            for (var i = 0; i < inc.length; i++) {
                var butt = inc[i];
                butt.addEventListener('click', function(event) {
                    var platprix = document.querySelector('.plat-prix').value;
                    var totalef = document.querySelector('#tot');
                    var buttclicked = event.target;
                    var input = buttclicked.parentElement.children[1];
                    console.log(input);
                    var num = input.value;
                    var newnum = parseInt(num) + 1;
                    input.value = newnum;
                    var tot = 0;
                    tot = tot + (newnum * Number.parseInt(platprix));
                    totalef.value = tot;
                })

            }



            for (var i = 0; i < dec.length; i++) {
                var butt = dec[i];
                butt.addEventListener('click', function(event) {
                    var buttclicked = event.target;
                    var input = buttclicked.parentElement.children[1];
                    console.log(buttclicked);
                    console.log(input);
                    var num = input.value;
                    if (num > 1) {
                        var newnum = parseInt(num) - 1;
                        input.value = newnum;
                        var quan = input.value;
                    }


                })
            }
        </script>

</body>

</html>