<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> 
    <title>Laboratory</title>
</head>
<body>

    <!-- Nav bar -->
    <div class="navbar">
        <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
        <div class="nav-link">
            <div class="normal-link">
                <div class="nav-item item1 active-home"><a href="../index.php">Home</a></div>
                <div class="nav-item item2"><a href="../services.php">Services</a></div>
                <div class="nav-item item3"><a href="../about.php">About</a></div>
                <div class="nav-item item4"><a href="../contactus.php">Contact Us</a></div>   
            </div>  
            <a href="../signin.php" class="nav-signin"><div class="item5 active-btn">Sign In</div></a>
            <div class="divider"></div>
            <a href="../signup1.php" class="nav-signin"><div class="item6">Sign Up</div></a>
        </div>
    </div>

    <!-- Sign in form -->
    <div class="wrapper">
        
        <form class="form-signin" method="POST">
            <br />      
            <h2 class="form-signin-heading">Log In - Laboratory</h2>
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);

                }
            ?>
            <p class="form-signin-username">User Name</p>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required="" autofocus="true"/><br />
            
            <p class="form-signin-password">Password</p>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required=""/>
            
            <div  class="forgot-password">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            <br />

            <!-- <a href="./signup1.php" class="donothave-account">Do not have an account?</a>   -->

            <button class="btn signin" type="submit" name="submit" style="margin-left:0px;">Log In</button>   
        </form>
    </div>

</body>
</html>

<?php

    //Check Login Button is Clicked or Not?
    if(isset($_POST['submit']))
    {
        //Process for Login
        //Step 01 - Get the data from the login form
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,md5($_POST['password']));

        //Step 02 - SQL Query to check the username and password existance
        $sql = "SELECT * FROM tbl_labtec WHERE username='$username' AND password='$password'";

        //Step 03 - Execute the SQL Query
        $res = mysqli_query($conn,$sql);

        //Step 04 - Count rows to check the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //User exists and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";

            //To check whether the user is logged or not
            $_SESSION['user'] = $username;

            //Redirect to home page
            header('location:'.SITEURL.'laboratory/lab_home.php');

        }
        else
        {
            //User not found and Login Fail
            $_SESSION['login'] = "<div class='error'>Username or Password did not match</div>";

            //Redirect to login page
            header('location:'.SITEURL.'laboratory/login.php');
        }
    }

?>