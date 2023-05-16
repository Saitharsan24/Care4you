<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name FROM tbl_patient WHERE userid = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <link rel="stylesheet" href="../css/patient_home_slider.css">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
    <script src="../script/slider.js"></script>
</head>

<?php include('patient_getinfo.php') ?>

<body>
    <div class="main-div">
        <div class="home-left">
            <div class="nav-logo">
                <a href="./patient_home.php">
                    <img src="../images/logo.png" alt="logo" />
                </a>
            </div>
            <div class="profile-image">
                <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user"
                    class="imgframe" />
            </div>
            <div class="nav-links">
                <a href="./patient_home.php">Home</a>
                <a href="./patient_appointments.php">Appointments</a>
                <a href="./patient_pharmorders.php">Orders</a>
                <a href="./patient_medicalrecords.php">Medical Records</a>
                <a href="./patient_viewprofile.php" style="color: #0c5c75; font-weight: bold">Profile</a>
            </div>
            <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
            <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a>
            </div>
        </div>
        <div class="home-right">
            <div class="back" onclick="location.href='patient_editprofile.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>
            <div class="polygons" style="margin-top:70px;">
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
                    <form action="" method="POST">
                        <table class="tbl-square">
                            <tr>
                                <td class="type1">Current Password :</td>
                                <td class="type2"
                                    style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                                    <input type="password" name="oldpwd" required="" autofocus="true" />
                                </td>
                            </tr>
                            <tr>
                                <td class="type1">New Password :</td>
                                <td class="type2"
                                    style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                                    <input type="password" name="newpwd" required="" autofocus="true" />
                                </td>
                            </tr>
                            <tr>
                                <td class="type1">Confirm Password :</td>
                                <td class="type2"
                                    style="border:1px solid #02202b; background-color: #fff; padding: 2px; padding-left: 15px;">
                                    <input type="password" name="confirmpwd" required="" autofocus="true" />
                                </td>
                            </tr>
                        </table>
                </div>
                <a href="patient_editprofile.php">
                    <button class="btn-saveP square5" type="submit" name="submit">
                        <i class="fa-solid fa-key"></i>
                        &nbsp; Change Password
                    </button>
                </a>
                </form>
                <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user" class="circle"
                    style="margin-top:-10px;" />
                <div id="overlap"></div>
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
        $_SESSION['pwd-not-match'] = "<div class='ppUpEr' style='text-align:center;margin-top: -25px;margin-bottom: 25px;'>Password Did Not Match</div>";
        header('location: patient_changepassword.php');
        exit();
    }

    // Prepare the SELECT statement to get user information
    $stmt = $conn->prepare("SELECT password FROM tbl_sysusers WHERE userid = ?");
    $stmt->bind_param("i", $userid);
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
            $stmt->bind_param("si", $hashed_newpwd, $userid);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully</div>";
                header('location: patient_viewprofile.php');
                exit();
            } else {
                $_SESSION['change-pwd'] = "<div class='ppUpEr'  style='text-align:center;margin-top: -25px;margin-bottom: 25px;'>Failed to Change Password</div>";
                header('location: patient_changepassword.php');
                exit();
            }
        } else {
            $_SESSION['old-pwd-not-match'] = "<div class='ppUpEr' style='text-align:center;margin-top: -25px;margin-bottom: 25px;'>Old Password Did Not Match</div>";
            header('location: patient_changepassword.php');
            exit();
        }
    } else {
        $_SESSION['old-pwd-not-match'] = "<div class='ppUpEr' style='margin-top:140px;text-align:center;margin-top: -25px;margin-bottom: 25px;'>Old Password Did Not Match</div>";
        header('location: patient_changepassword.php');
        exit();
    }
}
?>