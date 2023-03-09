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
                  
                    <div class="view-patient-txt">View Patients </div>
                  

                    <span>
                        <table class="tbl-main-patient">
                            <thead>
                                <tr>
                                    <td>Patient ID</td>
                                    <td>Full Name</td>
                                    <td>Phone Number</td>
                                    <td>Account Status</td>
                                    <td>View Details</td>
                                </tr>
                            </thead>
                            <tbody>
                                <form>
                                    <tr>
                                        <td><input type="text" class="search-patient" name="patient-id" autofocus="true" /></td>
                                        <td><input type="text" class="search-patient" name="patient-name" autofocus="true" /></td>
                                        <td><input type="text" class="search-patient" name="phone-no" autofocus="true" /></td>
                                        <td><input type="text" class="search-patient" name="status" autofocus="true" /></td>
                                        <td><button class="btn-view-patient-detail"><span>Search</span></button></td>
                                    </tr>
                                </form>
                                <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                           
                                            
                               
                                            </td>
                                            <td><button class="btn-view-patient-detail" onclick='location.href="admin-patient-view-detail.php"'><span>Patient Details</span></button></td>
                                        </tr>
    
                          
                            </tbody>
                        </table>
                    </span>

                </div>
            </div>
        </div>
</body>

</html>