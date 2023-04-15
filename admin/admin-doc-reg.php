<?php include('../config/constants.php') ?>


<?php
if(isset($_POST['reg'])){
    
    
    $name=$_POST['name'];
    $username= $_POST['username'];
    $password=$_POST['password'];
    $con_password=$_POST['con-password'];
    $phone_number=$_POST['phonenumber'];
    $email=$_POST['email'];
    $charges=$_POST['charges'];
    $slmc=$_POST['slmc'];
    $specialize=$_POST['specialize'];

    $sql = "INSERT INTO tbl_sysusers (actortype, username, password,email)
    VALUES ('doctor', '$username', '$password','$email')";

    $res1 = mysqli_query($conn, $sql);

    $last_id = $conn->insert_id;

    $sql = "INSERT INTO tbl_doctor (doc_name,phone_number,SLMC_number,charges,specialization,userid)
    VALUES ('$name', '$phone_number',' $charges','$slmc','$specialize',$last_id)";

    $res2 = mysqli_query($conn, $sql);


    if ($res1 && $res2) {
        header("Location: /Care4you/admin/admin-doc-view.php");
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
              <div class="head-doc"> Register Doctor</div>
              <div class="square-reg-doc">

              <div class="form-doc">
              <form action="" method="POST">
            <table class="formtable-doc">
                <tr>
                    <td>Doctor Name :</td>
                    <td><input type="text" class="form-control-doc" name="name" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" class="form-control-doc" name="username" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>password :</td>
                    <td><input type="password" class="form-control-doc" name="password" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Conform password :</td>
                    <td><input type="password" class="form-control-doc" name="con-password" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><input type="text" class="form-control-doc" name="phonenumber" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Email ID :</td>
                    <td><input type="text" class="form-control-doc" name="email" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>SLMC_number :</td>
                    <td><input type="text" class="form-control-doc" name="slmc" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>charges :</td>
                    <td><input type="text" class="form-control-doc" name="charges" required="" autofocus="true"/></td>
                </tr>
                <tr>
                    <td>Specialize :</td>
                    <td><input type="text" class="form-control-doc" name="specialize" required="" autofocus="true"/></td>
                </tr>
                
            </table>
            <div class="doc-reg-btn-div">
            <button class="btn-view-doc" onclick="location.href='admin-doc-view.php'">View Doctors</button>
            <div class="doc-reg-divider"></div>
            <button class="btn-reg-doc" type="submit" name="reg">Register</button>
            </div>
            </form>
                            </div>
        </div>            
        </div>
            
        
    </div>
</body>
</html>