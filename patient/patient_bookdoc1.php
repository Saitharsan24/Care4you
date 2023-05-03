<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>

<?php

$session_id = $_GET['id'];

$sql = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";

$result = mysqli_query($conn, $sql);

if ($result) {

  //getting variables from database
  $row = mysqli_fetch_assoc($result);
  $doc_name = $row['doc_name'];
  $special = $row['specialization'];
  $date = $row['date'];
  $timeslot = $row['time_slot'];
  $noofapt = $row['no_of_appointment'];

  //to find the timeslot
  if ($timeslot == 1) {
    $starttime = strtotime('08:00:00');
  } else if ($timeslot == 2) {
    $starttime = strtotime('10:00:00');
  } else if ($timeslot == 3) {
    $starttime = strtotime('12:00:00');
  } else if ($timeslot == 4) {
    $starttime = strtotime('14:00:00');
  } else if ($timeslot == 5) {
    $starttime = strtotime('16:00:00');
  } else {
    $starttime = strtotime('18:00:00');
  }

  $apt_dur = 600;
  $apt_time = $starttime + ($noofapt * $apt_dur);
  $apt_time_format = date('h:i A', $apt_time);

  $apt_no = $row['no_of_appointment'] + 1;
}

?>

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

      <div class="back" onclick="location.href='patient_makedocappointment.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="form-content">
        <div class="book1-heading">
          <h2>Book for an Appointment</h2>
        </div>

          <form method="post">

              <div class="form-itm">
                <p>Doctor Name :</p>
                <input type="text" value="<?php echo $row['doc_name']; ?>" readonly>
              </div>
              <div class="form-itm">
                <p>Specialization :</p>
                <input type="text" value="<?php echo $row['specialization']; ?>" readonly>
              </div>
              <div class="form-itm">
                <p>Date :</p>
                <input type="text" value="<?php echo $row['date']; ?>" readonly>
              </div>
              <div class="form-itm">
                <p>Time :</p>
                <input type="text" value="<?php echo $apt_time_format; ?>" readonly>
              </div>
              <div class="form-itm">
                <p>Appointment No :</p>
                <input type="text" value="<?php echo $apt_no; ?>" readonly>
              </div>
              <div class="form-itm radio-itm">
                <p>Make appointment for :</p>
                    <input type="radio" name="aptfor" value="0" required>
                    <label>Myself</label>
                  <div class="radio-gap"></div>
                    <input type="radio" name="aptfor" value="1">
                    <label>Others</label>
              </div>

              <!-- <div class="form-itm radio-itm radio-itm2">
                <p>Records access to doctor :</p>
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div> -->

              <div class="apt-btn">
                <div class="apt-btn-css"><button type="submit" name="next">Next</button></div>
              </div>

          </form>
      </div>
    </div>
  </div>
</body>

</html>


<?php
  
    if(isset($_POST['next'])){

        $my_other = $_POST['aptfor'];
        
        header('location:'.SITEURL.'patient/patient_bookdoc2.php?id='.$session_id.'&myother='.$my_other);
    }

?>