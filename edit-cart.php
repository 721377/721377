

<?php

include 'dbcon.php';

if(isset($_GET['qte'])){
    $qty = $_GET['qte'];
    $id= $_GET['id'];
    $id_plat= $_GET['id_plat'];
    $conn->query("UPDATE panier_locale set qty = '$qty' where id_table = $id and id_plat = '$id_plat'");
    }
   



?>