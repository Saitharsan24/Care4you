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
    
    <?php

    //starting session
    if (session_status() === PHP_SESSION_DISABLED) {
        session_start();
    }

    //Retrieve session variables
    $email = $_SESSION['email'];
    $otp_id = $_SESSION['otp_id'];

    $passwordErr = $confirmPasswordErr = '';
    $isValid = true;
    
    function validateInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
        
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $password = $_POST['password'];
        $confirmPass = $_POST['confpass'];

        //validating password
        if(empty($password)){
            $passwordErr = "*Password is required";
            $isValid = false;
        } elseif(strlen($password) < 8){
            $passwordErr = "*Must have atleast 8 characters";
            $isValid = false;
        } elseif(!preg_match("#[a-z]+#", $password)){
            $passwordErr = "*Must have atleast one lowercase letter";
            $isValid = false;
        } elseif(!preg_match("#[A-Z]+#", $password)){
            $passwordErr = "*Must have atleast one uppercase letter";
            $isValid = false;
        } elseif(!preg_match("#[0-9]+#", $password)){
            $passwordErr = "*Must contain atleast one number";
            $isValid = false;
        } elseif(!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $password)){
            $passwordErr = "*Must contain atleast one special character";
            $isValid = false;
        }

        if(empty($confirmPass)){
            $confirmPasswordErr = "*Please confirm password";
            $isValid = false;
        } else{
            if($password != $confirmPass){
                $confirmPasswordErr = "*Passwords do not match";
                $isValid = false;
            }
        }

        //confirming validity and updating the password
        if( $isValid == true){
                
                    //hasing the password
                    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

                    //query for updating password
                    $sql = "UPDATE tbl_sysusers SET password = '$hashPassword' WHERE email = '$email'";
                    $query = mysqli_query($conn, $sql) or die(mysqli_error());

                    //making the OTP code used
                    $sql = "UPDATE tbl_password_reset SET used = 1 WHERE id = '$otp_id'";
                    $query = mysqli_query($conn, $sql) or die(mysqli_eror());

                    session_destroy();   
                    header("Location: signin.php");
       
        }
    } 
    ?>


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
        <div class= "container2 container2mod reset-pass-container">
        <div class="container_content2">
        <div class="container_content_inner2">
            <div class="fgtpwd-heading">Reset Password</div><br/>
            
                <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div class="fgtpwd-txt">New Password</div>
                    <input type="password" class="fgtpwd-pwd" name="password" placeholder="Enter a password" required onchange="try{setCustomValidity('')}catch(e){}"/>
                    <p class="forgot-err-msg"><?php echo $passwordErr;?></p>

                    <div class="fgtpwd-txt" style="margin-top: 10px;">Confirm Password</div>
                    <input type="password" class="fgtpwd-pwd" name="confpass" placeholder="Confirm password" required onchange="try{setCustomValidity('')}catch(e){}"/>
                    <p class="forgot-err-msg"><?php echo $confirmPasswordErr;?></p>
                    <br/>
                <input type="submit" class="btn_continue reset-btn" name="verify" value="Reset">
                </form>

        </div> 
        </div> 
        </div> 
        </div>
        <div class="overlay"></div>
    </div>
</body>
</html>