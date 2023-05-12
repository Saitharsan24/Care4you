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
          <!-- <a href="./patient_doctorlist.php">Doctors</a> -->
          <a href="./patient_viewprofile.php">Profile</a>
        </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <div class="back" onclick="location.href='patient_medicalrecords.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content" style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title">My Lab Reports</div>
      </div>
    
      <div class="tbl-content" style="margin-top:90px;">
      <table class="tbl-docpre"> 
        <tr>
            <td>
                <div class="docpre-containor">
                    <div class="container-row">
                      <div class="sub1">
                        <div class="idtxt">01</div>
                      </div>
                      <div class="sub2">
                        <div class="headtxt">Test Name</div>
                        <div class="datatxt">Prostate-Specific Antigen (PSA) Test</div>
                        <div class="headtxt" style="margin-top:10px;">Test Done</div>
                        <div class="datatxt">05/07/2023</div>
                      </div>
                    </div>
                    <div class="sub3" style="margin-top: 20px;">
                    <button onclick="downloadPDF()" class="pre-btn"><span>Download Lab Report</span></button>
                    <script>
                        function downloadPDF() {
                            var link = document.createElement('a');
                            link.download = 'CareForYou-LabReport.pdf';
                            link.href = '../images/lab-reports/patient-report/LFT.pdf';
                            link.click();
                    }
                    </script>
                    </div>
                </div>
            </td>
            <td>
                <div class="docpre-containor">
                    <div class="container-row">
                      <div class="sub1">
                        <div class="idtxt">01</div>
                      </div>
                      <div class="sub2">
                        <div class="headtxt">Test Name</div>
                        <div class="datatxt">Prostate-Specific Antigen (PSA) Test</div>
                        <div class="headtxt" style="margin-top:10px;">Test Done</div>
                        <div class="datatxt">05/07/2023</div>
                      </div>
                    </div>
                    <div class="sub3" style="margin-top: 20px;">
                    <button onclick="downloadPDF()" class="pre-btn"><span>Download Lab Report</span></button>
                    <script>
                        function downloadPDF() {
                            var link = document.createElement('a');
                            link.download = 'CareForYou-LabReport.pdf';
                            link.href = '../images/lab-reports/patient-report/LFT.pdf';
                            link.click();
                    }
                    </script>
                    </div>
                </div>
            </td>
            <td>
                <div class="docpre-containor">
                    <div class="container-row">
                      <div class="sub1">
                        <div class="idtxt">01</div>
                      </div>
                      <div class="sub2">
                        <div class="headtxt">Test Name</div>
                        <div class="datatxt">Prostate-Specific Antigen (PSA) Test</div>
                        <div class="headtxt" style="margin-top:10px;">Test Done</div>
                        <div class="datatxt">05/07/2023</div>
                      </div>
                    </div>
                    <div class="sub3" style="margin-top: 20px;">
                    <button onclick="downloadPDF()" class="pre-btn"><span>Download Lab Report</span></button>
                    <script>
                        function downloadPDF() {
                            var link = document.createElement('a');
                            link.download = 'CareForYou-LabReport.pdf';
                            link.href = '../images/lab-reports/patient-report/LFT.pdf';
                            link.click();
                    }
                    </script>
                    </div>
                </div>
            </td>
        </tr>
      </table>
      </div>

    </div>
  </div>
</body>

</html>