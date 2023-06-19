<?php
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
</head>

<body onload="">
    <div class="header_container">
        <div class="header">
            <div class="cher">

                <input type="text" placeholder="Recherchez" name="" id="sersh"><i class='bx bx-search'></i>
            </div>
            <div class="set">
                <div class="message">
                    <i id="bell" class='bx bx-bell'></i>
                </div>
                <div class="setteng">
                    <i id="seting" class='bx bx-slider-alt'></i>
                </div>

            </div>
            <div class="log-out">
                <a href="logout.php">
                    <img src="images/exit.png" alt=""> deconnecter
                </a>
            </div>
        </div>


        <div class="Raccourcis" id="Raccourcis">
            <div class="rac">
                <h3>fermer</h3>
                <p>ctrl + "x" =><span> X-marks</span></p>
            </div>

            <div class="rac">
                <h3>ajouter</h3>
                <p>"p" =><span> "+"</span></p>
            </div>


            <div class="rac">
                <h3>Recherchez</h3>
                <p>Alt + "s" =><span> Pour effectuer une recherche </span></p>
            </div>

        </div>
    </div>




    <script>
    const sersh = document.getElementById("sersh");
    document.addEventListener("keydown", e => {

        if (e.key.toLowerCase() === "s" && e.altKey) {
            sersh.focus();
        }
    });



    const Raccourcis = document.getElementById("Raccourcis");

    Raccourcis.style.width = "0px";
    Raccourcis.style.height = "0px";


    document.getElementById("seting").onclick = function() {
        if (Raccourcis.style.width === "0px" && Raccourcis.style.height === "0px") {
            Raccourcis.style.width = "200px";
            Raccourcis.style.height = "250px";
        } else {
            Raccourcis.style.width = "0px";
            Raccourcis.style.height = "0px";
        }
    };
    </script>

</body>

</html>