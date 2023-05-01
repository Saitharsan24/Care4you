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
        <a href="./patient_doctorlist.php">View doctors</a>
        <a href="#">View profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <div class="back" onclick="location.href='patient_appointments.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content" style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title">My Doctor Appointments</div>
        <a href="./patient_makedocappointment.php"><button class="btn-mkdcapt"><span>make doctor appointment</span></button></a>
      </div>

      <div class="tbl-content" style="max-height: 100vh; overflow-y: auto; margin-top:150px;">
      <table class="tbl-mydocapp">
        <thead>
            <tr>
                <td>Reference No</td>
                <td>Appointment No</td>
                <td>Date</td>
                <td>Time</td>
                <td>Payment Status</td>
                <td>Session Status</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1124</td>
                <td>2</td>
                <td>23/10/2023</td>
                <td>3.00 PM - 3.10 PM</td>
                <td> <button class="btn-green"> Confirmed </button></td>
                <td><a href="#"><button class="book-btn"><span>View Status</span></button></a></td>
            </tr>
            <tr>
                <td>1138</td>
                <td>7</td>
                <td>24/10/2023</td>
                <td>4.00 PM - 4.30 PM</td>
                <td> <button class="btn-yellow"> Pending </button></td>
                <td><a href="#"><button class="book-btn"><span>View Status</span></button></a></td>
            </tr>
        </tbody>
      </table>
      </div>

    </div>
  </div>
</body>

</html>