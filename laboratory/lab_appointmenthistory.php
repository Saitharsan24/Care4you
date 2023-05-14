<?php include ('../config/constants.php');?>
<?php include('../login_access.php') ?>

<?php 
            $sql = "SELECT * FROM tbl_labappointment
                        INNER JOIN tbl_patient ON tbl_labappointment.created_by = tbl_patient.userid
                    WHERE labapt_status != 0";
            $result = mysqli_query($conn, $sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
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
        <div class="main_content">
        
            <div class="order-filter-btn">
                <div class="right-button order-filter-main-btn">
                    <a href="?pendingid "><button  style="width: 180px;" class="btn-press" name="pendingpayment">Payment Pending</button></a>
                    <a href="?confirmedid"><button class="btn-press" name="confirmed">Comfirmed</button></a>
                    <a href="?completeid"><button class="btn-press" name="complete">Completed</button></a>
                </div>

                <?php 
                    if(isset($_GET['pendingid']) || isset($_GET['confirmedid']) || isset($_GET['completeid'])){ ?>
                        <div class="clearfilt-order"><a href="./lab_appointmenthistory.php"><i class="fa-solid fa-circle-xmark" style="color: #0d5c75;"></i>Clear filter</a></div>
                <?php }?>

            </div>
        
            <div class="info">
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Appointment No</td>
                            <td>Patient Name</td>
                            <td>Respond Date</td>
                            <td>Appointment Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            if($result){
                                while($rowRespond = mysqli_fetch_assoc($result)){
                        ?>

                        <tr>
                            <td><?php echo $rowRespond['labapt_id'] ?></td>
                            <td><?php echo $rowRespond['first_name'] ?></td>
                            <td><?php echo $rowRespond['labapt_date'] ?></td>
                            <td>
                            <?php 

                                    if($rowRespond['labapt_status']==1){
                                        echo ' '.'<button class="st01" style="color: #000;background-color: #FDD147">Payment Pending</button>';
                                    } elseif($rowRespond['labapt_status']==2){
                                        echo ' '.'<button class="st02" style="color: #fff;background-color: #0C7516">Confirmed</button>';
                                    } elseif($rowRespond['labapt_status']==3){
                                        echo ' '.'<button class="st03"" style="color: #fff;background-color: #093e4e">Completed</button>';   
                                    } else{
                                        echo ' '.'<button class="st04" style="color: #fff;background-color: #BD1010">Cancelled</button>';
                                    }

                                    ?>
                            </td>
                            <td>
                            <a href="./lab_viewrespondedapt.php?id=<?php echo $rowRespond['labapt_id'] ?>"><button class="btn-view"><span>View Details</span></button></a>
                            </td>
                        </tr>
                        
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>