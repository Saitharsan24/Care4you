<?php
include('./config/constants.php');
include('./libraries/NICValidation/nic_validation.php');


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './libraries/PHPMailer/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign Up</title>
    <link rel="icon" type="images/x-icon" href="./images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    // Define variables and set to empty values
    $firstNameErr = $lastNameErr = $nicNumberErr = $contactNumberErr = $emailErr = "";
    $userNameErr = $passwordErr = $confirmPasswordErr = $addressErr = "";
    $isValid = true;

    // Function to validate input and prevent malicious code injection
    function validateInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Check if form is submitted and process form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate first name
        if (empty($_POST["firstName"])) {
            $firstNameErr = "*First name is required";
            $isValid = false;
        } else {
            $firstName = validateInput($_POST["firstName"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
                $firstNameErr = "*Enter a valid name";
                $isValid = false;
            }
        }

        // Validate last name
        if (empty($_POST["lastName"])) {
            $lastNameErr = "*Last name is required";
            $isValid = false;
        } else {
            $lastName = validateInput($_POST["lastName"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
                $lastNameErr = "*Enter a valid name";
                $isValid = false;
            }
        }

        // Validate NIC number
        if (empty($_POST["nic"])) {
            $nicNumberErr = "*NIC number is required";
            $isValid = false;
        } else {
            $nicNumber = validateInput($_POST["nic"]);
            // Check if NIC number is in one of the valid formats
            if (!preg_match("/^(?!0)[0-9]{12}$|^([0-9]{9}[vV])$/", $nicNumber)) {
                $nicNumberErr = "*Enter a valid NIC number";
                $isValid = false;
            }

            //function to extract DOB and Age from NIC number
            $ageAndDob = getDOBAndAgeFromNIC($nicNumber);

            $age = $ageAndDob['age'];
            $dob = $ageAndDob['dob'];

            //checking is user above 18 years
            if ($age < 18) {
                $nicNumberErr = "*User should be above 18 years";
                $isValid = false;
            }
        }

        // Validate contact number
        if (empty($_POST["contactNumber"])) {
            $contactNumberErr = "*Contact number is required";
            $isValid = false;
        } else {
            $contactNumber = validateInput($_POST["contactNumber"]);
            // Check if contact number is a valid 10-digit number
            if (!preg_match("/^[0-9]{10}$/", $contactNumber)) {
                $contactNumberErr = "*Enter 10-digit contact number";
                $isValid = false;
            }
        }

        //Validation for address
        if (empty($_POST["address"])) {
            $addressErr = "*Address is required";
            $isValid = false;
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "*Email is required";
            $isValid = false;
        } else {
            $email = validateInput($_POST["email"]);
            // Check if email address is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "*Enter a valid email address";
                $isValid = false;
            }

            $sql = "SELECT * FROM tbl_sysusers WHERE username='$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $userNameErr = "*User already registered";
                $isValid = false;
            }

        }

        // Validate username
        if (empty($_POST['userName'])) {
            $userNameErr = "*Username is required";
            $isValid = false;
        } else {
            if (strlen($_POST['userName']) < 5) {
                $userNameErr = "*Username must contain at least 5 characters";
                $isValid = false;
            } else {
                if (!preg_match("/^[a-zA-Z0-9_-]*$/", $_POST['userName'])) {
                    $userNameErr = "*Invalid username";
                    $isValid = false;
                } else {
                    $userName = $_POST['userName'];
                    $sql = "SELECT * FROM tbl_sysusers WHERE username='$userName'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $userNameErr = "*Username already exists";
                        $isValid = false;
                    }

                    // mysqli_close($conn);
                }
            }
        }

        //validate password
        if (empty($_POST['password'])) {
            $passwordErr = "*Password is required";
            $isValid = false;
        } elseif (strlen($_POST['password']) < 8) {
            $passwordErr = "*Must have atleast 8 characters";
            $isValid = false;
        } elseif (!preg_match("#[a-z]+#", $_POST['password'])) {
            $passwordErr = "*Must have atleast one lowercase letter";
            $isValid = false;
        } elseif (!preg_match("#[A-Z]+#", $_POST['password'])) {
            $passwordErr = "*Must have atleast one uppercase letter";
            $isValid = false;
        } elseif (!preg_match("#[0-9]+#", $_POST['password'])) {
            $passwordErr = "*Must contain atleast one number";
            $isValid = false;
        } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])) {
            $passwordErr = "*Must contain atleast one special character";
            $isValid = false;
        }

        if (empty($_POST['confirmPassword'])) {
            $confirmPasswordErr = "*Please confirm password";
            $isValid = false;
        } else {
            if ($_POST['password'] != $_POST['confirmPassword']) {
                $confirmPasswordErr = "*Passwords do not match";
                $isValid = false;
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

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="signup-heading">
                <h2 class="signup-heading01">Sign Up</h2>
                <p class="signup-heading02">Fill your detials to get registered with us</p>
            </div>

            <!-- Form step1 -->
            <div class="wrapper-signup">

                <!--Row 01-->
                <div class="signup-row">

                    <div class="row-item">
                        <label style="font-size:15px;">First Name :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error">
                            <?php echo $firstNameErr; ?>
                        </span>
                        <input type="text" name="firstName" id="firstName"
                            value="<?php echo $_POST["firstName"] ?? ''; ?>">
                    </div>

                    <div class="row-item">
                        <label style="font-size:15px;">Last Name :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error">
                            <?php echo $lastNameErr; ?>
                        </span>
                        <input type="text" name="lastName" id="lastName"
                            value="<?php echo $_POST["lastName"] ?? ''; ?>">
                    </div>

                </div>

                <!--Row 02-->
                <div class="signup-row">

                    <div class="row-item">
                        <label class="form-text" style="font-size:15px;">Gender :</label>
                        <select name="gender" id="gender" style="width: 300px;">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Not Given">Preferred not to Say</option>
                        </select>
                    </div>

                    <div class="row-item">
                        <label class="form-text" style="font-size:15px;">Date of Birth :</label>
                        <!-- Maximum allowed date to 18 years ago from the current date -->
                        <input type="Date" class="signup-input" name="dateofbirth"
                            max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" />
                    </div>

                </div>

                <!--Row 03-->
                <div class="signup-row">

                    <div class="row-item">
                        <label style="font-size:15px;">NIC Number :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error">
                            <?php echo $nicNumberErr; ?>
                        </span>
                        <input type="text" name="nic" id="nic" value="<?php echo $_POST["nic"] ?? ''; ?>">
                    </div>

                    <div class="row-item">
                        <label style="font-size:15px;">Contact Number :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error">
                            <?php echo $contactNumberErr; ?>
                        </span>
                        <input type="text" name="contactNumber" id="contactNumber"
                            value="<?php echo $_POST["contactNumber"] ?? ''; ?>">
                    </div>

                </div>

                <!-- Row 04 -->
                <div class="signup-address">
                    <label class="form-text" style="font-size:15px;margin-left: 40px;">Address :</label>&nbsp;&nbsp;&nbsp;
                    <span class="error">
                        <?php echo $addressErr; ?>
                    </span><br />
                    <textarea style="width: 660px;" class="textarea" name="address" id="address"
                        placeholder="Type your address here"><?php echo $_POST["address"] ?? '' ?></textarea>
                </div>

                <!-- Row 05 -->
                <div class="signup-row">

                    <div class="row-item" style="margin-top: -5px;">
                        <label style="font-size:15px;">Email :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error">
                            <?php echo $emailErr; ?>
                        </span>
                        <input type="text" name="email" id="email" value="<?php echo $_POST["email"] ?? ''; ?>">
                    </div>

                    <div class="row-item" style="margin-top: -5px;">
                        <label style="font-size:15px;">Username :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error">
                            <?php echo $userNameErr; ?>
                        </span>
                        <input type="text" name="userName" id="userName"
                            value="<?php echo $_POST['userName'] ?? ''; ?>">
                    </div>

                </div>

                <!-- Row 06 -->
                <div class="signup-row">

                    <div class="row-item">
                        <label style="font-size:15px;">Password :</label>&nbsp;
                        <span class="error">
                            <?php echo $passwordErr; ?>
                        </span>
                        <input type="password" name="password" id="password">
                    </div>

                    <div class="row-item">
                        <label style="font-size:15px;">Confirm Password :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error">
                            <?php echo $confirmPasswordErr; ?>
                        </span>
                        <input type="password" name="confirmPassword" id="confirmPassword">
                    </div>

                </div>

            </div>

            <div class="btn-signup">
                <button type="submit" name="sign_up_submit" class="btn signin">Sign Up</button>
            </div>

        </form>

    </div>

</body>

</html>

<?php
// Include necessary files and configuration
// include('./config/constants.php');
// include('./libraries/NICValidation/nic_validation.php');

// Define variables and set to empty values
$firstNameErr = $lastNameErr = $nicNumberErr = $contactNumberErr = $emailErr = "";
$userNameErr = $passwordErr = $confirmPasswordErr = $addressErr = "";
$isValid = true;

// Function to validate input and prevent malicious code injection
// function validateInput($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// Check if form is submitted and process form data
if (isset($_POST['sign_up_submit'])) {
    // ... (existing validation code)

    // If all validations pass
    if ($isValid) {

        // Prepare the data for insertion (you may need to modify the column names based on your table structure)
        $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $dateOfBirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
        $nicNumber = mysqli_real_escape_string($conn, $_POST["nic"]);
        $contactNumber = mysqli_real_escape_string($conn, $_POST["contactNumber"]);
        $address = mysqli_real_escape_string($conn, $_POST["address"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $userName = mysqli_real_escape_string($conn, $_POST["userName"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Generate a hashed password (you may need to use a different hashing method)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        date_default_timezone_set('Asia/Kolkata');
        $acc_createdate = date('d/m/Y');

        // Prepare the SQL INSERT statement
        $sql = "INSERT INTO tbl_sysusers (actortype, username, password, email, status)
        VALUES ('patient', '$userName', '$hashedPassword', '$email', '0')";

        $res = mysqli_query($conn, $sql);
        
        $last_id = $conn->insert_id;
        // print_r($last_id);

        $sql1 = "INSERT INTO tbl_patient 
                (first_name, last_name, gender, dob, nic, contact, address, userid) 
                VALUES 
                ('$firstName', '$lastName', '$gender', '$dateOfBirth', '$nicNumber', '$contactNumber', '$address', '$last_id')";

        $res1 = mysqli_query($conn, $sql1);

        //sendig otp to patient
        // Generate a 6-digit OTP
        $otp = str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT);

        //getting current timestamp
        $current_timestamp = time();

        // Insert the OTP data into the tbl_password_reset table
        $sql = "INSERT INTO tbl_password_reset (email, otp, created_at) VALUES ('$email','$otp','$current_timestamp')";
        $res = mysqli_query($conn, $sql) or die($res);

        // Send the OTP code to the user's email address using PHPMailer

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'care4u.242000@gmail.com'; //SMTP username
            $mail->Password = 'zycbeglgbinzqlgh'; //SMTP password
            $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
            $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('care4u.242000@gmail.com', 'Admin');
            $mail->addAddress($email, ''); //Add a recipient 

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'One-Time Password (OTP) Code for Account Activation';
            $mail->Body = 'Your OTP code for Activate your account is : ' . $otp;

            $mail->send();
            //echo 'Message has been sent';

            //storing success message in session variable

            $_SESSION['email'] = $email;

            // Redirect the user to the OTP verification page
            // Execute the query
            if (($res == TRUE) && ($res1 == TRUE)) {

                // Data inserted successfully
                $_SESSION['data-inserted'] = $last_id;
                //header("location:".SITEURL.'signin.php');
                include('signup-popup1.php');
                echo "<script> openPopupOTP() </script>";

            } else {
                // Error inserting data
                echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);


            exit();

        } catch (Exception $e) {
            $emailNotFound = "The OTP could not be sent. Try again! " . $mail->ErrorInfo;
        }






    }
}

if (isset($_POST['verify'])) {
    //   var_dump($_POST);die();

    //$sql = "UPDATE 'tbl_sysusers' SET 'status'='1' WHERE userid = $last_id;"
    //starting the session
    // if (session_status() === PHP_SESSION_DISABLED) {
    //   session_start();
    // }

    //Retrieving session variables
    //$email = $_SESSION['email'];
    //$mailSent = $_SESSION['mailSent'];
    // print_r($email);die();
    $otpErr = '';

    // Function to validate input and prevent malicious code injection
    // function validateInput($data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        $email = $_SESSION['email'];
        // Verify the OTP code
        $sql = "SELECT * FROM tbl_password_reset WHERE email = '$email' ORDER BY created_at DESC LIMIT 1 ";
        $result = mysqli_query($conn, $sql);

        $row = $result->fetch_assoc();
        $tableOTP = $row['otp'];
        $otpTimeStamp = $row['created_at'];

        //Storing session varibles

        $_SESSION['otp_id'] = $row['id'];
        // print_r($otp." ".$tableOTP." ".strtotime($current_timestamp) - strtotime($otpTimeStamp)." ". $row['used']);

        if ($otp == $tableOTP && strtotime($current_timestamp) - strtotime($otpTimeStamp) < 600 && $row['used'] == 0) {
            $last_id =$_SESSION['data-inserted'];
            // print_r($_SESSION['data-inserted']);

            $active = "UPDATE tbl_sysusers SET status='1' WHERE userid = $last_id";
            // echo $active;
            $resactive = mysqli_query($conn, $active);
            //Redirecting to password change page
            echo '<script>window.location.href ="./signin.php" </script>';
            exit();

        } else {
            $otpErr = "*Invalid OTP number!";
            // var_dump("EOROROROROOR");
        }



    }


}
?>