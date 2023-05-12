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
            <ul>
                <li><a href="doctor_home.php">Home</a></li>
                <li><a href="doctor_session.php">Sessions</a></li>
                <li><a href="doctor_viewpatient.php">Patients</a></li>
                <li><a href="doctor_viewprofile.php"><div class="highlighttext">Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="polygons" style="margin-top:-35px;">
                <div class="square" style="height: 540px;">
                    <br /><br /><br /><br /><br /><br />
                    <?php 
                        if(isset($_SESSION['update-user']))
                        {
                            echo $_SESSION['update-user'];
                            unset($_SESSION['update-user']);

                        }
                        if(isset($_SESSION['change-pwd']))
                        {
                            echo $_SESSION['change-pwd'];
                            unset($_SESSION['change-pwd']);

                        }
                    ?>
                    <table class="tbl-square" style="margin-top:-10px;">
                        <tr>
                            <td class="type1">Name :</td>
                            <td class="type2"><?php echo $doc_name; ?></td>
                        </tr>
                        <tr>
                            <td class="type1">Username :</td>
                            <td class="type2"><?php echo $user; ?></td>
                        </tr>
                        <tr>
                            <td class="type1">Email Address :</td>
                            <td class="type2"><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td class="type1">SLMC Number :</td>
                            <td class="type2"><?php echo $SLMC_number; ?></td>
                        </tr>
                        <tr>
                            <td class="type1">Specialization :</td>
                            <td class="type2"><?php echo $specialization; ?></td>
                        </tr>
                        <tr>
                            <td class="type1">Charge per Session :</td>
                            <td class="type2"><?php echo 'Rs. '.$charge; ?></td>
                        </tr>
                        <tr>
                            <td class="type1">NIC Number :</td>
                            <td class="type2"><?php echo $nic; ?></td>
                        </tr>
                        <tr>
                            <td class="type1">Contact Numer :</td>
                            <td class="type2"><?php echo '0'.$contact_number; ?></td>
                        </tr>
                    </table> 
                </div>
                    <a href="doctor_editprofile.php"><button class="btn-editP square2" style="margin-top: 125px;"><i class="fa-solid fa-pen-to-square"></i> &nbsp; Edit Profile</button></a>                      
                    <img src="../images/user-profilepic/doctor/<?php echo $profile_picture; ?>" alt="user" class="circle" />
                    <div id="overlap"></div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>