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

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
            require './plugins/PHPMailer/vendor/autoload.php';
        
         //starting session
        if (session_status() === PHP_SESSION_DISABLED) {
            session_start();
        }

        $emailNotFound = "";

        // Function to validate input and prevent malicious code injection
        function validateInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get user email input
            $email = validateInput($_POST['email']);

            // checking the email address from database
            $sql = "SELECT email FROM tbl_sysusers WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                
                // Generate a 6-digit OTP
                $otp = str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT);
               
                //getting current timestamp
                $current_timestamp = time();

                // Insert the OTP data into the tbl_password_reset table
                $sql = "INSERT INTO tbl_password_reset (email, otp, created_at) VALUES ('$email','$otp','$current_timestamp')";
                $res = mysqli_query($conn, $sql) or die(mysqli_error());
               
                // Send the OTP code to the user's email address using PHPMailer

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();                                     //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                            //Enable SMTP authentication
                    $mail->Username   = 'care4u.242000@gmail.com';       //SMTP username
                    $mail->Password   = 'wiqcpxxdswcbfchw';              //SMTP password
                    $mail->SMTPSecure = 'ssl';                           //Enable implicit TLS encryption
                    $mail->Port       = 465;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('care4u.242000@gmail.com', 'Admin');
                    $mail->addAddress($email, '');                       //Add a recipient 
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'OTP code for password reset';
                    $mail->Body    = 'Your OTP code for password reset is: ' . $otp;
                
                    $mail->send();
                    echo 'Message has been sent';

                    //storing success message in session variable
                    $_SESSION['mailSent'] = "The OPT has been sent to your mail";
                    $_SESSION['email'] = $email;

                    // Redirect the user to the OTP verification page
                    header("Location: pwd-verifyotp.php?" . session_name() . '=' . session_id());
                    exit();

                } catch (Exception $e) {
                    $emailNotFound = "The OTP could not be sent. Try again! ".$mail->ErrorInfo;
                }
                
            } else {
                $emailNotFound = "*The user is not found !";
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
                <a href="./signin.php" class="nav-signin">
                    <div class="item5"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Sign In</div>
                </a>
                <div class="divider"></div>
                <a href="./signup.php" class="nav-signin">
                    <div class="item5"><i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Sign Up</div>
                </a>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="fgtpwd-wrapper">
            <div class="container2">
                <div class="container_content2">
                    <div class="container_content_inner2">
                        <div class="fgtpwd-heading">Reset Password</div><br />

                        <div class="fgtpwd-txt">Enter the email address associated with your account and to get the OTP code.</div>

                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="email" class="fgtpwd-input" name="email" pattern="^[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="Enter your Email Address Here" required="" /><br />
                            <p class="forgot-err-msg"><?php echo $emailNotFound;?></p>
                            <input type="submit" class="btn_continue forgot-continue" name="continue" value="Continue">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</body>

</html>
