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
                <li><a href="#">Orders</a></li>
                <li><a href="#">Appointments</a></li>
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
                                    <div class="square-patient-edit">
                                        <figure>
                                            <img src="../images/doctor.jpg" alt="user" class="patient-profile-edit">
                                            <figcaption class="change-profile-txt">Change Profile Picture</figcaption>
                                        </figure>
                                        <div class="edit-patient-table">
                                            <table class="tbl-square-edit-patient">
                                                <tr>
                                                    <td>Patient ID :</td>
                                                    <td><input type="text" class="form-control" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Patient Name :</td>
                                                    <td><input type="text" class="form-control" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td>User Name :</td>
                                                    <td><input type="text" class="form-control" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Gender :</td>
                                                    <td><input type="radio" class="container" name="name" required="" autofocus="true" /> Male
                                                        <input type="radio" class="container" name="name" required="" autofocus="true" /> Female
                                                        <input type="radio" class="container" name="name" required="" autofocus="true" /> Others
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Address :</td>
                                                    <td><input type="textarea" class="form-control-address" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Number :</td>
                                                    <td><input type="text" class="form-control" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td><input type="email" class="form-control" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of birth :</td>
                                                    <td><input type="date" class="form-control" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                                <tr>
                                                    <td>NIC :</td>
                                                    <td><input type="text" class="form-control" name="name" required="" autofocus="true" /></td>
                                                </tr>
                                            </table>
                                            <td><button class="btn-save-changes" onclick='location.href="#"'><span>Save Changes</span></button></td>
                                            <td><button class="btn-back-edit-detail" onclick='location.href="admin-patient-view-detail.php"'><span>Back</span></button></td>
                                            <td><button class="btn-change-password" onclick='location.href="admin-change-password.php"'><span>Change Password</span></button></td>
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