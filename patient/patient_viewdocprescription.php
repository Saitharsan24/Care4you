<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

    $docapt_id = $_GET['id'];

    $sql = "SELECT * FROM  
    tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id
    INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
    INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid 
    INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
    AND docapt_id = $docapt_id";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

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
        <a href="./patient_appointments.php">Appointments</a>
        <a href="./patient_pharmorders.php">Orders</a>
        <a href="./patient_medicalrecords.php" style="color: #0c5c75; font-weight: bold">Medical Records</a>
        <a href="./patient_doctorlist.php">Doctors</a>
        <a href="#">Profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <div class="back" onclick="location.href='patient_docprescriptions.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content" style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title">Prescription Details</div>
      </div>
    
      <div class="tbl-content" style="margin-top:90px;">
        <div class="container-row2">
        <div class="view-sub1">
          <div class="view-idtxt">Reference Number <br/><?php echo $row['docapt_id'] ?></div>
          <br/>
          <div class="view-headtxt">Appointment Date</div>
          <div class="view-datatxt"><?php echo $row['date'] ?></div>
          <br/>
          <div class="view-headtxt">Doctor Name</div>
          <div class="view-datatxt"><?php echo $row['doc_name'] ?></div>
          <br/> <br/>
          <button onclick="downloadImage()" class="pre-btn"><span>Download Prescription</span></button>
          <img src="../images/docprescription/Order_06_02_23_08_56_41_PM.jpeg" id="image" style="display:none">
          <script>
            function downloadImage() {
                var img = document.getElementById("image");
                var url = img.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
                var link = document.createElement('a');
                link.download = 'CareForYou-Prescription.png';
                link.href = url;
                link.click();
          }
          </script>
        </div>
        <div class="view-sub2">
          <img src="../images/docprescription/<?php echo $row['prescription_name'] ?>" alt="" class="view-sub2" style="border-radius:0px;">
        </div>
      </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>