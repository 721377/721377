<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>
    <div class="sidebar_container" id="nav">
        <div class="logo">
            <a href="#">
                <img src="images/OIP.jpg" alt="">
            </a>
        </div>
        <nav>
            <ul>
             <li>
                    <a href="dashboard.php">
                        <div class="icon">
                            <ion-icon name="bag-outline"></ion-icon>
                        </div>
                        <div class="text">
                            <h6>Commands</h6>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="stastique.php">
                        <div class="icon">
                            <ion-icon name="stats-chart-outline"></ion-icon>
                        </div>
                        <div class="text">
                            <h6>Statistique</h6>
                        </div>
                    </a>
                </li>


                <li>
                    <a href="settings.php">
                        <div class="icon">
                            <ion-icon name="cog-outline"></ion-icon>
                        </div>
                        <div class="text">
                            <h6>Parametrs</h6>
                        </div>
                    </a>
                </li>


                <li>
                    <a href="product.php">
                        <div class="icon">
                            <ion-icon name="fast-food-outline"></ion-icon>
                        </div>
                        <div class="text">
                            <h6>Produits</h6>
                        </div>
                    </a>
                </li>

            </ul>
        </nav>

        <div class="user">
            <a href="#">

                <img src="images/images (2).jpeg" alt="">
            </a>
        </div>


        <div class="mover" id="mover">
            <i class="fa-solid fa-angle-up"></i>
        </div>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
    const nav = document.getElementById("nav");
    const mover = document.getElementById("mover");

    if (window.matchMedia("(max-width:610px)").matches) {

        nav.style.left = "-80px";

        mover.onclick = function() {
            if (nav.style.left === "-80px") {
                nav.style.left = "0px";
            } else {
                nav.style.left = "-80px";
            }
        }
    }
    </script>
</body>

</html>
