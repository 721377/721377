<?php
include 'dbcon.php';

session_start();



$afficher = "SELECT * FROM plat";
$result = mysqli_query($conn, $afficher);


   
    $cartafiche = "SELECT * FROM cart";
    $cart = mysqli_query($conn, $cartafiche);

    $sum = "SELECT SUM(price) FROM cart";
    $sum_price = mysqli_query($conn, $sum);
    $price_display = mysqli_fetch_assoc($sum_price);

$num = mysqli_num_rows($cart);

$disite = "SELECT * FROM site";
$sitresult= mysqli_query($conn, $disite);
$site = mysqli_fetch_assoc($sitresult);



?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>restaux</title>
</head>

<body>



    <header>
        <span>
            <div class="menu">
                <div class="me" id="me">Menu</div>
                <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </span>
        <span>
            <div class="cart" id="cart">
                <div id="point" class="point"><?= $num?></div>
                <i class='bx bx-cart'></i>
            </div>
        </span>
    </header>



    <section class="home">

        <div class="nav" id="nav">
            <i id="cl" class="fa-solid fa-xmark"></i>
            <ul>
                <li><a href="">HOME</a></li>
                <li><a href="">PLAT</a></li>
                <li><a href="">About</a></li>
                <li><a href="loginuser.php">S'INSCRIRE</a></li>
            </ul>
            <div class="log">
                <a href="dashboard.php">2023©</a>
            </div>
        </div>

        <div class="point-vende">

        </div>

        <div class="panel">
            <div class="header-name">Tcha'Chiz</div>
            <div class="tel-menu">
                <a class="tele" href="tel:+212 <?= $site['tele'] ?>"><i class='bx bx-mobile-alt'></i> commande
                    telephonique</a>
                <a class="dload" href="img/chop.jpeg" download=""><img src="img/2187458.png" alt=""
                        srcset="">telecharger le menu</a>
            </div>
        </div>

        </div>

        <div class="container">
            <div class="images">
                <span class="imgHomeSpan">
                    <div class="imgHome img6"></div>
                </span>
                <span>
                    <div class="img img1"></div>
                </span><span>
                    <div class="img img2"></div>
                </span><span>
                    <div class="img img3"></div>
                </span><span>
                    <div class="img img4"></div>
                </span>
                <span>
                    <div class="img img5"></div>
                </span>
            </div>
        </div>


        <div id="cart-home" class="cart-home">
            <div class="head">
                <p>votre panier</p>
                <i id="closen" class="fa-solid fa-xmark"></i>
            </div>
            <div class="cart-body">
                <div id="count" class="product-cart-contain">

                    <?php while ($rowcart = mysqli_fetch_assoc($cart)) { ?>

                    <div class="product-cart">
                        <div class="detai">
                            <img src="img/<?php echo ($rowcart['img']) ?>" alt="" srcset="" class="cart-img">
                            <div class="plat-info">
                                <p class="plat-nom"><?php echo ($rowcart['nomplat']) ?></p>
                                <p class="plat-prix"><?php echo ($rowcart['price']) . " Dhs" ?></p>
                            </div>
                        </div>
                        <div class="controls">
                            <form method="post" class="quantity">
                                <i class="fa-solid fa-minus decr"></i>
                                <input type="text" name="quant" class="quantity-num" value="1">
                                <i class="fa-solid fa-plus incr"></i>

                            </form>

                            <a href="deletecart.php?id=<?=($rowcart['id']) ?>" class="trash" id="supp"><i
                                    class="fa-solid fa-trash"></i></a>
                        </div>

                    </div>
                    <?php } ?>

                </div>
                <div class="bottom">
                    <div class="contain">
                        <div class="topay">
                            <p>Totale : </p>
                            <input type="text" name="" id="" value="<?php echo implode($price_display); ?>Dhs"
                                class="total">
                        </div>

                        <a href="validation.php" class="valider-panier">valider mon panier</a>

                    </div>
                </div>
            </div>

        </div>
        </div>


        <div id="cart2" class="cart-bottom">
            <i class='bx bx-cart'></i>
            <div class="p">
                nombre items <span id="point2"> ( <?= $num?> )</span>
            </div>

        </div>
    </section>


    <section class="allproduct" id="tacos">

        <div class="contain">
            <?php  while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="food">
                <a href="" class="img-pro">

                    <img src="img/<?= ($row['img'])?>" alt="" srcset="">

                </a>
                <div class="details">
                    <div class="title">
                        <p class="tit"><?= ($row['nomplat'])?></p>

                    </div>
                    <div class="prix-add">
                        <p class="prix"><?= ($row['price'])?>Dhs</p>
                        <p class="old-price"><?php
        if(empty($row['oldprice'])){
            echo "";
                
        }else{
            echo ($row['oldprice']." Dhs");   
        }
        ?></p>

                    </div>
                </div>
                <a href="cart.php?id=<?= ($row['id'])?>" class="add-carts"><i class="fa-solid fa-plus"></i></a>
            </div>

            <?php } ?>



        </div>
    </section>

    <footer id="foter">
        <div class="foot-con">
            <h3>Tcha'Chiz</h3>


            <div class="form-map">
                <div class="about">
                    <h4>A propos</h4>
                    <p>“<?= $site['about'] ?>.”</p>
                    <div class="links-text">
                        <div class="link">
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-youtube'></i></a>
                        </div>
                        <form method="post" class="support">
                            <div class="fd-badck">
                                <input type="text" name="star" class="fd-text" placeholder="votre commentaire" id="">
                                <input type="submit" name="sent" class="sub" value="G0">
                            </div>

                        </form>
                    </div>
                    <a class="tele-bot" href="tel:+212 <?= $site['tele'] ?>"><i
                            class='bx bx-mobile-alt'></i>0<?= $site['tele'] ?></a>
                </div>
                <div class="map-content">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1244.8994559610856!2d-7.678460389637037!3d33.55245429312344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62d10710e8971%3A0xfefb2078c629bd87!2sMIAR-PAP!5e0!3m2!1sfr!2sma!4v1661178334447!5m2!1sfr!2sma"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <script src="myjs/index.js"></script>

    <script>
    const timeline = gsap.timeline();
    timeline
        .to(".img", {
            delay: 1,
            stagger: {
                amount: 1.8,
                from: "end",
            },
            ease: "sine.inOut",
            y: 350,
        })

        .to(".imgHomeSpan", {
            scale: 1.6,
            ease: "sine.inOut",
            duration: 1,
        });

    timeline.from(
        ".menu, .cart", {
            y: "-50",
            stagger: {
                amount: 0.5,
            },
        },
        "-=1"
    );

    window.addEventListener("scroll", function() {

        var anicart = document.querySelector(".cart-bottom");
        anicart.classList.toggle("sticky", window.scrollY > 0);

    })



    const pointvende = document.querySelector(".point-vende");

    const date = new Date();;
    const hour1InUTC = date.getUTCHours();


    if (hour1InUTC > 21 || hour1InUTC < 9) {

        pointvende.style.color = "#e7674c";
        pointvende.innerHTML = "point de vende fermer";

    } else {
        pointvende.style.color = "#e2fe8c";
        pointvende.innerHTML = "point de vende ouvert";
    }



    var menu = document.getElementById('me');
    const nav = document.getElementById('nav');
    var cl = document.getElementById('cl');
    menu.onclick = function() {
        nav.style.left = "0";
        console.log('works');
    }
    cl.onclick = function() {
        nav.style.left = "-100%";
        console.log('works');
    }
    </script>
</body>

</html>