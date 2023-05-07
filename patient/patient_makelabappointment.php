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
          <a href="./patient_pharmorders.php" style="color: #0c5c75; font-weight: bold">Orders</a>
          <a href="./patient_medicalrecords.php">Medical records</a>
          <a href="./patient_doctorlist.php">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">

        <div class="back" onclick="location.href='patient_labappointments.php'">
          <i class="fa-solid fa-circle-arrow-left" style="font-size: 35px;"></i>
        </div>

        <div class="makeorder-heading"><h2>Make Lab Appointment</h2></div>
        <div class="form-content lab-apt-form">
            <div class="form-itm">
                <p>Name :</p>
                <input type="text">
            </div>
            <div class="form-itm">
                <p>Contact No :</p>
                <input type="text">
            </div>
            <div class="form-itm">
                <p>NIC No :</p>
                <input type="text">
            </div>
            <div class="form-itm tests-to-be">
                <p>Tests to be done :</p>
                <div class="tests-table">
                  <table>
                    <th>
                      <td>No</td>
                      <td>Test name</td>
                      <td>Time slot</td>
                      <td>Charge</td>
                    </th>
                  </table>
                </div>
            </div>
            <div class="make-lab-apt">
              <p>Upload Prescription :</p>
              <input type="file">
          </div>
            <div class="form-itm">
              <p>Total Amount :</p>
              <input type="text">
          </div>
            <div class="apt-btn order-btn">
                <div class="apt-btn-css"><a href="./patient_labappointments.php"><button>Back</button></a></div>
                <div class="apt-btn-space"></div>
                <div class="apt-btn-css"><a href=""><button>Pay now</button></a></div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
