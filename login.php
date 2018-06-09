<?php

if($_POST){
    include("inc/utils.php");
    $conn = getConn();

    if($conn){
      $result =   getuser($conn, $_POST['email'], $_POST['senha']);

      if($result->num_rows==1){

            $user = mysqli_fetch_object($result);
            if(session_start()){
                $_SESSION['AUTH'] = true;
                $_SESSION["USER_LOGGED_ID"]=$user->id;
                $_SESSION["USER_LOGGED_NAME"]=$user->nome;
                $_SESSION["USER_LOGGED_EMAIL"]=$user->email;
                header("Location:bemvindo.php");
            }
      
      }else{
        header("Location:index.php?r=user_not_found");
      }
      
      

    }else{
        header("Location: index.php?r=withoud_conn");
    }

    
}else{
    header("Location: index.php?r=withoud_post");
}


?>