<?php

include 'cryptfunction.php';
include 'dbcon.php';
session_start();


if (empty($_GET['id'])) {
    $code = "le code QR n'est pas scanner correctement";
    session_unset();
    session_destroy();
} else {
    $code = '';
    $_SESSION['id_table'] = $_GET['id'];
}




$stmt = $conn->stmt_init();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Menu</title>
</head>

<body>
    <header>
        <div class="container">



            <div class="searsh">

                <div class="icon">
                    <i id="searsh_icon" class="fa-solid fa-magnifying-glass"></i>
                </div>

                <input type="text" id="search" onkeyup="search()" placeholder="search" />


                <div class="dell">
                    <h4><i id="delete_searsh" class="fa-solid fa-xmark"></i></h4>
                </div>


            </div>



            <h3><?php echo ($code) ?></h3>

            <a href="">
                <div class="logo"></div>
            </a>
        </div>
    </header>

    <section>
        <div class="container" id="container">
            <div class="category_container" id="category_container">
                <div class="category">
                    <a href="#category1">
                        <img src="./images/burger icon.png" alt="">
                        <h3>Burgers</h3>
                    </a>
                </div>
                <div class="line"></div>
                <div class="category">
                    <a href="#category2">
                        <img src="./images/salad icon.png" alt="">
                        <h3>Salads</h3>
                    </a>
                </div>
                <div class="line"></div>
                <div class="category">
                    <a href="#category3">
                        <img src="./images/pizza icon.png" alt="">
                        <h3>Pizza</h3>
                    </a>
                </div>
                <div class="line"></div>
                <div class="category">
                    <a href="#category4">
                        <img src="./images/sushi icon.png" alt="">
                        <h3>Sushi</h3>
                    </a>
                </div>
            </div>


            <div class="card_holder" id="category1">
                <div class="holder_title">
                    <h3>Burgers</h3>
                </div>


                <?php
                $select_burgers = "SELECT * FROM `produits` WHERE category = 'burger'";

                if (!mysqli_stmt_prepare($stmt, $select_burgers)) {
                    echo "Failed to prepare statement burgers select: ";
                } else {
                    mysqli_stmt_execute($stmt);
                    $burger_result = mysqli_stmt_get_result($stmt);
                }

                while ($row_burgers = mysqli_fetch_assoc($burger_result)) {
                ?>

                    <div class="card">
                        <div class="img">
                            <img src="product_images/<?= $row_burgers['photo_produit'] ?>" alt="" />
                        </div>
                        <div class="title">
                            <h3><?= $row_burgers['name'] ?></h3>
                        </div>
                        <div class="prix_plus">
                            <h4><?= $row_burgers['prix'] ?> DH</h4>
                            <div class="plus_cont">
                                <a href="add_panier_local.php?id_plat= <?php echo encryptId($row_burgers['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>


            </div>

            <div class="card_holder" id="category2">
                <div class="holder_title">
                    <h3>Salad</h3>
                </div>

                <?php
                $select_salad = "SELECT * FROM `produits` WHERE category = 'salade'";

                if (!mysqli_stmt_prepare($stmt, $select_salad)) {
                    echo "Failed to prepare statement burgers select: ";
                } else {
                    mysqli_stmt_execute($stmt);
                    $salad_result = mysqli_stmt_get_result($stmt);
                }

                while ($row_salad = mysqli_fetch_assoc($salad_result)) {
                ?>

                    <div class="card">
                        <div class="img">
                            <img src="product_images/<?= $row_salad['photo_produit'] ?>" alt="" />
                        </div>
                        <div class="title">
                            <h3><?= $row_salad['name'] ?></h3>
                        </div>
                        <div class="prix_plus">
                            <h4><?= $row_salad['prix'] ?> DH</h4>
                            <div class="plus_cont">
                                <a href="add_panier_local.php?id_plat=<?php echo encryptId($row_salad['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <div class="card_holder" id="category3">
                <div class="holder_title">
                    <h3>Pizza</h3>
                </div>
                <?php
                $select_pizza = "SELECT * FROM `produits` WHERE category = 'pizza'";

                if (!mysqli_stmt_prepare($stmt, $select_pizza)) {
                    echo "Failed to prepare statement burgers select: ";
                } else {
                    mysqli_stmt_execute($stmt);
                    $pizza_result = mysqli_stmt_get_result($stmt);
                }

                while ($row_pizza = mysqli_fetch_assoc($pizza_result)) {
                ?>

                    <div class="card">
                        <div class="img">
                            <img src="product_images/<?= $row_pizza['photo_produit'] ?>" alt="" />
                        </div>
                        <div class="title">
                            <h3><?= $row_pizza['name'] ?></h3>
                        </div>
                        <div class="prix_plus">
                            <h4><?= $row_pizza['prix'] ?> DH</h4>
                            <div class="plus_cont">
                                <a href="add_panier_local.php?id_plat=<?php echo encryptId($row_pizza['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <div class="card_holder" id="category4">
                <div class="holder_title">
                    <h3>Sushi</h3>
                </div>
                <?php
                $select_Sushi = "SELECT * FROM `produits` WHERE category = 'sushi'";

                if (!mysqli_stmt_prepare($stmt, $select_Sushi)) {
                    echo "Failed to prepare statement burgers select: ";
                } else {
                    mysqli_stmt_execute($stmt);
                    $Sushi_result = mysqli_stmt_get_result($stmt);
                }

                while ($row_Sushi = mysqli_fetch_assoc($Sushi_result)) {
                ?>

                    <div class="card">
                        <div class="img">
                            <img src="product_images/<?= $row_Sushi['photo_produit'] ?>" alt="" />
                        </div>
                        <div class="title">
                            <h3><?= $row_Sushi['name'] ?></h3>
                        </div>
                        <div class="prix_plus">
                            <h4><?= $row_Sushi['prix'] ?> DH</h4>
                            <div class="plus_cont">
                                <a href="add_panier_local.php?id_plat= <?php echo encryptId($row_Sushi['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>

        <?php

        //nember of product in the cart
        if (isset($_SESSION['id_table'])) {

            $id_t = $_SESSION['id_table'];
            $NUM = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `panier_locale` WHERE id_table = '$id_t'"))
        ?>
            <a href="cart.php" id="cart2" class="cart-bottom">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="p">nombre items <span id="point2"> (<?= $NUM ?>)</span></div>
            </a>


        <?php } ?>



        <a href="#">
            <div class="scrolldown" style="color: skyblue">
                <div class="chevrons">
                    <div class="chevrondown"></div>
                    <div class="chevrondown"></div>
                </div>
            </div>
        </a>

    </section>

    <footer>
        <div class="footer_logo">
            <h2><span>Foodie</span> Moments</h2>
        </div>

        <div class="footer_menu">
            <div class="cont">
                <a href="#category1">Burgers</a>
                <a href="#category2">Salade</a>
                <a href="#category3">Pizza</a>
                <a href="#category4">Sushi</a>
            </div>
        </div>

        <div class="footer_media">
            <div class="cont">
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-solid fa-envelope"></i></a>
            </div>
        </div>

        <div class="copyright">
            <h3>copyright © 2023 .By <span>ATREX</span></h3>
        </div>
    </footer>

    <script>
        var searsh = document.getElementById("searsh_icon");
        var searsh_bar = document.querySelector(".searsh");
        var delete_searsh = document.getElementById("delete_searsh");

        searsh_bar.style.width = "40px";

        searsh.onclick = function() {
            if (searsh_bar.style.width === "40px") {
                searsh_bar.style.width = "45%";
            } else {
                searsh_bar.style.width = "40px";
            }
        };

        delete_searsh.onclick = function() {
            document.getElementById("search").value = '';
        }

        function search() {
            let filter = document.getElementById("search").value.toUpperCase();

            let item = document.querySelectorAll(".card");

            let l = document.getElementsByTagName("h3");

            for (var i = 0; i <= l.length; i++) {
                let a = item[i].getElementsByTagName("h3")[0];

                let value = a.innerHTML || a.innerText || a.textContent;

                if (value.toUpperCase().indexOf(filter) > -1) {
                    item[i].style.display = "";
                    item[i].style.visibility = "visible";
                } else {
                    item[i].style.display = "none";
                    item[i].style.visibility = "hidden";
                }
            }
        }
    </script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>