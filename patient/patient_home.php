<?php include('../config/constants.php')?>
<?php include('../login_access.php') ?>

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
          <a href="./patient_home.php" style="color: #0c5c75; font-weight: bold">Home</a>
          <a href="./patient_appointments.php">Appointments</a>
          <a href="./patient_pharmorders.php">Orders</a>
          <a href="./patient_medicalrecords.php">Medical Records</a>
          <a href="./patient_doctorlist.php">Doctors</a>
          <a href="./patient_viewprofile.php">Profile</a>
        </div>
        <!-- <div class="signout"><a href="../logout.php">Sign Out</a></div> -->
        <div class="signout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
      </div>
      <div class="home-right">
        <div class="text-content">
          Welcome
          <div class="user-name">Name</div>
        </div>
        <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);

                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);

                }
            ?>
        <div class="page-content">
          <div class="left-page-content">
           
          </div>
          <div class="right-page-content">
            <div><a href="./patient_makedocappointment.php"><button>Make doctor appointment</button></a></div>
            <div class="home-divider"></div>
            <div><a href="./patient_makeorder.php"><button>Order medicine</button></a></div>
            <div class="home-divider"></div>
            <div><a href="./patient_makelabappointment.php"><button>Make lab appointment</button></a></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
