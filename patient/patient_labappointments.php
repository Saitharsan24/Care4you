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
          <a href="./patient_medicalrecords.php">Medical records</a>
          <a href="#">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="text-content">
          <div class="my-doc-apt"><h2>My Lab Appointments</h2></div>
        </div>
        <div class="my-apt-table">
          <div class="mydoc-apt-header">
            <div>Reference No</div>
            <div>Appointment No</div>
            <div></div>
            <div>Date</div>
            <div></div>
            <div>Time</div>
            <div></div>
            <div>Payment Status</div>
            <div>Session Status</div>
          </div>

          <div class="mydoc-apt-lists">
            <div class="mydoc-apt-lists-01 ">1124</div>
            <div class="mydoc-apt-lists-02">2</div>
            <div class="mydoc-apt-lists-03"></div>
            <div class="mydoc-apt-lists-04">23/10/2023</div>
            <div class="mydoc-apt-lists-05"></div>
            <div class="mydoc-apt-lists-06">10.00 a.m</div>
            <div class="mydoc-apt-lists-07">Pending</div>
            <div class="mydoc-apt-lists-08">Confirmed</div>
            <div class="mydoc-apt-lists-09"><a href=""><Button>View</Button></a></div>
          </div>
      </div>
      <div class="make-apt-btn"><a href="./patient_makelabappointment.php"><button>Make Lab appointments</button></a></div>
      </div>
    </div>
  </body>
</html>
