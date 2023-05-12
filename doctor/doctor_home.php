<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css">
    <title>Doctor</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('doctor_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/doctor/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="doctor_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="doctor_session.php">Sessions</a></li>
                <li><a href="doctor_viewpatient.php">Patients</a></li>
                <li><a href="doctor_viewprofile.php">Profile</a></li>
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
            <div class="welcometext">Welcome <div class="usernametext"><?php echo $_SESSION['user']; ?></div></div>
            <span>
            <table>
                <tr>
                </br></br></br>
                    <td colspan="2" style="text-align:center; padding-left: 35%; padding-right: 30%;">
                        <p id="rcorners">
                            Total Sessions for this week
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            05
                            </span>
                        </p>
                        </br></br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="rcorners">
                            Cancelled Sessions for this week
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            01
                            </span>
                        </p>
                    </td>
                    <td>
                        <p id="rcorners">
                            Confirmed Sessions for this week
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            04
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
            </span>
            </div>
        </div>
    </div>
</body>
</html>