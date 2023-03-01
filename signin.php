<?php include('./config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"> 
    <title>SignIn</title>
</head>
<body>

    <!-- Nav bar -->
    <div class="navbar">
        <a href="./index.php"><img src="./images/logo.png" alt="logo" class="logo"></a>
        <div class="nav-link">
            <div class="normal-link">
                <div class="nav-item item1 active-home"><a href="./index.php">Home</a></div>
                <div class="nav-item item2"><a href="./services.php">Services</a></div>
                <div class="nav-item item3"><a href="./about.php">About</a></div>
                <div class="nav-item item4"><a href="./contactus.php">Contact Us</a></div>   
            </div>  
            <a href="./signin.php" class="nav-signin"><div class="item5 active-btn">Sign In</div></a>
            <div class="divider"></div>
            <a href="./signup.php" class="nav-signin"><div class="item6">Sign Up</div></a>
        </div>
    </div>

    <!-- Sign in form -->
    <div class="wrapper">
    <div class= "container">
    <div class="container_content">
    <div class="container_content_inner">
        <form class="form-signin" action="#" method="POST">       
            <h2 class="form-signin-heading">Sign In</h2>
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
            <div class="par">
            <p class="form-signin-username">User Name</p>
            <input type="text" class="form-control" name="username" placeholder="Enter username here" required="" autofocus="true"/><br />
            
            <p class="form-signin-password">Password</p>
            <input type="password" class="form-control" name="password" placeholder="Enter password here" required=""/>

            <div  class="forgot-password">
                <a href="" class="forgot-password">Forgot password?</a>
            </div>

            <br />
            <br />

            <a href="signup.php" class="donothave-account">Do not have an account?</a>  

            <button class="btn signin" name="submit" type="submit">Sign In</button>
            </div>   
        </form>
    </div> 
    </div> 
    </div> 
    </div>
    <div class="overlay"></div>
</body>
</html>

<?php
    
    //Check Login Button is Clicked or Not?
    if(isset($_POST['submit']))
    {
        
        //Process for Login
        //Step 01 - Get the data from the login form
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Step 02 - SQL Query to check the username and password existance
        $sql = "SELECT * FROM tbl_sysusers WHERE username='$username'";

        //Step 03 - Execute the SQL Query
        $res = mysqli_query($conn,$sql);

        //Step 04 - Count rows to check the user exists or not
        $count = mysqli_num_rows($res); 

        if($count == 1)
        {
            
            $row = mysqli_fetch_assoc($res);
            if(password_verify($password,$row['password']) && $row['status']==1)
            {

                $userid = $row['userid'];
                $usertype = $row['actortype'];

                if($usertype=="doctor")
                {
                    //User exists and Login Success
                    $_SESSION['login'] = "<div class='success'>Login Successful</div>";

                    //To check whether the user is logged or not
                    $_SESSION['user'] = $username;

                    //Redirect to home page
                    header('location:'.SITEURL.'doctor/doctorHome.php');
                }
                elseif($usertype=="pharmacist")
                {
                    //User exists and Login Success
                    $_SESSION['login'] = "<div class='success'>Login Successful</div>";

                    //To check whether the user is logged or not
                    $_SESSION['user'] = $username;

                    //Redirect to home page
                    header('location:'.SITEURL.'pharmacy/pharmacy_home.php');
                }
                elseif($usertype=="labtec")
                {
                    //User exists and Login Success
                    $_SESSION['login'] = "<div class='success'>Login Successful</div>";

                    //To check whether the user is logged or not
                    $_SESSION['user'] = $username;

                    //Redirect to home page
                    header('location:'.SITEURL.'laboratory/lab_home.php');
                }
                elseif($usertype=="assistant")
                {
                    //User exists and Login Success
                    $_SESSION['login'] = "<div class='success'>Login Successful</div>";

                    //To check whether the user is logged or not
                    $_SESSION['user'] = $username;

                    //Redirect to home page
                    header('location:'.SITEURL.'assistant/asst_home.php');
                }
                elseif($usertype=="admin")
                {
                    //User exists and Login Success
                    $_SESSION['login'] = "<div class='success'>Login Successful</div>";

                    //To check whether the user is logged or not
                    $_SESSION['user'] = $username;

                    //Redirect to home page
                    header('location:'.SITEURL.'admin/admin_home.php');
                }
                else
                {
                    //User exists and Login Success
                    $_SESSION['login'] = "<div class='success'>Login Successful</div>";

                    //To check whether the user is logged or not
                    $_SESSION['user'] = $username;

                    //Redirect to home page
                    header('location:'.SITEURL.'patient/patient_home.php');
                }
            }
            elseif($row['status']==0)
            {
             //User not found and Login Fail
             $_SESSION['login'] = "<div class='error'>User doesn't exists!</div>";

             //Redirect to login page
             header('location:'.SITEURL.'signin.php');       
            }
            else
            {
                //User not found and Login Fail
                $_SESSION['login'] = "<div class='error'>Incorrect Password!</div>";

                //Redirect to login page
                header('location:'.SITEURL.'signin.php');
            }
        }
        else
        {
            //User not found and Login Fail
            $_SESSION['login'] = "<div class='error'>User doesn't exists!</div>";

            //Redirect to login page
            header('location:'.SITEURL.'signin.php');
        }
    }

?>