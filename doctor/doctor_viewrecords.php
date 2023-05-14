<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 
    $patient_id = $_GET['patid'];
    $session_id = $_GET['id'];
?>

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

            <div class="back" onclick="location.href='doctor_appointments.php?id=<?php echo $session_id ?>'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                    Mrs. Sanjeewani Silva - Medical Records
                </div>
            </div>
                <div class="container-row">

                    <a href="doctor_recdocpre.php">
                    <div class="rec-containor c1">
                        <br/>
                        <img src="../images/logo.png" alt="logo" width="100px" height="50px">
                        <br/><br/>
                        <div class="rec-title">Doctor <br/> Prescriptions
                        <br/><br/>
                        <i class="fa-solid fa-user-doctor" style="font-size:65px;"></i>
                        </div>
                        </a>
                    </div>
                    

                    <a href="doctor_reclabrep.php">
                    <div class="rec-containor c2">
                        <br/>
                        <img src="../images/logo.png" alt="logo" width="100px" height="50px">
                        <br/><br/>
                        <div class="rec-title">Lab <br/> Reports
                        <br/><br/>
                        <i class="fa-solid fa-flask-vial" style="font-size:65px;"></i>
                        </div>
                        </a>
                    </div>

                    <a href="doctor_recother.php">
                    <div class="rec-containor c3">
                        <br/><br/><br/><br/><br/>
                        <div class="rec-title">Other <br/> Records
                        <br/><br/>
                        <i class="fa-solid fa-file-medical" style="font-size:65px;"></i>
                        </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>