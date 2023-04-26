<?php include('./config/constants.php') ?>
<!-- Form Validations Starts-->
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
		if (empty($_POST["first_name"])) {
			$firstNameErr = "*First name is required";
            $isValid = false;
		} else {
			$firstName = validateInput($_POST["first_name"]);
			// Check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
				$firstNameErr = "*Enter a valid name";
                $isValid = false;
			}
		}
		
		// Validate last name
		if (empty($_POST["last_name"])) {
			$lastNameErr = "*Last name is required";
            $isValid = false;
		} else {
			$lastName = validateInput($_POST["last_name"]);
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
		if (empty($_POST["contact"])) {
			$contactNumberErr = "*Contact number is required";
            $isValid = false;
		} else {
			$contactNumber = validateInput($_POST["contact"]);
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
		}

        // Validate username
        if (empty($_POST['username'])) {
            $userNameErr = "*Username is required";
            $isValid = false;
        } else {
            if (strlen($_POST['username']) < 5) {
                $userNameErr = "*Username must contain at least 5 characters";
                $isValid = false;
            } else {
                if (!preg_match("/^[a-zA-Z0-9_-]*$/", $_POST['username'])) {
                    $userNameErr = "*Invalid username";
                    $isValid = false;
                } else {
                    $userName = $_POST['username'];
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

        if(empty($_POST['password'])){
            $passwordErr = "*Password is required";
            $isValid = false;
        } elseif(strlen($_POST['password']) < 12){
            $passwordErr = "*Must have atleast 12 characters";
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
        } elseif(!preg_match("#\W+#", $_POST['password'])){
            $passwordErr = "*Must contain atleast one special character";
            $isValid = false;
        }
        
        if(empty($_POST['confirmpassword'])){
            $confirmPasswordErr = "*Please confirm password";
            $isValid = false;
        } else{
            if($_POST['password'] != $_POST['confirmpassword']){
                $confirmPasswordErr = "*Passwords do not match";
                $isValid = false;

                location.reload();
            }
            else{

                $first_name = $_POST['first_name'] ;
                $last_name = $_POST['last_name'] ;
                $gender = $_POST['gender'] ;
                $dob = $_POST['dob'] ;
                $nic = $_POST['nic'] ;
                $contact = $_POST['contact'] ;
                $address = $_POST['address'] ;
                $email = $_POST['email'] ;
                $profile_picture = $_POST['profile_picture'] ;
                $acc_createdate = date("d/m/Y") ;
                $actortype = "patient" ;
                $username = $_POST['username'];
                $password = $_POST['password'] ;
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
                $sql1 = "INSERT INTO tbl_sysusers SET
                        actortype = '$actortype',
                        username = '$username',
                        password = '$hashed_password'
                        ";
        
                $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        
                $last_id = $conn->insert_id;
        
                $sql2 = "INSERT INTO tbl_patient SET
                        userid = '$last_id',
                        first_name = '$first_name',
                        last_name = '$last_name',
                        gender = '$gender',
                        dob = '$dob',
                        nic = '$nic',
                        contact = '$contact',
                        address = '$address',
                        email = '$email',
                        profile_picture = '$profile_picture',
                        acc_createdate = '$acc_createdate'
                        ";
        
                $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        
                if(($res1 && $res2) == TRUE)
                {
                    //Data inserted
                    //echo "Data Inserted";
        
                    //Create Session Variable to display message
                    $_SESSION['signup'] = '<div class="success"> You have Successfully Registered! Signin Now... </div>';
                    //Redirect to the pharmacy_respond.php page
                    // header("location:".SITEURL.'signin.php');
                    echo "<script> window.location.href='http://localhost/Care4you/signin.php';</script>";
        
                }
                else
                {
        
                    //Data not inserted
                    //echo "Fail to Insert Data";
        
                    //Create Session Variable to display message
                    $_SESSION['add'] = '<div class="error"> Registration Failed! </div>';
                    //Redirect to the pharmacy_respond.php page
                    // header("location:".SITEURL.'signupp.php');
                    echo "<script> window.location.href='http://localhost/Care4you/signupp.php';</script>";
        
                }
            }
        }
    }
?>
<!-- Form Validations Ends-->

<!-- Form Starts Here -->
<div class="signup-form-container" id="signupForm">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<div class="signup-close">
    <button type="button" onclick="closeForm()"><i class="fa-solid fa-circle-xmark"></i></button>
</div>

<div class="signup-heading1">CareForYou - Sign Up</div>
<div class="signup-heading2">Fill your detials to get registered</div><br/>

<?php 
    if(isset($_SESSION['signup']))
    {
        echo $_SESSION['signup'];
        unset($_SESSION['signup']);

    }
?>

<table style="width:80%; margin: auto;" class="tbl-signupform">
    <tr>
        <td>
            <label>First Name :</label>&nbsp;&nbsp;&nbsp;
            <span class="error"><?php echo $firstNameErr;?></span>
            <input type="text" name="first_name" id="first_name" value="<?php echo $_POST["first_name"] ?? ''; ?>">
        </td>
        <td>
            <label>Last Name :</label>&nbsp;&nbsp;&nbsp;
            <span class="error"><?php echo $lastNameErr;?></span>
            <input type="text" name="last_name" id="last_name" value="<?php echo $_POST["last_name"] ?? ''; ?>">
        </td>
    </tr>

    <tr>
        <td>
            <label class="form-text">Gender :</label> <br/>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Not Given" selected>Preferred not to Say</option>
            </select>
        </td>
        <td>
            <label class="form-text">Date of Birth :</label>
            <!-- Maximum allowed date to 18 years ago from the current date -->
            <input type="Date" class="signup-input" name="dob" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" />
        </td>
    </tr>

    <tr>
        <td>

            <label>NIC Number :</label>&nbsp;&nbsp;&nbsp;
            <br/> <span class="error"><?php echo $nicNumberErr;?></span>
            <input type="text" name="nic" id="nic" value="<?php echo $_POST["nic"] ?? ''; ?>">
        </td>
        <td>
            <label>Contact Number :</label>&nbsp;&nbsp;&nbsp;
            <br/> <span class="error"><?php echo $contactNumberErr;?></span>
            <input type="text" name="contact" id="contact" value="<?php echo $_POST["contact"] ?? ''; ?>">
        </td>
    </tr>

    <tr>
        <td colspan = 2>
            <label class="form-text">Address :</label>&nbsp;&nbsp;&nbsp;
            <span class="error"><?php echo $addressErr;?></span><br />
            <textarea class="textarea" name="address" id="address" placeholder="Type your address here"><?php echo $_POST["address"] ?? '' ?></textarea>
        </td>
    </tr>

    <tr>
        <td>
            <label>Email :</label>&nbsp;&nbsp;&nbsp;
            <span class="error"><?php echo $emailErr;?></span>
            <input type="text" name="email" id="email" value="<?php echo $_POST["email"] ?? ''; ?>">
        </td>
        <td>
            <label>Username :</label>&nbsp;&nbsp;&nbsp;
            <span class="error"><?php echo $userNameErr;?></span>
            <input type="text" name="username" id="username" value="<?php echo $_POST['username'] ?? ''; ?>">
        </td>
    </tr>

    <tr>
        <td>
            <label>Password :</label>&nbsp;
            <br /> <span class="error"><?php echo $passwordErr;?></span>
            <input type="password" name="password" id="password">
        </td>
        <td>
            <label>Confirm Password :</label>&nbsp;&nbsp;&nbsp;
            <br /> <span class="error"><?php echo $confirmPasswordErr;?></span>
            <input type="password" name="confirmpassword" id="confirmpassword">
        </td>
    </tr>

            <input type="hidden" name="profile_picture" value="user.png" />

    <tr>
        <td colspan = 2>
            <button type="submit" name="signup" class="btn signin">Sign Up</button>
        </td>
    </tr>
</table>

</form>
</div>
<!-- Form Ends Here -->

<script>
    // Function to open the sign up form
    function openForm() {
    document.getElementById("signupForm").style.display = "block";
    }

    // Function to close the sign up form
    function closeForm() {
    document.getElementById("signupForm").style.display = "none";
    }
</script>