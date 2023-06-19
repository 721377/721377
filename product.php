<?php
include 'sidebar.php';
include 'head.php';
include 'dbcon.php';
include('cryptfunction.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/product.css">
</head>

<body id="body">
    <section>
        <div class="cont">
            <div class="category_container">
                <div class="title">
                    <h2>Menu<span> Category</span></h2>
                </div>
                <div class="categorys">
                    <div class="category">
                        <div class="category_icon">
                            <img src="images/burger.png" alt="">
                        </div>
                        <p>burgers</p>
                    </div>

                    <div class="category">
                        <div class="category_icon">
                            <img src="images/pizza.png" alt="">
                        </div>
                        <p>Pizza</p>
                    </div>

                    <div class="category">
                        <div class="category_icon">
                            <img src="images/salade.png" alt="">
                        </div>
                        <p>Salade</p>
                    </div>

                    <div class="category">
                        <div class="category_icon">
                            <img src="images/sushi.png" alt="">
                        </div>
                        <p>Sushi</p>
                    </div>

                    <div class="category">
                        <div class="category_icon">
                            <img src="images/dessert.png" alt="">
                        </div>
                        <p>Desserts</p>
                    </div>
                </div>
            </div>




            <div class="products_container">
                <div class="title">
                    <h2>Products</h2>
                </div>

                <div class="products">


                    <?php
                    $select_pr = "SELECT * FROM `produits`";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $select_pr)) {
                        echo "sql failed";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                    }

                    while ($row_pr = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="card">

                        <div class="image">
                            <img src="images/<?php echo ($row_pr['photo_produit']); ?>" alt="">
                        </div>

                        <div class="info">
                            <h3><?php echo ($row_pr['name']) ?></h3>
                            <div class="prix">
                                <h4><?php echo ($row_pr['prix']) ?></h4>
                                <h5><?php echo ($row_pr['last_prix']) ?></h5>
                            </div>
                        </div>


                        <div class="actions" id="actions">


                            <a href="delete_product.php?id=<?= encryptId($row_pr['id']) ?>">
                                <div class="delete">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                            </a>




                            <a href="update_product.php?id=<?= encryptId($row_pr['id']) ?>">
                                <div class="update">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </div>
                            </a>

                        </div>





                    </div>


                    <?php } ?>



                    <div class="but_container">
                        <a href="ajouter.html">

                            <button class="tooltip" id="btn_ajouter">
                                <ion-icon name="add"></ion-icon>

                            </button>
                        </a>
                    </div>



                </div>
            </div>
        </div>






    </section>

    <script>
    const btn_ajouter = document.getElementById("btn_ajouter");
    const ajouter = document.getElementById("ajouter");
    const body = document.getElementById("body");

    ajouter.style.top = "-100%";
    body.style.overflowY = "scroll";

    document.getElementById("btn_ajouter").onclick = function() {
        if (ajouter.style.top === "-100%") {
            ajouter.style.top = "0%";
            body.style.overflowY = "hidden";
        } else {
            ajouter.style.top = "-100%";
            body.style.overflowY = "scroll";
        }
    };
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>