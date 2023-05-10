<?php include ('../config/constants.php');?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lab.css"> 
    <title>Laboratory</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('lab_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/labtec/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="lab_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="lab_appointments.php">Lab Appointments</a></li>
                <li><a href="">Lab tests</a></li>
                <li><a href="lab_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
            <table class="center">
                <tr>
                    <td>
                        <br/><br/><br/>
                        <a href="lab_reguserappointments.php">                    
                        <button class="btn-view">
                        <span>Registered Patient<br/>&nbsp;&nbsp;Appointments&nbsp;</span>
                        </button>
                        </a>
                    </td>
                    <td>
                        <br/><br/><br/>
                        <a href="lab_unreguserappointments.php">                    
                        <button class="btn-view">
                        <span>Unregistered Patient<br/>&emsp;Appointments&nbsp;</span>
                        </button>
                        </a>
                    </td>
                </tr>
            </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>