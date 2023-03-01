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
        <a href="#" style="color: #0c5c75; font-weight: bold">Orders</a>
        <a href="./patient_medicalrecords.php">Medical records</a>
        <a href="#">View doctors</a>
        <a href="#">View profile</a>
      </div>
      <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
      <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
    </div>
    <div class="home-right">
      <div class="text-content">
        <div class="order_detail">
          <h2>Order Details</h2>
        </div>
      </div>


      <div class="square-detail-phaorder">

        <div class="detail-phaorder">

          <table class="detail-table-phaorder-deatil">
            <tr>
              <td>Assistant ID :</td>
              <td></td>
            </tr>

            <tr>
              <td>Assistant Name :</td>
              <td></td>
            </tr>

            <tr>
              <td>Username :</td>
              <td></td>
            </tr>
            <tr>
              <td>Phone Number :</td>
              <td></td>
            </tr>
            <tr>
              <td>Email ID :</td>
              <td></td>
            </tr>


          </table>
          <button class="btn-del-phaorder ">Delete Account</button>
          <button class="btn-del-back-phaorder" onclick="location.href='patient_phaorders_view.php'">Back</button>




        </div>
      </div>



    </div>
  </div>
</body>

</html>