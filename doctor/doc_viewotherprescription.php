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

            <div class="back" onclick="location.href='doctor_recother.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                    Patient Uploaded Medical Records
                </div>
            </div>

            <div class="tbl-content">
                <div class="container-row2">
                <div class="view-sub1">
                <div class="view-idtxt" style="font-size: 20px;">Record Number 01</div>
                <br/>
                <div class="view-headtxt">Doctor Name</div>
                <div class="view-datatxt">Dr. Sepalika Mendis</div>
                <br/>
                <div class="view-headtxt">Prescription Issued Date</div>
                <div class="view-datatxt">2023/04/14</div>
                <br/>
                <div class="view-headtxt">Description</div>
                <div class="view-datatxt">I was experiencing chest pain and shortness of breath.</div>
                <br/>
                </div>
                <div class="view-sub2">
                <img src="../images/pharmacy-orders/Order_06_02_23_08_56_41_PM.jpeg" alt="" class="view-sub2" style="border-radius:0px;">
                </div>
            </div>
            
            </div>
        </div>
    </div>
</body>
</html>