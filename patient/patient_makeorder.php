<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/patient.css" />
    <title>Home</title>
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
          <a href="#">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <div class="signout"><a href="#">Sign Out</a></div>
      </div>
      <div class="home-right">
        <div class="makeorder-heading"><h2>Make Pharmacy order</h2></div>
        <div class="form-content make-order">
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
            <div class="form-itm">
                <p>Address :</p>
                <input type="text">
            </div>
            <div class="form-itm">
              <input type="text">
            </div>
            <div class="form-itm type-file">
                <p>Upload Prescription :</p>
                <input type="file">
            </div>
            <div class="form-itm other-order">
                <p>Other items :</p>
                <textarea></textarea>
            </div>
            <div class="apt-btn order-btn">
                <div class="apt-btn-css"><a href="./patient_pharmorders.php"><button>Back</button></a></div>
                <div class="apt-btn-space"></div>
                <div class="apt-btn-css"><a href="./patient_pharmorders.php"><button>Place order</button></a></div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
