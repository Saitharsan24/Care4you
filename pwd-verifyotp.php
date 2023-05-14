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
    //starting the session
    if (session_status() === PHP_SESSION_DISABLED) {
        session_start();
    }

    //Retrieving session variables
    $email = $_SESSION['email'];
    //$mailSent = $_SESSION['mailSent'];
    
    $otpErr = '';

    // Function to validate input and prevent malicious code injection
    function validateInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        //unsetting success message session variable
        $_SESSION['mailSent'] = '';

        //getting each digit of OTP
        $code1 = $_POST['code1'];
        $code2 = $_POST['code2'];
        $code3 = $_POST['code3'];
        $code4 = $_POST['code4'];
        $code5 = $_POST['code5'];
        $code6 = $_POST['code6'];

        //getting otp code
        $otp = $code1 . $code2 . $code3 . $code4 . $code5 . $code6;

        $current_timestamp = time();

        // Verify the OTP code
        $sql = "SELECT * FROM tbl_password_reset WHERE email = '$email' ORDER BY created_at DESC LIMIT 1 ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $row = $result->fetch_assoc();
        $tableOTP = $row['otp'];
        $otpTimeStamp = $row['created_at'];

        //Storing session varibles
        $_SESSION['email'] = $email;
        $_SESSION['otp_id'] = $row['id'];

        if ($otp == $tableOTP && ($current_timestamp - $otpTimeStamp) < 600 && $row['used'] == 0) {

            //Redirecting to password change page
            header("Location: pwd-resetpassword.php?" . session_name() . '=' . session_id());
            exit();

        } else {
            $otpErr = "*Invalid OTP number!";
        }

        //Retrieving session variables
        $email = $_SESSION['email'];
        //$mailSent = $_SESSION['mailSent'];

        $otpErr='';

         // Function to validate input and prevent malicious code injection
        function validateInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {

            //unsetting success message session variable
            $_SESSION['mailSent']= '';
            
            //getting each digit of OTP
            $code1= $_POST['code1'];
            $code2= $_POST['code2'];
            $code3= $_POST['code3'];
            $code4= $_POST['code4'];
            $code5= $_POST['code5'];
            $code6= $_POST['code6'];

            //getting otp code
            $otp= $code1.$code2.$code3.$code4.$code5.$code6;

            $current_timestamp = time();

            // Verify the OTP code
            $sql = "SELECT * FROM tbl_password_reset WHERE email = '$email' ORDER BY created_at DESC LIMIT 1 ";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());

            $row = $result -> fetch_assoc();
            $tableOTP = $row['otp'];
            $otpTimeStamp = $row['created_at'];

            //Storing session varibles
            $_SESSION['email'] = $email;
            $_SESSION['otp_id'] =$row['id'];

            if ($otp == $tableOTP && ($current_timestamp - $otpTimeStamp) < 600 && $row['used'] == 0){

                //Redirecting to password change page
                header("Location: pwd-resetpassword.php?" . session_name() . '=' . session_id());
                exit();

            } else {
                $otpErr = "*Invalid OTP number!";
            }
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
                        <div class="fgtpwd-heading">Verify OTP</div>
                        <p class="message-sent">
                            <?php echo $_SESSION['mailSent']; ?>
                        </p>
                        <div class="fgtpwd-txt">Please enter the OTP code that has sent to.</div>
                        <form class="form-signin" method="POST">
                            <div class="otp-container">
                                <input type="text" class="otp-input" name="code1" maxlength="1" pattern="[0-9]{1}"
                                    onkeypress="return isNumberKey(event)" autofocus="true" required>
                                <input type="text" class="otp-input" name="code2" maxlength="1" pattern="[0-9]{1}"
                                    onkeypress="return isNumberKey(event)" required>
                                <input type="text" class="otp-input" name="code3" maxlength="1" pattern="[0-9]{1}"
                                    onkeypress="return isNumberKey(event)" required>
                                <input type="text" class="otp-input" name="code4" maxlength="1" pattern="[0-9]{1}"
                                    onkeypress="return isNumberKey(event)" required>
                                <input type="text" class="otp-input" name="code5" maxlength="1" pattern="[0-9]{1}"
                                    onkeypress="return isNumberKey(event)" required>
                                <input type="text" class="otp-input" name="code6" maxlength="1" pattern="[0-9]{1}"
                                    onkeypress="return isNumberKey(event)" required>
                            </div>
                            <script>
                                //Disable entering any character other than numbers
                                function isNumberKey(evt) {
                                    var charCode = (evt.which) ? evt.which : event.keyCode;
                                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    // Select all the OTP input fields
                                    var otpInputs = $('.otp-input');

                                    // Add event listener on all the OTP input fields
                                    otpInputs.on('input', function () {
                                        // Get the current input field
                                        var currentInput = $(this);

                                        // Check if the input field has a value
                                        if (currentInput.val().length === 1) {
                                            // Get the index of the current input field
                                            var currentIndex = otpInputs.index(currentInput);

                                            // Move the focus to the next input field, if it exists
                                            if (currentIndex < otpInputs.length - 1) {
                                                otpInputs[currentIndex + 1].focus();
                                            }
                                        }
                                    });
                                });
                            </script>

                            <input type="submit" class="btn_continue opt-btn" name="verify" value="Continue">
                            <p class="forgot-err-msg">
                                <?php echo $otpErr; ?>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</body>

</html>