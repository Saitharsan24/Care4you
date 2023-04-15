<?php include('./config/constants.php') ?>
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
	function validateInput($data) {
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
			if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
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
			if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
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

                    mysqli_close($conn);
                }
            }
        }

        if(empty($_POST['password'])){
            $passwordErr = "*Password is required";
            $isValid = false;
        } elseif(strlen($_POST['password']) < 8){
            $passwordErr = "*Must have atleast 8 characters";
            $isValid = false;
        } elseif(!preg_match("#[a-z]+#", $_POST['password'])){
            $passwordErr = "*Must have atleast one lowercase letter";
            $isValid = false;
        } elseif(!preg_match("#[A-Z]+#", $_POST['password'])){
            $passwordErr = "*Must have atleast one uppercase letter";
            $isValid = false;
        } elseif(!preg_match("#[0-9]+#", $_POST['password'])){
            $passwordErr = "*Must contain atleast one number";
            $isValid = false;
        } elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])){
            $passwordErr = "*Must contain atleast one special character";
            $isValid = false;
        }
        
        if(empty($_POST['confirmPassword'])){
            $confirmPasswordErr = "*Please confirm password";
            $isValid = false;
        } else{
            if($_POST['password'] != $_POST['confirmPassword']){
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
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="signup-heading">
                <h2 class="signup-heading1">Sign Up</h2>
                <p class="signup-heading2">Fill your detials to get registered</p>
            </div>

            <!-- Form step1 -->
            <div class="wrapper-signup">

                    <!--Row 01-->
                    <div class="signup-row">

                        <div class="row-item">
                            <label>First Name :</label>&nbsp;&nbsp;&nbsp;
                            <span class="error"><?php echo $firstNameErr;?></span>
		                    <input type="text" name="firstName" id="firstName" value="<?php echo $_POST["firstName"] ?? ''; ?>">
                        </div>

                        <div class="row-item">
                            <label>Last Name :</label>&nbsp;&nbsp;&nbsp;
                            <span class="error"><?php echo $lastNameErr;?></span>
		                    <input type="text" name="lastName" id="lastName" value="<?php echo $_POST["lastName"] ?? ''; ?>">                
                        </div>

                    </div>

                    <!--Row 02-->
                    <div class="signup-row">

                        <div class="row-item">
                            <label class="form-text">Gender :</label>
                            <select name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Not Given">Preferred not to Say</option>
                            </select>
                        </div>

                        <div class="row-item">
                            <label class="form-text">Date of Birth :</label>
                            <!-- Maximum allowed date to 18 years ago from the current date -->
                            <input type="Date" class="signup-input" name="dateofbirth" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" />
                        </div>

                    </div>

                    <!--Row 03-->
                    <div class="signup-row">

                        <div class="row-item">
                            <label>NIC Number :</label>&nbsp;&nbsp;&nbsp;
                            <span class="error"><?php echo $nicNumberErr;?></span>
		                    <input type="text" name="nic" id="nic" value="<?php echo $_POST["nic"] ?? ''; ?>">
                        </div>

                        <div class="row-item">
                            <label>Contact Number :</label>&nbsp;&nbsp;&nbsp;
                            <span class="error"><?php echo $contactNumberErr;?></span>
                            <input type="text" name="contactNumber" id="contactNumber" value="<?php echo $_POST["contactNumber"] ?? ''; ?>">
                        </div>

                    </div>

                    <!-- Row 04 -->
                    <div class="signup-address">
                        <label class="form-text">Address :</label>&nbsp;&nbsp;&nbsp;
                        <span class="error"><?php echo $addressErr;?></span><br />
                        <textarea class="textarea" name="address" id="address" placeholder="Type your address here"><?php echo $_POST["address"] ?? '' ?></textarea>
                    </div>

                    <!-- Row 05 -->
                    <div class="signup-row">

                        <div class="row-item">
                            <label>Email :</label>&nbsp;&nbsp;&nbsp;
                            <span class="error"><?php echo $emailErr;?></span>
                            <input type="text" name="email" id="email" value="<?php echo $_POST["email"] ?? ''; ?>">
                        </div>

                        <div class="row-item">
                            <label>Username :</label>&nbsp;&nbsp;&nbsp;
                            <span class="error"><?php echo $userNameErr;?></span>
                            <input type="text" name="userName" id="userName" value="<?php echo $_POST['userName'] ?? ''; ?>">
                        </div>

                    </div>

                    <!-- Row 06 -->
                    <div class="signup-row">

                        <div class="row-item">
                            <label>Password :</label>&nbsp;
                            <span class="error"><?php echo $passwordErr;?></span>
                            <input type="password" name="password" id="password">
                        </div>

                        <div class="row-item">
                            <label>Confirm Password :</label>&nbsp;&nbsp;&nbsp;
                            <span class="error"><?php echo $confirmPasswordErr;?></span>
		                    <input type="password" name="confirmPassword" id="confirmPassword">
                        </div>

                    </div>

            </div>

            <div class="btn-signup">
                <button type="submit" class="btn signin">Sign Up</button>
            </div>

        </form>

    </div>

</body>

</html>



<!--
// $fname = "";
// $lname = "";
// $gender = "";
// $dob = "";
// $nic = "";
// $contact = "";
// $address = "";
// $email = "";
// $username = "";
// $password = "";
// $confirmpassword = "";

// if(isset($_POST['submit']))
// {
//     $fname = mysqli_real_escape_string($conn, $_POST['fname']);
//     $lname = mysqli_real_escape_string($conn, $_POST['lname']);
//     $gender = mysqli_real_escape_string($conn, $_POST['gender']);
//     $dob = mysqli_real_escape_string($conn, $_POST['dateofbirth']);
//     $nic = mysqli_real_escape_string($conn, $_POST['nic']);
//     $contact = mysqli_real_escape_string($conn, $_POST['contactnumber']);
//     $address = mysqli_real_escape_string($conn, $_POST['address']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);
//     $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

//     // Check if the password and confirm password fields match
//     if ($password !== $confirmpassword) {
//         $_SESSION['signup_error'] = "Password and Confirm Password fields do not match.";
//         $_SESSION['signup_fname'] = $fname;
//         $_SESSION['signup_lname'] = $lname;
//         $_SESSION['signup_gender'] = $gender;
//         $_SESSION['signup_dob'] = $dob;
//         $_SESSION['signup_nic'] = $nic;
//         $_SESSION['signup_contact'] = $contact;
//         $_SESSION['signup_address'] = $address;
//         $_SESSION['signup_email'] = $email;
//         $_SESSION['signup_username'] = $username;
//         header("Location: signup.php");
//         exit();
//     }
//     else {
//         // Insert the user data into the database
//         $sql = "INSERT INTO tbl_users SET
//                 first_name='$fname',
//                 last_name='$lname',
//                 gender='$gender',
//                 dob='$dob',
//                 nic='$nic',
//                 contact='$contact',
//                 address='$address',
//                 email='$email',
//                 username='$username',
//                 password='$password'";

//         $res = mysqli_query($conn, $sql) or die(mysqli_error());

//         if($res==TRUE)
//         {
//             $_SESSION['signup_success'] = "Registration Successful. Please Sign In.";
//             header("Location: signin.php");
//         }
//         else
//         {
//             $_SESSION['signup_error'] = "Registration Failed. Please try again.";
//             header("Location: signup.php");
//         }
//         exit();
//     }
// }
-->