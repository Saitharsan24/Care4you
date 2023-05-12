<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 
    //getting session id to display sessions details
    $session_id = $_GET['id'];

    $userid = $_SESSION['user_id'];
    $sql = "SELECT *,tbl_docsession.status as docstatus,tbl_sysusers.status as sysstatus FROM tbl_docsession 
                INNER JOIN tbl_doctor ON tbl_docsession.doctor_id =  tbl_doctor.doctor_id
                INNER JOIN tbl_assistant ON tbl_assistant.assistant_id = tbl_docsession.assistant_id
                INNER JOIN tbl_sysusers ON tbl_doctor.userid = tbl_sysusers.userid
                AND tbl_docsession.session_id = '$session_id'";
    $result = mysqli_query($conn, $sql);
    $session_details = mysqli_fetch_assoc($result);
    //print_r($session_details);die();

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
            <div class="back" onclick="location.href='doctor_session.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="container-row">
            <div class="container01">
                <div class="sessionidTXT">
                    SESSION ID <br/><br/>
                    <div style="color:#000; font-size:100px; margin-top:20px;"><?php echo $session_id ?></div>
                </div>
            </div>
            <div class="container02">
                <table class="viewtbl">
                    <tr>
                        <td colspan="2">
                            <div class="sessionidTXT" style="margin-bottom:0px;"><i class="fa-solid fa-hand-holding-medical"></i>&nbsp;SESSION DETAILS</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Session Date :</td>
                        <td class="typeL"><?php echo $session_details['date'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Time Slot :</td>
                                <?php 
                                    //echo $row['status'];  
                                    if($session_details['time_slot']==0){
                                        $time="8am - 10am";   
                                    }else if($session_details['time_slot']==1){
                                        $time='10am - 12pm';
                                    }else if($session_details['time_slot']==2){
                                        $time='12pm - 2pm';
                                    }else if($session_details['time_slot']==3){
                                        $time='2pm - 4pm';
                                    }else if($session_details['time_slot']==4){
                                        $time='4pm - 6pm';
                                    }else{   
                                        $time='6pm-8pm';    
                                    } 
                                ?>
                        <td class="typeL"><?php echo $time ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Room Number :</td>
                        <td class="typeL"><?php echo $session_details['room_no'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Number of Appointments :</td>
                        <td class="typeL"><?php echo $session_details['no_of_appointment'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Assigned Assistant :</td>
                        <td class="typeL"><?php echo $session_details['name'] ?></td>
                    </tr>
                    
                    <?php 
                    // print_r($row);die();
                        if ($session_details['docstatus'] == 0) {
                    ?>
                            <!-- if resonse pending -->
                            <tr>
                                <td class="typeL" style="padding-left:150px;"><a href="#"><button class="st01">✔&nbsp;Confirm Session</button></a></td>
                                <td class="typeR" style="padding-right:110px;"><a href="#"><button class="st03">✖&nbsp;Cancel Session</button></a></td>
                            </tr>
                    <?php 
                        }
                    ?>
                    
                    <?php 
                        if ($session_details['docstatus'] != 0 || $row['docstatus'] != 3) {
                    ?>
                    <!-- if session confirmed -->
                    <tr>
                        <td colspan="2">
                            <a href="doctor_appointments.php?id=<?php echo $session_id ?>"><button class="btn-view"  style="width:175px;"><span>View Appointments</span>
                        </td></a>
                    </tr>

                    <?php 
                        }
                    ?>
                    <!-- if session confirmed -->

                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>