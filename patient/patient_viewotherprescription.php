<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

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
        <a href="./patient_appointments.php">Appointments</a>
        <a href="./patient_pharmorders.php">Orders</a>
        <a href="./patient_medicalrecords.php" style="color: #0c5c75; font-weight: bold">Medical Records</a>
        <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
        <a href="./patient_viewprofile.php">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <div class="back" onclick="location.href='patient_otherrecords.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content"
        style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title">Prescription Record Details</div>
      </div>

      <div class="tbl-content" style="margin-top:90px;">
        <div class="container-row2">
          <div class="view-sub1">
            <div class="view-idtxt" style="font-size: 20px;">Record Number 01</div>
            <br />
            <div class="view-headtxt">Doctor Name</div>
            <div class="view-datatxt">Dr. Sepalika Mendis</div>
            <br />
            <div class="view-headtxt">Prescription Issued Date</div>
            <div class="view-datatxt">05/07/2023</div>
            <br />
            <div class="view-headtxt">Description</div>
            <div class="view-datatxt">I was experiencing chest pain and shortness of breath.</div>
            <br />
          </div>
          <div class="view-sub2">
            <img src="../images/pharmacy-orders/Order_06_02_23_08_56_41_PM.jpeg" alt="" class="view-sub2"
              style="border-radius:0px;">
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
</body>

</html>