<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/asst.css">
    <title>Pharmacy</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/assist-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="asst_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="asst_session.php">Sessions</a></li>
                <li><a href="asst_view.php">View Profile</a></li>
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
            <div class="welcometext">Welcome <div class="usernametext">
                <?php echo $_SESSION['user']; ?>
            </div>
        </div>
            <span>
            <table class="center">
                <tr>
                    <td style="padding-left: 70px;">
                        <p id="rcorners">
                            Number of Sessions
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            12
                            </span>
                        </p>
                    </td>
                    <td>
                        <p id="rcorners">
                            Number of Appointmets
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            23
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 style="padding-left: 335px; padding-top: 50px;">
                        <p id="rcorners">
                        Date
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 50px; font-weight: 700;">
                            10/01/2023
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