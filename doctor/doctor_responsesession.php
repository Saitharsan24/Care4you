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
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
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
                <li><a href="doctor_session.php"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="doctor_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='doctor_session.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="container-row">
            <div class="container01">
                <div class="sessionidTXT">
                    SESSION ID <br/><br/>
                    <div style="color:#000; font-size:100px; margin-top:20px;">01</div>
                </div>
            </div>
            <div class="container02">
                <table class="viewtbl">
                    <tr>
                        <td colspan="2">
                            <div class="sessionidTXT" style="margin-bottom:0px;"><i class="fa-solid fa-hand-holding-medical"></i>&nbsp;SESSION DETAILS</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Session Date :</td>
                        <td class="typeL">2023-05-14</td>
                    </tr>
                    <tr>
                        <td class="typeR">Time Slot :</td>
                        <td class="typeL">3.00PM - 5.00PM</td>
                    </tr>
                    <tr>
                        <td class="typeR">Room Number :</td>
                        <td class="typeL">05</td>
                    </tr>
                    <tr>
                        <td class="typeR">Number of Appointments :</td>
                        <td class="typeL">03</td>
                    </tr>
                    <tr>
                        <td class="typeR">Assigned Assistant :</td>
                        <td class="typeL">Mashi De Silva</td>
                    </tr>
                    <!-- if resonse pending -->
                    <tr>
                        <td class="typeL" style="padding-left:150px;"><a href="#"><button class="st01">✔&nbsp;Confirm Session</button></a></td>
                        <td class="typeR" style="padding-right:110px;"><a href="#"><button class="st03">✖&nbsp;Cancel Session</button></a></td>
                    </tr>
                    <!-- if resonse pending -->

                    <!-- if session confirmed -->
                    <tr>
                        <td colspan="2">
                            <a href="doctor_appointments.php"><button class="btn-view"  style="width:175px;"><span>View Appointments</span>
                        </td></a>
                    </tr>
                    <!-- if session confirmed -->

                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>