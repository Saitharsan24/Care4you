<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-view-patient.css">
    <title>ADMIN</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">
                        <div class="highlighttext">System Users </a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">
                    <span>
                    <div class="main_content"> 
            <div class="info">
           
            <span>
                <div class="square-patient-view">
                <div class="patient-profile-div"><img src="../images/doctor.jpg" alt="user" class="patient-profile"></div>
                <div class="view-patient-table">
                <table class="tbl-square-view-patient">
                            <tr>
                                <td class="type1">Patient ID :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Patient Name :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">User Name :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Gender :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Address :</td>
                                <td class="type2-address"></td>
                            </tr>
                            <tr>
                                <td class="type1">Contact Number :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Email :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Date of birth :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">NIC :</td>
                                <td class="type2"></td>
                            </tr>
                        </table>
                        <td><button class="btn-edit-patient-detail" onclick='location.href="admin-patient-edit-detail.php"'><span>Edit Patient Details</span></button></td>
                        <td><button class="btn-back-patient-detail" onclick='location.href="admin-patient-view.php"'><span>Back</span></button></td>

                </div>        
            </span>
            </div>
        </div>
                    </span>

                </div>
            </div>
        </div>
</body>

</html>