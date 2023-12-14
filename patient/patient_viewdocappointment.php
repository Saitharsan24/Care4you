<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>


<?php
if ($_SESSION['record-accessok'] = 1) {
  unset($_SESSION['record-accessok']);
}
?>


<?php

//getting the doc apt id from URL and retrieving to display details
$docapt_id = $_GET['id'];

$sql = "SELECT * FROM  
              tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id
              INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
              INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid 
              INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
              AND docapt_id = '$docapt_id'";

$result = mysqli_query($conn, $sql);
$aptrow = mysqli_fetch_assoc($result);


//to reschedue doctor id passing
$_SESSION['reschedule'] = $aptrow['doctor_id'];
$_SESSION['res_apt_id'] = $docapt_id;
$_SESSION['current_sessionid'] = $aptrow['session_id'];

if ($aptrow['my_other'] == 0) {
  $p_name = $aptrow['first_name'];
  $p_nic = $aptrow['nic'];
}

if ($aptrow['my_other'] == 1) {
  $p_name = $aptrow['pat_name'];
  $p_nic = $aptrow['pat_nic'];
}

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
      <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user" class="imgframe" />      </div>
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

      <div class="back" onclick="location.href='patient_docappointments.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="view-apt-heading">
        <h2>My Appointments</h2>
      </div>
      <div class="view-apt-details">
        <div class="view-details-row">Reference No :<div>
            <?php echo $docapt_id ?>
          </div>
        </div>
        <div class="view-details-row">Doctor Name :<div>
            <?php echo $aptrow['doc_name'] ?>
          </div>
        </div>
        <div class="view-details-row">Date :<div>
            <?php echo $aptrow['date'] ?>
          </div>
        </div>
        <div class="view-details-row">Appointment No :<div>
            <?php echo $aptrow['docapt_no'] ?>
          </div>
        </div>
        <div class="view-details-row">Appointment Time :<div>
            <?php echo $aptrow['docapt_time'] ?>
          </div>
        </div>
        <div class="view-details-row">Room No :<div>
            <?php echo $aptrow['room_no'] ?>
          </div>
        </div>
        <div class="view-details-row">Patient Name :<div>
            <?php echo $p_name ?>
          </div>
        </div>
        <div class="view-details-row">NIC No :<div>
            <?php echo $p_nic ?>
          </div>
        </div>
        <div class="view-details-row">Session Status :
          <div>
            <?php

            if ($aptrow['docapt_status'] == 1) {
              echo ' ' . '<button class="docapt-st01">Confirmed</button>';
            } elseif ($aptrow['docapt_status'] == 2) {
              echo ' ' . '<button class="docapt-st02">Cancelled</button>';
            } elseif ($aptrow['docapt_status'] == 3) {
              echo ' ' . '<button class="docapt-st03"">Completed</button>';
            } else {
              echo ' ' . '<button class="docapt-st04">Not attended</button>';
            }

            ?>
          </div>
        </div>
        <div class="view-details-row">Total Amount :<div>
            <?php echo 'Rs.' . $aptrow['net_total'] ?>
          </div>
        </div>

        <?php if ($aptrow['docapt_status'] == 1) { ?>
          <div class="view-details-row">Record access to doctor :<div>
              <label class="switch">
                <?php if ($aptrow['record_access'] == 0) { ?>
                  <input type="checkbox" id="toggle" name="attendance">
                  <span class="slider round"></span>
                  <span id="toggle-text">Denied</span>
                <?php } else { ?>
                  <input type="checkbox" id="toggle" name="attendance" checked>
                  <span class="slider round"></span>
                  <span id="toggle-text">Allowed</span>
                <?php }
                ?>

              </label>
            <?php } ?>

            <script>
              const toggle = document.getElementById("toggle");
              const toggleText = document.getElementById("toggle-text");

              toggle.addEventListener("change", function () {
                if (this.checked) {
                  toggleText.textContent = "Accesss granted";
                  openPopupREC()
                } else {
                  toggleText.textContent = "Accesss denied";
                  openPopupDEC()
                }
              });
            </script>
          </div>
        </div>

        <div class="view-apt-btn">

          <?php
          if ($aptrow['docapt_status'] == 1) {
            ?>
            <div class="view-apt-btn01"><button onclick="openPopupC()">Cancel Appointment</button></div>
            <div class="view-apt-divider"></div>
            <div class="view-apt-btn02"><button onclick="openPopup()">Reschedule Appointment</button></div>
            <?php
          }
          //popup including.......
          include('./popups/docreschedule.php');
          ?>

        </div>
      </div>
    </div>
  </div>
</body>

</html>