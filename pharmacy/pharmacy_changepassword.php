<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pharmacy.css"> 
    <title>Pharmacy</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('pharmacy_getinfo.php') ?>    
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="pharmacy_home.php">Home</a></li>
                <li><a href="pharmacy_neworders.php">New Orders</a></li>
                <li><a href="pharmacy_orderhistory.php">Order History</a></li>
                <li><a href="pharmacy_stock.php">Drug Stock</a></li>
                <li><a href="pharmacy_viewprofile.php"><div class="highlighttext">View Profile</div></a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
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
            <img src="../images/user-profilepic/pharmacist/<?php echo $profile_picture; ?>" alt="user" class="imgframe">
            <h2 style="margin-left: 60px; margin-top:15px;">Change Password</h2>
            <span>
            <form  method="POST">
            <table class="formtable">
                <tr>
                    <td>Old Password :</td>
                    <td><input type="password" class="form-control" name="oldpwd" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>New Password :</td>
                    <td><input type="password" class="form-control" name="newpwd" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="password" class="form-control" name="confirmpwd" required="" autofocus="true"/></td>
                </tr>
            </table>
            <button class="btn-blue" type="submit" name="submit">Save Password</button>
            </form>
            </span>
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

        $hashed_oldpwd = password_hash($oldpwd, PASSWORD_DEFAULT);
        $hashed_newpwd = password_hash($newpwd, PASSWORD_DEFAULT);
        $hashed_confirmpwd = password_hash($confirmpwd, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM tbl_sysusers WHERE userid = $userid AND password = '$hashed_oldpwd'";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res)==1)
        {
            if($hashed_newpwd == $hashed_confirmpwd)
            {

                $sql2 = "UPDATE tbl_sysusers SET password = '$hashed_newpwd' WHERE userid = $userid";
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true) 
                {
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully</div>";
                    header('location: pharmacy_viewprofile.php');
                }
                else 
                {
                    $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password</div>";
                    header('location: pharmacy_changepassword.php');
                }
            }
            else 
            {
                $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match</div>";
                header('location: pharmacy_changepassword.php');
            }
        } 
        else 
        {
            $_SESSION['old-pwd-not-match'] = "<div class='error'>Old Password Did Not Match</div>";
            header('location: pharmacy_changepassword.php');
        }
    }
?>
