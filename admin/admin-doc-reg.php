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
                <li><a href="#">Orders</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</div></a></li>
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

                <form action="" method="POST" id="form">
                <div class="reg-container">
                    <div class="reg-container-col">

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-user"></i>&nbsp;&nbsp;Full Name
                        <input type="text" class="inputtab" name="doc_name" placeholder="Enter Doctor's Fullname" id="doc_name" required/>
                        <div class="error_1"></div>
                    </div>
                        
                        <div class="labeltag">&nbsp;<i class="fa-solid fa-id-badge" id="nic"></i>&nbsp;&nbsp;NIC Number <br/>
                        <input type="text" class="inputtab" name="nic" placeholder="Enter Doctor's NIC Number" required/>
                        <div class="error_1"></div>
                    </div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Contact Number <br/>
                        <input type="text" class="inputtab" name="contact_number" placeholder="Enter Doctor's Contact Number" id="contact_name" required/>
                        <div class="error_1"></div>
                    </div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email Address <br/>
                        <input type="email" class="inputtab" name="email" placeholder="Enter Doctor's Email Address" id="email" required/>
                        <div class="error_1"></div>
                    </div>

                    </div>
                    <div class="reg-container-col mid">

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;SLMC Number
                        <input type="text" class="inputtab" name="SLMC_Number" placeholder="Enter SLMC Number" id="SLMC_Number" required/>
                        <div class="error_1"></div>
                    </div>

                        <div class="labeltag" >&nbsp;<i class="fa-solid fa-hospital-user"></i>&nbsp;&nbsp;Specialization
                        <select name="specialization" id="specialization" class="inputtab">
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
                        <div class="error_1"></div>
                    </div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-sack-dollar"></i>&nbsp;&nbsp;Charge per session (Rs.)
                        <input type="number" step="500" class="inputtab" name="charge" placeholder="Enter Doctor Charge per Session" id="charge" required/>
                        <div class="error_1"></div>
                    </div>

                    </div>
                    <div class="reg-container-col">

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-user-check"></i>&nbsp;&nbsp;Username
                        <input type="text" class="inputtab" name="username" placeholder="Enter Doctor's Username" id="username" required/>
                        <div class="error_1"></div>
                    </div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Password
                        <input type="password" class="inputtab" name="password" placeholder="Enter Doctor's Password" id ="password"/>
                        <div class="error_1"></div>
                    </div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Conform Password
                        <input type="password" class="inputtab" name="confirmpassword" placeholder="Conform Doctor's Password" id="conformpassword"/>
                        <div class="error_1"></div>
                    </div>

                    </div>
                </div>
                <button name="reg" type="submit"  class="reg-foot">
                    <span>Add Doctor&nbsp;</span>
                </button>
                </form>
            </div>
        </div>
</body>

</html>

<?php

if(isset($_POST['reg']))
{

    $doc_name=$_POST['doc_name'];
    $nic=$_POST['nic'];
    $contact_number=$_POST['contact_number'];
    $email=$_POST['email'];
    $SLMC_Number=$_POST['SLMC_Number'];
    $specialization=$_POST['specialization'];
    $charge=$_POST['charge'];
    $username= $_POST['username'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['conformpassword'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_sysusers (actortype, username, password, email)
    VALUES ('doctor', '$username', '$hashed_password', '$email')";

    $res1 = mysqli_query($conn, $sql);

    $last_id = $conn->insert_id;

    $sql = "INSERT INTO tbl_doctor (doc_name, nic, contact_number, SLMC_number, specialization, charge, profile_picture, userid)
    VALUES ('$doc_name', '$nic', '$contact_number', '$SLMC_Number', '$specialization', '$charge', 'user.png', '$last_id')";

    $res2 = mysqli_query($conn, $sql);


    if ($res1 && $res2) 
    {
        // header("Location: /Care4you/admin/admin-doc-view.php");
        echo "<script> window.location.href='http://localhost/Care4you/admin/admin-doc-view.php';</script>";
    }
    else
    {
        echo "Error: " . $s . "<br>" . mysqli_error($conn);
        die();
    }
      
}

?>
<script src="../script/doc-validation.js" defer></script>   