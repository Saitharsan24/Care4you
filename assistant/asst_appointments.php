<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('asst_getinfo.php') ?>

<?php 
    //getting session id form URL
    $session_id = $_GET['id'];

    $sql = "SELECT * FROM tbl_docappointment 
                INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid  
                INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
                AND session_id = '$session_id'
                AND (docapt_status = '1' OR docapt_status = '3' OR docapt_status = '4')";
    $results = mysqli_query($conn,$sql);    
    
    
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
            <div class="back" onclick="location.href='asst_viewsession.php?id=<?php echo $session_id ?>'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <table class="tbl-main">
                <thead>
                    <tr>
                        <td>Appointment Number</td>
                        <td>Patient Name</td>
                        <td>Appointment Time</td>
                        <td>Appointment Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(mysqli_num_rows($results) !=0 ){
                        while($row = mysqli_fetch_assoc($results)){
                            
                    ?>
                            <tr>
                                <td><?php echo $row['docapt_no'] ?></td>
                                <?php 
                                    if($row['my_other'] == 1){
                                ?>
                                        <td><?php echo $row['pat_name'] ?></td>
                                <?php
                                    }else{
                                ?>
                                        <td><?php echo $row['first_name'] ?></td>
                                <?php        
                                    }
                                ?>

                                <td><?php echo $row['docapt_time'] ?></td>
                                <td>
                                    <?php 
                                        if($row['docapt_status']==1){
                                            echo ' '.'<button class="docapt-st01">Confirmed</button>';
                                    } elseif($row['docapt_status']==3){
                                            echo ' '.'<button class="docapt-st03">Completed</button>';
                                    } elseif($row['docapt_status']==4){
                                        echo ' '.'<button class="docapt-st04">Not Attended</button>';
                                    } 
                                    ?>
                                </td>
                                <td><a href="asst_viewappointment.php?id=<?php echo $row['docapt_id'] ?>"><button class="btn-viewapp" style="font-size: 13px;"><span>View Appointment</span></button></a></td>
                            </tr>
                    <?php 
                            }
                        
                        }else {
                    ?>
                            <tr>
                            <td class="nosessiontd" colspan="5"><div class="nosession">No Appointments yet</td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
</body>
</html>