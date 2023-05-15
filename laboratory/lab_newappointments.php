<?php include('../config/constants.php'); ?>
<?php include('../login_access.php') ?>

<?php
if (isset($_SESSION['labrespond'])) {
    include('./popup/respondedpop.php');
    unset($_SESSION['labrespond']);
    echo "<script>openPopupRS()</script>";
}
?>






<?php
$sql = "SELECT * FROM tbl_labappointment
        INNER JOIN tbl_patient ON tbl_labappointment.created_by = tbl_patient.userid
        WHERE labapt_status = 0";
$result = mysqli_query($conn, $sql);
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
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php">Home</a></li>
                <li><a href="lab_newappointments.php"><div class="highlighttext">New Appointments</div></a></li>
                <li><a href="lab_appointmenthistory.php">Appointment History</a></li>
                <li><a href="lab_testsinfo.php">Lab Tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="text-content">
                    <div class="common-title" style="margin-bottom:-5px;margin-top:-10px;">
                        <i class="fa-solid fa-clipboard-list" style="font-size: 35px;"></i>
                        &nbsp;New Laboratory Appointment Details
                    </div>
                </div>

                <div class="tbl-content">
                    <table class="tbl-common" style="width:70%;">
                        <thead>
                            <tr style="background-color: white;">
                                <td>Appointment Id</td>
                                <td>Patient Name</td>
                                <td>Date</td>
                                <td>Order Status</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <tr style="background-color: white;">
                                    <td>
                                        <?php echo $row['labapt_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['first_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['labapt_date'] ?>
                                    </td>
                                    <td>
                                        <button class="st00">Response Pending</button>
                                    </td>
                                    <td>
                                        <a href="lab_viewnewappointment.php?id=<?php echo $row['labapt_id'] ?>">
                                            <button class="btn-view"><span>View Appointment</span></button>
                                        </a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>