<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?>

<?php 
  // displaying First name and nic from database
  $user_id = $_SESSION['user_id'];

  $query="SELECT * FROM tbl_patient where userid = '$user_id'";
  $result = mysqli_query($conn, $query);

  $row = $result -> fetch_assoc();
  $f_name = $row['first_name'];
  $l_name = $row['last_name'];
  $p_name = $f_name . " " . $l_name;;
  $p_nic = $row['nic'];
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
          <a href="./patient_medicalrecords.php">Medical Records</a>
          <a href="./patient_doctorlist.php">Doctors</a>
          <a href="#">Profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">

      <div class="back" onclick="location.href='patient_labappointments.php'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

        <div class="makeorder-heading" style="margin-bottom:30px;"><h2>Make Lab Appointment</h2></div>

        <?php 
            // if(isset($_SESSION['upload']))
            //   {
            //     echo $_SESSION['upload'];
            //     unset($_SESSION['upload']);
            //   }
            //   if(isset($_SESSION['add-order']))
            //   {
            //     echo $_SESSION['add-order'];
            //     unset($_SESSION['add-order']);
            //   }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-content make-order">
            <div class="form-itm">
                <p>Name :</p>
                <input type="text" name="pname" value="<?php echo $p_name;?>" readonly/>
            </div>
            <div class="form-itm">
                <p>Contact No :</p>
                <input type="tel" name="contactnumber" pattern="[0-0]{1}[0-9]{9}" required/>
            </div>
            <div class="form-itm">
                <p>NIC No :</p>
                <input type="text" name="nic" pattern="[0-9]{9}[Vv0-9]{1,3}" value="<?php echo $p_nic;?>" readonly/>
            </div>
            <div class="form-itm other-order">
                <p>Date :</p>
                <input type="date" name="date" id="date">
            </div>
            <!-- <div class="form-itm">
              <input type="text">
            </div> -->
            <div class="form-itm type-file">
                <p>Upload Prescription :</p>
                <input type="file" accept="image/*,.doc,.docx,.txt,.pdf" name="prescription" required/>
            </div>
            <div class="ortext"> or </div>
            <div class="form-itm">
                <p>Seletct Test :</p>
                <select name="test_name" id="test_name" class="testselect">
                  <option value=""> Select Test Name </option>
                  <?php
                    $tstnamesql = "SELECT test_name FROM tbl_labtests;";
                    $tstNresult = mysqli_query($conn, $tstnamesql);
                    while ($row = mysqli_fetch_assoc($tstNresult)) {
                      echo "<option value='" . $row['test_name'] . "'>" . $row['test_name'] . "</option>";
                    }
                  ?>                               
                </select>
            </div>
            <div class="apt-btn order-btn">
                <div class="apt-btn-css"><a href="patient_pharmorders.php">
                <button type="submit" name="submit" style="width:230px; margin-left:8px;">
                  Make Lab Appointment
                </button>
                </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </body>
</html>

<?php

?>
