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
    <link rel="stylesheet" href="css/settings.css">

    <title>Settings</title>
</head>

<body>
    <div class="container ">
        <div class="title">
            <h1>Paramètrs</h1>
        </div>

        <div class="blocks">


            <div class="card">
                <div class="image">
                    <img src="images/qr.png" alt="">
                </div>
                <div class="info">
                    <h3>QR Code</h3>

                    <h4><?php echo (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `qr_code`"))); ?></h4>
                </div>
                <button class="btn_card" id="qr_btn">
                    Cree Un Qr Code
                </button>
            </div>


            <div class="card">
                <div class="image">
                    <img src="images/user.png" alt="">
                </div>
                <div class="info">
                    <h3>Admins</h3>
                    <h4><?php echo (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `admins`"))); ?></h4>
                </div>
                <button class="btn_card" id="user_btn">
                    Tout Admins
                </button>
            </div>

        </div>





    </div>

    <div class="qr_generator">

        <div class="xmarks xmarks1">
            <img src="images/cross.png" alt="">
        </div>
        <div class="wrapper">
            <header>
                <h1>QR Code Generator</h1>
                <p>Paste a url or enter text to create QR code</p>
            </header>
            <form id="form_qr" class="form" method="post" action="ajouter_qr.php">
                <div class="input-group">
                    <input required="" type="text" name="qrid" spellcheck="false" autocomplete="off" class="inputqr">
                    <label class="user-label">Enter text or url</label>
                    <input type="hidden" id="qrsrc" value="" name="qrtext">
                </div>

                <button id="btn_qr" class="qrg" type="submit" name="qrbutton"> Generate QR Code</button>

            </form>
        </div>

        <div class="qr_table">
            <table>
                <thead class="thead">
                    <td>Code</td>
                    <td colspan="3">Nombre du Table</td>
                </thead>



                <tbody>

                    <?php
                    $select_qr = "SELECT `id_table`, `qr_img` FROM `qr_code`";

                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $select_qr)) {
                        echo "sql failed";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                    }

                    while ($row_qr = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr class="tr_qr">

                            <td> <img class="imgqr" src="<?php echo ($row_qr['qr_img']); ?>" alt=""> </td>
                            <td><?php echo ($row_qr['id_table']); ?></td>
                            <td class="del"><a href="delete_qr.php?id=<?= encryptId($row_qr['id_table']) ?>"><img class="dellimg" src="images/delete.png" alt=""></a></td>
                            <td class="del"><a href="images/<?php echo ($row_qr['qr_img']); ?>" download><img class="dellimg" src="images/file.png" alt=""></a></td>

                        </tr>

                    <?php } ?>

                </tbody>



            </table>

        </div>
    </div>




    <div class="users">

        <div class="cont">

            <div class="xmarks xmarks2">
                <img src="images/cross.png" alt="">
            </div>
            <div class="user_table">
                <table>
                    <thead class="thead">
                        <td>id</td>
                        <td>nom</td>
                        <td>email</td>
                        <td colspan="2">Action</td>
                    </thead>
                    <?php
                    $select_admin = "SELECT * FROM `admins`";


                    if (!mysqli_stmt_prepare($stmt, $select_admin)) {
                        echo "sql failed";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                    }

                    while ($row_admin = mysqli_fetch_assoc($result)) {
                    ?>

                        <tr class="tr">
                            <td><?php echo ($row_admin['id']) ?></td>
                            <td><?php echo ($row_admin['user_name']) ?></td>
                            <td><?php echo ($row_admin['email']) ?></td>
                            <td><a href=""><img src="images/trash.png" alt=""></a></td>
                            <td><a href=""><img src="images/edit (1).png" alt=""></a></td>
                        </tr>

                    <?php } ?>


                </table>
            </div>


            <div class="user_form" id="user_form">


                <div class="title">
                    <h3>Ajouter nouveau Admin</h3>
                </div>


                <form action="add_admin.php" method="post" enctype="multipart/form-data">

                    <div class="group">
                        <input required="" type="text" class="input" name="name">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Name</label>
                    </div>

                    <div class="group">
                        <input required="" type="email" class="input" name="email">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Email</label>
                    </div>



                    <div class="group">
                        <input required="" type="password" class="input" name="password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Password</label>
                    </div>



                    <div class="group">
                        <input required="" type="password" class="input" name="R_password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Confirm Password</label>
                    </div>

                    <div class="fill">
                        <label for="file_uplo" class="file_lab">
                            <input id="file_uplo" type="file" name="pic" />
                            <img src="images/file.png" alt="" />
                            Uplod the Picture
                        </label>
                    </div>



                    <div class="buttons">
                        <button class="back">Back</button>
                        <button class="btn" type="submit">ADD</button>
                    </div>
                </form>


            </div>




            <button class="tooltip" id="tooltip">
                <ion-icon name="add"></ion-icon>
                <span class="tooltiptext">Ajouter</span>
            </button>
        </div>
    </div>

    </div>













    <script>
        const wrapper = document.querySelector(".wrapper"),
            qrInput = wrapper.querySelector(".form input");

        const qrImg = document.getElementById("qrsrc");


        const generateBtn = document.getElementById("btn_qr");


        let preValue;

        generateBtn.addEventListener("click", () => {
            let qrValue = qrInput.value.trim();
            if (!qrValue || preValue === qrValue) return;

            preValue = 'http://localhost/restau-pfe/menu.php?id=' + qrValue;
            generateBtn.innerText = "Generating QR Code...";
            qrImg.value = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${preValue}`;

        });

        qrInput.addEventListener("keyup", () => {
            if (!qrInput.value.trim()) {
                wrapper.classList.remove("active");
                preValue = "";
            }
        });
    </script>



















    <script>
        const qr_btn = document.getElementById("qr_btn");
        const qr_generator = document.querySelector(".qr_generator");
        const xmarks1 = document.querySelector(".xmarks1");

        qr_generator.style.top = "-100%";

        if (sessionStorage.getItem("qr") === "false") {
            sessionStorage.setItem("qr", false);
        }

        const qrClick = () => {

            if (qr_generator.style.top === "-100%") {
                sessionStorage.setItem("qr", true);
                qr_generator.style.top = "0%";
            }

        }

        qr_btn.addEventListener("click", qrClick);

        if (sessionStorage.getItem("qr") === "true") {
            qr_generator.style.top = "0%";
        }





        xmarks1.onclick = function() {
            if (qr_generator.style.top === "0%") {
                qr_generator.style.top = "-100%";
                sessionStorage.setItem("qr", false);
            }
        }
    </script>










    <script>
        const user_btn = document.getElementById("user_btn");

        const users = document.querySelector(".users");
        const xmarks2 = document.querySelector(".xmarks2");

        users.style.top = "-100%";

        if (sessionStorage.getItem("user") === "false") {
            sessionStorage.setItem("user", false);
        }

        user_btn.onclick = function() {

            if (users.style.top === "-100%") {
                users.style.top = "0%";
                sessionStorage.setItem("user", true);
            }

        };

        if (sessionStorage.getItem("user") === "true") {
            users.style.top = "0%";
        }


        xmarks2.onclick = function() {
            if (users.style.top === "0%") {
                users.style.top = "-100%";
                user_form.style.marginRight = "-100%";
                sessionStorage.setItem("user", false);

            }
        };










        const tooltip = document.getElementById("tooltip");
        const user_form = document.getElementById("user_form");



        user_form.style.marginRight = "-100%";

        tooltip.onclick = function() {

            if (user_form.style.marginRight === "-100%") {
                user_form.style.marginRight = "0%";
            } else {
                user_form.style.marginRight = "-100%";
            }
        };

        document.getElementById("exit_userf").onclick = function() {
            if (user_form.style.marginRight === "0%") {
                user_form.style.marginRight = "-100%";
            }
        }








        document.addEventListener("keydown", e => {

            if (e.key.toLowerCase() === "x" && e.ctrlKey) {

                if (qr_generator.style.top === "0%") {
                    qr_generator.style.top = "-100%";
                    sessionStorage.setItem("qr", false);
                }


                if (users.style.top === "0%") {

                    if (user_form.style.marginRight === "0%") {
                        user_form.style.marginRight = "-100%"
                    } else {
                        users.style.top = "-100%";
                        sessionStorage.setItem("user", false);
                    }
                }
            }
        });


        document.addEventListener("keydown", e => {

            if (e.key.toLowerCase() === "p") {

                if (user_form.style.marginRight === "-100%") {
                    user_form.style.marginRight = "0%";
                }
            }
        });
    </script>





</body>

</html>
