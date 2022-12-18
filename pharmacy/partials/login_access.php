<?php 
    
    //Authentication - Access Control
    //Check whether the user is logged in or not

    if(!isset($_SESSION['user'])) //User is not logged in 
    {
        
        $_SESSION['no-login-message'] = "<div class='error'>Please login to access Dashboard</div>";
        
        //Redirect to login page
        header('location:'.SITEURL.'pharmacy/login.php');

    }

?>