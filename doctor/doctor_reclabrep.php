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

            <div class="back" onclick="location.href='doctor_viewrecords.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                    <img src="../images/logo.png" alt="logo" width="100px" height="50px"> <br/>
                    Past Lab Reports
                </div>
            </div>

            <div class="tbl-content">
                <table class="tbl-common" style="width:65%; margin-top:20px;">
                    <thead>
                        <tr>
                            <td>Test ID</td>
                            <td>Test Name</td>
                            <td>Report Issued Date</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Blood Culture</td>
                            <td>15/04/2023</td>
                            <td>
                                <a href="../images/lab-reports/patient-report/LFT.pdf" target="_blank">
                                <button onclick="downloadPDF()" class="btn-view" style="width:200px;"><span>View Lab Report</span></button>
                                </a>
                            </td>
                        </tr>        
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>