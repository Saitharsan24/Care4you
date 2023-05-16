<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name FROM tbl_patient WHERE userid = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/patient.css" />
  <link rel="stylesheet" href="../css/patient_home_slider.css">
  <title>Home</title>
  <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
  <script src="../script/slider.js"></script>
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
        <img src="../images/user.png" alt="profile-image" />
      </div>
      <div class="nav-links">
        <a href="./patient_home.php" style="color: #0c5c75; font-weight: bold">Home</a>
        <a href="./patient_appointments.php">Appointments</a>
        <a href="./patient_pharmorders.php">Orders</a>
        <a href="./patient_medicalrecords.php">Medical Records</a>
        <a href="./patient_viewprofile.php" style="color: #0c5c75; font-weight: bold">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <?php
      if (isset($_SESSION['update-user'])) {
        echo $_SESSION['update-user'];
        unset($_SESSION['update-user']);

      }
      if (isset($_SESSION['change-pwd'])) {
        echo $_SESSION['change-pwd'];
        unset($_SESSION['change-pwd']);

      }
      ?>
      <div class="polygons">
        <div class="square">
          <br /><br /><br /><br /><br /><br /><br />
          <table class="tbl-square">
            <tr>
              <td class="type1">First Name :</td>
              <td class="type2">
                <?php echo $first_name; ?>
              </td>
            </tr>
            <tr>
              <td class="type1">Last Name :</td>
              <td class="type2">
                <?php echo $last_name; ?>
              </td>
            </tr>
            <tr>
              <td class="type1">Username :</td>
              <td class="type2">
                <?php echo $user; ?>
              </td>
            </tr>
            <tr>
              <td class="type1">Email Address :</td>
              <td class="type2">
                <?php echo $email; ?>
              </td>
            </tr>
            <tr>
              <td class="type1">NIC Number :</td>
              <td class="type2">
                <?php echo $nic; ?>
              </td>
            </tr>
            <tr>
              <td class="type1">Contact Numer :</td>
              <td class="type2">
                <?php echo '0' . $contact; ?>
              </td>
            </tr>
            <tr>
              <td class="type1">Address :</td>
              <td class="type2">
                <?php echo $address; ?>
              </td>
            </tr>
          </table>
        </div>
        <a href="patient_editprofile.php"><button class="btn-editP square2"><i class="fa-solid fa-pen-to-square"></i>
            &nbsp; Edit Profile</button></a>
        <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user" class="circle" />
        <div id="overlap"></div>
      </div>
    </div>
</body>

</html>