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
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="doctorHome.php">Home</a></li>
                <li><a href="doctorsession.php">Sessions</a></li>
                <li><a href="doctorViewpatient.php">View patients</a></li>
                <li><a href="doctorViewprofile.php"><div class="highlighttext">View Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <img src="../images/doctor.jpg" alt="user" class="imgframe">
            <span>
            <form>
            <table class="formtable">
                <tr>
                    <td>Name :</td>
                    <td><input type="text" class="form-control" name="name" required="" autofocus="true" value="<?php echo $row['d_fname'] ?>"/></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" class="form-control" name="username" required="" autofocus="true" value="<?php echo $row['d_uname'] ?>"/></td>
                </tr>
                <tr>
                    <td>Email Address :</td>
                    <td><input type="text" class="form-control" name="email" required="" autofocus="true" value="<?php echo $row['d_mail'] ?>"/></td>
                </tr>
                <tr>
                    <td>SLMC Number :</td>
                    <td><input type="text" class="form-control" name="email" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>NIC Number :</td>
                    <td><input type="text" class="form-control" name="nic" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Contact Numer :</td>
                    <td><input type="text" class="form-control" name="contactnumber" required="" autofocus="true"/></td>
                </tr>
            </table>
            </form>
            </br></br></br>
            <button class="btn-blue"><a href="doctorEditprofile.php">Edit Profile</a></button>
            </span>
            </div>
        </div>
    </div>
</body>
</html>