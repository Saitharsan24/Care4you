<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-view-profile.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="admin-order-view.php">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">
                        <div class="highlighttext">Profile</div>
                    </a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
                <div class="back" onclick="location.href='admin_Editprofile.php'">
                    <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
                </div>
                <div class="polygons">
                    <div class="square" style="height:370px; border-radius:25px;">
                        <br /><br /><br /><br /><br /><br />
                        <?php
                        if (isset($_SESSION['change-pwd'])) {
                            echo $_SESSION['change-pwd'];
                            unset($_SESSION['change-pwd']);
                        }
                        if (isset($_SESSION['pwd-not-match'])) {
                            echo $_SESSION['pwd-not-match'];
                            unset($_SESSION['pwd-not-match']);
                        }
                        if (isset($_SESSION['old-pwd-not-match'])) {
                            echo $_SESSION['old-pwd-not-match'];
                            unset($_SESSION['old-pwd-not-match']);
                        }
                        ?>
                        </figure>

                        <?php
                        // Define variables and set to empty values
                        $passwordErr = "";
                        $password = "";
                        $isValid = true;
                        function validateInput($data)
                        {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }


// Check if form is submitted and process form data
if (isset($_POST['newpwd'])) {
                        //validate password
        if(empty($_POST['newpwd'])){
            $passwordErr = "*Password is required";
            $isValid = false;
        } elseif(strlen($_POST['newpwd']) < 8){
            $passwordErr = "*Must have atleast 8 characters";
            $isValid = false;
        } elseif(!preg_match("#[a-z]+#", $_POST['newpwd'])){
            $passwordErr = "*Must have atleast one lowercase letter";
            $isValid = false;
        } elseif(!preg_match("#[A-Z]+#", $_POST['newpwd'])){
            $passwordErr = "*Must have atleast one uppercase letter";
            $isValid = false;
        } elseif(!preg_match("#[0-9]+#", $_POST['newpwd'])){
            $passwordErr = "*Must contain atleast one number";
            $isValid = false;
        } elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])){
            $passwordErr = "*Must contain atleast one special character";
            $isValid = false;
        }


    }
                        ?>

                        <span>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <table class="tbl-square">
                                    <tr>
                                        <td class="type1">Current Password :</td>
                                        <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                                            <input type="password" name="oldpwd"  autofocus="true" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="type1">New Password :</td>
                                        <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                                            <input type="password" name="newpwd"  autofocus="true" /></td>
                                           

                                    </tr>
                                    <tr>
                                        <td class="type1">Confirm Password :</td>
                                        <td class="type2" style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                                            <input type="password" name="confirmpwd"  autofocus="true" />
                                        </td>
                                    </tr>
                                </table>
                                
                    </div>
                    <a href="admin_Editprofile.php">
                        <button class="btn-saveP square5" type="submit" name="submit">
                            <i class="fa-solid fa-key"></i>
                            &nbsp; Change Password
                        </button>
                    </a>
                    </form>
                    <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="circle" style="margin-top:-10px;" />
                    <div id="overlap"></div>
                    <?php if(isset($passswordErr)){?>
                    <span class="square"><?php echo $passswordErr; ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $oldpwd = $_POST['oldpwd'];
    $newpwd = $_POST['newpwd'];
    $confirmpwd = $_POST['confirmpwd'];

    // Check if new password matches confirm password
    if ($newpwd !== $confirmpwd) {
        $_SESSION['pwd-not-match'] = "<div class='ppUpEr'>Password Did Not Match</div>";
        header('location: admin_changepassword.php');
        exit();
    }

    // Prepare the SELECT statement to get user information
    $stmt = $conn->prepare("SELECT password FROM tbl_sysusers WHERE userid = ?");
    $stmt->bind_param("i", $Admin_userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify if the old password is correct
        if (password_verify($oldpwd, $row['password'])) {
            // Hash the new password
            $hashed_newpwd = password_hash($newpwd, PASSWORD_DEFAULT);

            // Prepare the UPDATE statement to change the password
            $stmt = $conn->prepare("UPDATE tbl_sysusers SET password = ? WHERE userid = ?");
            $stmt->bind_param("si", $hashed_newpwd, $Admin_userid);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully</div>";
                header('location: admin_viewprofile.php');
                exit();
            } else {
                $_SESSION['change-pwd'] = "<div class='ppUpEr'>Failed to Change Password</div>";
                header('location: admin_changepassword.php');
                exit();
            }
        } else {
            $_SESSION['old-pwd-not-match'] = "<div class='ppUpEr'>Old Password Did Not Match</div>";
            header('location: admin_changepassword.php');
            exit();
        }
    } else {
        $_SESSION['old-pwd-not-match'] = "<div class='ppUpEr'>Old Password Did Not Match</div>";
        header('location: admin_changepassword.php');
        exit();
    }
}
?>