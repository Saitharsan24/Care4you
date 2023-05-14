<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>Assistant</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('asst_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/assistant/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="asst_home.php">
                        <div class="highlighttext">Home</div>
                    </a></li>
                <li><a href="asst_session.php">Sessions</a></li>
                <li><a href="asst_viewprofile.php">Profile</a></li>
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
                            <div class="box-title"> <i class="fa-solid fa-calendar-day" style="font-weight: 700;font-size: 65px;"></i> </div>
                            <div class="box-title" style="margin-top: 0%"> Today </div>
                            <?php
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date('d/m/Y');
                            ?>
                            <div class="box-data" style="font-size: 45px; margin-top: 10% ;" > <?php echo $date; ?> </div>
                            <div class="box-title" style="margin-top: 15% ;font-size: 25px;" > Assigned Appointments </div>
                            <div class="box-data"> 10 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>