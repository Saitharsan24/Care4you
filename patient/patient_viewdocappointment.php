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
          <a href="./" style="color: #0c5c75; font-weight: bold">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="#">Medical records</a>
          <a href="./patient_medicalrecords.php">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="view-apt-heading"><h2>My Appointments</h2></div>
        <div class="view-apt-details">
          <div class="view-details-row"><p>Reference No :</p><div><p></p></div></div>
          <div class="view-details-row"><p>Doctor Name :</p><div><p></p></div></div>
          <div class="view-details-row"><p>Date :</p><div><p></p></div></div>
          <div class="view-details-row"><p>Appointment No :</p><div><p></p></div></div>
          <div class="view-details-row"><p>Appointment time :</p><div><p></p></div></div>
          <div class="view-details-row"><p>Room No :</p><div><p></p></div></div>
          <div class="view-details-row"><p>Patient name :</p><div><p></p></div></div>
          <div class="view-details-row"><p>NIC No :</p><div><p></p></div></div>
          <div class="view-details-row"><p>Total Amount :</p><div><p></p></div></div>
          <div class="view-apt-btn">
            <div class="view-apt-btn01"><a href=""><button>Cancel appointment</button></a></div>
            <div class="view-apt-divider"></div>
            <div class="view-apt-btn02"><a href=""><button>Pay now</button></a></div>
          </div>
        </div>
        <div class="view-apt-back-btn">
          <div class="view-apt-btn02"><a href="./patient_docappointments.php"><button>Back</button></a></div>
        </div>
      </div>
    </div>
  </body>
</html>
