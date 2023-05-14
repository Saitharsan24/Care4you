<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>


<?php

//variable to calculate net total
$nettot = 0;

$labapt_id = $_GET['id'];

$sql = "SELECT *,tbl_labappointment.contact AS lab_contact FROM tbl_labappointment
    INNER JOIN tbl_patient ON tbl_labappointment.created_by = tbl_patient.userid
         WHERE labapt_status = 0";
$result = mysqli_query($conn, $sql);
$albapt_details = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM tbl_addlabtest
    INNER JOIN tbl_labtests ON tbl_labtests.test_id = tbl_addlabtest.test_id
    INNER JOIN tbl_labappointment ON tbl_labappointment.labapt_id = tbl_addlabtest.labapt_id
    WHERE tbl_labappointment.labapt_id = '$labapt_id'
    AND tbl_addlabtest.confirmation_status ='1'";
$test_details = mysqli_query($conn, $sql);

$sql = "SELECT * FROM tbl_addlabtest
    INNER JOIN tbl_labtests ON tbl_labtests.test_id = tbl_addlabtest.test_id
    INNER JOIN tbl_labappointment ON tbl_labappointment.labapt_id = tbl_addlabtest.labapt_id
    WHERE tbl_labappointment.labapt_id = '$labapt_id'
    AND tbl_addlabtest.confirmation_status ='0'";
$test_details_not = mysqli_query($conn, $sql);

$sql = "SELECT * FROM tbl_addlabtest
    INNER JOIN tbl_labappointment ON tbl_labappointment.labapt_id = tbl_addlabtest.labapt_id
    WHERE tbl_labappointment.labapt_id = '$labapt_id'
    AND tbl_addlabtest.test_id IS NULL";
$test_details_null = mysqli_query($conn, $sql);

// print_r($test_details);die();

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
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content" style="overflow: hidden;">
            <div class="info">

                <div class="back" onclick="location.href='lab_viewnewappointment.php?id=<?php echo $labapt_id ?>'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>

                <div class="text-content">
                    <div class="common-title" style="margin-bottom:-10px;margin-top:-20px;">
                        <i class="fa-solid fa-pager" style="font-size: 35px;"></i>
                        &nbsp; Appointment Details
                    </div>
                </div>

                <div class="containorLarge">
                    <div class="containorSLeft">
                        <div class="idtxt" style="font-size:20px;">Appointment No : <?php echo $albapt_details['labapt_id'] ?> </div>

                        <div class="headtxt">Patient Name</div>
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $albapt_details['first_name'] ?></div>

                        <div class="headtxt">Contact Number</div>
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $albapt_details['lab_contact'] ?></div>

                        <div class="headtxt">NIC Number</div>
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $albapt_details['nic'] ?></div>

                        <div class="headtxt">Requested Date</div>
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $albapt_details['labapt_date'] ?></div>

                        <div class="headtxt">Appointment Status</div>
                        <div class="datatxt" style="margin-bottom: 15px"><button class="st00"> Response Pending </button></div>

                        <!-- <div class="headtxt">Other Items</div> 
                        <div class="datatxt" style="margin-bottom: 10px">none</div> -->

                    </div>
                    <div class="containorSRight">
                        <a href="../images/pharmacy-orders/Order_06_02_23_08_56_41_PM.jpeg" download>
                            <img src="../images/pharmacy-orders/Order_06_02_23_08_56_41_PM.jpeg" class="containorSR" style="width:90%; max-height:60vh;">
                        </a>
                        <a class="datatxt2-link" title="Open Prescription in New Window" href="../images/pharmacy-orders/Order_06_02_23_08_56_41_PM.jpeg" target="_blank">
                            PrescriptionName.ext &nbsp;
                            <i class="fa-solid fa-expand"></i>
                        </a>
                    </div>
                    <div class="containorSRLast">
                        <button class="btn-gray" style="width:250px;cursor:pointer;" onclick="openPopup1()">
                            + Add Available Tests
                        </button>
                        <table class="tbl-addmed">
                            <thead>
                                <tr>
                                    <td>Test Name</td>
                                    <td>Test Charge (Rs.)</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($each_test = mysqli_fetch_assoc($test_details)) {
                                ?>
                                    <tr>
                                        <td><?php echo $each_test['test_name'] ?></td>
                                        <td><?php echo $each_test['charge'] ?></td>
                                        <?php
                                        //calculating the net total
                                        $nettot = $nettot + $each_test['charge'];
                                        ?>
                                        <td>
                                            <a href="#">
                                                <i class="fa-solid fa-xmark" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <br>

                        <button class="btn-gray" style="width:250px;cursor:pointer;" onclick="openPopup2()">
                            <a href="#">
                                + Add Unavailable Tests
                            </a>
                        </button>
                        <table class="tbl-addmed">
                            <thead>
                                <tr>
                                    <td>Test Name</td>
                                    <td>Test Charge (Rs.)</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($each_test = mysqli_fetch_assoc($test_details_not)) {
                                ?>
                                    <tr>
                                        <td><?php echo $each_test['test_name'] ?></td>
                                        <td>N/A</td>

                                        <td>
                                            <a href="#">
                                                <i class="fa-solid fa-xmark" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php while ($each_test = mysqli_fetch_assoc($test_details_null)) {
                                ?>
                                    <tr>
                                        <td><?php echo $each_test['test_name'] ?></td>
                                        <td>N/A </td>

                                        <td>
                                            <a href="#">
                                                <i class="fa-solid fa-xmark" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                        <br />
                        <div class="text">
                            <form action="" method="POST">
                                Net Total :
                                <input class="nettotlab" type="text" value="<?php echo 'Rs.' . $nettot ?>" readonly>
                                <br /> <br />
                                <button class="btn-respond" type="submit" name="sendrespond">
                                    <span>Send Respond &nbsp;</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include('./popup/testadd.php'); ?>
</body>

</html>


<?php 
    if (isset($_POST['sendrespond'])) {

        $time = time();
        $userid = $_SESSION['user_id'];

        $sqlupdate = "UPDATE tbl_labappointment SET 
                            responded_by = '$userid',
                            labapt_status = 1,
                            responded_at = '$time',
                            nettotal = '$nettot'
                      WHERE labapt_id = '$labapt_id'";

        $result = mysqli_query($conn, $sqlupdate);
        $_SESSION['labrespond'] = 1;
        echo "<script> window.location.href='./lab_newappointments.php';</script>";
    }

?>