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
                <li><a href="admin_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="admin-session.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
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
                    <td>
                        <p id="rcorners">
                            Number of Appointments
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            10
                            </span>
                        </p>
                    </td>
                    <td>
                        <p id="rcorners">
                            Number of Sessions
                            </br></br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            23
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="rcorners">
                            Confirmed Sessions </br> for this week
                            </br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            12
                            </span>
                        </p>
                    </td>
                    <td>
                        <p id="rcorners">
                            Canceled Sessions </br> for this week
                            </br></br>
                            <span style="color:#0D5C75; font-size: 70px; font-weight: 700;">
                            05
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