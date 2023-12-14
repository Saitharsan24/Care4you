<?php include('../config/constants.php'); ?>
<?php include('../login_access.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>


<?php
// Define variables and set to empty values
$fullNameErr = $nicErr = $contactNoErr = $emailErr = $userNameErr=$passwordErr=$confirmpasswordErr="";
$fullName = $nic =  $contactNo = $email = $userName=$password=$confirmpassword="";
$isValid = true;
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
        if (empty($_POST["fullname"])) {
        $fullNameErr = "*Full name is required";
        $isValid = false;
    } else {
        $fullName = validateInput($_POST['fullname']);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
            $fullNameErr = "*Enter a valid name";
            $isValid = false;
        }
    }

    	
		// Validate NIC number
		if (empty($_POST["nic"])) {
			$nicErr = "*NIC number is required";
            $isValid = false;
		} else {
			$nic = validateInput($_POST["nic"]);
			// Check if NIC number is in one of the valid formats
			if (!preg_match("/^(?!0)[0-9]{12}$|^([0-9]{9}[vV])$/", $nic)) {
				$nicErr = "*Enter a valid NIC number";
                $isValid = false;
			}
		} 

        // Validate contact number
		if (empty($_POST["contact_number"])) {
			$contactNoErr = "*Contact number is required";
            $isValid = false;
		} else {
			$contactNo = validateInput($_POST["contact_number"]);
			// Check if contact number is a valid 10-digit number
			if (!preg_match("/^[0-9]{10}$/", $contactNo)) {
				$contactNoErr = "*Enter 10-digit contact number";
                $isValid = false;
			}
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

            $sql = "SELECT * FROM tbl_sysusers WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
          // $row = mysqli_fetch_array($result);
          // $no= mysqli_num_rows($result);
         
            if (mysqli_num_rows($result) > 0) {
                $userNameErr = "*User already registered";
                $isValid = false;
            }

		}

         // Validate username
         if (empty($_POST['username'])) {
            $userNameErr = "*Username is required";
            $isValid = false;
        } else {
            if (strlen($_POST['username']) < 5) {
                $userNameErr = "*Username must contain at least 4 characters";
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

                 
                }
            }
        }

        
        //validate password
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
  

        //validate confirm password
        if(isset($_POST['confirmpassword'])){
            $confirmPasswordErr = "*Please confirm password";
            $isValid = false;
        } elseif($_POST['password'] != $_POST['confirmpassword']){
            {
                $confirmPasswordErr = "*Passwords do not match";
                $isValid = false;
            }
        }

        
}


?>

<body>
<?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">
                        <div class="highlighttext">System Users</div>
                    </a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="back" onclick="location.href='admin-asst-view.php'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>

                <div class="reg-heading">
                    <i class="fa-solid fa-clipboard-list" style="font-size: 45px;font-weight: 800;"></i>
                    &nbsp;Assistant Registration
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="reg-container otheruser">
                        <div class="reg-container-col mid2 otherusercol">

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-user"></i>&nbsp;&nbsp;Full Name  <br/>
                                <span class="error"><?php echo $fullNameErr; ?></span>
                                <input type="text" class="inputtab" name="fullname" placeholder="Enter Assistant's Fullname" />
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-id-badge"></i>&nbsp;&nbsp;NIC Number <br />
                            <span class="error"><?php echo $nicErr; ?></span>
                                <input type="text" class="inputtab" name="nic" placeholder="Enter Assistant's NIC Number"/>
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Contact Number <br />
                            <span class="error"><?php echo $contactNoErr; ?></span>
                                <input type="tel" class="inputtab" name="contact_number" placeholder="Enter Assistant's Contact Number"/>
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email Address <br />
                            <span class="error"><?php echo $emailErr; ?></span>
                                <input type="text" class="inputtab" name="email" placeholder="Enter Assistant's Email Address"/>
                            </div>

                        </div>
                        <div class="reg-container-col otherusercol otherusercolbreak">

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-user-check"></i>&nbsp;&nbsp;Username <br/>
                            <span class="error"><?php echo $userNameErr; ?></span>
                                <input type="text" class="inputtab" name="username" placeholder="Enter Assistant's Username"/>
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Password <br/>
                            <span class="error"><?php echo $passwordErr; ?></span>
                                <input type="password" class="inputtab" name="password" placeholder="Enter Assistant's Password" />
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Confirm Password <br/>
                            <span class="error"><?php echo $confirmpasswordErr; ?></span>
                                <input type="password" class="inputtab" name="confirmpassword" placeholder="Confirm Assistant's Password" />
                            </div>

                        </div>
                    </div>
                    <button name="reg" type="submit" class="reg-foot"> 
                          <!-- have to type="submit" -->
                        <span>Add Assistant&nbsp;</span>
                    </button>
                
                </form>
            </div>
        </div>
</body>

</html>

<?php



    if (isset($_POST['reg'])) {
        
        //if($isValid==true){
            //print_r("test");die();
        
        $fullname = $_POST['fullname'];
        $nic = $_POST['nic'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        

        $sql = "INSERT INTO tbl_sysusers (actortype, username, password, email)
    VALUES ('assistant', '$username', '$hashed_password', '$email')";

        $res1 = mysqli_query($conn, $sql);
               $last_id = $conn->insert_id;
        
        $sql = "INSERT INTO tbl_assistant (name, nic, phoneno, profile_picture, userid)
    VALUES ('$fullname', '$nic', '$contact_number', 'user.png', '$last_id')";

        $res2 = mysqli_query($conn, $sql);


        if (($res1 && $res2) == TRUE) {
            // header("Location: /Care4you/admin/admin-asst-view.php");
            echo "<script> window.location.href='http://localhost/Care4you/admin/admin-asst-view.php';</script>";
        } else {
            
                       echo "Error: " . $s . "<br>" . mysqli_error($conn);
            die();
        }
    }

//}
?>