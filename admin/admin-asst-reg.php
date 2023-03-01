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
              <div class="head-asst"> Register Assistant</div>
              <div class="square-reg-asst">

              <div class="form-asst">
              <form>
            <table class="formtable-asst">
                <tr>
                    <td>Assistant Name :</td>
                    <td><input type="text" class="form-control-asst" name="name" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" class="form-control-asst" name="username" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>password :</td>
                    <td><input type="password" class="form-control-asst" name="password" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Conform password :</td>
                    <td><input type="password" class="form-control-asst" name="con-password" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><input type="text" class="form-control-asst" name="phonenumber" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Email ID :</td>
                    <td><input type="text" class="form-control-asst" name="email" required="" autofocus="true"/></td>
                </tr>
                
            </table>
            <button class="btn-reg-asst" type="submit">Register</button>
            <button class="btn-view-asst" onclick="location.href='admin-asst-view.php'">View Assistant</button>
            </form>
                            </div>
        </div>            
        </div>
            
        
    </div>
</body>
</html>