<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 
    //getting session id from url

    $session_id = $_GET['id'];

    $sql = "SELECT * FROM tbl_docappointment
                INNER JOIN tbl_patient ON tbl_patient.userid = tbl_docappointment.created_by
                AND session_id = '$session_id'";
    $doct_apt = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor.css"> 
    <title>Doctor</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include('doctor_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/doctor/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="doctor_home.php">Home</a></li>
                <li><a href="doctor_session.php"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="doctor_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">

            <div class="back" onclick="location.href='./doctor_responsesession.php?id=<?php echo $session_id ?>'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                    Appointments on &nbsp; Session ID - <?php echo $session_id ?>
                </div>
            </div>

            <div class="tbl-content">
                <table class="tbl-common" style="width:85%;">
                    <thead>
                        <tr>
                            <td>Appointment No</td>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Appointment Time</td>
                            <td>Medical Record Access</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if($doct_apt){
                            while($appointments = mysqli_fetch_assoc($doct_apt)){
                        ?>
                                <tr>
                                    <td><?php echo $appointments['docapt_no'] ?></td>
                                    <td><?php echo $appointments['p_id'] ?></td>
                                    <td><?php echo $appointments['first_name'] ?></td>
                                    <td><?php echo $appointments['docapt_time'] ?></td>
                                    
                                    <?php 
                                        if($appointments['record_access'] == 1){
                                    ?>
                                            <td class="allowed">Access Allowed</td>
                                    <?php
                                        } else {
                                    ?>  
                                            <td class="denied">Access Denied</td>
                                    <?php
                                        }
                                    ?>  
                                    
                                    <?php 
                                        if($appointments['record_access'] == 1){
                                    ?>
                                            <td><button class="btn-view"  style="width:150px;" onclick="location.href='doctor_viewrecords.php?patid=<?php echo $appointments['created_by'] ?>&id=<?php echo $appointments['session_id'] ?>'"><span>View Records</span></a></td>
                                    <?php
                                        } else {
                                    ?>  
                                            <td></td>
                                    <?php
                                        }
                                    ?>  
                                    
                                </tr>
                        <?php
                            }
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