<?php include('../config/constants.php'); ?>
<?php include('../login_access.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-report.css">
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
                <li><a href="admin-reports.php"><div class="highlighttext">Reports</div></a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="back" onclick="location.href='admin-reports.php'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>

                <div class="reg-heading">
                    <i class="fa-solid fa-clipboard-list" style="font-size: 45px;font-weight: 800;"></i>
                    &nbsp;Report Generation
                </div>
                
                <div class="reg-container">
                    <div style="  background-color: #ffffff;color: #000000;font-size: 20px;font-weight: 500;width:400px">
                        <label style="margin-top: -30px; margin-bottom:10px;">Select appointment:</label>
                        <select name="" id="">
                            <option value="">Select appointment type</option>
                            <option value="">Doctor appointment</option>
                            <option value="">Lab appointment</option>
                        </select>
                    
                        <label style="margin-top:20px; margin-bottom:10px;">Select month:</label>
                        <select name="" id="">
                            <option value="">Select month</option>
                            <option value="">January</option>
                            <option value="">February</option>
                            <option value="">March</option>
                            <option value="">April</option>
                            <option value="">May</option>
                            <option value="">June</option>
                            <option value="">July</option>
                            <option value="">August</option>
                            <option value="">September</option>
                            <option value="">October</option>
                            <option value="">November</option>
                            <option value="">December</option>
                        </select>
                    </div>
                </div>
                <button name="reg" class="reg-foot pha">
                    <span>Generate report&nbsp;</span>
                </button>
            </div>
        </div>
</body>

</html>
