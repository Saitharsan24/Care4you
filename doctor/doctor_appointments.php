<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor.css"> 
    <title>Doctor</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('doctor_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/doctor/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="doctor_home.php">Home</a></li>
                <li><a href="#"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="doctor_viewpatient.php">Patients</a></li>
                <li><a href="doctor_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">

            <div class="back" onclick="location.href='doctor_session.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                    Appointments on &nbsp; 2023 - 05 - 14
                </div>
            </div>

            <div class="tbl-content">
                <table class="tbl-common" style="width:85%;">
                    <thead>
                        <tr>
                            <td>Appointment No</td>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Appointment Time</td>
                            <td>Medical Record Access</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>15</td>
                            <td>Mrs. Sanjeewani Silva</td>
                            <td>3.00 PM - 3.10 PM</td>
                            <td class="allowed">Access Allowed</td>
                            <td><a href="doctor_viewrecords.php"><button class="btn-view"  style="width:150px;"><span>View Records</span></td></a>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>21</td>
                            <td>Mrs. Amal Perera</td>
                            <td>3.10 PM - 3.20 PM</td>
                            <td class="denied">Access Denied</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>04</td>
                            <td>Ms. Kaveesha Dilki</td>
                            <td>3.20 PM - 3.30 PM</td>
                            <td class="allowed">Access Allowed</td>
                            <td><a href="doctor_viewrecords.php"><button class="btn-view"  style="width:150px;"><span>View Records</span></td></a>
                        </tr>        
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>