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
  <?php include('patient_getinfo.php') ?>
  <div class="main-div">
    <div class="home-left">
      <div class="nav-logo">
        <a href="./patient_home.php">
          <img src="../images/logo.png" alt="logo" />
        </a>
      </div>
      <div class="profile-image">
        <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user" class="imgframe" />
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

      <div class="containorLarge">
        <div class="containorSLeft">
          <div class="idtxt" style="font-size:20px;">Appointment No :
            <?php //echo $rowDetails['labapt_id'] ?>
          </div>

          <div class="headtxt">Patient Name</div>
          <div class="datatxt" style="margin-bottom: 15px">
            <?php //echo $rowDetails['first_name'] ?>
          </div>

          <div class="headtxt">Contact Number</div>
          <div class="datatxt" style="margin-bottom: 15px">
            <?php //echo $rowDetails['lab_contact'] ?>
          </div>

          <div class="headtxt">NIC Number</div>
          <div class="datatxt" style="margin-bottom: 15px">
            <?php //echo $rowDetails['nic'] ?>
          </div>

          <div class="headtxt">Requested Date</div>
          <div class="datatxt" style="margin-bottom: 15px">
            <?php //echo $rowDetails['labapt_date'] ?>
          </div>

          <div class="headtxt">Appointment Status</div>
          <div class="datatxt" style="margin-bottom: 15px">
            <?php

            // if ($rowDetails['labapt_status'] == 1) {
            //   echo ' ' . '<button class="st01" style="color: #000;background-color: #FDD147">Payment Pending</button>';
            // } elseif ($rowDetails['labapt_status'] == 2) {
            //   echo ' ' . '<button class="st02" style="color: #fff;background-color: #0C7516">Confirmed</button>';
            // } elseif ($rowDetails['labapt_status'] == 3) {
            //   echo ' ' . '<button class="st03"" style="color: #fff;background-color: #093e4e">Completed</button>';
            // } else {
            //   echo ' ' . '<button class="st04" style="color: #fff;background-color: #BD1010">Cancelled</button>';
            // }

            ?>
          </div>

          <!-- <div class="headtxt">Other Items</div> 
                        <div class="datatxt" style="margin-bottom: 10px">none</div> -->

        </div>
        <div class="containorSRight">
          <a href="../images/labapt-prescription/<?php //echo $prescription_name ?>" download>
            <img src="../images/labapt-prescription/<?php //echo $prescription_name ?>" class="containorSR"
              style="width:90%; max-height:60vh;">
          </a>
          <a class="datatxt2-link" title="Open Prescription in New Window"
            href="../images/labapt-prescription/<?php //echo $prescription_name ?>" target="_blank">
            PrescriptionName.ext &nbsp;
            <i class="fa-solid fa-expand"></i>
          </a>
        </div>
        <div class="containorSRLast">
          <?php include('patient_tbl-addtestview.php') ?>
        </div>
      </div>
    </div>
</body>

</html>