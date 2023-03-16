<?php include('./config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"> 
    <title>Reset Password</title>
    <link rel="icon" type="images/x-icon" href="./images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="top">
        <div class="navbar">
            <a href="./index.php"><img src="./images/logo.png" alt="logo" class="logo"></a>
            <div class="nav-link">
                <div class="normal-link">
                    <div class="nav-item item1"><a href="./index.php">Home</a></div>
                    <div class="nav-item item2"><a href="./services.php">Services</a></div>
                    <div class="nav-item item3"><a href="./about.php">About</a></div>
                    <div class="nav-item item4"><a href="./contactus.php">Contact Us</a></div>   
                </div>  
                <a href="./signin.php" class="nav-signin"><div class="item5"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Sign In</div></a>
                <div class="divider"></div>
                <a href="./signup.php" class="nav-signin"><div class="item5"><i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Sign Up</div></a>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="fgtpwd-wrapper">
        <div class= "container2 container2mod">
        <div class="container_content2">
        <div class="container_content_inner2">
            <div class="fgtpwd-heading">Reset Password</div><br/>
            <form class="form-signin" method="POST">

                <div class="fgtpwd-txt">New Password</div>
                <input type="password" class="fgtpwd-pwd" name="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[!@#$%^&*()_+])[A-Za-z0-9!@#$%^&*()_+]{8,}$" placeholder="Enter a password" required="" oninvalid="setCustomValidity('Please enter a Password\n- contain one or more uppercase characters\n- contain one or more lowercase characters\n- contain one or more numeric values\n- contain one or more special characters\n- at least 8 characters long')" onchange="try{setCustomValidity('')}catch(e){}"/>

                <div class="fgtpwd-txt" style="margin-top: 10px;">Confirm Password</div>
                <input type="password" class="fgtpwd-pwd" name="confirmpassword" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[!@#$%^&*()_+])[A-Za-z0-9!@#$%^&*()_+]{8,}$" placeholder="Confirm password" required="" oninvalid="setCustomValidity('Please enter a Password\n- contain one or more uppercase characters\n- contain one or more lowercase characters\n- contain one or more numeric values\n- contain one or more special characters\n- at least 8 characters long')" onchange="try{setCustomValidity('')}catch(e){}"/>
                <br/>
            <input type="submit" class="btn_continue" name="verify" value="Reset">
            </form>
        </div> 
        </div> 
        </div> 
        </div>
        <div class="overlay"></div>
    </div>
</body>
</html>

<?php

?>