<?php

    //Inlcude Constants
    include('../config/constants.php');

    //Destroy the session and redirect to  login page
    session_destroy();  //unsets $_SESSION['user']
    
    header('location:'.SITEURL.'laboratory/login.php');
    
?>