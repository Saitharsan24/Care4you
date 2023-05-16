<?php

if (isset($_POST['add-available'])) {
  print_r($_POST);
  die();
}
include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php
// displaying First name and nic from database
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM tbl_patient where userid = '$user_id'";
$result = mysqli_query($conn, $query);

$row = $result->fetch_assoc();
$f_name = $row['first_name'];
$l_name = $row['last_name'];
$p_name = $f_name . " " . $l_name;
;
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

      <div class="makeorder-heading" style="margin-bottom:30px;">
        <h2>Make Lab Appointment</h2>
      </div>

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
            <input type="text" name="name" value="<?php echo $p_name; ?>" readonly />
          </div>
          <div class="form-itm">
            <p>Contact No :</p>
            <input type="tel" name="contactnumber" pattern="[0-0]{1}[0-9]{9}" required />
          </div>
          <div class="form-itm">
            <p>NIC No :</p>
            <input type="text" name="nic" pattern="[0-9]{9}[Vv0-9]{1,3}" value="<?php echo $p_nic; ?>" readonly />
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
            <input type="file" accept="image/*,.doc,.docx,.txt,.pdf" name="prescription" />
          </div>
          <div class="ortext"> OR </div>
          <div class="form-itm">
            <p>Seletct Test :</p>
            <select name="test_name[]" id="test_name" class="testselect" multiple="multiple">
              <option value="" hidden> Select Test Name </option>
              <?php
              $tstnamesql = "SELECT * FROM tbl_labtests WHERE prescription = 0";
              $tstNresult = mysqli_query($conn, $tstnamesql);
              while ($row = mysqli_fetch_assoc($tstNresult)) {
                echo "<option value='" . $row['test_id'] . "'>" . $row['test_name'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="apt-btn order-btn">
            <div class="apt-btn-css"><a href="patient_pharmorders.php">
                <button type="submit" name="createlabapt" style="width:230px; margin-left:8px;">
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
if (isset($_POST['createlabapt'])) {

  //getting values from post variable
  $labaptDate = $_POST['date'];
  $contact = $_POST['contactnumber'];

  //Check whether the prescription is uploaded or not


  if (isset($_FILES['prescription']['name'])) {

    //Upload the prescription
    //To upload the prescription we need the file name, source path and destination path

    //Get the prescription name
    $prescription_name = $_FILES['prescription']['name'];


    //Upload prescription only if prescription is selected
    if ($prescription_name != "") {
      //Auto Rename the Prescription

      //Get the extension of the prescription
      $namarr = explode('.', $prescription_name);
      $ext = end($namarr);

      //Rename the prescription
      $prescription_name = "LabAppointment_" . $fullname . "." . $ext;

      //Get the source path
      $source_path = $_FILES['prescription']['tmp_name'];

      //Give the destination path
      $destination_path = "../images/labapt-prescription/" . $prescription_name;

      //Upload the prescription
      $upload = move_uploaded_file($source_path, $destination_path);

      //Check whether the prescription is uploaded or not
      if ($upload == FALSE) {
        $_SESSION['upload'] = "Failed to upload Prescription! Please Retry";
        //Redirect to place order page
        // header('location:'.SITEURL.'/patient/patient_pharmorders.php'); 
        //Stop the process
        die();
      }

    }

  } else {
    //Prescription not uploaded and prescription name is not set (Data can not save)
    $prescription_name = "";
  }

  //creating lab appointments 
  $sql = "INSERT INTO tbl_labappointment (labapt_date,contact,created_by,prescription_name) 
              VALUES ('$labaptDate','$contact','$user_id','$prescription_name')";

  $result = mysqli_query($conn, $sql);

  //inseting lab tests which do not need prescription
  $lastInsertedId = mysqli_insert_id($conn);

  for ($i = 0; $i < count($_POST['test_name']); $i++) {
    $labtestinsert = $_POST['test_name'][$i];
    $date_apt = $labaptDate;
    $test_id = $labtestinsert;
    $sql = "SELECT COUNT(tbl_addlabtest.addlabtest_id) AS tests_amount FROM tbl_addlabtest
      INNER JOIN tbl_labtests ON tbl_labtests.test_id = tbl_addlabtest.test_id
      INNER JOIN tbl_labappointment ON tbl_labappointment.labapt_id = tbl_addlabtest.labapt_id
      WHERE tbl_addlabtest.test_id = '$labtestinsert'
      AND tbl_labappointment.labapt_date ='$labaptDate'
      AND tbl_addlabtest.confirmation_status = 1";
    $sum = mysqli_query($conn, $sql);
    $sum_tests = mysqli_fetch_assoc($sum);

    $sql = "SELECT NumberOfTestsPerDay FROM tbl_labtests
      WHERE test_id = '$labtestinsert'";
    $max_tests = mysqli_query($conn, $sql);
    $max_no_of_test = mysqli_fetch_assoc($max_tests);
    // print_r((int)$sum_tests['tests_amount']."    ".$max_no_of_test['NumberOfTestsPerDay']);die();
    if ((int) $sum_tests['tests_amount'] < (int) $max_no_of_test['NumberOfTestsPerDay']) {
      $sql1 = "INSERT INTO tbl_addlabtest (labapt_id,test_id,confirmation_status)
                VALUES ('$lastInsertedId','$labtestinsert','1')";
      $result1 = mysqli_query($conn, $sql1);
    } else {
      $sql1 = "INSERT INTO tbl_addlabtest (labapt_id,test_id,confirmation_status)
                VALUES ('$lastInsertedId','$labtestinsert','0')";
      $result1 = mysqli_query($conn, $sql1);
    }


  }



}



?>