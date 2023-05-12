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
                <li><a href="doctor_viewprofile.php"><div class="highlighttext">Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <div class="back" onclick="location.href='doctor_editprofile.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="polygons">
                <div class="square" style="height:370px; border-radius:25px;">
                    <br /><br /><br /><br /><br /><br/>
                    <?php
                        if(isset($_SESSION['change-pwd']))
                        {
                            echo $_SESSION['change-pwd'];
                            unset($_SESSION['change-pwd']);

                        }
                        if(isset($_SESSION['pwd-not-match']))
                        {
                            echo $_SESSION['pwd-not-match'];
                            unset($_SESSION['pwd-not-match']);

                        }
                        if(isset($_SESSION['old-pwd-not-match']))
                        {
                            echo $_SESSION['old-pwd-not-match'];
                            unset($_SESSION['old-pwd-not-match']);

                        }
                    ?>
                    </figure>
                    <span>
                    <form action="" method="POST">
                    <table class="tbl-square">
                        <tr>
                            <td class="type1">Current Password :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="password" name="oldpwd" required="" autofocus="true"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="type1">New Password :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="password" name="newpwd" required="" autofocus="true"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="type1">Confirm Password :</td>
                            <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                            <input type="password" name="confirmpwd" required="" autofocus="true"/>
                            </td>
                        </tr>
                    </table> 
                </div>
                    <a href="doctor_editprofile.php">
                    <button class="btn-saveP square5" type="submit" name="submit">
                    <i class="fa-solid fa-key"></i>
                    &nbsp; Change Password
                    </button>
                    </a>
                    </form>                      
                    <img src="../images/user-profilepic/doctor/<?php echo $profile_picture; ?>" alt="user" class="circle" style="margin-top:-10px;"/>
                    <div id="overlap"></div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

if(isset($_POST['submit'])) {
    $oldpwd = $_POST['oldpwd'];
    $newpwd = $_POST['newpwd'];
    $confirmpwd = $_POST['confirmpwd'];

    // Check if new password matches confirm password
    if($newpwd !== $confirmpwd) {
        $_SESSION['pwd-not-match'] = "<div class='ppUpEr'>Password Did Not Match</div>";
        header('location: doctor_changepassword.php');
        exit();
    }

    // Prepare the SELECT statement to get user information
    $stmt = $conn->prepare("SELECT password FROM tbl_sysusers WHERE userid = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify if the old password is correct
        if(password_verify($oldpwd, $row['password'])) {
            // Hash the new password
            $hashed_newpwd = password_hash($newpwd, PASSWORD_DEFAULT);

            // Prepare the UPDATE statement to change the password
            $stmt = $conn->prepare("UPDATE tbl_sysusers SET password = ? WHERE userid = ?");
            $stmt->bind_param("si", $hashed_newpwd, $userid);
            $stmt->execute();

            if($stmt->affected_rows == 1) {
                $_SESSION['change-pwd'] = "<div class='successD'>Password Changed Successfully</div>";
                header('location: doctor_viewprofile.php');
                exit();
            } else {
                $_SESSION['change-pwd'] = "<div class='ppUpEr'>Failed to Change Password</div>";
                header('location: doctor_changepassword.php');
                exit();
            }
        } else {
            $_SESSION['old-pwd-not-match'] = "<div class='ppUpEr'>Old Password Did Not Match</div>";
            header('location: doctor_changepassword.php');
            exit();
        }
    } else {
        $_SESSION['old-pwd-not-match'] = "<div class='ppUpEr'>Old Password Did Not Match</div>";
        header('location: doctor_changepassword.php');
        exit();
    }
}
?>
