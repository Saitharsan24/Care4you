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
          <a href="./patient_appointments.php"  style="color: #0c5c75; font-weight: bold">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical Records</a>
          <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
          <a href="./patient_viewprofile.php">Profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">

        <div class="back" onclick="location.href='patient_appointments.php'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>

        <div class="text-content" style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
          <div class="doc-apt-title">My Laboratory Appointments</div>
          <div class="mk-apt-btn"><a href="./patient_makelabappointment.php"><button class="btn-mkdcapt"><span>make Lab appointment</span></button></a></div>
        </div>

        <div class="tbl-content">
        <table class="tbl-mydocapp" style="width: 68%;margin-left: 65px;margin-right: auto;border-collapse: separate;border-spacing: 0 15px;">
        <thead>
            <tr>
                <td>Reference No</td>
                <td>Date</td>
                <td>Time</td>
                <td>Status</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td> <button class="btn-green"> Confirmed </button></td>
                          <td><a href="./patient_viewdocappointment.php?id=<?php echo $row['docapt_id'] ?>"><button class="book-btn"><span>View Status</span></button></a></td>
                      </tr>
            
                    <tr>
                          <td colspan="6" class="nosessiontd"><div class="nosession">No Appointments Available</div></td>
                    <tr>             
            
        </tbody>
      </table>
      </div>

      </div>
    </div>
</body>

</html>