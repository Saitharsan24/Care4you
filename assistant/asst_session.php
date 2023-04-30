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
            <table class="tbl-main">
                <thead>
                    <tr>
                        <td>Session ID</td>
                        <td>Time Slot</td>
                        <td>Number of Appointments</td>
                        <td>Doctor Name</td>
                        <td>Room Number</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>3.00 PM - 5.00 PM</td>
                        <td>3</td>
                        <td>Dr. Sepalika Mendis</td>
                        <td>UF07</td>
                        <td><a href="asst_view_appointment.php"><button class="btn-viewapp"><span>Appointments</span></button></a></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
</body>
</html>