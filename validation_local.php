<?php
include 'dbcon.php';

session_start();
$id_table = $_SESSION['id_table'];

$stmt = $conn->stmt_init();
$select = "SELECT `id_plat` , `qty` FROM `panier_locale` WHERE id_table = ?";

if (!mysqli_stmt_prepare($stmt, $select)) {
    echo "errer de selection !!!";
} else {
    mysqli_stmt_bind_param($stmt, "i", $id_table);
    mysqli_stmt_execute($stmt);
    $result_select = mysqli_stmt_get_result($stmt);
}

while ($row = mysqli_fetch_row($result_select)) {

    $insert = "INSERT INTO `commands_locale`(`id_plat`, `id_table` , `qte`) VALUES (?,?,?)";

    if (!mysqli_stmt_prepare($stmt, $insert)) {
        echo "errer de insertion !!!";
    } else {
        mysqli_stmt_bind_param($stmt, "iii", $row[0], $id_table, $row[1]);
        mysqli_stmt_execute($stmt);

        $delete = "DELETE FROM `panier_locale` WHERE id_table = ?";

        if (!mysqli_stmt_prepare($stmt, $delete)) {
            echo "errer de suppretion !!!";
        } else {
            mysqli_stmt_bind_param($stmt, "i", $id_table);
            mysqli_stmt_execute($stmt);
            header('location:menu.php?id=' . $id_table);
        }
    }
}
