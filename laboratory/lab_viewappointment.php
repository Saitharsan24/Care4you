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
                <li><a href="lab_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
            <table class="tbl-viewappointment">
                <tr>
                    <td class="tdtype1">Lab Appointment ID :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype1">Patient Name :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype1">Appointment Date :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype1">Tests Done :</td>
                    <td class="tdtype2"></td>
                </tr>
                <tr>
                    <td class="tdtype2"><button class="btn-upload">Upload Report</button></td>
                    <td class="tdtype2"></td>
                </tr>
            </table>
            <br /> <br />
            <button class="btn-blue">Save</button>
            </span>
            </div>
        </div>
    </div>
</body>
</html>