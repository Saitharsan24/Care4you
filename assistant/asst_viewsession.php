<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('asst_getinfo.php') ?>

<?php 
    //getting session id from url
    $session_id = $_GET['id'];
    
    //getting session details
    $sql = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>


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

    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/assistant/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="asst_home.php">Home</a></li>
                <li><a href="asst_session.php"><div class="highlighttext">Sessions</div></a></li>
                <li><a href="asst_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='asst_session.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="container-row">
            <div class="container01">
                <div class="sessionidTXT">
                    SESSION ID <br/><br/>
                    <div style="color:#000; font-size:100px; margin-top:20px;"><?php echo $row['session_id'] ?></div>
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
                        <td class="typeR">Doctor Name :</td>
                        <td class="typeL"><?php echo $row['doc_name'] ?></td>
                    </tr>


                    <?php  
                            if($row['time_slot']==0){
                                $time="8am-10am";   
                            }else if($row['time_slot']==1){
                                $time='10am-12pm';
                            }else if($row['time_slot']==2){
                                $time='12pm-2pm';
                            }else if($row['time_slot']==3){
                                $time='2pm-4pm';
                            }else if($row['time_slot']==4){
                                $time='4pm-6pm';
                            }else{   
                                $time='6pm-8pm';
                            } 
                    ?>
                    <tr>
                        <td class="typeR">Time Slot :</td>
                        <td class="typeL"><?php echo $time ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Room Number :</td>
                        <td class="typeL"><?php echo $row['room_no'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Number of Appointments :</td>
                        <td class="typeL"><?php echo $row['no_of_appointment'] ?></td>
                    </tr>
                    <tr>
                        <td class="typeR">Session Status :</td>
                        <td class="typeL">
                            <?php 
                                if($row['status']==1){
                                    echo ' '.'<button class="order-st00">Confirmed</button>';
                                } elseif($row['status']==2){
                                    echo ' '.'<button class="order-st01">Completed</button>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="margin-top:0px;"><a href="./asst_appointments.php?id=<?php echo $session_id ?>"><button class="btn-viewapp"><span>Go to Appointments</span></button></a></td>
                    </tr>
                </table>
            </div>
            </div>
            
            </div>
        </div>
</body>
</html>