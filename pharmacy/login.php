<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
    <title>Pharmacy</title>
</head>
<body>

    <!--Login Form Starts-->
    <table class="tbl-login">
        <tr>
            <td class="tdtype01">
                <div class="login-text01">Login</div>
                <div class="login-text02">Pharmacist Dashboard</div>
                <img src="../images/pharm-login.png" class="login-imgframe" />
            </td>
            <td class="tdtype02">
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
                <br/> <br/>
                <form action="" method="POST">
                    <input type="text" name="username" placeholder="Enter Username" class="login__input"><br/> <br />
                    <input type="password" name="password" placeholder="Enter Password" class="login__input"><br /><br />
                    <input type="submit" name="submit" value="Login" class="login__submit">
                    <br />   
                </form>
                <br/> 
                <div class="login-text03"><a href="#">Forgot Password</a></div>
            </td>
        </tr>
    </table>
    <!--Login Form Ends-->

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
        $sql = "SELECT * FROM tbl_pharmacist WHERE username='$username' AND password='$password'";

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
            header('location:'.SITEURL.'pharmacy/pharmacy_home.php');

        }
        else
        {
            //User not found and Login Fail
            $_SESSION['login'] = "<div class='error'>Username or Password did not match</div>";

            //Redirect to login page
            header('location:'.SITEURL.'pharmacy/login.php');
        }
    }

?>