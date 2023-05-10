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
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-doc-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">
                    <span>
                        <div class="main_content">
                            <div class="info">
                            <span>
                                    <div class="square-patient-change-password">
                                        <figure>
                                            <img src="../images/doctor.jpg" alt="user" class="patient-profile-change-password">
                                           
                                        </figure>
                                        <div class="change-password-patient-table">
                                            <table class="tbl-square-change-password-patient">
                                                <tr>
                                                    <td>Old Password :</td>
                                                    <td><input type="password" class="form-control" name="old-password" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>New Password :</td>
                                                    <td><input type="password" class="form-control" name="new-password" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>Conform Password :</td>
                                                    <td><input type="password" class="form-control" name="con-password" required="" autofocus="true" /></td>
                                                </tr>
                                                
                                            </table>
                                            
                                            <td><button class="btn-back-change-password-detail" onclick='location.href="admin-patient-edit-detail.php"'><span>Back</span></button></td>
                                            <td><button class="btn-save-password" onclick='location.href="#"'><span>Save Password</span></button></td>
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