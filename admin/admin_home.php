<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user"
                class="imgframe">
            <ul>
                <li><a href="admin_home.php">
                        <div class="highlighttext">Home</div>
                    </a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patient</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <?php
                // if (isset($_SESSION['login'])) {
                //     echo $_SESSION['login'];
                //     unset($_SESSION['login']);

                // }
                // if (isset($_SESSION['no-login-message'])) {
                //     echo $_SESSION['no-login-message'];
                //     unset($_SESSION['no-login-message']);

                // }
                ?>
                <div class="welcometext">Welcome <div class="usernametext">
                        <?php echo $_SESSION['user']; ?>
                    </div>
                </div>
                <div class="flex-cont">
                    <div class="graph-cont">
                        <<< Graph Here>>>
                    </div>
                    <div class="box-cont">
                        <div class="box-sub">
                            <div class="box-title"> Pending Sessions </div>
                            <div class="box-data"> 05 </div>
                        </div>
                        <div class="box-sub" style="margin-top: 6%;">
                            <div class="box-title"> Pending Lab Reports </div>
                            <div class="box-data"> 10 </div>
                        </div>
                        <div class="box-sub" style="margin-top: 6%;">
                            <div class="box-title"> Pending Orders </div>
                            <div class="box-data"> 10 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>