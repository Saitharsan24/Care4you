<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 
    //getting user id from session variable
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM tbl_docsession 
                INNER JOIN tbl_doctor ON tbl_docsession.doctor_id =  tbl_doctor.doctor_id
                AND tbl_doctor.userid = '$userid'";
    $result = mysqli_query($conn, $sql);
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
            <div class="tbl-content">
                <table class="tbl-common" style="width:85%;">
                    <thead>
                        <tr>
                            <td>Session ID</td>
                            <td>Session Date</td>
                            <td>Session Time</td>
                            <td>Session Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>

                                    <tr>
                                        <td><?php echo $row['session_id'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                            <?php  
                                                if($row['time_slot']==0){
                                                    $time="8am - 10am";   
                                                }else if($row['time_slot']==1){
                                                    $time='10am - 12pm';
                                                }else if($row['time_slot']==2){
                                                    $time='12pm - 2pm';
                                                }else if($row['time_slot']==3){
                                                    $time='2pm - 4pm';
                                                }else if($row['time_slot']==4){
                                                    $time='4pm - 6pm';
                                                }else{   
                                                    $time='6pm-8pm';
                                                } 
                                            ?>
                                        <td><?php echo $time ?></td>
                                        <td>
                                            <?php 
                                                //echo $row['status'];
                                                if($row['status']==0){
                                                    echo '<button class="btn-paypend"> Pending </button>';
                                                }else if($row['status']==1){
                                                    echo '<button class="btn-confirmed"> Confirmed </button>';
                                                }else if($row['status']==2){
                                                    echo '<button class="btn-completed"> Completed </button>';
                                                }else if($row['status']==3){
                                                    echo '<button class="btn-cancelled"> Cancelled </button>'; 
                                                }
                                            ?>
                                        </td>
                                        <td><a href="doctor_responsesession.php?id=<?php echo $row['session_id'] ?>"><button class="btn-view"  style="width:175px;"><span>View Sessions</span></td></a>
                                    </tr>

                        <?php
                                }
                            }
                        ?>


                        <!-- <tr>
                            <td>02</td>
                            <td>2023-05-15</td>
                            <td>2.00PM - 4.00PM</td>
                            <td>11</td>
                            <td>05</td>
                            <td><button class="st01"> Session Confirmed </button></td>
                            <td><a href="doctor_responsesession.php"><button class="btn-view"  style="width:175px;"><span>View Session</span></td></a>
                        </tr>      -->
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>