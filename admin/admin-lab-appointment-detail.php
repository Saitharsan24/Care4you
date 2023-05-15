<?php include('../config/constants.php'); ?>
<?php include('admin_getinfo.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-appointment.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<?php

  $apt_id=$_GET['id'];
 // print_r($apt_id);die();
?>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php"><div class="highlighttext">Appointments</div></a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <div class="back" onclick="location.href='admin-lab-appointment.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="lab-apt-title-detail" id="id"> Lab Appointments Details</div>
            
            <table class="view-lab-apt" id="tbl-main-app">
                   <tr>
                        <td class="typeR">Patient Name :</td>   <!--from tbl_patient -->
                        <td class="typeL"> </td>

                        </tr>
                    <tr>
                        <td class="typeR">Contact Number :</td>     <!--from tbl_patient -->
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                        <td class="typeR">Nic :</td>              <!--from tbl_patient-->
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                        <td class="typeR">Requested Date :</td>        <!--from tbl_labappointment -->
                        <td class="typeL"> </td>                 
                    
                    </tr>
                    <tr>
                        <td class="typeR">Appointment Status :</td>     <!--from tbl_labappointment -->
                        <td class="typeL"></td>
                    </tr>
                        <?php
                            
                              ?> 
                        </td>
                    </tr>
                    <tr>
                        <td class="typeR">Total Amount :</td>
                        <td class="typeL"></td>
                    </tr>

       
               </table>                  
            </div>
        </div>
</body>

</html>