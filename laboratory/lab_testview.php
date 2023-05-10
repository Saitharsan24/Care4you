<?php include('../config/constants.php') ?>
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
            <img src="../images/user-profilepic/pharmacist/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php">Home</a></li>
                <li><a href="lab_appointments.php">Lab Appointments</a></li>
                <li><a href="lab_testsinfo.php"><div class="highlighttext">Lab Tests</div></a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <!-- <div class="back" onclick="location.href='#'">
            <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div> -->

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-10px;">
                <?php
                    //Get the ID and Name of test
                    $test_id = isset($_GET['test_id']) ? $_GET['test_id'] : '';
                    $test_name = isset($_GET['test_name']) ? $_GET['test_name'] : '';
                ?>
                <i class="fa-solid fa-vial-virus" style="font-size:40px;"></i> &nbsp;<?php echo $test_name; ?> Details <br/>
                </div>

                
            </div>

            </div>
        </div>
    </div>
</body>
</html>