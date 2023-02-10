<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor.css"> 
    <title>Doctor</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user.png" alt="user" class="imgframe">
            <ul>
                <li><a href="doctorHome.php">Home</a></li>
                <li><a href="doctorSession.php">Sessions</a></li>
                <li><a href="doctorViewpatient.php">View Patients</a></li>
                <li><a href="doctorViewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="logout_process.php">Sign Out</a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <table class="tbl-main">
                    <thead>
                        <tr>
                            <td>Appointment Number</td>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Appointment Time</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>24</td>
                            <td>18/11/2022</td>
                            <td>8.00PM</td>
                            <td><button class="btn-blue1"><a href="doctorRemarks.php">Remarks</a></button></td>
                            <td><button class="btn-blue1"><a href="doctorViewpatientprofile.php">View Profile</a></button></td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>24</td>
                            <td>18/11/2022</td>
                            <td>8.00PM</td>
                            <td><button class="btn-blue1"><a href="doctorRemarks.php">Remarks</a></button></td>
                            <td><button class="btn-blue1"><a href="doctorViewpatientprofile.php">View Profile</a></button></td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>24</td>
                            <td>18/11/2022</td>
                            <td>8.00PM</td>
                            <td><button class="btn-blue1"><a href="doctorRemarks.php">Remarks</a></button></td>
                            <td><button class="btn-blue1"><a href="doctorViewpatientprofile.php">View Profile</a></button></td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>24</td>
                            <td>18/11/2022</td>
                            <td>8.00PM</td>
                            <td><button class="btn-blue1"><a href="doctorRemarks.php">Remarks</a></button></td>
                            <td><button class="btn-blue1"><a href="doctorViewpatientprofile.php">View Profile</a></button></td>
                        </tr>
                    </tbody>
                </table>
                </br></br><button class="btn-blue" type="submit">Back</button>
            </span>
            </div>
        </div>
    </div>
</body>
</html>