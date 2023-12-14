<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
$labapt_id = $_GET['id'];

$sql = "SELECT *,tbl_labappointment.contact AS lab_contact FROM tbl_labappointment
            INNER JOIN tbl_patient ON tbl_labappointment.created_by = tbl_patient.userid
            WHERE labapt_status = 0";
$result = mysqli_query($conn, $sql);
$albapt_details = mysqli_fetch_assoc($result);
// print_r($row);die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy-orders.css">
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
                <li><a href="lab_newappointments.php">
                        <div class="highlighttext">New Appointments</div>
                    </a></li>
                <li><a href="lab_appointmenthistory.php">Appointment History</a></li>
                <li><a href="lab_testsinfo.php">Lab Tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </a></div>
        </div>
        <div class="main_content" style="overflow: hidden;">
            <div class="info">

                <div class="back" onclick="location.href='lab_newappointments.php'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>

                <div class="text-content">
                    <div class="common-title" style="margin-bottom:-10px;margin-top:-20px;">
                        <i class="fa-solid fa-pager" style="font-size: 35px;"></i>
                        &nbsp; Appointment Details
                    </div>
                </div>

                <div class="containorL1">
                    <div class="containorSL">
                        <div class="idtxt" style="margin-bottom:10px;margin-top:20px;">Appointment No :
                            <?php echo $albapt_details['labapt_id'] ?>
                        </div>

                        <br />

                        <div class="headtxt">Patient Name</div>
                        <div class="datatxt" style="margin-bottom: 15px">
                            <?php echo $albapt_details['first_name'] ?>
                        </div>

                        <div class="headtxt">Contact Number</div>
                        <div class="datatxt" style="margin-bottom: 15px">
                            <?php echo $albapt_details['lab_contact'] ?>
                        </div>

                        <div class="headtxt">NIC Number</div>
                        <div class="datatxt" style="margin-bottom: 15px">
                            <?php echo $albapt_details['nic'] ?>
                        </div>

                        <div class="headtxt">Requested Date</div>
                        <div class="datatxt" style="margin-bottom: 15px">
                            <?php echo $albapt_details['labapt_date'] ?>
                        </div>

                        <div class="headtxt">Appointment Status</div>
                        <div class="datatxt" style="margin-bottom: 15px">
                            <button class="st00">Response Pending</button>
                        </div>

                    </div>
                    <div class="containorSR" style="margin-top:20px;">
                        <a href="../images/labapt-prescription/<?php echo $albapt_details['prescription_name'] ?>" download>
                            <img src="../images/labapt-prescription/<?php echo $albapt_details['prescription_name'] ?>" class="containorSR"
                                style="width:90%; max-height:60vh;">
                        </a>
                        <a class="datatxt2-link" title="Open Prescription in New Window"
                            href="../images/labapt-prescription/<?php echo $albapt_details['prescription_name'] ?>" target="_blank">
                            PrescriptionName.ext &nbsp;
                            <i class="fa-solid fa-expand"></i>
                        </a>
                    </div>
                </div>
                <a href="lab_respond.php?id=<?php echo $labapt_id ?>">
                    <button class="btn-respond" style="width:300px;"><span>Respond to Appointment &nbsp;</span></button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>