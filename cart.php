<?php
include 'dbcon.php';
include 'cryptfunction.php';

session_start();
if (!isset($_SESSION['id_table'])) {
    header('location:login.php');
} else {
    $id_table = $_SESSION['id_table'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-body">
        <div id="cart-home" class="cart-home">
            <div class="head">
                <?php

                ?>
                <a href="menu.php?id=<?php echo ($id_table) ?>" class="back"><i class="fa-solid fa-arrow-left"></i></a>
                <p>votre panier</p>
                <div class="cart-item">
                    <?php
                    echo ($id_table);
                    ?>
                </div>
            </div>
            <div class="cart-body">





                <div id="count" class="product-cart-contain">

                    <?php

                    $stmt = $conn->stmt_init();



                    $select = "SELECT P.id, P.name , P.prix , P.photo_produit , PA.qty FROM produits P , panier_locale PA WHERE P.id = PA.id_plat and PA.id_table =?";

                    if (!mysqli_stmt_prepare($stmt, $select)) {
                        echo "errer de selection !!!";
                    } else {
                        mysqli_stmt_bind_param($stmt, "i", $id_table);
                        mysqli_stmt_execute($stmt);
                        $result_select = mysqli_stmt_get_result($stmt);
                    }

                    $sub_total = 0;
                    $prix_total = 0;

                    while ($row = mysqli_fetch_assoc($result_select)) {

                    ?>
                        <div class="product-cart">
                            <div class="detai">
                                <a href="dell_pr_panier_local.php?id_pr=<?= encryptId($row['id']) ?>" class="trash">
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
                            <form id="myform" class="controls">
                                <div class="quantity">
                                    <label for="sub" class="decr">-</label>

                                    <input type="text" id="qte" class="quantity-num" value="<?= $row['qty']; ?>">

                                    <label for="sub" class="incr">+</label>
                                    <input type="submit" id="sub" style="display:none" value="">
                                    <input type="hidden" id="id" value="<?= $id_table ?>" name="">
                                    <input type="hidden" id="id_plat" value="<?= $row['id']; ?>" name="">

                                </div>


                            </form>


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
                        <a href="validation_local.php" class="valider-panier">valider mon panier</a>

                    </div>

                </div>


            </div>
        </div>


        <script type="text/javascript">
            var myfunction;
            jQuery(document).ready(function() {
                jQuery(".controls").submit(myfunction = function(qte) {
                    setData(jQuery('#qte').val(), jQuery('#id').val(), jQuery('#id_plat').val());
                });

                function setData(quanti, id, id_plat) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {

                    };
                    xhttp.open("GET", "edit-cart.php?qte=" + quanti + "&id=" + id + "&id_plat=" + id_plat, true);
                    xhttp.send();
                }
            });

            var inc = document.getElementsByClassName('incr');
            var dec = document.getElementsByClassName('decr');

            console.log(inc.parentElement);
            for (var i = 0; i < inc.length; i++) {
                var butt = inc[i];
                butt.addEventListener('click', function(event) {
                    var buttclicked = event.target;
                    var input = buttclicked.parentElement.children[1];
                    console.log(input);
                    var num = input.value;
                    var newnum = parseInt(num) + 1;
                    input.value = newnum;
                    myfunction();
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

                    }
                    myfunction();
                })

            }
        </script>

</body>

</html>