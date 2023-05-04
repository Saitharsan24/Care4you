<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>Assistant</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('asst_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/assistant/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="asst_home.php">Home</a></li>
                <li><a href="asst_session.php"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="asst_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='asst_viewsession.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <table class="tbl-main">
                <thead>
                    <tr>
                        <td>Appointment Number</td>
                        <td>Patient Name</td>
                        <td>Appointment Time</td>
                        <td>Appointment Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Mrs. Sanjeewani Silva</td>
                        <td>3.00 PM - 3.10 PM</td>
                        <td><button class="btn-paypend">Payment Pending</button></td>
                        <td><a href="#"><button class="btn-viewapp" style="font-size: 13px;"><span>View Appointment</span></button></a></td>
                    </tr>

                    <tr>
                        <td>02</td>
                        <td>Mrs. Ramani Perera</td>
                        <td>3.10 PM - 3.20 PM</td>
                        <td><button class="btn-confirmed">Confirmed</button></td>
                        <td><a href="asst_viewappointment.php"><button class="btn-viewapp" style="font-size: 13px;"><span>View Appointment</span></button></a></td>
                    </tr>

                    <tr>
                        <td>03</td>
                        <td>Mr. Lalith De Silva</td>
                        <td>3.20 PM - 3.30 PM</td>
                        <td><button class="btn-cancelled">Cancelled</button></td>
                        <td><a href="#"><button class="btn-viewapp" style="font-size: 13px;"><span>View Appointment</span></button></a></td>
                    </tr>

                    <tr>
                        <td>04</td>
                        <td>Ms. Kavishi Weerasinghe</td>
                        <td>3.30 PM - 3.40 PM</td>
                        <td><button class="btn-confirmed">Confirmed</button></td>
                        <td><a href="asst_viewappointment.php"><button class="btn-viewapp" style="font-size: 13px;"><span>View Appointment</span></button></a></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
</body>
</html>