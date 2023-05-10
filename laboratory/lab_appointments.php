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
                <li><a href="lab_testsinfo.php">Lab Tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-10px;">
                    <i class="fa-solid fa-clipboard-list" style="font-size: 35px;"></i>
                    &nbsp;Laboratory Appointment Details
                </div>
            </div>

            <div class="tbl-content">
                <table class="tbl-common" style="width:70%;">
                    <thead>
                        <tr>
                            <td>Appointment No</td>
                            <td>Patient Name</td>
                            <td>Date</td>
                            <td>Order Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Sanjeewani Silva</td>
                            <td>10/05/2023</td>
                            <td><button>Payment Pending</button></td>
                            <td>
                                <a href="#">
                                    <button class="btn-view"><span>View Appointment</span></button>
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