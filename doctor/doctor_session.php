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
            <div class="tbl-content">
                <table class="tbl-common" style="width:85%;">
                    <thead>
                        <tr>
                            <td>Session ID</td>
                            <td>Session Date</td>
                            <td>Session Time</td>
                            <td>Number of Patients</td>
                            <td>Room Number</td>
                            <td>Session Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>2023-05-14</td>
                            <td>3.00PM - 5.00PM</td>
                            <td>03</td>
                            <td>05</td>
                            <td><button class="st02"> Pending Response </button></td>
                            <td><a href="doctor_responsesession.php"><button class="btn-view"  style="width:175px;"><span>Response to Session</span></td></a>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>2023-05-15</td>
                            <td>2.00PM - 4.00PM</td>
                            <td>11</td>
                            <td>05</td>
                            <td><button class="st01"> Session Confirmed </button></td>
                            <td><a href="doctor_responsesession.php"><button class="btn-view"  style="width:175px;"><span>View Session</span></td></a>
                        </tr>     
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>