<?php include('../config/constants.php'); ?>
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
                <li><a href="lab_home.php">
                        <div class="highlighttext">Home</div>
                    </a></li>
                <li><a href="lab_appointments.php">Lab Appointments</a></li>
                <li><a href="">Lab tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>

        <div class="main_content">
           
            <div class="back" onclick="location.href='patient_appointments.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content" style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
            <div class="doc-apt-title">My Laboratory Appointments</div>
            <div class="mk-apt-btn"><a href="./patient_makelabappointment.php"><button class="btn-mkdcapt"><span>make Lab appointment</span></button></a></div>
            </div>

            <div class="tbl-content">
                    <table class="tbl-mydocapp tbl-mylabapp">
                        <thead>
                            <tr>
                                <td>Reference No</td>
                                <td>Date</td>
                                <td>Time</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <button class="btn-green"> Confirmed </button></td>
                                <td><a href=" "><button class="book-btn"><span>View Status</span></button></a></td>
                            </tr>
                            
                            <tr>
                                <td colspan="6" class="nosessiontd"><div class="nosession">No Appointments Available</div></td>
                            <tr>              
                        </tbody>
                    </table>
            </div>

        </div>
    </div>
</body>

</html>