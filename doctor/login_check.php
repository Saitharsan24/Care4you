<?php
    session_start(); 

    if(!$_SESSION['logged']){
        header("Location: ../signin.php");
        exit();
    }
?>