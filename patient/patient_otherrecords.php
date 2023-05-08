<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

    $user_id = $_SESSION['user_id'];
  
    $sql = "SELECT * FROM tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id AND created_by = '$user_id'";
    $results = mysqli_query($conn,$sql);
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
      <div class="back" onclick="location.href='patient_medicalrecords.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content" style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title">My Medical Records</div>
        <div class="mk-apt-btn"><a href="#"><button class="btn-mkdcapt"><span>upload a record</span></button></a></div>
      </div>

      <div class="tbl-content">
      <table class="tbl-mydocapp" style="width:68%; margin-left:60px;">
        <thead>
            <tr>
                <td>Record ID</td>
                <td>Record Type</td>
                <td>Date</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <td>01</td>
                <td>Doctor Prescription</td>
                <td>14/04/2023</td>
                <td>
                <button onclick="downloadImage()" class="pre-btn" style="width:180px;"><span>Download Prescription</span></button>
                    <img src="../images/pharmacy-orders/Order_06_02_23_08_56_41_PM.jpeg" id="image" style="display:none">
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
                </td>
                <td>
                    <a href="patient_viewotherprescription.php">
                    <button class="book-btn"><span>View Details</span></button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>02</td>
                <td>Lab Report</td>
                <td>01/05/2023</td>
                <td>
                    <button onclick="downloadPDF()" class="pre-btn" style="width:180px;"><span>Download Lab Report</span></button>
                    <script>
                        function downloadPDF() {
                            var link = document.createElement('a');
                            link.download = 'CareForYou-LabReport.pdf';
                            link.href = '../images/lab-reports/patient-report/LFT.pdf';
                            link.click();
                    }
                    </script>
                </td>
                <td>
                    <a href="../images/lab-reports/patient-report/LFT.pdf" target="_blank">
                    <button class="book-btn"><span>View Report</span></button>
                    </a>
                </td>
            </tr>
        </tbody>
      </table>
      </div>

    </div>
  </div>
</body>

</html>