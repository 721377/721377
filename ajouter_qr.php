<?php


include 'dbcon.php';


if(isset($_POST['qrbutton'])){
    $qrtext =mysqli_real_escape_string($conn , $_POST['qrtext']);
    $qrid =mysqli_real_escape_string($conn ,  $_POST['qrid']);

    $msg = "table already exist";


    $select = "SELECT id_table FROM qr_code WHERE id_table = ?";
    
    $stmt1 = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt1 , $select)){
        echo("Error") ; 
    }
    else{
        mysqli_stmt_bind_param($stmt1 , "i" ,$qrid);
        mysqli_stmt_execute($stmt1);
        $chek = mysqli_stmt_get_result($stmt1) ; 
    }

    
    if(mysqli_num_rows($chek)<1){
        $sql = "INSERT INTO `qr_code`(`id_table`, `qr_img`) VALUES (?,?)";
        $stmt2 = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2 , $sql)){
            echo("Error") ; 
        }
        else{
            mysqli_stmt_bind_param($stmt2 , "is" ,$qrid,$qrtext);
            mysqli_stmt_execute($stmt2);
            $chek = mysqli_stmt_get_result($stmt2) ; 
            header('location:settings.php');
        }
        
    }else{
        echo ("<script>alert('$msg'); </script>");
    }


}

?>