<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<?php include('./popups/docappointment_success.php') ?>

<?php

//do appointment success and fail popup 
if (isset($_SESSION['docsuccess'])) {
  unset($_SESSION['docsuccess']);
  echo "<script>openPopupC();</script>";
}

//reschedule success popup
if (isset($_SESSION['reschedulesuccess'])) {
  unset($_SESSION['reschedulesuccess']);
  echo "<script>openPopupR();</script>";
}

//cancelapt success popup
if (isset($_SESSION['cancelaptsuccess'])) {
  unset($_SESSION['cancelaptsuccess']);
  echo "<script>openPopupCS();</script>";
}

//getting details to display my appointments
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id AND created_by = '$user_id'";
$results = mysqli_query($conn, $sql);
?>

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

<?php include('patient_getinfo.php') ?>

<body>
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
      <div class="back" onclick="location.href='patient_appointments.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content"
        style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title">My Doctor Appointments</div>
        <div class="mk-apt-btn"><a href="./patient_makedocappointment.php"><button class="btn-mkdcapt"><span>make doctor
                appointment</span></button></a></div>
      </div>

      <div class="tbl-content">
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
            <?php
            if (mysqli_num_rows($results) != 0) {
              while ($row = mysqli_fetch_assoc($results)) {
                if ($row['docapt_status'] != 0) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['docapt_id'] ?>
                    </td>
                    <td>
                      <?php echo $row['docapt_no'] ?>
                    </td>
                    <td>
                      <?php echo $row['date'] ?>
                    </td>
                    <td>
                      <?php echo $row['docapt_time'] ?>
                    </td>
                    <td>
                      <?php

                      if ($row['docapt_status'] == 1) {
                        echo ' ' . '<button class="docapt-st01">Confirmed</button>';
                      } elseif ($row['docapt_status'] == 2) {
                        echo ' ' . '<button class="docapt-st02">Cancelled</button>';
                      } elseif ($row['docapt_status'] == 3) {
                        echo ' ' . '<button class="docapt-st03"">Completed</button>';
                      } else {
                        echo ' ' . '<button class="docapt-st04">Not attended</button>';
                      }

                      ?>
                    </td>
                    <td><a href="./patient_viewdocappointment.php?id=<?php echo $row['docapt_id'] ?>"><button
                          class="book-btn"><span>View Status</span></button></a></td>
                  </tr>
                <?php
                }
              }
            } else {
              ?>
              <tr>
                <td colspan="6" class="nosessiontd">
                  <div class="nosession">No Appointments Available</div>
                </td>
              <tr>
                <?php
            }
            ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>

</html>