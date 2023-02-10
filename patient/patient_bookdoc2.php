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
          <a href="#">View doctors</a>
          <a href="#">View profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>

      <div class="home-right">
        <div class="book2-heading"><h2>Book for an Appointment</h2></div>
        <div class="form-set">
          <div class="form-itm">
            <p>Patient Name :</p>
            <input type="text" />
          </div>
          <div class="form-itm">
            <p>NIC No :</p>
            <input type="text" />
          </div>
          <div class="form-itm">
            <p>Contact No :</p>
            <input type="text" />
          </div>
        </div>
        <div class="form-divider"></div>
        <div class="form-set">
          <div class="form-itm">
            <p>Doctor fee :</p>
            <input type="text" />
          </div>
          <div class="form-itm">
            <p>Booking fee :</p>
            <input type="text" />
          </div>
          <div class="form-itm">
            <p>Total amount :</p>
            <input type="text" />
          </div>
        </div>
        <div class="apt-btn form-set form-set-btn">
          <div class="apt-btn-css">
            <a href="./patient_bookdoc1.php"><button>Back</button></a>
          </div>
          <div class="apt-btn-space"></div>
          <div class="apt-btn-css">
            <a href="./patient_docappointments.php"><button>Pay Later</button></a>
          </div>
          <div class="apt-btn-space"></div>
          <div class="apt-btn-css">
            <a href=""><button>Pay Now</button></a>
          </div>
        </div>
        <div class="form-set form-bottom-text">
          <p>** NOTE: You have to make the payment 24h prior to appointment.</p>
        </div>
      </div>
    </div>
  </body>
</html>