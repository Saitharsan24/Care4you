<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?><!DOCTYPE html>

<?php 

    $session_id = $_GET['id'];

    $sql = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";

    $result = mysqli_query($conn,$sql);

    if($result){
      $row = mysqli_fetch_assoc($result);
      $doc_name = $row['doc_name'];
      $special = $row['specialization'];
      $date = $row['date'];
      // $tim
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
        <div class="form-content">
            <div class="book1-heading"><h2>Book for an Appointment</h2></div>
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
                <input type="text" value="<?php echo $row['doc_name']; ?>">
            </div>
            <div class="form-itm">
                <p>Appointment No :</p>
                <input type="text" value="<?php echo $row['doc_name']; ?>">
            </div>
            <div class="form-itm radio-itm">
                <p>Make appointment for :</p>
                <input type="radio" name="apt-for">
                <label>Myself</label>
                <div class="radio-gap"></div>
                <input type="radio" name="apt-for">
                <label>Others</label>
            </div>
            <div class="form-itm radio-itm radio-itm2">
              <p>Records access to doctor :</p>
              <label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
</label>

          </div>
            <div class="apt-btn">
                <div class="apt-btn-css"><a href="./patient_makedocappointment.php"><button>Back</button></a></div>
                <div class="apt-btn-space"></div>
                <div class="apt-btn-css"><a href="./patient_bookdoc2.php"><button>Next</button></a></div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
