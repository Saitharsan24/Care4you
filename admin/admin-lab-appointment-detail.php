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
                <li><a href="admin-doc-appointment.php"><div class="highlighttext">Appointments</a></div></li>
                <li><a href="#">Reports</a></li>
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
            <div class="doc-apt-title-detail" id="id"> Lab Appointments Details</div>
            
            <table class="view-apt" id="tbl-main-app">
                   <tr>
                        <td class="typeR">Reference No :</td>
                        <td class="typeL"> </td>

                        </tr>
                    <tr>
                        <td class="typeR">Doctor Name :</td>
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                        <td class="typeR">Date :</td>
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                        <td class="typeR">Appointment No :</td>
                        <td class="typeL"> </td>                 
                    
                    </tr>
                    <tr>
                        <td class="typeR">Appointment time :</td>
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                    
                        <td class="typeR">Room No :</td>
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                        <td class="typeR">Patient name :</td>
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                        <td class="typeR">Nic No :</td>
                        <td class="typeL"></td>
                    </tr>
                    <tr>
                        <td class="typeR">Session Status :</td>
                        <td class="typeL">
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