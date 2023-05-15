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
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);

                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);

                }
            ?>
            <div class="system-users">Access System Users</div>
        </div>
            <span>

                <!-- <div class="system-users">System Users </div> -->

                <button class="button-doc" onclick="location.href='admin-doc-view.php'">
                    <i class="fa-solid fa-stethoscope" style="font-size:40px;"></i>
                    <br/>
                    Doctor
                </button>
                                
                <button class="button-asst" onclick="location.href='admin-asst-view.php'">
                    <i class="fa-solid fa-clipboard-list" style="font-size:40px;"></i>
                    <br/>
                    Assistant
                </button>

                <button class="button-phar" onclick="location.href='admin-pha-view.php'">
                    <i class="fa-solid fa-pills" style="font-size:40px;"></i>
                    <br/>
                    Pharmacist
                </button>

                <button class="button-lab" onclick="location.href='admin-labtec-view.php'">
                    <i class="fa-solid fa-flask-vial" style="font-size:40px;"></i>
                    <br/>
                    Lab Tecnician
                </button>

            </span>

            </div>
        </div>
    </div>
</body>
</html>