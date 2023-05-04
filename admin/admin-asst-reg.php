<?php include('../config/constants.php'); ?>
<?php include('../login_access.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <link rel="icon" type="images/x-icon" href="../images/logoicon.png" />
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include('admin_getinfo.php') ?>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/user-profilepic/admin/<?php echo $Admin_profile_picture; ?>" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php">Home</a></li>
                <li><a href="admin-session-view.php">Sessions</a></li>
                <li><a href="admin-patient-view.php">Patients</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php"><div class="highlighttext">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content">
            <div class="info">
            <div class="back" onclick="location.href='admin-asst-view.php'">
                <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
            </div>

                <div class="reg-heading">
                    <i class="fa-solid fa-clipboard-list" style="font-size: 45px;font-weight: 800;"></i>
                    &nbsp;Assistant Registration
                </div>

                <form action="" method="POST">
                <div class="reg-container otheruser">
                    <div class="reg-container-col mid2 otherusercol">

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-user"></i>&nbsp;&nbsp;Full Name
                        <input type="text" class="inputtab" name="fullname" placeholder="Enter Assistant's Fullname" required/></div>
                        
                        <div class="labeltag">&nbsp;<i class="fa-solid fa-id-badge"></i>&nbsp;&nbsp;NIC Number <br/>
                        <input type="text" class="inputtab" name="nic" placeholder="Enter Assistant's NIC Number" required/></div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Contact Number <br/>
                        <input type="tel" class="inputtab" name="contact_number" placeholder="Enter Assistant's Contact Number" required/></div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email Address <br/>
                        <input type="email" class="inputtab" name="email" placeholder="Enter Assistant's Email Address" required/></div>

                    </div>
                    <div class="reg-container-col otherusercol otherusercolbreak">

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-user-check"></i>&nbsp;&nbsp;Username
                        <input type="text" class="inputtab" name="username" placeholder="Enter Assistant's Username" required/></div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Password
                        <input type="password" class="inputtab" name="password" placeholder="Enter Assistant's Password"/></div>

                        <div class="labeltag">&nbsp;<i class="fa-solid fa-lock"></i>&nbsp;&nbsp;Confirm Password
                        <input type="password" class="inputtab" name="confirmpassword" placeholder="Confirm Assistant's Password"/></div>

                    </div>
                </div>
                <button name="reg" class="reg-foot pha">
                    <span>Add Assistant&nbsp;</span>
                </button>
                </form>
            </div>
        </div>
</body>

</html>

<?php

if(isset($_POST['reg']))
{

    $fullname=$_POST['fullname'];
    $nic=$_POST['nic'];
    $contact_number=$_POST['contact_number'];
    $email=$_POST['email'];
    $username= $_POST['username'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_sysusers (actortype, username, password, email)
    VALUES ('pharmacist', '$username', '$hashed_password', '$email')";

    $res1 = mysqli_query($conn, $sql);

    $last_id = $conn->insert_id;

    $sql = "INSERT INTO tbl_assistant (name, nic, phoneno, profile_picture, userid)
    VALUES ('$fullname', '$nic', '$contact_number', 'user.png', '$last_id')";

    $res2 = mysqli_query($conn, $sql);


    if ($res1 && $res2) 
    {
        // header("Location: /Care4you/admin/admin-asst-view.php");
        echo "<script> window.location.href='http://localhost/Care4you/admin/admin-asst-view.php';</script>";
    }
    else
    {
        echo "Error: " . $s . "<br>" . mysqli_error($conn);
        die();
    }
      
}
      
?>