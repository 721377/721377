<?php
include 'sidebar.php';
include 'head.php';

include 'dbcon.php';



$stmt = $conn->stmt_init();

//partie selection id des tables 

$first_select = "SELECT DISTINCT id_table FROM commands_locale";

if (!mysqli_stmt_prepare($stmt, $first_select)) {
    echo ("Error first_select");
} else {
    mysqli_stmt_execute($stmt);
    $result_first_select = mysqli_stmt_get_result($stmt);
}


//partie selection id des user online


$first_select_online = "SELECT DISTINCT id_user FROM commande_online";

if (!mysqli_stmt_prepare($stmt, $first_select_online)) {
    echo ("Error first_select_online");
} else {
    mysqli_stmt_execute($stmt);
    $result_first_select_online = mysqli_stmt_get_result($stmt);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/commands.css">
    <title>commands</title>
</head>

<body>
    <section class="command">
        <div class="grid-command">

            <div class="command-head">
                <div class="ordertit">
                    ORDER LIST
                </div>
                <div class="orderlist">
                    <div class="small-box">
                        <i class="fa-solid fa-check"></i>#345
                    </div>
                    <div class="small-box err">
                        <i class="fa-solid fa-xmark"></i>#300
                    </div>
                </div>
            </div>

            <div class="corest">


                <?php


                //select the products => for every table 
                while ($row = mysqli_fetch_assoc($result_first_select)) {

                    $code = $row['id_table'];

                    $second_select = "SELECT p.name, P.photo_produit , p.prix , C.qte FROM produits P , commands_locale C  WHERE C.id_table = '$code' and P.id = C.id_plat";
                    if (!mysqli_stmt_prepare($stmt, $second_select)) {
                        echo ("Error second_select");
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result_second_select = mysqli_stmt_get_result($stmt);
                    }

                ?>

                    <div class="card">
                        <div class="head">
                            <div class="ord-id-date">
                                <p class="idord">Order #<?php echo ($code) ?></p>
                                <div class="date">2Feb2023, 08:28PM</div>
                            </div>
                            <div class="client-details">
                                <div class="pic"><img src="images/perssone1.jpeg" alt=""></div>
                            </div>

                        </div>

                        <div class="body">


                            <?php

                            //partie d'affichage
                            while ($row2 = mysqli_fetch_assoc($result_second_select)) {


                            ?>

                                <div class="product-cart">

                                    <div class="detai">
                                        <img src="product_images/<?= $row2['photo_produit'] ?>" alt="" srcset="" class="order-img">
                                        <div class="plat-info">
                                            <p class="plat-nom"><?= $row2['name'] ?></p>

                                            <div class="prix-qt">
                                                <p class="plat-prix"><?= $row2['prix'] ?>Dhs</p>
                                                <p class="quant">Qty:<?= $row2['qte'] ?></p>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            <?php } ?>




                        </div>

                        <div class="footer">
                            <div class="foter-content">
                                <div class="total-quant">
                                    <p class="fot-quant">
                                        x2 Items
                                    </p>
                                    <p class="fot-prix">
                                        20 Dhs
                                    </p>
                                </div>
                                <div class="vali-refu">
                                    <div class="vali"><i class="fa-solid fa-check"></i></div>
                                    <div class="refu"><i class="fa-solid fa-xmark"></i></div>
                                </div>
                            </div>

                        </div>


                    </div>


                <?php
                } ?>


            </div>

            <div class="coenlign">



                <?php


                //select the products => for every table 
                while ($row_online = mysqli_fetch_assoc($result_first_select_online)) {

                    $code_online = $row_online['id_user'];

                    $second_select_online = "SELECT p.name, P.photo_produit , p.prix , C.qty FROM produits P , commande_online C  WHERE C.id_user = '$code_online' and P.id = C.id_plat";
                    if (!mysqli_stmt_prepare($stmt, $second_select_online)) {
                        echo ("Error second_select_online");
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result_second_select_online = mysqli_stmt_get_result($stmt);
                    }

                ?>

                    <div class="card">
                        <div class="head">
                            <div class="ord-id-date">
                                <p class="idord">user #<?= $code_online ?></p>
                                <div class="date">2Feb2023, 08:28PM</div>
                            </div>
                            <div class="client-details">
                                <div class="pic"><img src="images/perssone1.jpeg" alt=""></div>
                            </div>

                        </div>

                        <div class="body">




                            <?php
                            //partie d'affichage
                            while ($row2_online = mysqli_fetch_assoc($result_second_select_online)) {

                            ?>
                                <div class="product-cart">
                                    <div class="detai">
                                        <img src="images/<?= $row2_online['photo_produit']  ?>" alt="" srcset="" class="order-img">
                                        <div class="plat-info">
                                            <p class="plat-nom"><?= $row2_online['name']  ?></p>

                                            <div class="prix-qt">
                                                <p class="plat-prix"><?= $row2_online['prix'] ?> Dhs</p>
                                                <p class="quant">Qty:<?= $row2_online['qty']  ?></p>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            <?php } ?>



                        </div>

                        <div class="footer">
                            <div class="foter-content">
                                <div class="total-quant">
                                    <p class="fot-quant">
                                        x2 Items
                                    </p>
                                    <p class="fot-prix">
                                        20 Dhs
                                    </p>
                                </div>
                                <div class="vali-refu">
                                    <div class="vali"><i class="fa-solid fa-check"></i></div>
                                    <div class="refu"><i class="fa-solid fa-xmark"></i></div>
                                </div>
                            </div>

                        </div>


                    </div>
                <?php } ?>


            </div>

        </div>


    </section>
</body>

</html>