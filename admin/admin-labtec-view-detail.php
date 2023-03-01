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
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <div class="detail-txt-lab">ID <div class="id-txt-lab">XXX </div>Labtechnician's Detail
        </div>
              <div class="square-detail-lab">

              <div class="detail-lab">
        
            <table class="detail-table-lab-detail">
                <tr>
                    <td>Labtechnician ID :</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Labtechnician Name :</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Conform Password :</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Email ID :</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Phone Numder :</td>
                    <td></td>
                </tr>
            </table>
            <button class="btn-del-lab" >Delete Account</button>
            <button class="btn-del-back-lab" onclick="location.href='admin-labtec-view.php'">Back</button>
            
            
            
         </div>
        </div>            
        </div>
            
        
    </div>
</body>
</html>