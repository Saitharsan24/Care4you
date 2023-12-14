<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>

<?php

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM  
    tbl_docappointment INNER JOIN tbl_docsession ON tbl_docappointment.session_id = tbl_docsession.session_id
    INNER JOIN tbl_doctor ON tbl_docsession.doctor_id = tbl_doctor.doctor_id
    INNER JOIN tbl_sysusers ON tbl_docappointment.created_by = tbl_sysusers.userid 
    INNER JOIN tbl_patient ON tbl_sysusers.userid = tbl_patient.userid
    AND created_by = '$user_id' AND docapt_status = 3";

$result = mysqli_query($conn, $sql);

//no of rows needed for display;
$numOfRows = mysqli_num_rows($result) / 3;
$numOfData = mysqli_num_rows($result);

//print_r(mysqli_num_rows($result)); die();
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

<?php include('patient_getinfo.php') ?>

<body>
  <div class="main-div">
    <div class="home-left">
      <div class="nav-logo">
        <a href="./patient_home.php">
          <img src="../images/logo.png" alt="logo" />
        </a>
      </div>
      <div class="profile-image">
        <img src="../images/user-profilepic/patient/<?php echo $profile_picture; ?>" alt="user" class="imgframe" />
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
      <div class="back" onclick="location.href='patient_medicalrecords.php'">
        <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
      </div>

      <div class="text-content"
        style="display: inline; flex-direction: inherit; margin: 40px 0px 0px 70px; position: fixed;">
        <div class="doc-apt-title">My Doctor Prescriptions</div>
      </div>

      <div class="tbl-content" style="margin-top:90px;">
        <table class="tbl-docpre">

          <?php
          if ($numOfData != 0) {
            for ($i = 0; $i <= $numOfRows; $i++) {
              if ($numOfData == 0) {
                break;
              }
              ?>

              <tr>

                <?php

                for ($j = 0; $j < 3; $j++) {

                  if ($numOfData == 0) {
                    break;
                  }

                  $row = mysqli_fetch_assoc($result);
                  $numOfData--;
                  ?>

                  <td>
                    <div class="docpre-containor">
                      <div class="container-row">
                        <div class="sub1">
                          <div class="idtxt">
                            <?php echo $row['docapt_id'] ?>
                          </div>
                        </div>
                        <div class="sub2">
                          <div class="headtxt">Doctor Name</div>
                          <div class="datatxt">
                            <?php echo $row['doc_name'] ?>
                          </div>
                          <div class="headtxt" style="margin-top:10px;">Appointment Date</div>
                          <div class="datatxt">
                            <?php echo $row['date'] ?>
                          </div>
                        </div>
                      </div>
                      <div class="sub3">
                        <a href="patient_viewdocprescription.php?id=<?php echo $row['docapt_id'] ?>"><button
                            class="book-btn"><span>View Prescription</span></button></a>
                      </div>
                    </div>
                  </td>

                  <?php
                }
                ?>

              </tr>

              <?php
            }
          } else {
            ?>

            <tr>
              <td>
                <div class="docpre-containor-empty">
                  <div class="container-row">
                    <p>No Prescriptions to show</p>
                  </div>
                </div>
              </td>

            <?php
          }
          ?>
            <!--  <td>
                <div class="docpre-containor">
                    <div class="container-row">
                      <div class="sub1">
                        <div class="idtxt">01</div>
                      </div>
                      <div class="sub2">
                        <div class="headtxt">Doctor Name</div>
                        <div class="datatxt">Dr. Sepalika Mendis</div>
                        <div class="headtxt" style="margin-top:10px;">Appointment Date</div>
                        <div class="datatxt">05/07/2023</div>
                      </div>
                    </div>
                    <div class="sub3">
                      <a href="#"><button class="book-btn"><span>View Prescription</span></button></a>
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
                        <div class="headtxt">Doctor Name</div>
                        <div class="datatxt">Dr. Sepalika Mendis</div>
                        <div class="headtxt" style="margin-top:10px;">Appointment Date</div>
                        <div class="datatxt">05/07/2023</div>
                      </div>
                    </div>
                    <div class="sub3">
                      <a href="#"><button class="book-btn"><span>View Prescription</span></button></a>
                    </div>
                </div>
            </td>
        </tr> -->

        </table>
      </div>

    </div>
  </div>
</body>

</html>