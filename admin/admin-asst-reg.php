<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
if (isset($_POST['reg'])) {


    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con_password = $_POST['con-password'];
    $phone_number = $_POST['phonenumber'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];

    /*$sql = "INSERT INTO tbl_lebtec (labtec_id,full_name,username,email,nic,contact_number,password)
VALUES ('$name', '$username', '$phone_number', '$email','$slmc','$charges','$specialize')";*/

    $sql = "INSERT INTO tbl_sysusers (actortype, username,password,email)
VALUES ('Assistant', '$username', '$password','$email')";

    $res1 = mysqli_query($conn, $sql);


    $last_id = $conn->insert_id;

    $sql = "INSERT INTO tbl_assistant (name,userid,phoneno,nic)
VALUES ('$name', '$last_id','$phone_number','$nic')";


    if (mysqli_query($conn, $sql)) {

        header("Location: /Care4you/admin/admin-asst-view.php");
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        die();
    }
}

?>


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
                <div class="head-asst"> Register Assistant</div>
                <div class="square-reg-asst">

                    <div class="form-asst">
                        <form action="" method="POST">
                            <table class="formtable-asst">
                                <tr>
                                    <td>Assistant Name :</td>
                                    <td><input type="text" class="form-control-asst" name="name" required="" autofocus="true" /></td>
                                </tr>
                                <tr>
                                    <td>Username :</td>
                                    <td><input type="text" class="form-control-asst" name="username" required="" autofocus="true" /></td>
                                </tr>
                                <tr>
                                    <td>password :</td>
                                    <td><input type="password" class="form-control-asst" name="password" required="" autofocus="true" /></td>
                                </tr>
                                <tr>
                                    <td>Conform password :</td>
                                    <td><input type="password" class="form-control-asst" name="con-password" required="" autofocus="true" /></td>
                                </tr>
                                <tr>
                                    <td>Phone Number :</td>
                                    <td><input type="text" class="form-control-asst" name="phonenumber" required="" autofocus="true" /></td>
                                </tr>
                                <td>NIC Number :</td>
                                <td><input type="text" class="form-control-asst" name="nic" required="" autofocus="true" /></td>
                                </tr>
                                <tr>
                                    <td>Email ID :</td>
                                    <td><input type="text" class="form-control-asst" name="email" required="" autofocus="true" /></td>
                                </tr>

                            </table>
                            <button class="btn-reg-asst" type="submit" name="reg">Register</button>
                            <button class="btn-view-asst" onclick="location.href='admin-asst-view.php'">View Assistant</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
</body>

</html>