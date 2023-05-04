<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-view-profile.css"> 
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="admin-doc-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php"><div class="highlighttext">Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='admin_editprofile.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <h2 style="margin-left: 60px; margin-top:15px;">Change Password</h2>
            <span>
            <form>
            <table class="formtable">
                <tr>
                    <td>Old Password :</td>
                    <td><input type="password" class="form-control" name="oldpwd" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>New Password :</td>
                    <td><input type="password" class="form-control" name="newpwd" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="password" class="form-control" name="confirmpwd" required="" autofocus="true"/></td>
                </tr>
            </table>
            <button class="btn-change-password" type="submit">Save Password</button>
            </form>
            </span>
            </div>
        </div>
    </div>
</body>
</html>