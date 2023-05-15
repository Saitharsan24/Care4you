<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php 
    $labapt_id = $_GET['id'];
    
    $sql = "SELECT *,tbl_labappointment.contact AS lab_contact FROM tbl_labappointment
                INNER JOIN tbl_patient ON tbl_labappointment.created_by = tbl_patient.userid
                WHERE labapt_id = '$labapt_id'";

    $result =  mysqli_query($conn, $sql);
    $rowDetails = mysqli_fetch_assoc($result);
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
        <div class="sidebar" style="width: 260px;">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php">Home</a></li>
                <li><a href="lab_newappointments.php">New Appointments</a></li>
                <li><a href="lab_appointmenthistory.php"><div class="highlighttext">Appointment History</div></a></li>
                <li><a href="lab_testsinfo.php">Lab Tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content" style="overflow: hidden;"> 
            <div class="info">

            <div class="back" onclick="location.href='lab_.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                <i class="fa-solid fa-pager" style="font-size: 35px;"></i>
                    &nbsp;Responded Appointment Details
                </div>
            </div>

                <div class="containorLarge">
                    <div class="containorSLeft">
                        <div class="idtxt" style="font-size:20px;">Appointment No : <?php echo $rowDetails['labapt_id'] ?> </div>

                        <div class="headtxt">Patient Name</div>
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $rowDetails['first_name'] ?></div>                  
                        
                        <div class="headtxt">Contact Number</div> 
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $rowDetails['lab_contact'] ?></div>

                        <div class="headtxt">NIC Number</div>
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $rowDetails['nic'] ?></div>

                        <div class="headtxt">Requested Date</div>
                        <div class="datatxt" style="margin-bottom: 15px"><?php echo $rowDetails['labapt_date'] ?></div>                    
                        
                        <div class="headtxt">Appointment Status</div> 
                        <div class="datatxt" style="margin-bottom: 15px">
                        <?php 

                            if($rowDetails['labapt_status']==1){
                                echo ' '.'<button class="st01" style="color: #000;background-color: #FDD147">Payment Pending</button>';
                            } elseif($rowDetails['labapt_status']==2){
                                echo ' '.'<button class="st02" style="color: #fff;background-color: #0C7516">Confirmed</button>';
                            } elseif($rowDetails['labapt_status']==3){
                                echo ' '.'<button class="st03"" style="color: #fff;background-color: #093e4e">Completed</button>';   
                            } else{
                                echo ' '.'<button class="st04" style="color: #fff;background-color: #BD1010">Cancelled</button>';
                            }

                        ?>
                        </div> 
                        
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
                    <?php include('lab_tbl-addtestview.php') ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>