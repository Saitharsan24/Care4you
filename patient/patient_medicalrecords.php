<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
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
          <a href="./patient_medicalrecords.php" style="color: #0c5c75; font-weight: bold">Medical records</a>
          <a href="">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <div class="signout"><a href="#">Sign Out</a></div>
      </div>
      <div class="home-right">
        <div class="my-record-heading"><h2>My Records</h2></div>
        <div class="record-dashbaord">
           
        </div>
        <div class="record-buttons">
          <div><a href="./patient_docappointments.php"><button>Doctor prescriptions</button></a></div>
          <div class="appointments-divider"></div>
          <div><a href="./patient_labappointments.php"><button>Lab reports</button></a></div>
          <div class="appointments-divider"></div>
          <div><a href="./patient_labappointments.php"><button>Other records</button></a></div>
        </div>
      </div>
    </div>
  </body>
</html>
