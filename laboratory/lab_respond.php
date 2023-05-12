<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

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
                <li><a href="lab_newappointments.php"><div class="highlighttext">New Appointments</div></a></li>
                <li><a href="lab_appointmenthistory.php">Appointment History</a></li>
                <li><a href="lab_testsinfo.php">Lab Tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content" style="overflow: hidden;"> 
            <div class="info">

            <div class="back" onclick="location.href='lab_viewnewappointment.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

            <div class="text-content">
                <div class="common-title"  style="margin-bottom:-10px;margin-top:-20px;">
                <i class="fa-solid fa-pager" style="font-size: 35px;"></i>
                    &nbsp; Appointment Details
                </div>
            </div>

                <div class="containorLarge">
                    <div class="containorSLeft">
                        <div class="idtxt">Appointment No : 01 </div>

                        <br/>

                        <div class="headtxt">Patient Name</div>
                        <div class="datatxt" style="margin-bottom: 15px">Sanjeewani Silva</div>                  
                        
                        <div class="headtxt">Contact Number</div> 
                        <div class="datatxt" style="margin-bottom: 15px">0710605124</div>

                        <div class="headtxt">NIC Number</div>
                        <div class="datatxt" style="margin-bottom: 15px">783049521V</div>

                        <div class="headtxt">Requested Date</div>
                        <div class="datatxt" style="margin-bottom: 15px">10/05/2023</div>                    
                        
                        <div class="headtxt">Appointment Status</div> 
                        <div class="datatxt" style="margin-bottom: 15px"><button class="st01"> Pending Payment </button></div> 
                        
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
                    <?php include('lab_tbl-addtest.php') ?>
                </div>

                
                <!--ID PRESCRIPTION NOT UPLOADED ONLY TEST NAMES GIVEN 
                    
                    <div class="containorLarge"  style="width:80%">
                    <div class="containorSLeft"  style="width:40%">
                    <div class="idtxt">Appointment No : 01 </div>

                    <br/>

                    <div class="headtxt">Patient Name</div>
                    <div class="datatxt" style="margin-bottom: 15px">Sanjeewani Silva</div>                  

                    <div class="headtxt">Contact Number</div> 
                    <div class="datatxt" style="margin-bottom: 15px">0710605124</div>

                    <div class="headtxt">NIC Number</div>
                    <div class="datatxt" style="margin-bottom: 15px">783049521V</div>

                    <div class="headtxt">Requested Date</div>
                    <div class="datatxt" style="margin-bottom: 15px">10/05/2023</div>                    

                    <div class="headtxt">Appointment Status</div> 
                    <div class="datatxt" style="margin-bottom: 15px"><button class="st01"> Pending Payment </button></div> 

                    <div class="headtxt">Other Items</div> 
                    <div class="datatxt" style="margin-bottom: 10px">none</div>

                    </div>
                    <div class="containorSRLast"  style="width:60%">
                    <?php //include('lab_tbl-addtest.php') ?>
                </div> -->

            </div>
        </div>
    </div>
</body>
</html>