<?php include('../config/constants.php')?>
<?php

if(isset($_POST['reg'])){
    
    
$name=$_POST['name'];
$username= $_POST['username'];
$password=$_POST['password'];
$con_password=$_POST['con-password'];
$phone_number=$_POST['phonenumber'];
$email=$_POST['email'];
$nic=$_POST['nic'];
$profile_picture=$_POST['profile_picture'];


$sql = "INSERT INTO tbl_sysusers (actortype, username,password,email)
VALUES ('pharmacist', '$username', '$password','$email')";

$res1 = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$sql = "INSERT INTO tbl_pharmacist (fullname,userid,contact_number,nic,profile_picture)
VALUES ('$name', '$last_id','$phone_number','$nic','$profile_picture')";

$res2 = mysqli_query($conn, $sql);

if ($res1 && $res2) {
  header("Location: /Care4you/admin/admin-pha-view.php");
} else {
  echo "Error: " . $s . "<br>" . mysqli_error($conn); die();
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
                <li><a href="admin-patient-view.php">View Patient</a></li>
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
              <div class="head-pha"> Register Pharmacist</div>
              <div class="square-reg-pha">

              <div class="form-pha">
              <form action="" method="POST">
            <table class="formtable-pha">
                <tr>
                    <td>Pharmacist Name :</td>
                    <td><input type="text" class="form-control-pha" name="name" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" class="form-control-pha" name="username" required="" autofocus="ture" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" class="form-control-pha" name="password" required="" autofocus="ture" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="password" class="form-control-pha" name="con-password" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Contact Number :</td>
                    <td><input type="text" class="form-control-pha" name="phonenumber" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Email Address :</td>
                    <td><input type="text" class="form-control-pha" name="email" required="" autofocus="true"/></td>
                </tr>
                <tr>
                   <td>NIC Number :</td>
                    <td><input type="text" class="form-control-pha" name="nic" required="" autofocus="true"/></td>
                </tr> 
                <input type="hidden" name="profile_picture" value="user.png" />
                
                
            </table>
            <button class="btn-reg-pha" type="submit" name="reg">Register</button>
            <button class="btn-view-pha" onclick="location.href='admin-pha-view.php'">View Pharmacist</button>
            </form>
                            </div>
        </div>            
        </div>
            
        
    </div>
</body>
</html>