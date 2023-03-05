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
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php"><div class="highlighttext">View Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <div class="polygons">
                    <div class="square">
                        <br /><br /><br /><br /><br /><br /><br />
                        <table class="tbl-square">
                            <tr>
                                <td class="type1">Name :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Username :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Email Address :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">NIC Number :</td>
                                <td class="type2"></td>
                            </tr>
                            <tr>
                                <td class="type1">Contact Numer :</td>
                                <td class="type2"></td>
                            </tr>
                        </table> 
                    </div>
                        <a href="admin_editprofile.php"><button class="btn-edit-profile">Edit Profile</button></a>                      
                        <img src="../images/admin-user.jpg" alt="user" class="circle" />
                        <div id="overlap"></div>
                </div>
            </span>
            </div>
        </div>
    </div>
</body>
</html>