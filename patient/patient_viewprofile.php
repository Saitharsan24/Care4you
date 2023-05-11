<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="main-div">
      <div class="home-left">
        <div class="nav-logo">
          <a href="./patient_home.php">
            <img src="../images/logo.png" alt="logo" />
          </a>
        </div>
        <div class="profile-image">
          <img src="../images/user.png" alt="profile-image" />
        </div>
        <div class="nav-links">
          <a href="./patient_home.php">Home</a>
          <a href="./patient_appointments.php">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical Records</a>
          <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
          <a href="./patient_viewprofile.php" style="color: #0c5c75; font-weight: bold">Profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="polygons">
            <div class="square">
                <br /><br /><br /><br /><br /><br /><br />
                <table class="tbl-square">
                    <tr>
                        <td class="type1">Name :</td>
                        <td class="type2"><?php echo $fullname; ?></td>
                    </tr>
                    <tr>
                        <td class="type1">Username :</td>
                        <td class="type2"><?php echo $user; ?></td>
                    </tr>
                    <tr>
                        <td class="type1">Email Address :</td>
                        <td class="type2"><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td class="type1">NIC Number :</td>
                        <td class="type2"><?php echo $nic; ?></td>
                    </tr>
                    <tr>
                        <td class="type1">Contact Numer :</td>
                        <td class="type2"><?php echo $contact_number; ?></td>
                    </tr>
                </table> 
            </div>
                <a href="pharmacy_editprofile.php"><button class="btn-blue square2">Edit Profile</button></a>                      
                <img src="../images/user-profilepic/pharmacist/<?php echo $profile_picture; ?>" alt="user" class="circle" />
                <div id="overlap"></div>
        </div>
      </div>
    </div>
  </body>
</html>