<?php include ('../config/constants.php');?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lab.css"> 
    <title>Laboratory</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('lab_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php">Home</a></li>
                <li><a href="lab_appointments.php"><div class="highlighttext">Lab Appointments</div></a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Lab Appointment ID</td>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Appointment Date</td>
                            <td>Appointment Time</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>24</td>
                            <td>Mr. Sandakoon</td>
                            <td>2022-11-14</td>
                            <td>15:00</td>
                            <td><a href="lab_viewappointment.php"><button class="btn-viewapp"><span>View Appointment</span></button></a></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>13</td>
                            <td>Ms. Weerakoon</td>
                            <td>2022-11-14</td>
                            <td>15:30</td>
                            <td><a href="lab_viewappointment.php"><button class="btn-viewapp"><span>View Appointment</span></button></a></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>42</td>
                            <td>Mr. Thanushan</td>
                            <td>2022-11-15</td>
                            <td>13:30</td>
                            <td><a href="lab_viewappointment.php"><button class="btn-viewapp"><span>View Appointment</span></button></a></td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>55</td>
                            <td>Ms. Sivamayoury</td>
                            <td>2022-11-15</td>
                            <td>15:30</td>
                            <td><a href="lab_viewappointment.php"><button class="btn-viewapp"><span>View Appointment</span></button></a></td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>65</td>
                            <td>Mr. Jonathan</td>
                            <td>2022-11-15</td>
                            <td>17:15</td>
                            <td><a href="lab_viewappointment.php"><button class="btn-viewapp"><span>View Appointment</span></button></a></td>
                        </tr>
                    </tbody>
                </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>