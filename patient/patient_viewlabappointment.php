<?php include('../config/constants.php') ?>
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
        <a href="./patient_appointments.php" style="color: #0c5c75; font-weight: bold">Appointments</a>
        <a href="./patient_pharmorders.php">Orders</a>
        <a href="./patient_medicalrecords.php">Medical Records</a>
        <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
        <a href="./patient_viewprofile.php">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">

      <div class="back" onclick="location.href='patient_labappointments.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="view-apt-heading">
        <h2>My Appointments</h2>
      </div>
      <div class="view-lab-apt-details">
        <div class="view-details-row-lab">Reference No :<div></div>
        </div>
        <div class="view-details-row-lab">Date :<div></div>
        </div>
        <div class="view-details-row-lab">Time :<div></div>
        </div>
        <div class="view-details-row-lab">Patient name :<div></div>
        </div>
        <div class="view-details-row-lab">NIC No :<div></div>
        </div>
        <div class="view-details-row-lab">Status :<div></div>
        </div>
        <div class="view-details-row-lab">Total Amount :<div></div>
        </div>
        <div class="view-apt-btn">
          <div class="view-apt-btn01"><button onclick="">Cancel appointment</button></div>
          <div class="view-apt-divider"></div>
          <div class="view-apt-btn02"><button onclick="">Reschedule appointment</button></div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>