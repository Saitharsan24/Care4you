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
$fullNameErr = $nicErr = $contactNoErr = $emailErr = $SLMCErr=$specializationErr=$ChargeErr=$usernameErr=$passwordErr=$confirmpasswordErr="";
$fullName = $nic =  $contactNo = $email =$SLMC=$specialization=$Charge= $userName=$password=$confirmpassword="";
$isValid = true;

// Function to validate input and prevent malicious code injection
function validateInput($data)
{
    $data = trim($data);  //removes any whitespace or extra characters from the beginning and end of the input string
    $data = stripslashes($data);  //removes any backslashes from the input string
    $data = htmlspecialchars($data);  //converts any special characters in the input string to their corresponding HTML entities
    return $data;
}

// Check if form is submitted and process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
         
     // Validate first name
     if (empty($_POST["doc_name"])) {
        $fullNameErr = "*Full name is required";
        $isValid = false;
        
    } else {
        $fullName = validateInput($_POST['doc_name']);
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

            if (mysqli_num_rows($result) > 0) {
                $userNameErr = "*User already registered";
                $isValid = false;
            }

		}


        
         // Validate charge
		if (empty($_POST["charge"])) {
			$ChargeErr = "*charge is required";
            $isValid = false;
		}elseif($_POST["charge"]<0){
            $ChargeErr = "*Enter a valid charge";
        } 
     
          // Validate slmc
		if (empty($_POST["SLMC_Number"])) {
			$SLMCErr = "*SLMC_Number is required";
            $isValid = false;
		 } else {
		
		}
              // Validate Specialization
		if ($_POST["specialization"]=="Select Specialization") {
			$specializationErr = "*You have to select doctor Specialization";
            $isValid = false;
		} 


           // Validate username
           if (empty($_POST['username'])) {
            $usernameErr = "*Username is required";
            $isValid = false;
        } else {
            if (strlen($_POST['username']) < 5) {
                $usernameErr = "*Username must contain at least 4 characters";
                $isValid = false;
            } else {
                if (!preg_match("/^[a-zA-Z0-9_-]*$/", $_POST['username'])) {
                    $usernameErr = "*Invalid username";
                    $isValid = false;
                } else {
                    $username = $_POST['username'];
                    $sql = "SELECT * FROM tbl_sysusers WHERE username='$username'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $usernameErr = "*Username already exists";
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
        if(empty($_POST['confirmpassword'])){
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
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">
                        <div class="highlighttext">System Users</div>
                    </a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="back" onclick="location.href='admin-doc-view.php'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>

                <div class="reg-heading">
                    <i class="fa-solid fa-stethoscope" style="font-size: 45px;font-weight: 800;"></i>
                    &nbsp;Doctor Registration
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="reg-container">
                        <div class="reg-container-col">

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-user"></i>&nbsp;&nbsp;Full Name<br>
                            <span class="error"><?php echo $fullNameErr; ?></span>
                                <input type="text" class="inputtab" name="doc_name" placeholder="Enter Doctor's Fullname"  />
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-id-badge" id="nic"></i>&nbsp;&nbsp;NIC Number <br />
                            <span class="error"><?php echo $nicErr; ?></span>
                                <input type="text" class="inputtab" name="nic" placeholder="Enter Doctor's NIC Number"  />
                                                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Contact Number <br />
                            <span class="error"><?php echo $contactNoErr; ?></span>
                                <input type="text" class="inputtab" name="contact_number" placeholder="Enter Doctor's Contact Number"   />
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email Address <br />
                            <span class="error"><?php echo $emailErr; ?></span>
                                <input type="text" class="inputtab" name="email" placeholder="Enter Doctor's Email Address"  />
                               
                            </div>

                        </div>
                        <div class="reg-container-col mid">

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;SLMC Number<br>
                            <span class="error"><?php echo $SLMCErr; ?></span>
                            <input type="text" class="inputtab" name="SLMC_Number" placeholder="Enter SLMC Number"  />
                                                           </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-hospital-user"></i>&nbsp;&nbsp;Specialization<br>
                            <span class="error"><?php echo $specializationErr; ?></span>
                                <select name="specialization" id="specialization" class="inputtab">
                                    <option value="Select Specialization">Select Specialization</option>
                                    <option value="Addiction Psychiatrist">Addiction Psychiatrist</option>
                                    <option value="Anesthesiologist">Anesthesiologist</option>
                                    <option value="Bariatric Surgeon">Bariatric Surgeon</option>
                                    <option value="Breast Surgeon">Breast Surgeon</option>
                                    <option value="Cardiologist">Cardiologist</option>
                                    <option value="Child Psychiatrist">Child Psychiatrist</option>
                                    <option value="Dental Anesthesiologist">Dental Anesthesiologist</option>
                                    <option value="Developmental-Behavioral Pediatrician">Developmental-Behavioral Pediatrician</option>
                                    <option value="Dermatologist">Dermatologist</option>
                                    <option value="Emergency Medical Technician (EMT)">Emergency Medical Technician (EMT)</option>
                                    <option value="Endocrinologist">Endocrinologist</option>
                                    <option value="Epileptologist">Epileptologist</option>
                                    <option value="Female Pelvic Medicine and Reconstructive Surgeon">Female Pelvic Medicine and Reconstructive Surgeon</option>
                                    <option value="Forensic Psychiatrist">Forensic Psychiatrist</option>
                                    <option value="Gastroenterologist">Gastroenterologist</option>
                                    <option value="Gynecologic Oncologist">Gynecologic Oncologist</option>
                                    <option value="Hand Surgeon">Hand Surgeon</option>
                                    <option value="Hematologist">Hematologist</option>
                                    <option value="Immunologist">Immunologist</option>
                                    <option value="Infectious Disease Specialist">Infectious Disease Specialist</option>
                                    <option value="Japanese Acupuncturist">Japanese Acupuncturist</option>
                                    <option value="Juvenile Rheumatologist">Juvenile Rheumatologist</option>
                                    <option value="Kinesiologist">Kinesiologist</option>
                                    <option value="Kinesiotherapist">Kinesiotherapist</option>
                                    <option value="Lactation Consultant">Lactation Consultant</option>
                                    <option value="Laparoscopic Surgeon">Laparoscopic Surgeon</option>
                                    <option value="Mastectomy Surgeon">Mastectomy Surgeon</option>
                                    <option value="Medical Geneticist">Medical Geneticist</option>
                                    <option value="Nephrologist">Nephrologist</option>
                                    <option value="Occupational Therapist">Occupational Therapist</option>
                                    <option value="Ophthalmologist">Ophthalmologist</option>
                                    <option value="Orthopedist">Orthopedist</option>
                                    <option value="Pediatrician">Pediatrician</option>
                                    <option value="Physical Therapist">Physical Therapist</option>
                                    <option value="Plastic Surgeon">Plastic Surgeon</option>
                                    <option value="Reproductive Endocrinologist">Reproductive Endocrinologist</option>
                                    <option value="Rheumatologist">Rheumatologist</option>
                                    <option value="S.T.D">S.T.D</option>
                                    <option value="Sleep Medicine Specialist">Sleep Medicine Specialist</option>
                                    <option value="Sports Medicine Specialist">Sports Medicine Specialist</option>
                                    <option value="Thoracic Surgeon">Thoracic Surgeon</option>
                                    <option value="Transplant Surgeon">Transplant Surgeon</option>
                                    <option value="Ultrasound Technologist">Ultrasound Technologist</option>
                                    <option value="Urologist">Urologist</option>
                                    <option value="Venereologist">Venereologist</option>
                                    <option value="Vascular Surgeon">Vascular Surgeon</option>
                                    <option value="Wound Consultation">Wound Consultation</option>
                                    <option value="X-ray Technologist">X-ray Technologist</option>
                                    <option value="Yoga Therapist">Yoga Therapist</option>
                                    <option value="Zygomatic Implant Surgeon">Zygomatic Implant Surgeon</option>
                                </select>
                                                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-sack-dollar"></i>&nbsp;&nbsp;Charge per session (Rs.)<br>
                            <span class="error"><?php echo $ChargeErr; ?></span>
                                <input type="number" step="500" class="inputtab" name="charge" placeholder="Enter Doctor Charge per Session" />
                                                           </div>

                        </div>
                        <div class="reg-container-col">

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-user-check"></i>&nbsp;&nbsp;Username<br>
                            <span class="error"><?php echo $usernameErr; ?></span>
                                <input type="text" class="inputtab" name="username" placeholder="Enter Doctor's Username"  />
                                                         </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Password<br>
                            <span class="error"><?php echo $passwordErr; ?></span>
                                <input type="password" class="inputtab" name="password" placeholder="Enter Doctor's Password"  />
                            </div>

                            <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Confirm Password<br>
                            <span class="error"><?php echo $confirmpasswordErr; ?></span>
                                <input type="password" class="inputtab" name="confirmpassword" placeholder="Conform Doctor's Password"  />
                            </div>

                        </div>
                    </div>
                    <button name="reg" type="submit" class="reg-foot"> 
                          <!-- have to type="submit" -->
                        <span>Add Doctor&nbsp;</span>
                    </button>
                </form>
            </div>
        </div>
</body>

</html>

<?php
if (isset($_POST['reg'])) {
    if($isValid==true){

    $doc_name = $_POST['doc_name'];
    $nic = $_POST['nic'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $SLMC_Number = $_POST['SLMC_Number'];
    $specialization = $_POST['specialization'];
    $charge = $_POST['charge'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_sysusers (actortype, username, password, email)
    VALUES ('doctor', '$username', '$hashed_password', '$email')";

    $res1 = mysqli_query($conn, $sql);

    $last_id = $conn->insert_id;

    $sql = "INSERT INTO tbl_doctor (doc_name, nic, contact_number, SLMC_number, specialization, charge, profile_picture, userid)
    VALUES ('$doc_name', '$nic', '$contact_number', '$SLMC_Number', '$specialization', '$charge', 'user.png', '$last_id')";

    $res2 = mysqli_query($conn, $sql);


    

    if ($res1 && $res2) {
        echo "<script> window.location.href='http://localhost/Care4you/admin/admin-doc-view.php?';</script>";
    } else {
        
        echo "Error: " . "<br>" . mysqli_error($conn);
        die();
    }
}
}
?>
