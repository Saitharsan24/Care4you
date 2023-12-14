<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
  $id=$_GET['id'];
   
  $query="SELECT * FROM tbl_patient INNER JOIN tbl_sysusers ON tbl_patient.userid = tbl_sysusers.userid WHERE p_id = $id";  
  $result=mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);

?>


<?php
  
  if(isset($_POST['update'])){
  print_r($id);die(); 
    
     $fname=$_POST['fname'];
     $lname=$_POST['fname'];
     $username=$_POST['username'];
     $address=$_POST['address'];
     $contact=$_POST['contact'];
     $email=$_POST['email'];
     $dob=$_POST['dob'];
     $nic=$_POST['nic'];
    
     $query = "UPDATE tbl_patient SET `first_name`='$fname' WHERE p_id=$id";

    //$query="UPDATE tbl_patient SET 'first_name'='$fname' WHERE p_id=$id";
    //  $query="UPDATE tbl_patient INNER JOIN tbl_sysusers ON tbl_patient.userid=tbl_sysusers.userid
    //  SET tbl_patient.first_name=$fname,
    //      last_name=$lname,
    //      dob=$dob,
    //      nic=$nic,
    //      contact=$contact,
    //      address=$address,
    //      username=$username,
    //      email=$email
    //      WHERE p_id=$id   ";

       $res=mysqli_query($conn,$query);
        

    
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-view-patient.css">
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
                <li><a href="admin-patient-view.php"><div class="highlighttext">Patients</a></li>
                <li><a href="">Orders</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="admin-reports.php">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</div></a></li>
                <li><a href="admin_viewprofile.php">Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>

            <div class="main_content">
                <div class="info">
                    <span>
                        <div class="main_content">
                            <div class="info">

                                <span>
                                    <div class="square-patient-edit">
                                        <figure>
                                            <img src="../images/doctor.jpg" alt="user" class="patient-profile-edit">
                                            <figcaption class="change-profile-txt">Change Profile Picture</figcaption>
                                        </figure> 
                                        <div class="edit-patient-table">
                                        <form  action="admin-patient-view-detail.php?id=<?php echo $id; ?>" method="POST" > 
                                            <table class="tbl-square-edit-patient">
                                                
                                                <tr>
                                                    <td>Firstname Name :</td>
                                                    <td><input type="text" class="form-control" name="fname" required="" autofocus="true" value="<?php echo $row['first_name']?>"/></td>
                                                </tr>
                                                <td>Last Name :</td>
                                                    <td><input type="text" class="form-control" name="lname" required="" autofocus="true" value="<?php echo $row['last_name']?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td>User Name :</td>
                                                    <td><input type="text" class="form-control" name="username" required="" autofocus="true" value="<?php echo $row['username']?>"/></td>
                                                </tr>
                                               
                                                <tr>
                                                    <td>Address :</td>
                                                    <td><input type="textarea" class="form-control-address" name="address" required="" autofocus="true" value="<?php echo $row['address']?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Number :</td>
                                                    <td><input type="text" class="form-control" name="contact" required="" autofocus="true" value="<?php echo $row['contact']?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td><input type="email" class="form-control" name="email" required="" autofocus="true" value="<?php echo $row['email']?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of birth :</td>
                                                    <td><input type="date" class="form-control" name="dob" required="" autofocus="true" value="<?php echo $row['dob']?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td>NIC :</td>
                                                    <td><input type="text" class="form-control" name="nic" required="" autofocus="true" value="<?php echo $row['nic']?>" /></td>
                                                </tr>
                                                
                                            </table>
                                            <td><button type="submit" class="btn-save-changes"   name="update"><span>Save Changes</span></button></td>
                                            </form>
                                            <td><button  class="btn-change-password" onclick='location.href="admin-change-password.php?id=<?php echo $row["p_id"] ; ?>"'><span>Change Password</span></button></td>
                                            <td><button class="btn-back-edit-detail" onclick='location.href="admin-patient-view-detail.php?id=<?php echo $row["p_id"] ; ?>"'><span>Back</span></button></td>
                                       
                                        </div>
                                </span>
                            </div>
                        </div>
                    </span>

                </div>
            </div>
        </div>
</body>

</html>