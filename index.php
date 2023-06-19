<?php
include 'cryptfunction.php';
include 'dbcon.php';
session_start();

$stmt = $conn->stmt_init();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/online.css" />
    <title>gardpage</title>
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

<header>

  <div class="search-menu">

      <div class="menu" id="me">
          <i class="bi bi-chevron-compact-down"></i>
           <h6>menu</h6>
       </div>

      <div class="search">
          <i class="bi bi-search"></i>
          <input type="text" id="search" onkeyup="search()" placeholder="chercher" />
      </div>
     
  </div>



 
  <a href="cart_online.php" class="bag">
      
      <i class="bi bi-bag">
          <div class="count"><h6>1</h6></div>
      </i>
  </a>
</header>

<div class="menu-toogle">
  <div class="menu-head">
<div class="close" id="close"><i class="bi bi-x-lg"></i></div>
<div class="search-bag">
  <i class="bi bi-search"></i>
 
</div>

      </div>
  <ul>
      <li><a href="">jeans</a></li>
      <li><a href="">t-shert</a></li>
      <li><a href="">jacket</a></li>
      <li><a href="">denim</a></li>
      <li><a href="">footwear</a></li>
      <li><a href="">sockes</a></li>
  </ul>

</div>

<div class="home">
  <div class="arrow l" onclick="prev()">
      <i class="bi bi-chevron-compact-left"></i>
  </div>
  <div class="slide slide-1">
  <video src="images/spread2.mp4" autoplay loop muted></video>
  </div>
  <div class="slide slide-2">
 <video src="images/spread2.mp4" autoplay loop muted></video>
 </div>
 <div class="slide slide-3">
 <video src="images/spread2.mp4"  autoplay loop muted></video>
 </div>
 <div class="arrow r" onclick="next()">
  <i class="bi bi-chevron-compact-right"></i>
  </div>
</div>

<script>
  let slide = document.querySelectorAll('.slide');
  var current = 0;

  function cls(){
      for(let i = 0; i < slide.length; i++){
            slide[i].style.display = 'none';
      }
  }

  function next(){
      cls();
      if(current === slide.length-1) current = -1;
      current++;

      slide[current].style.display = 'block';
      slide[current].style.opacity = 0.4;

      var x = 0.4;
      var intX = setInterval(function(){
          x+=0.1;
          slide[current].style.opacity = x;
          if(x >= 1) {
              clearInterval(intX);
              x = 0.4;
          }
      }, 100);

  }

  function prev(){
      cls();
      if(current === 0) current = slide.length;
      current--;

      slide[current].style.display = 'block';
      slide[current].style.opacity = 0.4;

      var x = 0.4;
      var intX = setInterval(function(){
          x+=0.1;
          slide[current].style.opacity = x;
          if(x >= 1) {
              clearInterval(intX);
              x = 0.4;
          }
      }, 100);

  }

  function start(){
      cls();
      slide[current].style.display = 'block';
  }
  start();
</script>

    <div class="phone">
        <a href="tel:+212643032723">
            <i class="fa-solid fa-phone"></i>
        </a>
    </div>

    <section class="menu_section" id="menu">
        <div class="container" id="container">
            <div class="category_container" id="category_container">
                <div class="category">
                    <a href="#category1">
                        <i class="fa-solid fa-burger"></i>
                        <h3>Burgers</h3>
                    </a>
                </div>
                <div class="category">
                    <a href="#category2">
                        <i class="fa-solid fa-burger"></i>
                        <h3>Salads</h3>
                    </a>
                </div>
                <div class="category">
                    <a href="#category3">
                        <i class="fa-solid fa-burger"></i>
                        <h3>Pizza</h3>
                    </a>
                </div>
                <div class="category">
                    <a href="#category4">
                        <i class="fa-solid fa-cookie"></i>
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

                                <?php

                                if (!isset($_SESSION['user_id'])) { ?>

                                    <a href="login_user.php"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="add_panier_online.php?id_plat= <?php echo encryptId($row_burgers['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                }
                                ?>

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
                                <?php

                                if (!isset($_SESSION['user_id'])) { ?>

                                    <a href="login_user.php"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="add_panier_online.php?id_plat= <?php echo encryptId($row_salad['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                }
                                ?>
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
                                <?php

                                if (!isset($_SESSION['user_id'])) { ?>

                                    <a href="login_user.php"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="add_panier_online.php?id_plat= <?php echo encryptId($row_pizza['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                }
                                ?>
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
                                <?php

                                if (!isset($_SESSION['user_id'])) { ?>

                                    <a href="login_user.php"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="add_panier_online.php?id_plat= <?php echo encryptId($row_Sushi['id']) ?>"><i class="fa-solid fa-plus"></i></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
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
        var searsh = document.getElementById('searsh_icon');
        var searsh_bar = document.querySelector('.searsh');
        var delete_searsh = document.getElementById('delete_searsh');

        searsh_bar.style.width = '40px';

        searsh.onclick = function() {
            if (searsh_bar.style.width === '40px') {
                searsh_bar.style.width = '35%';
            } else {
                searsh_bar.style.width = '40px';
            }
        };

        delete_searsh.onclick = function() {
            document.getElementById('search').value = '';
        };

        function search() {
            let filter = document.getElementById('search').value.toUpperCase();

            let item = document.querySelectorAll('.card');

            let l = document.getElementsByTagName('h3');

            for (var i = 0; i <= l.length; i++) {
                let a = item[i].getElementsByTagName('h3')[0];

                let value = a.innerHTML || a.innerText || a.textContent;

                if (value.toUpperCase().indexOf(filter) > -1) {
                    item[i].style.display = '';
                    item[i].style.visibility = 'visible';
                } else {
                    item[i].style.display = 'none';
                    item[i].style.visibility = 'hidden';
                }
            }
        }

        const nav = document.getElementById('nav');
        const menu_btn = document.getElementById('menu_btn');

        if (window.matchMedia('(max-width:1100px)').matches) {
            nav.style.width = '70px';
            nav.style.height = '0vh';
        } else {
            nav.style.width = '0%';
            nav.style.height = '100%';
        }

        menu_btn.onclick = function() {
            if (window.matchMedia('(max-width:1100px)').matches) {
                if (nav.style.height === '0vh') {
                    nav.style.height = '50vh';
                } else {
                    nav.style.height = '0vh';
                }
            } else {
                if (nav.style.width === '0%') {
                    nav.style.width = '40%';
                } else {
                    nav.style.width = '0%';
                }
            }
        };

        const user_btn = document.getElementById('user_btn');
        const user_div = document.querySelector('.user_div');
        user_div.style.height = '0px';

        user_btn.onclick = function() {
            if (user_div.style.height === '0px') {
                user_div.style.height = '140px';
                user_btn.className = 'fa-solid fa-angle-up';
            } else {
                user_div.style.height = '0px';
                user_btn.className = 'fa-solid fa-angle-down';
            }
        };
    </script>

    <script>
         window.addEventListener("scroll", function(){
     
       var header= document.querySelector("header");
       header.classList.toggle("sticky", window.scrollY > 0);
   
   })


  </script>
    </script>
</body>

</html>