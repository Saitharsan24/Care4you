<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?><!DOCTYPE html>

<?php
    $session_id = $_GET['id'];
    $my_other = $_GET['myother'];

    if($my_other==0){
      $user_id = $_SESSION['user_id'];
      $sql = "SELECT * FROM tbl_patient WHERE userid = '$user_id'";
      $results = mysqli_query($conn, $sql);

      $sql1 = "SELECT * FROM tbl_docsession INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id AND session_id = '$session_id'";
      $result1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($result1);
      $doc_fee = $row1['charge'];

      
      if($results){
        $row = mysqli_fetch_assoc($results);
        $pname = $row['first_name'];
        $pnic = $row['nic'];
        $pcontact = $row['contact'];
      }

      $booking_fee= 500;
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

        <div class="back" onclick="location.href='patient_bookdoc1.php?id=<?php echo $session_id ?>'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>
        
        <div class="book2-heading"><h2>Book for an Appointment</h2></div>
        <div class="form-set">
          
          <div class="form-itm">
            <p>Patient Name :</p>
            <input type="text" value="<?php echo $pname ?>" readonly/>
          </div>

          <div class="form-itm">
            <p>NIC No :</p>
            <input type="text" value="<?php echo $pnic ?>" readonly/>
          </div>

          <div class="form-itm">
            <p>Contact No :</p>
            <input type="text" value="<?php echo $pcontact ?>" readonly/>
          </div>

        </div>

        <div class="form-divider"></div>

        <div class="form-set">

          <div class="form-itm">
            <p>Doctor fee :</p>
            <input type="text"  value="<?php echo "Rs.".$doc_fee ?>" readonly/>
          </div>

          <div class="form-itm">
            <p>Booking fee :</p>
            <input type="text" value="<?php echo "Rs.".$booking_fee ?>" readonly/>
          </div>

          <div class="form-itm">
            <p>Total amount :</p>
            <input type="text" value="<?php echo "Rs.".($booking_fee+$doc_fee) ?>" readonly/>
          </div>

        </div>

        <div class="apt-btn form-set form-set-btn">
  
          <div class="apt-btn-css">
            <a href="./patient_docappointments.php"><button>Pay Later</button></a>
          </div>

          <div class="apt-btn-space"></div>

          <div class="apt-btn-css">
            <a href=""><button>Pay Now</button></a>
          </div>

        </div>

        <div class="form-set form-bottom-text">
          <p>** NOTE: You have to make the payment within 24h.</p>
        </div>

      </div>
    </div>
  </body>
</html>
