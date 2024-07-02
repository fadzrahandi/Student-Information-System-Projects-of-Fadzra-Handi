<?php

include_once("connections/connection.php");


$con = connection();
$id = $_GET['delete'];

$sel = "SELECT * FROM students WHERE id = '$id' ";
$userr = $con -> query ($sel) or die ($con -> error);
$row = $userr -> fetch_assoc();

    $sql = "DELETE FROM students  WHERE id = '$id' ";
    $user = $con -> query ($sql) or die ($con -> error);



    if($user){
        $_SESSION['delete'] = $row['id'];
        header("location:crud.php ");
        
    }


    // $_SESSION['status'] = "Data has been deleted";
    // echo header("Location: studentdata.php");
   
// }