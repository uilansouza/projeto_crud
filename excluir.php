<?php
include_once "inc/utils.php";
var_dump($_POST);

$conn = getConn();

if($conn && $_POST) {

    if(removeProducts($conn, $_POST['id'])){
        header("Location: lista.php?action=remove&message=success");
    }else{
        header("Location:lista.php?action=remove&message=failed");
    } 
}





?>