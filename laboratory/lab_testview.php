<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

    //Get the ID of test
    $test_id = isset($_GET['test_id']) ? $_GET['test_id'] : '';

    $sql = "SELECT * FROM tbl_labtests WHERE test_id=$test_id ";
    // echo $sql;
    $res = mysqli_query($conn, $sql);//execute the query

    if($res == TRUE)
    {
        $count =mysqli_num_rows($res);
        if($count == 1)
        {
            $rows = mysqli_fetch_assoc($res);
            $test_id = $rows['test_id'];
            $test_name = $rows['test_name'];
            $duration = $rows['duration'];
            $charge = $rows['charge'];
            $prerequirement = $rows['prerequirement'];
            $NumberOfTestsPerDay = $rows['NumberOfTestsPerDay'];
        }
    }
?>


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
                <li><a href="lab_newappointments.php">New Appointments</a></li>
                <li><a href="lab_appointmenthistory.php">Appointment History</a></li>
                <li><a href="lab_testsinfo.php"><div class="highlighttext">Lab Tests</div></a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
                <div class="back" onclick="location.href='lab_testsinfo.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>

                <div class="text-content" style="display:inline-block;">
                    <div class="common-title"  style="margin-bottom:-10px;margin-top:-10px;">
                    <i class="fa-solid fa-vial-virus" style="font-size:40px;"></i> &nbsp;<?php echo $test_name; ?> Details <br/>
                    </div>
                </div>

                <div class="tst-cont">

                    Test ID : <br/>
                    <?php echo $test_id; ?><br/>
                    Test Name : <br/>
                    <?php echo $test_name; ?><br/>
                    Test Duration : <br/>
                    <?php echo $duration; ?><br/>
                    Test Charge : <br/>
                    <?php echo $charge; ?><br/>
                    Pre-Requirements for Test : <br/>
                    <?php echo $prerequirement; ?><br/>
                    Number of Tests per Day : <br/>
                    <?php echo $NumberOfTestsPerDay; ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>