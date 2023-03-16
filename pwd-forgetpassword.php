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
        <div class= "container2">
        <div class="container_content2">
        <div class="container_content_inner2">
            <div class="fgtpwd-heading">Reset Password</div><br/>
            <div class="fgtpwd-txt">Enter the email address associated with your account and to get the OTP code.</div>
            <form class="form-signin" method="POST">
                <input type="email" class="fgtpwd-input" name="email" pattern="^[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="Enter your Email Address Here" required="" /><br/>
                <input type="submit" class="btn_continue" name="continue" value="Continue">
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
    // if(isset($_POST['continue'])){
    //     // Get user email input
    //     $email = $_POST['email'];

    //     // Generate a 6-digit OTP
    //     $otp = rand(100000, 999999);

    //     // Send the OTP to user's email
    //     $to = $email;
    //     $subject = "CareForYou Password Reset - One Time Password";
    //     $message = "Your OTP is ".$otp;
    //     $headers = "From: me@example.com" . "\r\n" .
    //             "Reply-To: me@example.com" . "\r\n" .
    //             "X-Mailer: PHP/" . phpversion();

    //     if(mail($to, $subject, $message, $headers)){
    //         // Redirect to OTP verification page
    //         header('Location: pwd-verifyotp.php?email=' . $email);
    //         exit();
    //     } else {
    //         echo "Failed to send OTP. Please try again later.";
    //     }
    // }
?>